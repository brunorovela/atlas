<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ConvContratosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvContratosTurmasRepository::class)]
#[ORM\Table(
    name: 'conv_contratos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CONV_CONTRATOS_TURMAS_CD_CONTRATO_CD_TURMA_NR_ANOSEMESTRE', columns: ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'])]
#[ORM\Index(name: 'IDX_C2AFEFB3DBEFC179', columns: ['CD_CONTRATO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONV_CONTRATOS_TURMAS_CD_CONTRATO_CONV_CONTRATOS_CD_CONTRATO', 'colunas' => ['CD_CONTRATO'], 'tabelaAlvo' => 'conv_contratos', 'colunasAlvo' => ['CD_CONTRATO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConvContratosTurmas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: ConvContratos::class)]
    #[ORM\JoinColumn(name: 'CD_CONTRATO', referencedColumnName: 'CD_CONTRATO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ConvContratos $cdContrato = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'NR_PARCELAS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrParcelas = 1;

    #[ORM\Column(name: 'VL_REPASSE', type: 'decimal', precision: 15, scale: 9, options: ['default' => '0.000000000'])]
    private string $vlRepasse = '0.000000000';

    #[ORM\Column(name: 'DT_REFERENCIA', type: 'date')]
    private ?\DateTimeInterface $dtReferencia = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    public function __construct(
        ?ConvContratos $cdContrato = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        int $nrParcelas = 1,
        string $vlRepasse = '0.000000000',
        ?\DateTimeInterface $dtReferencia = null,
        int $snAtivo = 1
    ) {
        $this->cdContrato = $cdContrato;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrParcelas = $nrParcelas;
        $this->vlRepasse = $vlRepasse;
        $this->dtReferencia = $dtReferencia;
        $this->snAtivo = $snAtivo;
    }

    public function getCdContrato(): ?ConvContratos
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?ConvContratos $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrParcelas(): int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getVlRepasse(): string
    {
        return $this->vlRepasse;
    }

    public function setVlRepasse(string $vlRepasse): self
    {
        $this->vlRepasse = $vlRepasse;
        return $this;
    }

    public function getDtReferencia(): ?\DateTimeInterface
    {
        return $this->dtReferencia;
    }

    public function setDtReferencia(?\DateTimeInterface $dtReferencia): self
    {
        $this->dtReferencia = $dtReferencia;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
