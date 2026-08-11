<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PedAvaliacaoAlunoLiberarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedAvaliacaoAlunoLiberarRepository::class)]
#[ORM\Table(
    name: 'ped_avaliacao_aluno_liberar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_avaliacao_aluno_obs', columns: ['nr_anosemestre', 'cd_turma', 'cd_processo', 'cd_aluno'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
class PedAvaliacaoAlunoLiberar
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_processo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'sn_liberado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snLiberado = 0;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdProcesso = null,
        ?int $cdAluno = null,
        ?int $snLiberado = 0
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdProcesso = $cdProcesso;
        $this->cdAluno = $cdAluno;
        $this->snLiberado = $snLiberado;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
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

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getSnLiberado(): ?int
    {
        return $this->snLiberado;
    }

    public function setSnLiberado(?int $snLiberado): self
    {
        $this->snLiberado = $snLiberado;
        return $this;
    }
}
