<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ProdAlunosprocessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdAlunosprocessoRepository::class)]
#[ORM\Table(
    name: 'prod_alunosprocesso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_processo']
)]
class ProdAlunosprocesso
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'nr_conceito', type: 'float', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?float $nrConceito = 0.0;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdSituacao = 0;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdStatus = 0;

    #[ORM\Column(name: 'nr_grupo', type: 'integer', nullable: true)]
    private ?int $nrGrupo = null;

    #[ORM\Column(name: 'sn_lider_grupo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snLiderGrupo = 0;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlNota = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdAluno = null,
        ?int $nrAnosemestre = null,
        ?float $nrConceito = 0.0,
        ?int $cdSituacao = 0,
        ?int $cdStatus = 0,
        ?int $nrGrupo = null,
        ?int $snLiderGrupo = 0,
        ?float $vlNota = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdAluno = $cdAluno;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrConceito = $nrConceito;
        $this->cdSituacao = $cdSituacao;
        $this->cdStatus = $cdStatus;
        $this->nrGrupo = $nrGrupo;
        $this->snLiderGrupo = $snLiderGrupo;
        $this->vlNota = $vlNota;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrConceito(): ?float
    {
        return $this->nrConceito;
    }

    public function setNrConceito(?float $nrConceito): self
    {
        $this->nrConceito = $nrConceito;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdStatus(): ?int
    {
        return $this->cdStatus;
    }

    public function setCdStatus(?int $cdStatus): self
    {
        $this->cdStatus = $cdStatus;
        return $this;
    }

    public function getNrGrupo(): ?int
    {
        return $this->nrGrupo;
    }

    public function setNrGrupo(?int $nrGrupo): self
    {
        $this->nrGrupo = $nrGrupo;
        return $this;
    }

    public function getSnLiderGrupo(): ?int
    {
        return $this->snLiderGrupo;
    }

    public function setSnLiderGrupo(?int $snLiderGrupo): self
    {
        $this->snLiderGrupo = $snLiderGrupo;
        return $this;
    }

    public function getVlNota(): ?float
    {
        return $this->vlNota;
    }

    public function setVlNota(?float $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }
}
