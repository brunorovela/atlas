<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniTurmasprofessoresInativosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniTurmasprofessoresInativosRepository::class)]
#[ORM\Table(
    name: 'uni_turmasprofessores_inativos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class UniTurmasprofessoresInativos
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_professor', type: 'integer')]
    private ?int $cdProfessor = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer')]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'nr_aulas', type: 'integer', nullable: true)]
    private ?int $nrAulas = null;

    #[ORM\Column(name: 'cd_situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $cdSituacao = null;

    #[ORM\Column(name: 'cd_categoria', type: 'smallint', nullable: true)]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 50, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'cd_professor_substituto', type: 'integer')]
    private ?int $cdProfessorSubstituto = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdProfessor = null,
        ?int $cdTurmaprofessor = null,
        ?int $nrAulas = null,
        ?string $cdSituacao = null,
        ?int $cdCategoria = null,
        ?string $dsSala = null,
        ?int $cdProfessorSubstituto = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProfessor = $cdProfessor;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->nrAulas = $nrAulas;
        $this->cdSituacao = $cdSituacao;
        $this->cdCategoria = $cdCategoria;
        $this->dsSala = $dsSala;
        $this->cdProfessorSubstituto = $cdProfessorSubstituto;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getNrAulas(): ?int
    {
        return $this->nrAulas;
    }

    public function setNrAulas(?int $nrAulas): self
    {
        $this->nrAulas = $nrAulas;
        return $this;
    }

    public function getCdSituacao(): ?string
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?string $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getDsSala(): ?string
    {
        return $this->dsSala;
    }

    public function setDsSala(?string $dsSala): self
    {
        $this->dsSala = $dsSala;
        return $this;
    }

    public function getCdProfessorSubstituto(): ?int
    {
        return $this->cdProfessorSubstituto;
    }

    public function setCdProfessorSubstituto(?int $cdProfessorSubstituto): self
    {
        $this->cdProfessorSubstituto = $cdProfessorSubstituto;
        return $this;
    }
}
