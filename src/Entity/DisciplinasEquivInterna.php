<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasEquivInternaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasEquivInternaRepository::class)]
#[ORM\Table(
    name: 'disciplinas_equiv_interna',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_equivalencia', columns: ['cd_equivalencia'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CD_CURSO', columns: ['cd_disciplina', 'cd_curso'])]
class DisciplinasEquivInterna
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_equivalencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEquivalencia = null;

    #[ORM\Column(name: 'cd_grade', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdGrade = 1;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    public function __construct(
        ?int $cdGrade = 1,
        ?string $cdCurso = null,
        ?int $cdDisciplina = null,
        ?int $cdGrupo = null
    ) {
        $this->cdGrade = $cdGrade;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdEquivalencia(): ?int
    {
        return $this->cdEquivalencia;
    }

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
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
