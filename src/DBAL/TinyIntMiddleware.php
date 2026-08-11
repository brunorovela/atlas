<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\Middleware;
use Doctrine\DBAL\Driver\Middleware\AbstractDriverMiddleware;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\ServerVersionProvider;

/**
 * Força o uso de {@see TinyIntPlatform} na conexão.
 */
final class TinyIntMiddleware implements Middleware
{
    public function wrap(Driver $driver): Driver
    {
        return new class ($driver) extends AbstractDriverMiddleware {
            public function getDatabasePlatform(ServerVersionProvider $versionProvider): AbstractPlatform
            {
                return new TinyIntPlatform();
            }
        };
    }
}
