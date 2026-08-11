<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ViewTpAtivosInativosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ViewTpAtivosInativosRepository::class)]
#[ORM\Table(
    name: 'view_tp_ativos_inativos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Chave', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_PROFESSOR', columns: ['professor'])]
class ViewTpAtivosInativos
{
    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'disciplina', type: 'integer')]
    private ?int $disciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'professor', type: 'integer')]
    private ?int $professor = null;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer')]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'numeroaulas', type: 'integer', nullable: true)]
    private ?int $numeroaulas = null;

    #[ORM\Column(name: 'situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $situacao = 'N';

    #[ORM\Column(name: 'cd_categoria', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdCategoria = 1;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 50, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $anosemestre = null,
        ?string $curso = null,
        ?int $disciplina = null,
        ?string $turma = null,
        ?int $professor = null,
        ?int $cdTurmaprofessor = null,
        ?int $numeroaulas = null,
        ?string $situacao = 'N',
        ?int $cdCategoria = 1,
        ?string $dsSala = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->anosemestre = $anosemestre;
        $this->curso = $curso;
        $this->disciplina = $disciplina;
        $this->turma = $turma;
        $this->professor = $professor;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->numeroaulas = $numeroaulas;
        $this->situacao = $situacao;
        $this->cdCategoria = $cdCategoria;
        $this->dsSala = $dsSala;
        $this->dtBase = $dtBase;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getDisciplina(): ?int
    {
        return $this->disciplina;
    }

    public function setDisciplina(?int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getProfessor(): ?int
    {
        return $this->professor;
    }

    public function setProfessor(?int $professor): self
    {
        $this->professor = $professor;
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

    public function getNumeroaulas(): ?int
    {
        return $this->numeroaulas;
    }

    public function setNumeroaulas(?int $numeroaulas): self
    {
        $this->numeroaulas = $numeroaulas;
        return $this;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): self
    {
        $this->situacao = $situacao;
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
