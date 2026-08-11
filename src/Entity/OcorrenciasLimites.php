<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasLimitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasLimitesRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_limites',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_limite', columns: ['cd_limite'])]
class OcorrenciasLimites
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_limite', type: 'integer')]
    private ?int $cdLimite = null;

    #[ORM\Column(name: 'ds_limite', type: 'string', length: 255)]
    private ?string $dsLimite = null;

    #[ORM\Column(name: 'vl_peso_maximo', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlPesoMaximo = 0.0;

    #[ORM\Column(name: 'nr_dias_expira', type: 'integer')]
    private ?int $nrDiasExpira = null;

    #[ORM\Column(name: 'cd_proximo_limite', type: 'integer', nullable: true)]
    private ?int $cdProximoLimite = null;

    public function __construct(
        ?string $dsLimite = null,
        ?float $vlPesoMaximo = 0.0,
        ?int $nrDiasExpira = null,
        ?int $cdProximoLimite = null
    ) {
        $this->dsLimite = $dsLimite;
        $this->vlPesoMaximo = $vlPesoMaximo;
        $this->nrDiasExpira = $nrDiasExpira;
        $this->cdProximoLimite = $cdProximoLimite;
    }

    public function getCdLimite(): ?int
    {
        return $this->cdLimite;
    }

    public function getDsLimite(): ?string
    {
        return $this->dsLimite;
    }

    public function setDsLimite(?string $dsLimite): self
    {
        $this->dsLimite = $dsLimite;
        return $this;
    }

    public function getVlPesoMaximo(): ?float
    {
        return $this->vlPesoMaximo;
    }

    public function setVlPesoMaximo(?float $vlPesoMaximo): self
    {
        $this->vlPesoMaximo = $vlPesoMaximo;
        return $this;
    }

    public function getNrDiasExpira(): ?int
    {
        return $this->nrDiasExpira;
    }

    public function setNrDiasExpira(?int $nrDiasExpira): self
    {
        $this->nrDiasExpira = $nrDiasExpira;
        return $this;
    }

    public function getCdProximoLimite(): ?int
    {
        return $this->cdProximoLimite;
    }

    public function setCdProximoLimite(?int $cdProximoLimite): self
    {
        $this->cdProximoLimite = $cdProximoLimite;
        return $this;
    }
}
