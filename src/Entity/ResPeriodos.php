<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ResPeriodosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResPeriodosRepository::class)]
#[ORM\Table(
    name: 'res_periodos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_periodo', columns: ['cd_periodo'])]
class ResPeriodos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_periodo', type: 'integer')]
    private ?int $cdPeriodo = null;

    #[ORM\Column(name: 'ds_periodo', type: 'string', length: 75)]
    private ?string $dsPeriodo = null;

    public function __construct(
        ?string $dsPeriodo = null
    ) {
        $this->dsPeriodo = $dsPeriodo;
    }

    public function getCdPeriodo(): ?int
    {
        return $this->cdPeriodo;
    }

    public function getDsPeriodo(): ?string
    {
        return $this->dsPeriodo;
    }

    public function setDsPeriodo(?string $dsPeriodo): self
    {
        $this->dsPeriodo = $dsPeriodo;
        return $this;
    }
}
