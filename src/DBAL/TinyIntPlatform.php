<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Platforms\MySQL84Platform;

/**
 * MySQL 8.4 com introspecção de TINYINT por coluna.
 */
final class TinyIntPlatform extends MySQL84Platform
{
    public function createSchemaManager(Connection $connection): TinyIntSchemaManager
    {
        return new TinyIntSchemaManager($connection, $this);
    }

    /**
     * {@inheritDoc}
     */
    protected function initializeDoctrineTypeMappings(): void
    {
        parent::initializeDoctrineTypeMappings();

        // Padrão numérico; TinyIntSchemaManager reverte para boolean em tinyint(1).
        $this->doctrineTypeMapping['tinyint'] = TinyIntType::NAME;
    }
}
