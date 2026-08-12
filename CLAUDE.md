# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## O que é este projeto

Ferramenta PHP/Doctrine para trabalhar com o schema legado do **Unimestre** (sistema acadêmico). Dois usos distintos convivem no repositório:

1. **Mapeamento ORM completo** — 1423 entidades Doctrine em `src/Entity/`, geradas a partir do banco **`onboarding`** (o schema de referência, no host remoto). O banco é a fonte da verdade; as entidades correm atrás dele, nunca o contrário.
2. **Comparador de schemas** (`comparador.php`) — introspecta dois bancos MySQL (um "cliente" e o modelo `onboarding`) e gera um script SQL de correção para alinhar o cliente ao modelo.

Atenção à distinção: `bootstrap.php` e o gerador leem o **`onboarding`** remoto. O `comparador.php` é quem lê o banco `unimestre` local (container `mysql_84`), como lado "cliente".

Não há framework HTTP, roteador nem testes. `index.php` é um script de demonstração/scratch do CRUD via ORM, não uma aplicação web.

## Ambiente: tudo roda dentro do container

PHP e Composer **não existem no host** — só dentro do container `servidor` (imagem `rovela/php:8.5-fpm-alpine3.23`, PHP 8.5). O working dir do container é `/var/www/html/public`, que é o bind mount da raiz do repositório.

```bash
docker compose up -d                              # sobe o container
docker exec servidor composer install             # dependências
docker exec servidor php index.php                # roda o script de demo do ORM
docker exec servidor php comparador.php           # gera resultado_diferencas.sql
```

O container conecta à rede Docker externa `uni_sup_network` e depende do container MySQL `mysql_84` — ambos precisam já existir. Porta exposta: `8089:80`.

## Comandos de schema

```bash
docker exec servidor composer schema:validate     # valida mapeamento vs. banco
docker exec servidor composer schema:diff         # DDL que faltaria (dump-sql, não aplica)
docker exec servidor php bin/doctrine list        # todos os comandos do Doctrine CLI
```

`bin/doctrine` monta o console do Doctrine carregando `bootstrap.php` diretamente via `SingleManagerProvider`. O arquivo `config/cli-config.php.dist` está vazio e **não é usado** — ignore-o.

Use sempre `orm:validate-schema --skip-sync` para checar o mapeamento. Sem a flag, o comando também compara com o banco e afoga o resultado nas divergências estruturais descritas mais abaixo.

## Entidades são geradas, não escritas à mão

`src/Entity` e `src/Repository` são **artefato gerado** por `bin/gerar-entidades.php` a partir do schema do banco `onboarding`. São 1423 entidades. Não edite uma entidade à mão esperando que a mudança sobreviva — a próxima geração sobrescreve.

```bash
docker exec servidor php bin/gerar-entidades.php --dry-run     # relata, não escreve
docker exec servidor php bin/gerar-entidades.php               # gera tudo
docker exec servidor php bin/gerar-entidades.php --only=avl_   # só um prefixo
```

Regra de sobrescrita: **entidades sempre**, **repositórios nunca** (só cria os que faltam). Isso protege consultas escritas à mão — `AvlAvaliadoresRepository` tem métodos customizados e sobrevive à regeneração. `--forcar-repos` ignora essa proteção e apaga esses métodos.

A introspecção usa o `SchemaManager` do DBAL, não leitura manual do `information_schema`. Isso é deliberado: o que é emitido é exatamente o que a introspecção lê de volta, então o mapeamento sai fiel por construção.

Cada execução escreve dois relatórios na raiz: `tabelas-sem-pk.txt` (176 tabelas sem PRIMARY KEY) e `fks-nao-mapeadas.txt` (80 FKs mantidas como coluna escalar).

### Por que 176 tabelas ficam de fora

`colunasIdentificador()` exige uma PRIMARY KEY real. O Doctrine aceitaria uma UNIQUE `NOT NULL` como `#[ORM\Id]`, o que mapearia mais 37 tabelas — mas ele emite `PRIMARY KEY` para o identificador, e o mapeamento não pode afirmar uma PK que o banco modelo não tem. **Não afrouxe esse critério.**

Detalhe do schema legado: 35 dessas tabelas têm um índice UNIQUE chamado literalmente `PrimaryKey` (`departamentos`, `documentos`, `horarios`, … todos sobre a coluna `codigo`). Não é a PRIMARY KEY do MySQL — essa se chama sempre `PRIMARY`. É só o nome do índice. Mapear essas tabelas exige promover o índice a PRIMARY KEY **no banco**, o que é decisão do dono do schema, não do mapeamento.

## Convenções de mapeamento

As entidades espelham nomenclatura legada do Unimestre e essa correspondência não pode ser "corrigida" por estética:

- Classe e repositório usam o nome da tabela em PascalCase (`avl_avaliadores` → `AvlAvaliadores` + `AvlAvaliadoresRepository`); colunas viram `camelCase` (`SN_RESULTADOS` → `$snResultados`). Todo `#[ORM\Column]` tem `name:` explícito.
- Prefixos: `cd_` = código/FK, `sn_` = flag, `dt_` = data, `nm_`/`ds_` = nome/descrição. **`sn_` não garante booleano**: `sn_coordenador_pode_ver` é `tinyint unsigned` numérico. O tipo vem da coluna física, não do prefixo — por isso alguns `sn_` têm getter `get`, não `is`.
- Getter de booleano usa prefixo `is`; setters retornam `self`. PK auto-incremento só tem getter (o banco atribui).
- Repositórios estendem `EntityRepository` (Doctrine puro, não `ServiceEntityRepository` do Symfony).
- Tabelas declaram `charset`/`collation` explícitos. O banco é `latin1_swedish_ci` mas o schema default é `utf8mb4`; sem declarar, toda tabela acusaria diferença.
- Comments de tabela aparecem truncados (`Avalia??es`). Os bytes já estão corrompidos no banco (`0x3F`), não é problema de encoding do client — preservar verbatim é o que mantém a fidelidade.
- Construtor no estilo do exemplo só é gerado até 20 propriedades; acima disso a entidade sai sem construtor (a tabela mais larga tem 169 colunas) e usa os setters encadeados.

## A camada `src/DBAL` (não remova)

O DBAL não tem tipo TINYINT e `AbstractMySQLPlatform` mapeia **todo** `tinyint` para `boolean` na introspecção, sem distinguir a largura. O banco tem 926 colunas `tinyint(1)` que são flags e 781 `tinyint` que guardam número — um mapeamento global sujaria ~800 colunas em qualquer direção.

`src/DBAL` resolve isso decidindo por coluna:

- `TinyIntType` — tipo `tinyint` (int no PHP, `TINYINT` no DDL). Implementa `PhpIntegerMappingType`; sem esse marcador o default sai entre aspas e a coluna divergiria.
- `TinyIntSchemaManager` — na introspecção, `tinyint(1)` volta como `boolean`, o resto como `tinyint`.
- `TinyIntPlatform` + `TinyIntMiddleware` — plumbing para a conexão usar esse SchemaManager.

Registrado em `bootstrap.php` (`Type::addType` + `setMiddlewares`). Qualquer conexão nova precisa do mesmo registro, incluindo `comparador.php`, senão o `tinyint` volta a colapsar em boolean.

## Divergências conhecidas entidade ↔ banco

O `onboarding` é o banco **modelo**, usado para validar o schema de outros clientes. Ele nunca deve ser alterado: as entidades correm atrás do banco. **Nunca aplique a saída de `schema:diff` no banco** — ela removeria FKs e índices reais.

`bootstrap.php` instala um `setSchemaAssetsFilter` que limita a introspecção às tabelas que têm entidade. Sem ele o diff também acusaria as 176 tabelas sem PRIMARY KEY e as 87 views, emitindo `DROP TABLE` para cada uma. Não remova esse filtro; `bin/gerar-entidades.php` o sobrepõe deliberadamente, porque o gerador precisa ver o banco inteiro para descobrir tabela nova.

`composer schema:diff` fecha em **zero** — *"your database is already in sync with the current entity metadata"*. Coluna, tipo, default, índice, AUTO_INCREMENT e nome de constraint de FK batem nas 1423 tabelas mapeadas. Se aparecer qualquer statement, é divergência real: investigue, não normalize.

Chegar a zero exigiu três peças. Nenhuma pode ser removida sem o diff voltar a ~289 statements.

**1. `#[EsquemaFisico]` na entidade** — registra o que o ORM não modela: o nome real de cada constraint de FK (inclusive as que ficaram escalares, com `onDelete`/`onUpdate`) e as colunas `AUTO_INCREMENT` que não são o identificador. Emitido por `bin/gerar-entidades.php`.

Esses dados ficam **na entidade**, nunca lidos do banco conectado. É o ponto central: a entidade é o modelo de referência e precisa ser autocontida. Se fossem lidos da conexão ativa, comparar contra o banco de um cliente adotaria os nomes do próprio cliente como corretos e mascararia justamente as diferenças que se quer detectar.

**2. `ReconciliadorEsquema`** — aplica o atributo no evento `postGenerateSchema`, antes da comparação, e reinsere os índices que o `Table` do DBAL descarta por julgar redundantes com uma UNIQUE/PK. Registra a FK mesmo quando o alvo é uma das 176 tabelas sem PK: o DBAL guarda a constraint pelo nome da tabela alvo e não exige que ela esteja no schema. Filtrar aí deixaria 17 FKs reais aparecendo como removidas.

**3. `ComparadorFkDuplicada`** — contorna um defeito do `Comparator` do DBAL. O `onboarding` tem 12 grupos de FK duplicada (duas constraints, mesma coluna, mesmo alvo, nomes diferentes — ex.: `bib_emprestimos_ibfk_2` e `_ibfk_3` em `cd_situacao`). O pareamento em `Comparator.php:267` compara FKs por definição, ignora o nome e dá `unset` no array do loop interno, então uma FK antiga consome as duas novas: sobra uma "removida" que existe nos dois lados, e uma que falta de verdade passa despercebida. A subclasse resolve os dois lados comparando FK **por nome**, que é o critério correto aqui.

Armadilha já paga: usar `columnDefinition` para forçar o DDL exato **não** ajuda. `AbstractPlatform::columnsEqual()` zera o `columnDefinition` antes de comparar, então a coluna passa a ser reportada como alterada em todo diff — troca ruído por ruído.

### Provando que o zero não é cegueira

Um comparador que não detecta nada também fecha em zero. `bin/provar-comparador.php` injeta divergências no schema do banco **em memória** (`introspectSchema()`, mutação, `compareSchemas`) e confere que cada uma aparece. Não executa nada no banco; sai com código 1 se algum caso passar despercebido. Casos cobertos: coluna removida, tipo trocado, default trocado, índice removido, FK removida, FK de mesmo nome com `onDelete` diferente, FK de mesmo nome com coluna diferente, tabela inteira faltando, e uma de um par de FKs duplicadas faltando (esta o comparador de fábrica **não** detecta). Rode `docker exec servidor php bin/provar-comparador.php` depois de mexer em `ComparadorFkDuplicada`, `ReconciliadorEsquema` ou no gerador — o risco da classe é exatamente virar um comparador cego.

Ao mexer em join column, lembre que o `SchemaTool` monta a coluna de FK a partir da coluna referenciada no **alvo** (SchemaTool.php:905) e só deixa o `JoinColumn` sobrepor as chaves que declara explicitamente (:916). Por isso o gerador emite sempre `default`, `unsigned`, `fixed` e `comment` no `JoinColumn`, inclusive como `null`/`false` — senão o atributo do alvo vaza para a coluna local. Só essas chaves são honradas (`KNOWN_COLUMN_OPTIONS`); `length` vem sempre do alvo.

Nada disso afeta `comparador.php`, que compara banco↔banco e não passa pelas entidades.

## Comparador de schemas (`comparador.php`)

Compara `$connCliente` (banco a corrigir) contra `$connModelo` (banco de referência) e escreve o DDL de alinhamento em `resultado_diferencas.sql`, na raiz. Não executa nada no banco — só gera o arquivo.

Ponto não óbvio: VIEWs são removidas dos dois schemas em memória antes da comparação. O `SchemaManager` do Doctrine introspecta VIEW como se fosse tabela física, o que geraria `CREATE TABLE`/`DROP TABLE` espúrios. A lista de VIEWs vem de `information_schema.VIEWS` de ambos os bancos e é unida antes do `dropTable()`. Preserve esse bloco ao mexer no arquivo.

## Credenciais

Credencial de banco vive só no `.env` da raiz, **fora do versionamento** (`/.env` no `.gitignore`). `.env.example` documenta as chaves sem valor: `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`, `DB_DRIVER`.

`bootstrap.php` lê o arquivo via `App\Config\Ambiente::carregar()` e monta `$connectionParams` com `obrigatorio()` (estoura se a chave faltar) / `obter()` com default para porta e driver. Variável já exportada no ambiente (container, CI) tem precedência sobre o arquivo — `Ambiente` não sobrescreve o que já existe em `$_ENV`/`$_SERVER`/`getenv()`. Sem dependência nova: parser próprio, não é symfony/dotenv.

Não copie valor de credencial para novo arquivo, saída de terminal, commit ou mensagem. Scripts novos devem obter a conexão via `require bootstrap.php` — é o que `bin/gerar-entidades.php` faz. Se precisar de uma conexão realmente separada (ex.: o lado "cliente" de um comparador), use `Ambiente` com um prefixo próprio de chave (`DB_CLIENTE_*`) e acrescente as chaves ao `.env.example`, nunca com valor embutido no código.

`index.php` **escreve** no banco configurado (faz `persist`/`flush` de um `AvlAvaliadores`). Como o `bootstrap.php` aponta para o `onboarding`, rodar `index.php` insere linha no schema de referência. Confirme com o usuário antes de executá-lo.
