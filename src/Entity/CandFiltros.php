<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CandFiltrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandFiltrosRepository::class)]
#[ORM\Table(
    name: 'cand_filtros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
class CandFiltros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_filtro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFiltro = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_departamento', type: 'integer', nullable: true)]
    private ?int $cdDepartamento = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 100, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 100, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'ds_situacoes', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacoes = null;

    #[ORM\Column(name: 'nr_total_alunos', type: 'integer', nullable: true)]
    private ?int $nrTotalAlunos = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $cdDepartamento = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?string $dsSituacoes = null,
        ?int $nrTotalAlunos = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdDepartamento = $cdDepartamento;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->dsSituacoes = $dsSituacoes;
        $this->nrTotalAlunos = $nrTotalAlunos;
    }

    public function getCdFiltro(): ?int
    {
        return $this->cdFiltro;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?int $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getDsSituacoes(): ?string
    {
        return $this->dsSituacoes;
    }

    public function setDsSituacoes(?string $dsSituacoes): self
    {
        $this->dsSituacoes = $dsSituacoes;
        return $this;
    }

    public function getNrTotalAlunos(): ?int
    {
        return $this->nrTotalAlunos;
    }

    public function setNrTotalAlunos(?int $nrTotalAlunos): self
    {
        $this->nrTotalAlunos = $nrTotalAlunos;
        return $this;
    }
}
