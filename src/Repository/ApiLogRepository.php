<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ApiLog;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<ApiLog>
 */
class ApiLogRepository extends EntityRepository
{
}
