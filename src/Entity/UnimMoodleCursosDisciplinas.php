<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimMoodleCursosDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleCursosDisciplinasRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_cursos_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_UNIQUE', columns: ['cd_moodle_curso', 'nr_anosemestre', 'cd_curso', 'cd_turma', 'id_disciplina'])]
#[ORM\Index(name: 'IX_CD_MOODLE_CURSO', columns: ['cd_moodle_curso'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [50]])]
#[ORM\Index(name: 'IX_ID_DISCIPLINA', columns: ['id_disciplina'])]
#[ORM\Index(name: 'IX_UMD_NR_ANO', columns: ['nr_anosemestre'])]
class UnimMoodleCursosDisciplinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curso_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCursoDisciplina = null;

    #[ORM\Column(name: 'cd_moodle_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMoodleCurso = null;

    #[ORM\Column(name: 'cd_unim_moodle_disciplina_turma', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdUnimMoodleDisciplinaTurma = 1;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 250)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMoodleCurso = null,
        ?int $cdUnimMoodleDisciplinaTurma = 1,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $idDisciplina = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->cdUnimMoodleDisciplinaTurma = $cdUnimMoodleDisciplinaTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->idDisciplina = $idDisciplina;
        $this->dtBase = $dtBase;
    }

    public function getCdCursoDisciplina(): ?int
    {
        return $this->cdCursoDisciplina;
    }

    public function getCdMoodleCurso(): ?int
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?int $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
        return $this;
    }

    public function getCdUnimMoodleDisciplinaTurma(): ?int
    {
        return $this->cdUnimMoodleDisciplinaTurma;
    }

    public function setCdUnimMoodleDisciplinaTurma(?int $cdUnimMoodleDisciplinaTurma): self
    {
        $this->cdUnimMoodleDisciplinaTurma = $cdUnimMoodleDisciplinaTurma;
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

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
