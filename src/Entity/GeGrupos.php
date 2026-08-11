<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeGruposRepository::class)]
#[ORM\Table(
    name: 'ge_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ge_grupo', columns: ['cd_ge_grupo'])]
#[ORM\Index(name: 'IX_CD_GE_AREA', columns: ['cd_ge_area'])]
class GeGrupos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_ge_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGeGrupo = null;

    #[ORM\Column(name: 'cd_ge_area', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGeArea = null;

    #[ORM\Column(name: 'ds_ge_grupo', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsGeGrupo = null;

    #[ORM\Column(name: 'nr_horas', type: 'float', nullable: true)]
    private ?float $nrHoras = null;

    #[ORM\Column(name: 'sn_estagio', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEstagio = false;

    public function __construct(
        ?int $cdGeGrupo = null,
        ?int $cdGeArea = null,
        ?string $dsGeGrupo = null,
        ?float $nrHoras = null,
        ?bool $snEstagio = false
    ) {
        $this->cdGeGrupo = $cdGeGrupo;
        $this->cdGeArea = $cdGeArea;
        $this->dsGeGrupo = $dsGeGrupo;
        $this->nrHoras = $nrHoras;
        $this->snEstagio = $snEstagio;
    }

    public function getCdGeGrupo(): ?int
    {
        return $this->cdGeGrupo;
    }

    public function setCdGeGrupo(?int $cdGeGrupo): self
    {
        $this->cdGeGrupo = $cdGeGrupo;
        return $this;
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

    public function getDsGeGrupo(): ?string
    {
        return $this->dsGeGrupo;
    }

    public function setDsGeGrupo(?string $dsGeGrupo): self
    {
        $this->dsGeGrupo = $dsGeGrupo;
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

    public function isSnEstagio(): ?bool
    {
        return $this->snEstagio;
    }

    public function setSnEstagio(?bool $snEstagio): self
    {
        $this->snEstagio = $snEstagio;
        return $this;
    }
}
