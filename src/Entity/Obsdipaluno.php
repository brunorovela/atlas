<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ObsdipalunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObsdipalunoRepository::class)]
#[ORM\Table(
    name: 'obsdipaluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class Obsdipaluno
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $curso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'obs', type: 'text', length: 16777215, nullable: true)]
    private ?string $obs = null;

    public function __construct(
        int $codigoaluno = 0,
        string $curso = '',
        int $nrAnosemestre = 0,
        ?string $obs = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->curso = $curso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->obs = $obs;
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

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;
        return $this;
    }
}
