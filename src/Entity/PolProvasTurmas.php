<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasTurmasRepository::class)]
#[ORM\Table(
    name: 'pol_provas_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROVA_DIARIO', columns: ['cd_prova_diario'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PolProvasTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_turma', type: 'integer')]
    private ?int $cdProvaTurma = null;

    #[ORM\Column(name: 'cd_prova_diario', type: 'integer', nullable: true)]
    private ?int $cdProvaDiario = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDisciplina = 0;

    #[ORM\Column(name: 'nr_bimestre', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrBimestre = 0;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    public function __construct(
        ?int $cdProvaDiario = null,
        ?int $cdProva = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?int $cdDisciplina = 0,
        ?int $nrBimestre = 0,
        ?int $cdGrupo = null
    ) {
        $this->cdProvaDiario = $cdProvaDiario;
        $this->cdProva = $cdProva;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrBimestre = $nrBimestre;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdProvaTurma(): ?int
    {
        return $this->cdProvaTurma;
    }

    public function getCdProvaDiario(): ?int
    {
        return $this->cdProvaDiario;
    }

    public function setCdProvaDiario(?int $cdProvaDiario): self
    {
        $this->cdProvaDiario = $cdProvaDiario;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getNrBimestre(): ?int
    {
        return $this->nrBimestre;
    }

    public function setNrBimestre(?int $nrBimestre): self
    {
        $this->nrBimestre = $nrBimestre;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }
}
