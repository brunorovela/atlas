<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\LogOperacoes;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<LogOperacoes>
 */
class LogOperacoesRepository extends EntityRepository
{
}
