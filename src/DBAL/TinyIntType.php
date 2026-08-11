<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\PhpIntegerMappingType;
use Doctrine\DBAL\Types\Type;

/**
 * Tipo TINYINT numérico.
 *
 * O DBAL não tem tipo TINYINT nativo: AbstractMySQLPlatform mapeia todo
 * `tinyint` para boolean na introspecção, sem distinguir `tinyint(1)`. Este
 * tipo cobre as 781 colunas `tinyint`/`tinyint unsigned` que guardam número,
 * não flag. A distinção por coluna é feita em {@see TinyIntSchemaManager}.
 */
final class TinyIntType extends Type implements PhpIntegerMappingType
{
    public const NAME = 'tinyint';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'TINYINT' . (empty($column['unsigned']) ? '' : ' UNSIGNED');
    }

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?int
    {
        return $value === null ? null : (int) $value;
    }

    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): ?int
    {
        return $value === null ? null : (int) $value;
    }

    public function getBindingType(): ParameterType
    {
        return ParameterType::INTEGER;
    }
}
