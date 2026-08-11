<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleCabecalhosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleCabecalhosTurmasRepository::class)]
#[ORM\Table(
    name: 'ple_cabecalhos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CABECALHO_TURMA', columns: ['cd_cabecalho_turma'])]
#[ORM\Index(name: 'IX_CD_CABECALHO', columns: ['cd_cabecalho'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PleCabecalhosTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cabecalho_turma', type: 'integer')]
    private ?int $cdCabecalhoTurma = null;

    #[ORM\Column(name: 'cd_cabecalho', type: 'integer', nullable: true)]
    private ?int $cdCabecalho = null;

    #[ORM\Column(name: 'cd_depto', type: 'integer', nullable: true)]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 20, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?int $cdCabecalho = null,
        ?int $cdDepto = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdCabecalho = $cdCabecalho;
        $this->cdDepto = $cdDepto;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdCabecalhoTurma(): ?int
    {
        return $this->cdCabecalhoTurma;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function setCdCabecalho(?int $cdCabecalho): self
    {
        $this->cdCabecalho = $cdCabecalho;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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
}
