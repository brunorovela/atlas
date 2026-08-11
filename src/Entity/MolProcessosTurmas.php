<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolProcessosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosTurmasRepository::class)]
#[ORM\Table(
    name: 'mol_processos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['cd_processo', 'cd_turma', 'cd_curso', 'nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class MolProcessosTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_turma', type: 'integer')]
    private ?int $cdProcessoTurma = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdProcessoTurma(): ?int
    {
        return $this->cdProcessoTurma;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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
