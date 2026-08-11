<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FichaindividualOptativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaindividualOptativasRepository::class)]
#[ORM\Table(
    name: 'fichaindividual_optativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TURMA_GENERICA', columns: ['cd_turma_generica'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_GENERICA', columns: ['cd_disciplina_generica'])]
#[ORM\Index(name: 'idx_fiopt_composto', columns: ['codigoaluno', 'cd_disciplina_generica', 'serie', 'anosemestre'])]
class FichaindividualOptativas
{
    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'disciplina', type: 'integer', options: ['default' => '0'])]
    private int $disciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'serie', type: 'smallint', options: ['default' => '0'])]
    private int $serie = 0;

    #[ORM\Column(name: 'cd_turma_generica', type: 'string', length: 50)]
    private ?string $cdTurmaGenerica = null;

    #[ORM\Column(name: 'cd_disciplina_generica', type: 'integer')]
    private ?int $cdDisciplinaGenerica = null;

    public function __construct(
        int $anosemestre = 0,
        ?string $turma = null,
        int $codigoaluno = 0,
        int $disciplina = 0,
        int $serie = 0,
        ?string $cdTurmaGenerica = null,
        ?int $cdDisciplinaGenerica = null
    ) {
        $this->anosemestre = $anosemestre;
        $this->turma = $turma;
        $this->codigoaluno = $codigoaluno;
        $this->disciplina = $disciplina;
        $this->serie = $serie;
        $this->cdTurmaGenerica = $cdTurmaGenerica;
        $this->cdDisciplinaGenerica = $cdDisciplinaGenerica;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
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

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getDisciplina(): int
    {
        return $this->disciplina;
    }

    public function setDisciplina(int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getSerie(): int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;
        return $this;
    }

    public function getCdTurmaGenerica(): ?string
    {
        return $this->cdTurmaGenerica;
    }

    public function setCdTurmaGenerica(?string $cdTurmaGenerica): self
    {
        $this->cdTurmaGenerica = $cdTurmaGenerica;
        return $this;
    }

    public function getCdDisciplinaGenerica(): ?int
    {
        return $this->cdDisciplinaGenerica;
    }

    public function setCdDisciplinaGenerica(?int $cdDisciplinaGenerica): self
    {
        $this->cdDisciplinaGenerica = $cdDisciplinaGenerica;
        return $this;
    }
}
