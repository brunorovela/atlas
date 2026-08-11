<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgdDisponibilidadeTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdDisponibilidadeTurmasRepository::class)]
#[ORM\Table(
    name: 'agd_disponibilidade_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_DISPONIBILIDADE_TURMA', columns: ['cd_disponibilidade_periodo', 'anosemestre', 'cd_curso', 'cd_turma'])]
class AgdDisponibilidadeTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_disponibilidade_turmas', type: 'integer')]
    private ?int $cdDisponibilidadeTurmas = null;

    #[ORM\Column(name: 'cd_disponibilidade_periodo', type: 'integer')]
    private ?int $cdDisponibilidadePeriodo = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    public function __construct(
        ?int $cdDisponibilidadePeriodo = null,
        ?int $anosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null
    ) {
        $this->cdDisponibilidadePeriodo = $cdDisponibilidadePeriodo;
        $this->anosemestre = $anosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
    }

    public function getCdDisponibilidadeTurmas(): ?int
    {
        return $this->cdDisponibilidadeTurmas;
    }

    public function getCdDisponibilidadePeriodo(): ?int
    {
        return $this->cdDisponibilidadePeriodo;
    }

    public function setCdDisponibilidadePeriodo(?int $cdDisponibilidadePeriodo): self
    {
        $this->cdDisponibilidadePeriodo = $cdDisponibilidadePeriodo;
        return $this;
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
}
