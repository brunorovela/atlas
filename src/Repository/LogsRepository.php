<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Logs;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<Logs>
 */
class LogsRepository extends EntityRepository
{
}
