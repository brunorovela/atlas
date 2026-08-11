#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Gera entidades Doctrine + repositórios a partir do schema do banco modelo.
 *
 * A introspecção usa o próprio SchemaManager do DBAL (via bootstrap.php), não
 * leitura manual do information_schema. Isso garante que o que é emitido é
 * exatamente o que a introspecção lê de volta — ou seja, schema:diff fecha
 * limpo por construção.
 *
 * Uso:
 *   php bin/gerar-entidades.php [--dry-run] [--only=pref1,pref2] [--forcar-repos]
 *
 *   --dry-run       não escreve nada, só relata
 *   --only=...      gera só as tabelas cujo nome começa com um dos prefixos
 *   --forcar-repos  sobrescreve repositórios existentes (PERDE métodos customizados)
 *
 * Entidades são sempre sobrescritas (são artefato gerado). Repositórios só são
 * criados quando não existem, para não apagar consultas escritas à mão.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\DBAL\TinyIntType;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\DefaultExpression\CurrentDate;
use Doctrine\DBAL\Schema\DefaultExpression\CurrentTime;
use Doctrine\DBAL\Schema\DefaultExpression\CurrentTimestamp;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;

/** Acima disso o construtor no estilo do exemplo vira ruído; a tabela mais larga tem 169 colunas. */
const LIMITE_CONSTRUTOR = 20;

const DIR_ENTIDADE = __DIR__ . '/../src/Entity';
const DIR_REPOSITORIO = __DIR__ . '/../src/Repository';

const TIPOS_PHP = [
    'integer' => 'int',
    'smallint' => 'int',
    'tinyint' => 'int',
    'bigint' => 'string',
    'boolean' => 'bool',
    'decimal' => 'string',
    'float' => 'float',
    'smallfloat' => 'float',
    'string' => 'string',
    'ascii_string' => 'string',
    'text' => 'string',
    'guid' => 'string',
    'enum' => 'string',
    'binary' => 'string',
    'blob' => 'string',
    'json' => 'array',
    'simple_array' => 'array',
    'date' => '\DateTimeInterface',
    'date_immutable' => '\DateTimeImmutable',
    'datetime' => '\DateTimeInterface',
    'datetime_immutable' => '\DateTimeImmutable',
    'datetimetz' => '\DateTimeInterface',
    'datetimetz_immutable' => '\DateTimeImmutable',
    'time' => '\DateTimeInterface',
    'time_immutable' => '\DateTimeImmutable',
    'dateinterval' => '\DateInterval',
];

/** Tipos com length relevante no DDL. */
const TIPOS_COM_LENGTH = ['string', 'ascii_string', 'text', 'binary', 'blob', 'guid'];

// -----------------------------------------------------------------------------
// Argumentos
// -----------------------------------------------------------------------------
$opcoes = ['dry-run' => false, 'only' => [], 'forcar-repos' => false];
foreach (array_slice($argv, 1) as $arg) {
    if ($arg === '--dry-run') {
        $opcoes['dry-run'] = true;
    } elseif ($arg === '--forcar-repos') {
        $opcoes['forcar-repos'] = true;
    } elseif (str_starts_with($arg, '--only=')) {
        $opcoes['only'] = array_filter(explode(',', substr($arg, 7)));
    } else {
        fwrite(STDERR, "Argumento desconhecido: $arg\n");
        exit(1);
    }
}

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/../bootstrap.php';
$conexao = $entityManager->getConnection();
$banco = $conexao->getDatabase();

echo "Lendo schema de '$banco'...\n";

// Views entram no introspectSchema como se fossem tabelas físicas; fora.
$views = array_flip($conexao->fetchFirstColumn(
    'SELECT TABLE_NAME FROM information_schema.VIEWS WHERE TABLE_SCHEMA = ?',
    [$banco]
));

// O bootstrap restringe a introspecção às tabelas já mapeadas (para o
// schema:diff não sugerir DROP TABLE). Aqui é o oposto: o gerador precisa ver o
// banco inteiro, senão nunca descobre tabela nova.
$conexao->getConfiguration()->setSchemaAssetsFilter(static fn(): bool => true);

$schema = $conexao->createSchemaManager()->introspectSchema();

// -----------------------------------------------------------------------------
// Triagem: o que dá para mapear
// -----------------------------------------------------------------------------
/** @var array<string, Table> $tabelas nome => Table */
$tabelas = [];
$puladas = ['view' => [], 'sem_pk' => [], 'filtrada' => []];

foreach ($schema->getTables() as $tabela) {
    $nome = $tabela->getName();

    if (isset($views[$nome])) {
        $puladas['view'][] = $nome;
        continue;
    }
    if ($opcoes['only'] !== [] && !prefixoBate($nome, $opcoes['only'])) {
        $puladas['filtrada'][] = $nome;
        continue;
    }
    if (colunasIdentificador($tabela) === null) {
        $puladas['sem_pk'][] = $nome;
        continue;
    }
    $tabelas[$nome] = $tabela;
}

// Alvo de FK precisa ser mapeável; a triagem considera o schema inteiro, não só
// o subconjunto filtrado, senão --only quebraria as associações.
$mapeaveis = [];
foreach ($schema->getTables() as $tabela) {
    if (!isset($views[$tabela->getName()]) && colunasIdentificador($tabela) !== null) {
        $mapeaveis[$tabela->getName()] = $tabela;
    }
}

echo count($tabelas) . " tabela(s) para gerar.\n";

// -----------------------------------------------------------------------------
// Geração
// -----------------------------------------------------------------------------
$relatorio = [
    'entidades' => 0,
    'repositorios' => 0,
    'repos_preservados' => 0,
    'sem_construtor' => [],
    'fk_escalar' => [],
    'colisoes' => [],
    'auto_em_pk_composta' => [],
];

if (!$opcoes['dry-run']) {
    @mkdir(DIR_ENTIDADE, 0o755, true);
    @mkdir(DIR_REPOSITORIO, 0o755, true);
}

foreach ($tabelas as $nome => $tabela) {
    $classe = pascal($nome);

    $codigoEntidade = gerarEntidade($tabela, $classe, $mapeaveis, $relatorio);
    $codigoRepo = gerarRepositorio($classe);

    $arqEntidade = DIR_ENTIDADE . "/$classe.php";
    $arqRepo = DIR_REPOSITORIO . "/{$classe}Repository.php";

    if (!$opcoes['dry-run']) {
        file_put_contents($arqEntidade, $codigoEntidade);
    }
    $relatorio['entidades']++;

    if (file_exists($arqRepo) && !$opcoes['forcar-repos']) {
        $relatorio['repos_preservados']++;
    } else {
        if (!$opcoes['dry-run']) {
            file_put_contents($arqRepo, $codigoRepo);
        }
        $relatorio['repositorios']++;
    }
}

// -----------------------------------------------------------------------------
// Relatório
// -----------------------------------------------------------------------------
echo "\n";
echo "Entidades geradas ...... {$relatorio['entidades']}\n";
echo "Repositórios criados ... {$relatorio['repositorios']}\n";
echo "Repositórios mantidos .. {$relatorio['repos_preservados']} (já existiam; use --forcar-repos para sobrescrever)\n";
echo "Views ignoradas ........ " . count($puladas['view']) . "\n";
echo "Sem primary key ........ " . count($puladas['sem_pk']) . " (Doctrine exige identificador)\n";
if ($puladas['filtrada'] !== []) {
    echo "Fora do --only ......... " . count($puladas['filtrada']) . "\n";
}
echo "Sem construtor ......... " . count($relatorio['sem_construtor']) . " (mais de " . LIMITE_CONSTRUTOR . " propriedades)\n";
echo "FK mantida escalar ..... " . count($relatorio['fk_escalar']) . " (alvo sem PK ou FK não aponta para a PK)\n";
echo "Colisão de nome ........ " . count($relatorio['colisoes']) . "\n";
echo "AUTO_INCREMENT em PK composta " . count($relatorio['auto_em_pk_composta'])
    . " (Doctrine não modela; o valor precisa ser atribuído manualmente)\n";

if ($puladas['sem_pk'] !== []) {
    file_put_contents(__DIR__ . '/../tabelas-sem-pk.txt', implode("\n", $puladas['sem_pk']) . "\n");
    echo "\nLista das tabelas sem PK em tabelas-sem-pk.txt\n";
}
if ($relatorio['fk_escalar'] !== []) {
    file_put_contents(__DIR__ . '/../fks-nao-mapeadas.txt', implode("\n", $relatorio['fk_escalar']) . "\n");
    echo "Lista das FKs mantidas escalares em fks-nao-mapeadas.txt\n";
}
if ($relatorio['colisoes'] !== []) {
    echo "\nColisões resolvidas com sufixo:\n";
    foreach ($relatorio['colisoes'] as $c) {
        echo "  - $c\n";
    }
}
if ($opcoes['dry-run']) {
    echo "\n(dry run — nenhum arquivo escrito)\n";
}

// =============================================================================
// Funções
// =============================================================================

/**
 * Colunas que servem de identificador da entidade: só a PRIMARY KEY real.
 *
 * O Doctrine aceitaria uma UNIQUE NOT NULL como #[ORM\Id], o que mapearia mais
 * 37 tabelas (diario_aula_unificado entre elas). Não fazemos isso de propósito:
 * o Doctrine emite PRIMARY KEY para o identificador, e o onboarding é o banco
 * modelo — o mapeamento não pode afirmar uma PK que não existe lá. Tabela sem
 * PRIMARY fica sem entidade e é listada em tabelas-sem-pk.txt.
 *
 * @return list<string>|null nomes em minúsculas, ou null se não há PRIMARY KEY
 */
function colunasIdentificador(Table $tabela): ?array
{
    $pk = $tabela->getPrimaryKey();

    return $pk === null ? null : array_map(strtolower(...), $pk->getColumns());
}

function prefixoBate(string $nome, array $prefixos): bool
{
    foreach ($prefixos as $p) {
        if (str_starts_with($nome, $p)) {
            return true;
        }
    }
    return false;
}

function pascal(string $nome): string
{
    $partes = preg_split('/[^a-zA-Z0-9]+/', strtolower($nome), -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $resultado = implode('', array_map(ucfirst(...), $partes));

    // Identificador PHP não pode começar com dígito.
    return preg_match('/^\d/', $resultado) === 1 ? 'T' . $resultado : $resultado;
}

function camel(string $nome): string
{
    return lcfirst(pascal($nome));
}

/**
 * Garante nome de propriedade único dentro da classe.
 *
 * @param array<string, true> $usados
 */
function nomeUnico(string $desejado, array &$usados, string $tabela, array &$relatorio): string
{
    $chave = strtolower($desejado);
    if (!isset($usados[$chave])) {
        $usados[$chave] = true;
        return $desejado;
    }

    $i = 2;
    while (isset($usados[strtolower($desejado . $i)])) {
        $i++;
    }
    $relatorio['colisoes'][] = "$tabela: $desejado -> {$desejado}{$i}";
    $usados[strtolower($desejado . $i)] = true;

    return $desejado . $i;
}

/**
 * Normaliza o DEFAULT de uma coluna.
 *
 * O DBAL 4 devolve objeto para defaults que são expressão (CURRENT_TIMESTAMP e
 * afins); o atributo ORM espera a expressão como string.
 */
function normalizaDefault(mixed $default): mixed
{
    return match (true) {
        $default instanceof CurrentTimestamp => 'CURRENT_TIMESTAMP',
        $default instanceof CurrentDate => 'CURRENT_DATE',
        $default instanceof CurrentTime => 'CURRENT_TIME',
        default => $default,
    };
}

/** Literal PHP para um valor escalar. */
function literal(mixed $valor): string
{
    if ($valor === null) {
        return 'null';
    }
    if (is_bool($valor)) {
        return $valor ? 'true' : 'false';
    }
    if (is_int($valor) || is_float($valor)) {
        return var_export($valor, true);
    }
    return var_export((string) $valor, true);
}

/**
 * Serializa a lista de FKs do atributo EsquemaFisico, uma por linha.
 *
 * @param list<array<string, mixed>> $fks
 */
function literalListaFks(array $fks): string
{
    if ($fks === []) {
        return '[]';
    }

    $linhas = [];
    foreach ($fks as $fk) {
        $linhas[] = '        ['
            . "'nome' => " . literal($fk['nome']) . ', '
            . "'colunas' => [" . implode(', ', array_map(literal(...), $fk['colunas'])) . '], '
            . "'tabelaAlvo' => " . literal($fk['tabelaAlvo']) . ', '
            . "'colunasAlvo' => [" . implode(', ', array_map(literal(...), $fk['colunasAlvo'])) . '], '
            . "'opcoes' => " . literalArray($fk['opcoes'])
            . ']';
    }

    return "[\n" . implode(",\n", $linhas) . "\n    ]";
}

/** @param array<string, mixed> $opcoes */
function literalArray(array $opcoes): string
{
    $partes = [];
    foreach ($opcoes as $chave => $valor) {
        if (is_array($valor)) {
            $partes[] = var_export($chave, true) . ' => [' . implode(', ', array_map(literal(...), $valor)) . ']';
        } else {
            $partes[] = var_export($chave, true) . ' => ' . literal($valor);
        }
    }
    return '[' . implode(', ', $partes) . ']';
}

/**
 * Valor inicial da propriedade PHP, derivado do DEFAULT da coluna.
 */
function valorInicial(Column $coluna, string $tipoDoctrine, string $tipoPhp): string
{
    $default = normalizaDefault($coluna->getDefault());

    if ($default === null || is_object($default)) {
        return 'null';
    }
    // Expressões do MySQL não viram valor PHP.
    if (is_string($default) && preg_match('/^(CURRENT_TIMESTAMP|CURRENT_DATE|CURRENT_TIME|NOW\(\)|\(.*\))$/i', $default) === 1) {
        return 'null';
    }
    if (str_starts_with($tipoPhp, '\\Date')) {
        return 'null';
    }

    return match ($tipoPhp) {
        'int' => (string) (int) $default,
        'float' => var_export((float) $default, true),
        'bool' => ((int) $default) === 1 ? 'true' : 'false',
        'array' => '[]',
        default => var_export((string) $default, true),
    };
}

/**
 * Monta o atributo ORM\Column de uma coluna escalar.
 *
 * @return array{0: string, 1: string, 2: string} atributo, tipoDoctrine, tipoPhp
 */
function atributoColuna(Column $coluna, Table $tabela): array
{
    $tipoDoctrine = Type::getTypeRegistry()->lookupName($coluna->getType());
    $tipoPhp = TIPOS_PHP[$tipoDoctrine] ?? 'string';

    $params = ['name: ' . var_export($coluna->getName(), true)];
    $params[] = 'type: ' . ($tipoDoctrine === TinyIntType::NAME
        ? 'TinyIntType::NAME'
        : var_export($tipoDoctrine, true));

    if (in_array($tipoDoctrine, TIPOS_COM_LENGTH, true) && $coluna->getLength() !== null) {
        $params[] = 'length: ' . $coluna->getLength();
    }
    if ($tipoDoctrine === 'decimal') {
        $params[] = 'precision: ' . ($coluna->getPrecision() ?? 10);
        $params[] = 'scale: ' . $coluna->getScale();
    }
    if (!$coluna->getNotnull()) {
        $params[] = 'nullable: true';
    }

    $opcoes = [];
    if ($coluna->getUnsigned()) {
        $opcoes['unsigned'] = true;
    }
    if ($coluna->getFixed()) {
        $opcoes['fixed'] = true;
    }
    if ($coluna->getDefault() !== null) {
        $opcoes['default'] = normalizaDefault($coluna->getDefault());
    }
    if ($coluna->getComment() !== '') {
        $opcoes['comment'] = $coluna->getComment();
    }
    if ($tipoDoctrine === 'enum' && $coluna->getValues() !== []) {
        $opcoes['values'] = $coluna->getValues();
    }

    // charset/collation só quando a coluna difere da tabela.
    $plataforma = $coluna->getPlatformOptions();
    foreach (['charset', 'collation'] as $chave) {
        if (isset($plataforma[$chave]) && $plataforma[$chave] !== ($tabela->getOptions()[$chave] ?? null)) {
            $opcoes[$chave] = $plataforma[$chave];
        }
    }

    if ($opcoes !== []) {
        $params[] = 'options: ' . literalArray($opcoes);
    }

    return ['#[ORM\Column(' . implode(', ', $params) . ')]', $tipoDoctrine, $tipoPhp];
}

/**
 * Decide se uma FK vira ManyToOne ou continua coluna escalar.
 *
 * @param array<string, Table> $mapeaveis
 */
function fkUsavel(ForeignKeyConstraint $fk, array $mapeaveis): bool
{
    $alvo = $fk->getForeignTableName();
    if (!isset($mapeaveis[$alvo])) {
        return false;
    }

    // ManyToOne só é confiável quando a FK aponta para o identificador do alvo.
    $pk = colunasIdentificador($mapeaveis[$alvo]);
    if ($pk === null) {
        return false;
    }

    $refs = array_map(strtolower(...), $fk->getForeignColumns());
    sort($refs);
    sort($pk);

    return $refs === $pk;
}

/**
 * @param array<string, Table> $mapeaveis
 */
function gerarEntidade(Table $tabela, string $classe, array $mapeaveis, array &$relatorio): string
{
    $nomeTabela = $tabela->getName();
    $colunasPk = colunasIdentificador($tabela) ?? [];

    // --- FKs -----------------------------------------------------------------
    $associacoes = [];   // coluna local (lower) => dados da associação
    $colunasEmFk = [];   // coluna local (lower) => true
    foreach ($tabela->getForeignKeys() as $fk) {
        $locais = $fk->getLocalColumns();
        $lowers = array_map(strtolower(...), $locais);

        // Uma coluna só pode pertencer a uma associação.
        foreach ($lowers as $l) {
            if (isset($colunasEmFk[$l])) {
                continue 2;
            }
        }
        $ehId = array_diff($lowers, $colunasPk) === [];

        // Doctrine proíbe identidade derivada quando o alvo tem PK composta.
        $pkAlvoComposta = isset($mapeaveis[$fk->getForeignTableName()])
            && count(colunasIdentificador($mapeaveis[$fk->getForeignTableName()]) ?? []) > 1;

        if (!fkUsavel($fk, $mapeaveis) || ($ehId && $pkAlvoComposta)) {
            $relatorio['fk_escalar'][] = $nomeTabela . '.' . implode(',', $locais)
                . ' -> ' . $fk->getForeignTableName() . '(' . implode(',', $fk->getForeignColumns()) . ')'
                . ($ehId && $pkAlvoComposta ? ' [identidade derivada com PK composta no alvo]' : '');
            continue;
        }
        foreach ($lowers as $l) {
            $colunasEmFk[$l] = true;
        }
        $associacoes[$lowers[0]] = [
            'fk' => $fk,
            'classe' => pascal($fk->getForeignTableName()),
            'locais' => $locais,
            'refs' => $fk->getForeignColumns(),
            'ehId' => $ehId,
        ];
    }

    // --- Propriedades --------------------------------------------------------
    $usados = [];
    $props = [];      // blocos de propriedade
    $acessores = [];  // blocos de getter/setter
    $construtor = []; // [nomeProp, tipoPhp, valorInicial]
    $usaTinyInt = false;

    // A ordem do identificador no Doctrine segue a ordem de declaração das
    // propriedades #[ORM\Id]. Para a PK sair na mesma ordem do banco, as colunas
    // da PK vêm primeiro, na ordem do índice PRIMARY.
    $ordenadas = [];
    $vistas = [];
    foreach ($colunasPk as $lowerPk) {
        foreach ($tabela->getColumns() as $coluna) {
            if (strtolower($coluna->getName()) === $lowerPk) {
                $ordenadas[] = $coluna;
                $vistas[$lowerPk] = true;
                break;
            }
        }
    }
    foreach ($tabela->getColumns() as $coluna) {
        if (!isset($vistas[strtolower($coluna->getName())])) {
            $ordenadas[] = $coluna;
        }
    }

    // A associação entra na posição da 1ª coluna local da FK.
    foreach ($ordenadas as $coluna) {
        $lower = strtolower($coluna->getName());

        if (isset($associacoes[$lower])) {
            $assoc = $associacoes[$lower];
            $nomeProp = nomeUnico(camel($coluna->getName()), $usados, $nomeTabela, $relatorio);
            $tipoPhp = '?' . $assoc['classe'];

            $linhas = [];
            if ($assoc['ehId']) {
                $linhas[] = '    #[ORM\Id]';
            }
            $linhas[] = '    #[ORM\ManyToOne(targetEntity: ' . $assoc['classe'] . '::class)]';
            foreach ($assoc['locais'] as $i => $local) {
                $colLocal = $tabela->getColumn($local);

                // SchemaTool monta a coluna de FK a partir da coluna referenciada
                // no ALVO (SchemaTool.php:905) e só deixa o JoinColumn sobrepor as
                // chaves que ele declara (:916). Então default/unsigned/fixed/comment
                // precisam vir declarados SEMPRE — inclusive como null/false — senão
                // o atributo do alvo vaza para cá. Só essas chaves são honradas
                // (KNOWN_COLUMN_OPTIONS); length vem sempre do alvo.
                $opcoesJoin = [
                    'default' => normalizaDefault($colLocal->getDefault()),
                    'unsigned' => $colLocal->getUnsigned(),
                    'fixed' => $colLocal->getFixed(),
                    'comment' => $colLocal->getComment(),
                ];

                $linhas[] = sprintf(
                    '    #[ORM\JoinColumn(name: %s, referencedColumnName: %s, nullable: %s%s)]',
                    var_export($local, true),
                    var_export($assoc['refs'][$i], true),
                    $colLocal->getNotnull() ? 'false' : 'true',
                    ', options: ' . literalArray($opcoesJoin)
                );
            }
            $linhas[] = "    private $tipoPhp \$$nomeProp = null;";
            $props[] = implode("\n", $linhas);

            $acessores[] = acessor($nomeProp, $tipoPhp, false);
            $construtor[] = [$nomeProp, $tipoPhp, 'null'];
            continue;
        }

        if (isset($colunasEmFk[$lower])) {
            continue; // coluna consumida por uma associação composta
        }

        [$atributo, $tipoDoctrine, $tipoPhp] = atributoColuna($coluna, $tabela);
        if ($tipoDoctrine === TinyIntType::NAME) {
            $usaTinyInt = true;
        }

        $nomeProp = nomeUnico(camel($coluna->getName()), $usados, $nomeTabela, $relatorio);
        $ehPk = in_array($lower, $colunasPk, true);
        // Doctrine não aceita GeneratedValue em PK composta, mesmo que a coluna
        // seja AUTO_INCREMENT no MySQL. Nesses casos o valor precisa ser setado
        // à mão — ver relatório 'auto_em_pk_composta'.
        $ehAuto = $coluna->getAutoincrement() && count($colunasPk) === 1;
        if ($coluna->getAutoincrement() && count($colunasPk) > 1) {
            $relatorio['auto_em_pk_composta'][$nomeTabela] = true;
        }
        $inicial = valorInicial($coluna, $tipoDoctrine, $tipoPhp);
        $nulavel = !$coluna->getNotnull() || $inicial === 'null';
        $tipoDeclarado = ($nulavel ? '?' : '') . $tipoPhp;

        $linhas = [];
        if ($ehPk) {
            $linhas[] = '    #[ORM\Id]';
            if ($ehAuto) {
                $linhas[] = "    #[ORM\GeneratedValue(strategy: 'AUTO')]";
            }
        }
        $linhas[] = '    ' . $atributo;
        $linhas[] = "    private $tipoDeclarado \$$nomeProp = $inicial;";
        $props[] = implode("\n", $linhas);

        // PK auto-increment é só leitura; o banco atribui.
        $acessores[] = acessor($nomeProp, $tipoDeclarado, $ehPk && $ehAuto, $tipoPhp === 'bool');

        if (!($ehPk && $ehAuto)) {
            $construtor[] = [$nomeProp, $tipoDeclarado, $inicial];
        }
    }

    // --- Atributos de classe -------------------------------------------------
    $opcoesTabela = [];
    foreach (['charset', 'collation'] as $chave) {
        if (isset($tabela->getOptions()[$chave])) {
            $opcoesTabela[$chave] = $tabela->getOptions()[$chave];
        }
    }
    $comentario = $tabela->getOptions()['comment'] ?? null;
    if ($comentario !== null && $comentario !== '') {
        $opcoesTabela['comment'] = $comentario;
    }
    $motor = $tabela->getOptions()['engine'] ?? null;
    if ($motor !== null && strtoupper((string) $motor) !== 'INNODB') {
        $opcoesTabela['engine'] = $motor;
    }

    $cabecalho = ['#[ORM\Entity(repositoryClass: ' . $classe . 'Repository::class)]'];
    if ($opcoesTabela === []) {
        $cabecalho[] = '#[ORM\Table(name: ' . var_export($nomeTabela, true) . ')]';
    } else {
        $cabecalho[] = '#[ORM\Table(' . "\n    name: " . var_export($nomeTabela, true)
            . ",\n    options: " . literalArray($opcoesTabela) . "\n)]";
    }

    foreach ($tabela->getIndexes() as $indice) {
        if ($indice->isPrimary()) {
            continue;
        }
        $cols = '[' . implode(', ', array_map(fn(string $c): string => var_export($c, true), $indice->getColumns())) . ']';

        $params = [
            'name: ' . var_export($indice->getName(), true),
            'columns: ' . $cols,
        ];

        // FULLTEXT / SPATIAL. O atributo UniqueConstraint não aceita flags.
        if (!$indice->isUnique() && $indice->getFlags() !== []) {
            $params[] = 'flags: [' . implode(', ', array_map(literal(...), $indice->getFlags())) . ']';
        }
        // Índice com prefixo, ex.: KEY IX_CD_TURMA (cd_turma(20)).
        $lengths = array_filter($indice->getOptions()['lengths'] ?? [], static fn($l): bool => $l !== null);
        if ($lengths !== []) {
            $params[] = 'options: ' . literalArray(['lengths' => $indice->getOptions()['lengths']]);
        }

        $cabecalho[] = sprintf(
            '#[ORM\%s(%s)]',
            $indice->isUnique() ? 'UniqueConstraint' : 'Index',
            implode(', ', $params)
        );
    }

    // --- Fatos físicos que o ORM não expressa --------------------------------
    // Nome real das constraints de FK (todas, inclusive as que ficaram
    // escalares) e AUTO_INCREMENT fora do identificador. Aplicados em tempo de
    // schema pelo ReconciliadorEsquema.
    $fks = [];
    foreach ($tabela->getForeignKeys() as $fk) {
        $fks[] = [
            'nome' => $fk->getName(),
            'colunas' => $fk->getLocalColumns(),
            'tabelaAlvo' => $fk->getForeignTableName(),
            'colunasAlvo' => $fk->getForeignColumns(),
            'opcoes' => $fk->getOptions(),
        ];
    }

    $autoIncremento = [];
    foreach ($tabela->getColumns() as $coluna) {
        // O ORM só emite AUTO_INCREMENT via GeneratedValue, que exige PK de uma
        // coluna só e não existe quando o identificador é uma associação
        // (identidade derivada) — aí o atributo também precisa ser registrado.
        $ehIdAuto = $coluna->getAutoincrement()
            && count($colunasPk) === 1
            && strtolower($coluna->getName()) === $colunasPk[0]
            && !isset($colunasEmFk[strtolower($coluna->getName())]);

        if ($coluna->getAutoincrement() && !$ehIdAuto) {
            $autoIncremento[] = $coluna->getName();
        }
    }

    if ($fks !== [] || $autoIncremento !== []) {
        $cabecalho[] = '#[EsquemaFisico(' . "\n"
            . '    chavesEstrangeiras: ' . literalListaFks($fks) . ",\n"
            . '    autoIncremento: [' . implode(', ', array_map(literal(...), $autoIncremento)) . "]\n"
            . ')]';
    }

    // --- Imports -------------------------------------------------------------
    $imports = [];
    if ($fks !== [] || $autoIncremento !== []) {
        $imports[] = 'use App\DBAL\EsquemaFisico;';
    }
    if ($usaTinyInt) {
        $imports[] = 'use App\DBAL\TinyIntType;';
    }
    $imports[] = "use App\\Repository\\{$classe}Repository;";
    $imports[] = 'use Doctrine\ORM\Mapping as ORM;';

    // --- Construtor ----------------------------------------------------------
    $blocoConstrutor = '';
    if (count($construtor) > LIMITE_CONSTRUTOR) {
        $relatorio['sem_construtor'][] = $nomeTabela;
        $blocoConstrutor = "    // Sem construtor: " . count($construtor) . " propriedades. Use os setters encadeados.\n\n";
    } elseif ($construtor !== []) {
        $params = [];
        $atribs = [];
        foreach ($construtor as [$nomeProp, $tipo, $inicial]) {
            $tipoParam = str_starts_with($tipo, '?') ? $tipo : $tipo;
            $params[] = "        $tipoParam \$$nomeProp = $inicial";
            $atribs[] = "        \$this->$nomeProp = \$$nomeProp;";
        }
        $blocoConstrutor = "    public function __construct(\n"
            . implode(",\n", $params) . "\n    ) {\n"
            . implode("\n", $atribs) . "\n    }\n\n";
    }

    // --- Montagem ------------------------------------------------------------
    return "<?php\n\n"
        . "declare(strict_types=1);\n\n"
        . "namespace App\\Entity;\n\n"
        . implode("\n", $imports) . "\n\n"
        . implode("\n", $cabecalho) . "\n"
        . "class $classe\n{\n"
        . implode("\n\n", $props) . "\n\n"
        . $blocoConstrutor
        . implode("\n\n", $acessores) . "\n"
        . "}\n";
}

/** Getter (+ setter, quando a propriedade é gravável). */
function acessor(string $nomeProp, string $tipo, bool $somenteLeitura, bool $ehBool = false): string
{
    $sufixo = ucfirst($nomeProp);
    $prefixo = $ehBool ? 'is' : 'get';

    $bloco = "    public function $prefixo$sufixo(): $tipo\n    {\n"
        . "        return \$this->$nomeProp;\n    }";

    if ($somenteLeitura) {
        return $bloco;
    }

    return $bloco . "\n\n"
        . "    public function set$sufixo($tipo \$$nomeProp): self\n    {\n"
        . "        \$this->$nomeProp = \$$nomeProp;\n"
        . "        return \$this;\n    }";
}

function gerarRepositorio(string $classe): string
{
    return "<?php\n\n"
        . "declare(strict_types=1);\n\n"
        . "namespace App\\Repository;\n\n"
        . "use App\\Entity\\$classe;\n"
        . "use Doctrine\\ORM\\EntityRepository;\n\n"
        . "/**\n * @extends EntityRepository<$classe>\n */\n"
        . "class {$classe}Repository extends EntityRepository\n{\n}\n";
}
