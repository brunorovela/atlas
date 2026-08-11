<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoPgtoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoPgtoRepository::class)]
#[ORM\Table(
    name: 'fin_plano_pgto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_plano', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
class FinPlanoPgto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'ds_plano', type: 'string', length: 150, nullable: true)]
    private ?string $dsPlano = null;

    #[ORM\Column(name: 'nr_anosem', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    public function __construct(
        ?string $dsPlano = null,
        ?int $nrAnosem = null
    ) {
        $this->dsPlano = $dsPlano;
        $this->nrAnosem = $nrAnosem;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function getDsPlano(): ?string
    {
        return $this->dsPlano;
    }

    public function setDsPlano(?string $dsPlano): self
    {
        $this->dsPlano = $dsPlano;
        return $this;
    }

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }
}
