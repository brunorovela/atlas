<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsFilaIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsFilaIntegracaoRepository::class)]
#[ORM\Table(
    name: 'bs_fila_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_BS_FI_ENUM_TIPO', columns: ['enum_tipo'])]
#[ORM\Index(name: 'IDX_BS_FI_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IDX_BS_FI_GRAU', columns: ['nr_grau'])]
#[ORM\Index(name: 'IDX_BS_FI_ANO', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IDX_BS_FI_CURSO', columns: ['id_curso'])]
#[ORM\Index(name: 'IDX_BS_FI_TURMA', columns: ['id_turma'])]
#[ORM\Index(name: 'IDX_BS_FI_DISCIPLINA', columns: ['id_disciplina'])]
class BsFilaIntegracao
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

    #[ORM\Column(name: 'nr_prioridade', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $nrPrioridade = 1;

    #[ORM\Column(name: 'nr_qtd_tentativas', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdTentativas = 0;

    #[ORM\Column(name: 'me_ultimo_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meUltimoErro = null;

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
        ?int $nrPrioridade = 1,
        ?int $nrQtdTentativas = 0,
        ?string $meUltimoErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->enumTipo = $enumTipo;
        $this->cdColigada = $cdColigada;
        $this->nrGrau = $nrGrau;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->idCurso = $idCurso;
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->nrPrioridade = $nrPrioridade;
        $this->nrQtdTentativas = $nrQtdTentativas;
        $this->meUltimoErro = $meUltimoErro;
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

    public function getNrPrioridade(): ?int
    {
        return $this->nrPrioridade;
    }

    public function setNrPrioridade(?int $nrPrioridade): self
    {
        $this->nrPrioridade = $nrPrioridade;
        return $this;
    }

    public function getNrQtdTentativas(): ?int
    {
        return $this->nrQtdTentativas;
    }

    public function setNrQtdTentativas(?int $nrQtdTentativas): self
    {
        $this->nrQtdTentativas = $nrQtdTentativas;
        return $this;
    }

    public function getMeUltimoErro(): ?string
    {
        return $this->meUltimoErro;
    }

    public function setMeUltimoErro(?string $meUltimoErro): self
    {
        $this->meUltimoErro = $meUltimoErro;
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
