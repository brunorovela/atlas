<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiariosDescricoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiariosDescricoesRepository::class)]
#[ORM\Table(
    name: 'diarios_descricoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_DISCIPLINA', columns: ['nr_disciplina'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_AVALIACAO', columns: ['nr_avaliacao'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class DiariosDescricoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_disciplina', type: 'integer', options: ['default' => '0'])]
    private int $nrDisciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_avaliacao', type: 'smallint', options: ['default' => '0'])]
    private int $nrAvaliacao = 0;

    #[ORM\Column(name: 'ds_avaliacao', type: 'text', length: 16777215)]
    private ?string $dsAvaliacao = null;

    #[ORM\Column(name: 'sn_liberado', type: 'boolean', options: ['default' => '0'])]
    private bool $snLiberado = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $nrAnosemestre = 0,
        ?string $cdTurma = null,
        int $nrDisciplina = 0,
        int $cdPessoa = 0,
        int $nrAvaliacao = 0,
        ?string $dsAvaliacao = null,
        bool $snLiberado = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->nrDisciplina = $nrDisciplina;
        $this->cdPessoa = $cdPessoa;
        $this->nrAvaliacao = $nrAvaliacao;
        $this->dsAvaliacao = $dsAvaliacao;
        $this->snLiberado = $snLiberado;
        $this->dtBase = $dtBase;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrDisciplina(): int
    {
        return $this->nrDisciplina;
    }

    public function setNrDisciplina(int $nrDisciplina): self
    {
        $this->nrDisciplina = $nrDisciplina;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrAvaliacao(): int
    {
        return $this->nrAvaliacao;
    }

    public function setNrAvaliacao(int $nrAvaliacao): self
    {
        $this->nrAvaliacao = $nrAvaliacao;
        return $this;
    }

    public function getDsAvaliacao(): ?string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(?string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
        return $this;
    }

    public function isSnLiberado(): bool
    {
        return $this->snLiberado;
    }

    public function setSnLiberado(bool $snLiberado): self
    {
        $this->snLiberado = $snLiberado;
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
