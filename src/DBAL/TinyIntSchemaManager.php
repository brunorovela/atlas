<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\DBAL\Platforms\MySQL\CharsetMetadataProvider\CachingCharsetMetadataProvider;
use Doctrine\DBAL\Platforms\MySQL\CharsetMetadataProvider\ConnectionCharsetMetadataProvider;
use Doctrine\DBAL\Platforms\MySQL\CollationMetadataProvider\CachingCollationMetadataProvider;
use Doctrine\DBAL\Platforms\MySQL\CollationMetadataProvider\ConnectionCollationMetadataProvider;
use Doctrine\DBAL\Platforms\MySQL\DefaultTableOptions;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Comparator;
use Doctrine\DBAL\Schema\ComparatorConfig;
use Doctrine\DBAL\Schema\MySQLSchemaManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;

/**
 * Decide o tipo de coluna TINYINT olhando a largura declarada.
 *
 * O mapeamento do DBAL é global por tipo (`tinyint` => boolean), então sem
 * este override um dos dois grupos sempre divergiria no schema:diff:
 * `tinyint(1)` (926 flags) ou `tinyint` numérico (781 colunas).
 */
final class TinyIntSchemaManager extends MySQLSchemaManager
{
    /**
     * {@inheritDoc}
     */
    protected function _getPortableTableColumnDefinition(array $tableColumn): Column
    {
        $coluna = parent::_getPortableTableColumnDefinition($tableColumn);
        $dados = array_change_key_case($tableColumn, CASE_LOWER);

        if (($dados['type'] ?? null) === 'tinyint') {
            $ehFlag = str_starts_with((string) ($dados['column_type'] ?? ''), 'tinyint(1)');
            $coluna->setType(Type::getType($ehFlag ? Types::BOOLEAN : TinyIntType::NAME));
        }

        return $coluna;
    }

    /**
     * Usa {@see ComparadorFkDuplicada} no lugar do comparador padrão do MySQL.
     *
     * Repete a montagem do MySQLSchemaManager porque getDefaultTableOptions()
     * lá é privado.
     */
    public function createComparator(/* ComparatorConfig $config = new ComparatorConfig() */): Comparator
    {
        $linha = $this->connection->fetchNumeric('SELECT @@character_set_database, @@collation_database');
        assert($linha !== false);

        return new ComparadorFkDuplicada(
            $this->platform,
            new CachingCharsetMetadataProvider(
                new ConnectionCharsetMetadataProvider($this->connection),
            ),
            new CachingCollationMetadataProvider(
                new ConnectionCollationMetadataProvider($this->connection),
            ),
            new DefaultTableOptions(...$linha),
            func_num_args() > 0 ? func_get_arg(0) : new ComparatorConfig(),
        );
    }
}
