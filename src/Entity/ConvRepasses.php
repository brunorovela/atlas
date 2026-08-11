<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ConvRepassesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvRepassesRepository::class)]
#[ORM\Table(
    name: 'conv_repasses',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_D4A505A1DBEFC17995D8DD2438476D82', columns: ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REPASSES_CONTRATOS_TURMAS_CD_CONTRATO_CD_TURMA_NR_ANOSEM', 'colunas' => ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'], 'tabelaAlvo' => 'conv_contratos_turmas', 'colunasAlvo' => ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConvRepasses
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_CONTRATO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContrato = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_PARCELA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrParcela = 1;

    #[ORM\Column(name: 'NR_PARCELAS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrParcelas = 1;

    #[ORM\Column(name: 'VL_REPASSE', type: 'decimal', precision: 15, scale: 9)]
    private ?string $vlRepasse = null;

    #[ORM\Column(name: 'CD_MENSALIDADE', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'DT_VENCIMENTO', type: 'date')]
    private ?\DateTimeInterface $dtVencimento = null;

    public function __construct(
        ?int $cdContrato = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        int $nrParcela = 1,
        int $nrParcelas = 1,
        ?string $vlRepasse = null,
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtVencimento = null
    ) {
        $this->cdContrato = $cdContrato;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrParcela = $nrParcela;
        $this->nrParcelas = $nrParcelas;
        $this->vlRepasse = $vlRepasse;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtVencimento = $dtVencimento;
    }

    public function getCdContrato(): ?int
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?int $cdContrato): self
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

    public function getNrParcela(): int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
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

    public function getVlRepasse(): ?string
    {
        return $this->vlRepasse;
    }

    public function setVlRepasse(?string $vlRepasse): self
    {
        $this->vlRepasse = $vlRepasse;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }
}
