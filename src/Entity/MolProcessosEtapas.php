<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolProcessosEtapasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosEtapasRepository::class)]
#[ORM\Table(
    name: 'mol_processos_etapas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_ETAPA_TIPO', columns: ['cd_etapa_tipo'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
class MolProcessosEtapas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_etapa', type: 'integer')]
    private ?int $cdEtapa = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer', nullable: true)]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_etapa_tipo', type: 'integer')]
    private ?int $cdEtapaTipo = null;

    #[ORM\Column(name: 'ds_etapa', type: 'string', length: 100, nullable: true)]
    private ?string $dsEtapa = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $cdEtapaTipo = null,
        ?string $dsEtapa = null,
        ?int $nrOrdem = null,
        ?bool $snAtivo = true
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdEtapaTipo = $cdEtapaTipo;
        $this->dsEtapa = $dsEtapa;
        $this->nrOrdem = $nrOrdem;
        $this->snAtivo = $snAtivo;
    }

    public function getCdEtapa(): ?int
    {
        return $this->cdEtapa;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdEtapaTipo(): ?int
    {
        return $this->cdEtapaTipo;
    }

    public function setCdEtapaTipo(?int $cdEtapaTipo): self
    {
        $this->cdEtapaTipo = $cdEtapaTipo;
        return $this;
    }

    public function getDsEtapa(): ?string
    {
        return $this->dsEtapa;
    }

    public function setDsEtapa(?string $dsEtapa): self
    {
        $this->dsEtapa = $dsEtapa;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
