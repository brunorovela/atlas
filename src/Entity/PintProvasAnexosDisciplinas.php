<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintProvasAnexosDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasAnexosDisciplinasRepository::class)]
#[ORM\Table(
    name: 'pint_provas_anexos_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ANEXO', columns: ['cd_anexo'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PintProvasAnexosDisciplinas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?int $cdAnexo = null,
        ?int $cdDisciplina = null,
        ?int $cdProva = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdAnexo = $cdAnexo;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProva = $cdProva;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function setCdAnexo(?int $cdAnexo): self
    {
        $this->cdAnexo = $cdAnexo;
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

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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
