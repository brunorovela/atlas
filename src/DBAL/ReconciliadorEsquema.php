<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use ReflectionClass;

/**
 * Ajusta o schema gerado a partir das entidades para bater com o físico.
 *
 * Roda no evento postGenerateSchema, antes da comparação. Corrige três coisas
 * que o SchemaTool não consegue produzir sozinho:
 *
 * 1. Nome das constraints de FK — o SchemaTool chama addForeignKeyConstraint()
 *    sem o parâmetro $name, então o DBAL gera `FK_<hash>`. Também recria as FKs
 *    de colunas que ficaram escalares (ver fks-nao-mapeadas.txt).
 * 2. AUTO_INCREMENT fora do identificador, que o ORM só modela na PK.
 * 3. Índices que o `Table` do DBAL descarta por serem redundantes com uma
 *    UNIQUE/PK, mesmo declarados na entidade.
 *
 * (1) e (2) vêm do atributo {@see EsquemaFisico} na entidade; (3) vem dos
 * próprios metadados. Nada é lido do banco conectado — ver a nota em
 * EsquemaFisico sobre por que isso importa.
 */
final class ReconciliadorEsquema
{
    public function postGenerateSchema(GenerateSchemaEventArgs $args): void
    {
        $em = $args->getEntityManager();
        $schema = $args->getSchema();

        foreach ($em->getMetadataFactory()->getAllMetadata() as $metadata) {
            $nomeTabela = $metadata->getTableName();
            if (!$schema->hasTable($nomeTabela)) {
                continue;
            }
            $tabela = $schema->getTable($nomeTabela);

            // (3) Índices descartados na normalização do DBAL.
            foreach ($metadata->table['indexes'] ?? [] as $nome => $def) {
                if (!$tabela->hasIndex((string) $nome)) {
                    $tabela->addIndex(
                        $def['columns'],
                        (string) $nome,
                        $def['flags'] ?? [],
                        $def['options'] ?? []
                    );
                }
            }
            foreach ($metadata->table['uniqueConstraints'] ?? [] as $nome => $def) {
                if (!$tabela->hasIndex((string) $nome)) {
                    $tabela->addUniqueIndex($def['columns'], (string) $nome, $def['options'] ?? []);
                }
            }

            $atributos = (new ReflectionClass($metadata->getName()))->getAttributes(EsquemaFisico::class);
            if ($atributos === []) {
                continue;
            }
            $fisico = $atributos[0]->newInstance();

            // (2) AUTO_INCREMENT fora do identificador.
            foreach ($fisico->autoIncremento as $coluna) {
                if ($tabela->hasColumn($coluna)) {
                    $tabela->getColumn($coluna)->setAutoincrement(true);
                }
            }

            // (1) FKs com o nome real. Troca em bloco: remove as geradas pelo
            // ORM e recria a partir do que a entidade declara.
            if ($fisico->chavesEstrangeiras === []) {
                continue;
            }
            foreach ($tabela->getForeignKeys() as $fk) {
                $tabela->removeForeignKey($fk->getName());
            }
            foreach ($fisico->chavesEstrangeiras as $fk) {
                // Sem guarda de $schema->hasTable($fk['tabelaAlvo']): a constraint
                // é registrada mesmo quando o alvo é uma das 176 tabelas sem PK,
                // que não tem entidade. O DBAL guarda a FK pelo nome da tabela
                // alvo, sem exigir que ela esteja no schema, e o Comparator a
                // pareia normalmente. Filtrar aqui deixaria 17 FKs reais
                // aparecendo como removidas no schema:diff.
                foreach ($fk['colunas'] as $coluna) {
                    if (!$tabela->hasColumn($coluna)) {
                        continue 2;
                    }
                }
                $tabela->addForeignKeyConstraint(
                    $fk['tabelaAlvo'],
                    $fk['colunas'],
                    $fk['colunasAlvo'],
                    $fk['opcoes'],
                    $fk['nome']
                );
            }
        }
    }
}
