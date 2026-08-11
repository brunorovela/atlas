<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PedAvaliacaoAlunoObservacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedAvaliacaoAlunoObservacaoRepository::class)]
#[ORM\Table(
    name: 'ped_avaliacao_aluno_observacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_avaliacao_aluno_obs', columns: ['nr_anosemestre', 'cd_turma', 'cd_processo', 'nr_etapa', 'cd_aluno'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_NR_ETAPA', columns: ['nr_etapa'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
class PedAvaliacaoAlunoObservacao
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
    #[ORM\Column(name: 'nr_etapa', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrEtapa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215)]
    private ?string $meObservacao = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdProcesso = null,
        ?int $nrEtapa = null,
        ?int $cdAluno = null,
        ?string $meObservacao = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdProcesso = $cdProcesso;
        $this->nrEtapa = $nrEtapa;
        $this->cdAluno = $cdAluno;
        $this->meObservacao = $meObservacao;
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

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
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

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }
}
