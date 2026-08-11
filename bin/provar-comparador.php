#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Prova que o `schema:diff` zerado não é cegueira do comparador.
 *
 * Um comparador que não detecta nada também fecha em zero. Este script injeta
 * divergências no schema do banco **em memória** e confere que cada uma
 * aparece. Nada é executado no banco — só introspecção.
 *
 * Rode depois de mexer em ComparadorFkDuplicada, ReconciliadorEsquema ou no
 * gerador. O risco dessas classes é justamente virarem um filtro cego.
 *
 *   docker exec servidor php bin/provar-comparador.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Tools\SchemaTool;

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/../bootstrap.php';

$conexao = $entityManager->getConnection();
$schemaManager = $conexao->createSchemaManager();
$plataforma = $conexao->getDatabasePlatform();

$entidades = (new SchemaTool($entityManager))
    ->getSchemaFromMetadata($entityManager->getMetadataFactory()->getAllMetadata());

$comparar = static function (callable $mutacao) use ($schemaManager, $entidades, $plataforma): array {
    $banco = $schemaManager->introspectSchema();
    $mutacao($banco);

    return $plataforma->getAlterSchemaSQL(
        $schemaManager->createComparator()->compareSchemas($banco, $entidades)
    );
};

/** @var array<string, callable(Schema): void> $casos */
$casos = [
    'coluna removida do banco' => static function (Schema $banco): void {
        $banco->getTable('avl_alternativas')->dropColumn('ds_cor');
    },
    'tipo de coluna trocado' => static function (Schema $banco): void {
        $banco->getTable('avl_alternativas')->getColumn('nr_ordem')->setType(Type::getType('bigint'));
    },
    'default de coluna trocado' => static function (Schema $banco): void {
        $banco->getTable('avl_alternativas')->getColumn('cd_grupo')->setDefault(99);
    },
    'indice removido do banco' => static function (Schema $banco): void {
        $banco->getTable('avl_alternativas')->dropIndex('IX_CD_GRUPO');
    },
    'FK removida do banco' => static function (Schema $banco): void {
        $banco->getTable('bib_titulos_autores')->removeForeignKey('bib_titulos_autores_ibfk_2');
    },
    'FK mesmo nome, onDelete diferente' => static function (Schema $banco): void {
        $t = $banco->getTable('bib_titulos_autores');
        $t->removeForeignKey('bib_titulos_autores_ibfk_2');
        $t->addForeignKeyConstraint(
            'bib_titulos',
            ['cd_titulo'],
            ['cd_titulo'],
            ['onDelete' => 'RESTRICT'],
            'bib_titulos_autores_ibfk_2'
        );
    },
    'FK mesmo nome, coluna diferente' => static function (Schema $banco): void {
        $t = $banco->getTable('bib_titulos_autores');
        $t->removeForeignKey('bib_titulos_autores_ibfk_2');
        $t->addForeignKeyConstraint('bib_autores', ['cd_autor'], ['cd_autor'], [], 'bib_titulos_autores_ibfk_2');
    },
    // O comparador de fábrica NÃO detecta este caso — ver ComparadorFkDuplicada.
    'FK duplicada: uma faltando no banco' => static function (Schema $banco): void {
        $banco->getTable('bib_emprestimos')->removeForeignKey('bib_emprestimos_ibfk_3');
    },
    'tabela inteira faltando no banco' => static function (Schema $banco): void {
        $banco->dropTable('avl_alternativas');
    },
];

$falhas = 0;

$base = $comparar(static fn(Schema $banco): null => null);
if ($base === []) {
    echo "  ok    baseline sem mutação: 0 statement(s)\n";
} else {
    $falhas++;
    printf("  FALHA baseline sem mutação: %d statement(s) — deveria ser 0\n", count($base));
    foreach (array_slice($base, 0, 5) as $sql) {
        echo "          $sql\n";
    }
}

foreach ($casos as $rotulo => $mutacao) {
    $sqls = $comparar($mutacao);

    if ($sqls === []) {
        $falhas++;
        printf("  FALHA %-38s NAO DETECTADA\n", $rotulo);
        continue;
    }
    printf("  ok    %-38s %d statement(s)\n", $rotulo, count($sqls));
}

echo "\n";
if ($falhas === 0) {
    echo "Comparador confiável: baseline zerado e todas as divergências detectadas.\n";
    exit(0);
}

echo "$falhas caso(s) com problema.\n";
exit(1);
