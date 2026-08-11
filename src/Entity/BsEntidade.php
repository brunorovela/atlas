<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsEntidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsEntidadeRepository::class)]
#[ORM\Table(
    name: 'bs_entidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_BS_UNIQUE', columns: ['enum_tipo', 'cd_coligada', 'nr_grau', 'nr_anosemestre', 'id_curso', 'id_turma', 'id_disciplina', 'dt_excluido'])]
#[ORM\Index(name: 'IDX_BS_E_ENUM_TIPO', columns: ['enum_tipo'])]
#[ORM\Index(name: 'IDX_BS_E_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IDX_BS_E_GRAU', columns: ['nr_grau'])]
#[ORM\Index(name: 'IDX_BS_E_ANO', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IDX_BS_E_CURSO', columns: ['id_curso'])]
#[ORM\Index(name: 'IDX_BS_E_TURMA', columns: ['id_turma'])]
#[ORM\Index(name: 'IDX_BS_E_DISCIPLINA', columns: ['id_disciplina'])]
#[ORM\Index(name: 'IDX_BS_E_BS_ID', columns: ['bs_id'])]
#[ORM\Index(name: 'IDX_BS_E_BS_PID', columns: ['bs_parent_id'])]
#[ORM\Index(name: 'IDX_BS_E_DT_EXCL', columns: ['dt_excluido'])]
class BsEntidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'enum_tipo', type: 'enum', options: ['values' => ['UNIDADE-COLIGADA', 'GRAU', 'PROGRAMA-ANO-SEMESTRE', 'DEPARTAMENTO-CURSO', 'OFERTA-DISCIPLINA']])]
    private ?string $enumTipo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nr_grau', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrGrau = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'id_curso', type: 'integer', nullable: true)]
    private ?int $idCurso = null;

    #[ORM\Column(name: 'id_turma', type: 'integer', nullable: true)]
    private ?int $idTurma = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', nullable: true)]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'bs_id', type: 'integer')]
    private ?int $bsId = null;

    #[ORM\Column(name: 'bs_parent_id', type: 'integer')]
    private ?int $bsParentId = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $enumTipo = null,
        ?int $cdColigada = null,
        ?int $nrGrau = null,
        ?int $nrAnosemestre = null,
        ?int $idCurso = null,
        ?int $idTurma = null,
        ?int $idDisciplina = null,
        ?int $bsId = null,
        ?int $bsParentId = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->enumTipo = $enumTipo;
        $this->cdColigada = $cdColigada;
        $this->nrGrau = $nrGrau;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->idCurso = $idCurso;
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->bsId = $bsId;
        $this->bsParentId = $bsParentId;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnumTipo(): ?string
    {
        return $this->enumTipo;
    }

    public function setEnumTipo(?string $enumTipo): self
    {
        $this->enumTipo = $enumTipo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrGrau(): ?int
    {
        return $this->nrGrau;
    }

    public function setNrGrau(?int $nrGrau): self
    {
        $this->nrGrau = $nrGrau;
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

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function setIdCurso(?int $idCurso): self
    {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getBsId(): ?int
    {
        return $this->bsId;
    }

    public function setBsId(?int $bsId): self
    {
        $this->bsId = $bsId;
        return $this;
    }

    public function getBsParentId(): ?int
    {
        return $this->bsParentId;
    }

    public function setBsParentId(?int $bsParentId): self
    {
        $this->bsParentId = $bsParentId;
        return $this;
    }

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
