<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Pessoas;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<Pessoas>
 */
class PessoasRepository extends EntityRepository
{
}
