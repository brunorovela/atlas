<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeAreasRepository::class)]
#[ORM\Table(
    name: 'ge_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ge_area', columns: ['cd_ge_area'])]
class GeAreas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_ge_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGeArea = null;

    #[ORM\Column(name: 'ds_ge_area', type: 'string', length: 255, nullable: true)]
    private ?string $dsGeArea = null;

    #[ORM\Column(name: 'nr_horas', type: 'float', nullable: true)]
    private ?float $nrHoras = null;

    public function __construct(
        ?int $cdGeArea = null,
        ?string $dsGeArea = null,
        ?float $nrHoras = null
    ) {
        $this->cdGeArea = $cdGeArea;
        $this->dsGeArea = $dsGeArea;
        $this->nrHoras = $nrHoras;
    }

    public function getCdGeArea(): ?int
    {
        return $this->cdGeArea;
    }

    public function setCdGeArea(?int $cdGeArea): self
    {
        $this->cdGeArea = $cdGeArea;
        return $this;
    }

    public function getDsGeArea(): ?string
    {
        return $this->dsGeArea;
    }

    public function setDsGeArea(?string $dsGeArea): self
    {
        $this->dsGeArea = $dsGeArea;
        return $this;
    }

    public function getNrHoras(): ?float
    {
        return $this->nrHoras;
    }

    public function setNrHoras(?float $nrHoras): self
    {
        $this->nrHoras = $nrHoras;
        return $this;
    }
}
