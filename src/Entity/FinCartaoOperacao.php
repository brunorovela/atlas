<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCartaoOperacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCartaoOperacaoRepository::class)]
#[ORM\Table(
    name: 'fin_cartao_operacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ADMIN_CARTAO', columns: ['cd_admin_cartao'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
class FinCartaoOperacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_operacao', type: 'integer')]
    private ?int $cdOperacao = null;

    #[ORM\Column(name: 'cd_admin_cartao', type: 'integer', nullable: true)]
    private ?int $cdAdminCartao = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'vl_total', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'sn_credito', type: 'smallint', nullable: true)]
    private ?int $snCredito = null;

    #[ORM\Column(name: 'nr_qtd_parcelas', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdParcelas = 0;

    #[ORM\Column(name: 'nr_taxa_original', type: 'float', nullable: true)]
    private ?float $nrTaxaOriginal = null;

    #[ORM\Column(name: 'nr_taxa', type: 'float', nullable: true)]
    private ?float $nrTaxa = null;

    #[ORM\Column(name: 'dt_operacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtOperacao = null;

    #[ORM\Column(name: 'ds_tid_cartao', type: 'string', length: 255, nullable: true)]
    private ?string $dsTidCartao = null;

    public function __construct(
        ?int $cdAdminCartao = null,
        ?int $cdCaixa = null,
        ?float $vlTotal = null,
        ?int $snCredito = null,
        ?int $nrQtdParcelas = 0,
        ?float $nrTaxaOriginal = null,
        ?float $nrTaxa = null,
        ?\DateTimeInterface $dtOperacao = null,
        ?string $dsTidCartao = null
    ) {
        $this->cdAdminCartao = $cdAdminCartao;
        $this->cdCaixa = $cdCaixa;
        $this->vlTotal = $vlTotal;
        $this->snCredito = $snCredito;
        $this->nrQtdParcelas = $nrQtdParcelas;
        $this->nrTaxaOriginal = $nrTaxaOriginal;
        $this->nrTaxa = $nrTaxa;
        $this->dtOperacao = $dtOperacao;
        $this->dsTidCartao = $dsTidCartao;
    }

    public function getCdOperacao(): ?int
    {
        return $this->cdOperacao;
    }

    public function getCdAdminCartao(): ?int
    {
        return $this->cdAdminCartao;
    }

    public function setCdAdminCartao(?int $cdAdminCartao): self
    {
        $this->cdAdminCartao = $cdAdminCartao;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getSnCredito(): ?int
    {
        return $this->snCredito;
    }

    public function setSnCredito(?int $snCredito): self
    {
        $this->snCredito = $snCredito;
        return $this;
    }

    public function getNrQtdParcelas(): ?int
    {
        return $this->nrQtdParcelas;
    }

    public function setNrQtdParcelas(?int $nrQtdParcelas): self
    {
        $this->nrQtdParcelas = $nrQtdParcelas;
        return $this;
    }

    public function getNrTaxaOriginal(): ?float
    {
        return $this->nrTaxaOriginal;
    }

    public function setNrTaxaOriginal(?float $nrTaxaOriginal): self
    {
        $this->nrTaxaOriginal = $nrTaxaOriginal;
        return $this;
    }

    public function getNrTaxa(): ?float
    {
        return $this->nrTaxa;
    }

    public function setNrTaxa(?float $nrTaxa): self
    {
        $this->nrTaxa = $nrTaxa;
        return $this;
    }

    public function getDtOperacao(): ?\DateTimeInterface
    {
        return $this->dtOperacao;
    }

    public function setDtOperacao(?\DateTimeInterface $dtOperacao): self
    {
        $this->dtOperacao = $dtOperacao;
        return $this;
    }

    public function getDsTidCartao(): ?string
    {
        return $this->dsTidCartao;
    }

    public function setDsTidCartao(?string $dsTidCartao): self
    {
        $this->dsTidCartao = $dsTidCartao;
        return $this;
    }
}
