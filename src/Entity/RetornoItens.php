<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RetornoItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetornoItensRepository::class)]
#[ORM\Table(
    name: 'retorno_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RETORNO', columns: ['cd_retorno'])]
#[ORM\Index(name: 'IX_NR_SEQUENCIA', columns: ['nr_sequencia'])]
class RetornoItens
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_retorno', type: 'integer')]
    private ?int $cdRetorno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_sequencia', type: 'integer')]
    private ?int $nrSequencia = null;

    #[ORM\Column(name: 'nr_nossonumero', type: 'string', length: 50)]
    private ?string $nrNossonumero = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true)]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'string', length: 10)]
    private ?string $cdOcorrencia = null;

    #[ORM\Column(name: 'cd_motivo', type: 'string', length: 10, nullable: true)]
    private ?string $cdMotivo = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime')]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'dt_credito', type: 'datetime')]
    private ?\DateTimeInterface $dtCredito = null;

    #[ORM\Column(name: 'vl_titulo', type: 'float')]
    private ?float $vlTitulo = null;

    #[ORM\Column(name: 'vl_acrescimo', type: 'float')]
    private ?float $vlAcrescimo = null;

    #[ORM\Column(name: 'vl_pago', type: 'float')]
    private ?float $vlPago = null;

    #[ORM\Column(name: 'vl_tarifa', type: 'float')]
    private ?float $vlTarifa = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer')]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdSituacao = 0;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?int $cdRetorno = null,
        ?int $nrSequencia = null,
        ?string $nrNossonumero = null,
        ?int $cdResp = null,
        ?int $cdPessoa = null,
        ?string $cdOcorrencia = null,
        ?string $cdMotivo = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?\DateTimeInterface $dtCredito = null,
        ?float $vlTitulo = null,
        ?float $vlAcrescimo = null,
        ?float $vlPago = null,
        ?float $vlTarifa = null,
        ?int $cdCaixa = null,
        ?int $cdSituacao = 0,
        ?string $dsObservacao = null
    ) {
        $this->cdRetorno = $cdRetorno;
        $this->nrSequencia = $nrSequencia;
        $this->nrNossonumero = $nrNossonumero;
        $this->cdResp = $cdResp;
        $this->cdPessoa = $cdPessoa;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->cdMotivo = $cdMotivo;
        $this->dtVencimento = $dtVencimento;
        $this->dtPagamento = $dtPagamento;
        $this->dtCredito = $dtCredito;
        $this->vlTitulo = $vlTitulo;
        $this->vlAcrescimo = $vlAcrescimo;
        $this->vlPago = $vlPago;
        $this->vlTarifa = $vlTarifa;
        $this->cdCaixa = $cdCaixa;
        $this->cdSituacao = $cdSituacao;
        $this->dsObservacao = $dsObservacao;
    }

    public function getCdRetorno(): ?int
    {
        return $this->cdRetorno;
    }

    public function setCdRetorno(?int $cdRetorno): self
    {
        $this->cdRetorno = $cdRetorno;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getNrNossonumero(): ?string
    {
        return $this->nrNossonumero;
    }

    public function setNrNossonumero(?string $nrNossonumero): self
    {
        $this->nrNossonumero = $nrNossonumero;
        return $this;
    }

    public function getCdResp(): ?int
    {
        return $this->cdResp;
    }

    public function setCdResp(?int $cdResp): self
    {
        $this->cdResp = $cdResp;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdOcorrencia(): ?string
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?string $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getCdMotivo(): ?string
    {
        return $this->cdMotivo;
    }

    public function setCdMotivo(?string $cdMotivo): self
    {
        $this->cdMotivo = $cdMotivo;
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

    public function getDtPagamento(): ?\DateTimeInterface
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(?\DateTimeInterface $dtPagamento): self
    {
        $this->dtPagamento = $dtPagamento;
        return $this;
    }

    public function getDtCredito(): ?\DateTimeInterface
    {
        return $this->dtCredito;
    }

    public function setDtCredito(?\DateTimeInterface $dtCredito): self
    {
        $this->dtCredito = $dtCredito;
        return $this;
    }

    public function getVlTitulo(): ?float
    {
        return $this->vlTitulo;
    }

    public function setVlTitulo(?float $vlTitulo): self
    {
        $this->vlTitulo = $vlTitulo;
        return $this;
    }

    public function getVlAcrescimo(): ?float
    {
        return $this->vlAcrescimo;
    }

    public function setVlAcrescimo(?float $vlAcrescimo): self
    {
        $this->vlAcrescimo = $vlAcrescimo;
        return $this;
    }

    public function getVlPago(): ?float
    {
        return $this->vlPago;
    }

    public function setVlPago(?float $vlPago): self
    {
        $this->vlPago = $vlPago;
        return $this;
    }

    public function getVlTarifa(): ?float
    {
        return $this->vlTarifa;
    }

    public function setVlTarifa(?float $vlTarifa): self
    {
        $this->vlTarifa = $vlTarifa;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}
