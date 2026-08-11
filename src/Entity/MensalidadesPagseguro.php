<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MensalidadesPagseguroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesPagseguroRepository::class)]
#[ORM\Table(
    name: 'mensalidades_pagseguro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_STATUS', columns: ['cd_status'])]
class MensalidadesPagseguro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_chave_integracao', type: 'string', length: 255)]
    private ?string $dsChaveIntegracao = null;

    #[ORM\Column(name: 'ds_transacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsTransacao = null;

    #[ORM\Column(name: 'ds_order', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrder = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'sn_cancelado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snCancelado = 0;

    #[ORM\Column(name: 'nr_tentativa', type: 'smallint', options: ['default' => '0'])]
    private int $nrTentativa = 0;

    #[ORM\Column(name: 'dt_proxima_tentativa', type: 'datetime')]
    private ?\DateTimeInterface $dtProximaTentativa = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'ds_cobranca', type: 'string', length: 255, nullable: true)]
    private ?string $dsCobranca = null;

    #[ORM\Column(name: 'vl_pedido', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $vlPedido = null;

    #[ORM\Column(name: 'ds_tipo_pagamento', type: 'string', length: 50, nullable: true)]
    private ?string $dsTipoPagamento = null;

    #[ORM\Column(name: 'vl_taxa', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $vlTaxa = null;

    #[ORM\Column(name: 'nr_parcelas_taxa', type: 'smallint', nullable: true)]
    private ?int $nrParcelasTaxa = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $dsChaveIntegracao = null,
        ?string $dsTransacao = null,
        ?string $dsOrder = null,
        ?int $cdStatus = null,
        ?int $snCancelado = 0,
        int $nrTentativa = 0,
        ?\DateTimeInterface $dtProximaTentativa = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?string $dsCobranca = null,
        ?string $vlPedido = null,
        ?string $dsTipoPagamento = null,
        ?string $vlTaxa = null,
        ?int $nrParcelasTaxa = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        $this->dsTransacao = $dsTransacao;
        $this->dsOrder = $dsOrder;
        $this->cdStatus = $cdStatus;
        $this->snCancelado = $snCancelado;
        $this->nrTentativa = $nrTentativa;
        $this->dtProximaTentativa = $dtProximaTentativa;
        $this->dtInclusao = $dtInclusao;
        $this->dsCobranca = $dsCobranca;
        $this->vlPedido = $vlPedido;
        $this->dsTipoPagamento = $dsTipoPagamento;
        $this->vlTaxa = $vlTaxa;
        $this->nrParcelasTaxa = $nrParcelasTaxa;
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

    public function getDsChaveIntegracao(): ?string
    {
        return $this->dsChaveIntegracao;
    }

    public function setDsChaveIntegracao(?string $dsChaveIntegracao): self
    {
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        return $this;
    }

    public function getDsTransacao(): ?string
    {
        return $this->dsTransacao;
    }

    public function setDsTransacao(?string $dsTransacao): self
    {
        $this->dsTransacao = $dsTransacao;
        return $this;
    }

    public function getDsOrder(): ?string
    {
        return $this->dsOrder;
    }

    public function setDsOrder(?string $dsOrder): self
    {
        $this->dsOrder = $dsOrder;
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

    public function getSnCancelado(): ?int
    {
        return $this->snCancelado;
    }

    public function setSnCancelado(?int $snCancelado): self
    {
        $this->snCancelado = $snCancelado;
        return $this;
    }

    public function getNrTentativa(): int
    {
        return $this->nrTentativa;
    }

    public function setNrTentativa(int $nrTentativa): self
    {
        $this->nrTentativa = $nrTentativa;
        return $this;
    }

    public function getDtProximaTentativa(): ?\DateTimeInterface
    {
        return $this->dtProximaTentativa;
    }

    public function setDtProximaTentativa(?\DateTimeInterface $dtProximaTentativa): self
    {
        $this->dtProximaTentativa = $dtProximaTentativa;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getDsCobranca(): ?string
    {
        return $this->dsCobranca;
    }

    public function setDsCobranca(?string $dsCobranca): self
    {
        $this->dsCobranca = $dsCobranca;
        return $this;
    }

    public function getVlPedido(): ?string
    {
        return $this->vlPedido;
    }

    public function setVlPedido(?string $vlPedido): self
    {
        $this->vlPedido = $vlPedido;
        return $this;
    }

    public function getDsTipoPagamento(): ?string
    {
        return $this->dsTipoPagamento;
    }

    public function setDsTipoPagamento(?string $dsTipoPagamento): self
    {
        $this->dsTipoPagamento = $dsTipoPagamento;
        return $this;
    }

    public function getVlTaxa(): ?string
    {
        return $this->vlTaxa;
    }

    public function setVlTaxa(?string $vlTaxa): self
    {
        $this->vlTaxa = $vlTaxa;
        return $this;
    }

    public function getNrParcelasTaxa(): ?int
    {
        return $this->nrParcelasTaxa;
    }

    public function setNrParcelasTaxa(?int $nrParcelasTaxa): self
    {
        $this->nrParcelasTaxa = $nrParcelasTaxa;
        return $this;
    }
}
