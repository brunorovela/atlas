<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCartaoParcelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCartaoParcelasRepository::class)]
#[ORM\Table(
    name: 'fin_cartao_parcelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_OPERACAO', columns: ['cd_operacao'])]
#[ORM\Index(name: 'IX_CD_HISTORICO_OPERACAO', columns: ['cd_historico_operacao'])]
#[ORM\Index(name: 'IX_CD_CAIXA_ATUAL', columns: ['cd_caixa_atual'])]
class FinCartaoParcelas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parcela', type: 'integer')]
    private ?int $cdParcela = null;

    #[ORM\Column(name: 'cd_operacao', type: 'integer')]
    private ?int $cdOperacao = null;

    #[ORM\Column(name: 'nr_parcela', type: 'integer')]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'vl_valor_parcela', type: 'float')]
    private ?float $vlValorParcela = null;

    #[ORM\Column(name: 'dt_vencimento_original', type: 'date')]
    private ?\DateTimeInterface $dtVencimentoOriginal = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'date')]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'cd_historico_operacao', type: 'integer', nullable: true)]
    private ?int $cdHistoricoOperacao = null;

    #[ORM\Column(name: 'sn_liquidado', type: 'smallint')]
    private ?int $snLiquidado = null;

    #[ORM\Column(name: 'ds_observacoes', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'cd_caixa_atual', type: 'integer', nullable: true)]
    private ?int $cdCaixaAtual = null;

    public function __construct(
        ?int $cdOperacao = null,
        ?int $nrParcela = null,
        ?float $vlValorParcela = null,
        ?\DateTimeInterface $dtVencimentoOriginal = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?int $cdHistoricoOperacao = null,
        ?int $snLiquidado = null,
        ?string $dsObservacoes = null,
        ?int $cdCaixaAtual = null
    ) {
        $this->cdOperacao = $cdOperacao;
        $this->nrParcela = $nrParcela;
        $this->vlValorParcela = $vlValorParcela;
        $this->dtVencimentoOriginal = $dtVencimentoOriginal;
        $this->dtVencimento = $dtVencimento;
        $this->cdHistoricoOperacao = $cdHistoricoOperacao;
        $this->snLiquidado = $snLiquidado;
        $this->dsObservacoes = $dsObservacoes;
        $this->cdCaixaAtual = $cdCaixaAtual;
    }

    public function getCdParcela(): ?int
    {
        return $this->cdParcela;
    }

    public function getCdOperacao(): ?int
    {
        return $this->cdOperacao;
    }

    public function setCdOperacao(?int $cdOperacao): self
    {
        $this->cdOperacao = $cdOperacao;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlValorParcela(): ?float
    {
        return $this->vlValorParcela;
    }

    public function setVlValorParcela(?float $vlValorParcela): self
    {
        $this->vlValorParcela = $vlValorParcela;
        return $this;
    }

    public function getDtVencimentoOriginal(): ?\DateTimeInterface
    {
        return $this->dtVencimentoOriginal;
    }

    public function setDtVencimentoOriginal(?\DateTimeInterface $dtVencimentoOriginal): self
    {
        $this->dtVencimentoOriginal = $dtVencimentoOriginal;
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

    public function getCdHistoricoOperacao(): ?int
    {
        return $this->cdHistoricoOperacao;
    }

    public function setCdHistoricoOperacao(?int $cdHistoricoOperacao): self
    {
        $this->cdHistoricoOperacao = $cdHistoricoOperacao;
        return $this;
    }

    public function getSnLiquidado(): ?int
    {
        return $this->snLiquidado;
    }

    public function setSnLiquidado(?int $snLiquidado): self
    {
        $this->snLiquidado = $snLiquidado;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
        return $this;
    }

    public function getCdCaixaAtual(): ?int
    {
        return $this->cdCaixaAtual;
    }

    public function setCdCaixaAtual(?int $cdCaixaAtual): self
    {
        $this->cdCaixaAtual = $cdCaixaAtual;
        return $this;
    }
}
