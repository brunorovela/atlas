<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeAtividadesRepository::class)]
#[ORM\Table(
    name: 'ge_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ge_atividade', columns: ['cd_ge_atividade'])]
#[ORM\Index(name: 'IX_CD_GE_GRUPO', columns: ['cd_ge_grupo'])]
class GeAtividades
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_ge_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGeAtividade = null;

    #[ORM\Column(name: 'cd_ge_grupo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGeGrupo = null;

    #[ORM\Column(name: 'ds_ge_atividade', type: 'string', length: 255, nullable: true)]
    private ?string $dsGeAtividade = null;

    #[ORM\Column(name: 'nr_horas', type: 'float', nullable: true)]
    private ?float $nrHoras = null;

    #[ORM\Column(name: 'nr_horas_curso', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrHorasCurso = 0.0;

    #[ORM\Column(name: 'nr_horas_atividade', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrHorasAtividade = 0.0;

    #[ORM\Column(name: 'sn_selecao_online', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snSelecaoOnline = true;

    #[ORM\Column(name: 'ds_caracteristica', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaracteristica = null;

    #[ORM\Column(name: 'cd_siga', type: 'integer', nullable: true)]
    private ?int $cdSiga = null;

    #[ORM\Column(name: 'nr_horas_etapa', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrHorasEtapa = 0.0;

    public function __construct(
        ?int $cdGeAtividade = null,
        ?int $cdGeGrupo = null,
        ?string $dsGeAtividade = null,
        ?float $nrHoras = null,
        ?float $nrHorasCurso = 0.0,
        ?float $nrHorasAtividade = 0.0,
        ?bool $snSelecaoOnline = true,
        ?string $dsCaracteristica = null,
        ?int $cdSiga = null,
        ?float $nrHorasEtapa = 0.0
    ) {
        $this->cdGeAtividade = $cdGeAtividade;
        $this->cdGeGrupo = $cdGeGrupo;
        $this->dsGeAtividade = $dsGeAtividade;
        $this->nrHoras = $nrHoras;
        $this->nrHorasCurso = $nrHorasCurso;
        $this->nrHorasAtividade = $nrHorasAtividade;
        $this->snSelecaoOnline = $snSelecaoOnline;
        $this->dsCaracteristica = $dsCaracteristica;
        $this->cdSiga = $cdSiga;
        $this->nrHorasEtapa = $nrHorasEtapa;
    }

    public function getCdGeAtividade(): ?int
    {
        return $this->cdGeAtividade;
    }

    public function setCdGeAtividade(?int $cdGeAtividade): self
    {
        $this->cdGeAtividade = $cdGeAtividade;
        return $this;
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

    public function getDsGeAtividade(): ?string
    {
        return $this->dsGeAtividade;
    }

    public function setDsGeAtividade(?string $dsGeAtividade): self
    {
        $this->dsGeAtividade = $dsGeAtividade;
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

    public function getNrHorasCurso(): ?float
    {
        return $this->nrHorasCurso;
    }

    public function setNrHorasCurso(?float $nrHorasCurso): self
    {
        $this->nrHorasCurso = $nrHorasCurso;
        return $this;
    }

    public function getNrHorasAtividade(): ?float
    {
        return $this->nrHorasAtividade;
    }

    public function setNrHorasAtividade(?float $nrHorasAtividade): self
    {
        $this->nrHorasAtividade = $nrHorasAtividade;
        return $this;
    }

    public function isSnSelecaoOnline(): ?bool
    {
        return $this->snSelecaoOnline;
    }

    public function setSnSelecaoOnline(?bool $snSelecaoOnline): self
    {
        $this->snSelecaoOnline = $snSelecaoOnline;
        return $this;
    }

    public function getDsCaracteristica(): ?string
    {
        return $this->dsCaracteristica;
    }

    public function setDsCaracteristica(?string $dsCaracteristica): self
    {
        $this->dsCaracteristica = $dsCaracteristica;
        return $this;
    }

    public function getCdSiga(): ?int
    {
        return $this->cdSiga;
    }

    public function setCdSiga(?int $cdSiga): self
    {
        $this->cdSiga = $cdSiga;
        return $this;
    }

    public function getNrHorasEtapa(): ?float
    {
        return $this->nrHorasEtapa;
    }

    public function setNrHorasEtapa(?float $nrHorasEtapa): self
    {
        $this->nrHorasEtapa = $nrHorasEtapa;
        return $this;
    }
}
