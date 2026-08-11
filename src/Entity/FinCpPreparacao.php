<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCpPreparacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCpPreparacaoRepository::class)]
#[ORM\Table(
    name: 'fin_cp_preparacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_preparacao', columns: ['cd_preparacao'])]
#[ORM\Index(name: 'IX_CD_PREPARACAO', columns: ['cd_preparacao'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinCpPreparacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_preparacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPreparacao = null;

    #[ORM\Column(name: 'ds_preparacao', type: 'string', length: 150, nullable: true)]
    private ?string $dsPreparacao = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdCaixa = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdColigada = 1;

    #[ORM\Column(name: 'dt_preparacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPreparacao = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'sn_pgto_autorizado', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snPgtoAutorizado = null;

    #[ORM\Column(name: 'sn_pgto_efetivado', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snPgtoEfetivado = null;

    #[ORM\Column(name: 'cd_usuario_preparou', type: 'integer', nullable: true)]
    private ?int $cdUsuarioPreparou = null;

    #[ORM\Column(name: 'cd_usuario_aprovou', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuarioAprovou = null;

    #[ORM\Column(name: 'cd_usuario_baixou', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuarioBaixou = null;

    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'nr_cheque', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCheque = null;

    public function __construct(
        ?string $dsPreparacao = null,
        ?int $cdCaixa = 0,
        ?int $cdColigada = 1,
        ?\DateTimeInterface $dtPreparacao = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?string $snPgtoAutorizado = null,
        ?string $snPgtoEfetivado = null,
        ?int $cdUsuarioPreparou = null,
        ?int $cdUsuarioAprovou = null,
        ?int $cdUsuarioBaixou = null,
        ?int $cdMovimentoTe = null,
        ?int $nrCheque = null
    ) {
        $this->dsPreparacao = $dsPreparacao;
        $this->cdCaixa = $cdCaixa;
        $this->cdColigada = $cdColigada;
        $this->dtPreparacao = $dtPreparacao;
        $this->dtPagamento = $dtPagamento;
        $this->snPgtoAutorizado = $snPgtoAutorizado;
        $this->snPgtoEfetivado = $snPgtoEfetivado;
        $this->cdUsuarioPreparou = $cdUsuarioPreparou;
        $this->cdUsuarioAprovou = $cdUsuarioAprovou;
        $this->cdUsuarioBaixou = $cdUsuarioBaixou;
        $this->cdMovimentoTe = $cdMovimentoTe;
        $this->nrCheque = $nrCheque;
    }

    public function getCdPreparacao(): ?int
    {
        return $this->cdPreparacao;
    }

    public function getDsPreparacao(): ?string
    {
        return $this->dsPreparacao;
    }

    public function setDsPreparacao(?string $dsPreparacao): self
    {
        $this->dsPreparacao = $dsPreparacao;
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

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getDtPreparacao(): ?\DateTimeInterface
    {
        return $this->dtPreparacao;
    }

    public function setDtPreparacao(?\DateTimeInterface $dtPreparacao): self
    {
        $this->dtPreparacao = $dtPreparacao;
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

    public function getSnPgtoAutorizado(): ?string
    {
        return $this->snPgtoAutorizado;
    }

    public function setSnPgtoAutorizado(?string $snPgtoAutorizado): self
    {
        $this->snPgtoAutorizado = $snPgtoAutorizado;
        return $this;
    }

    public function getSnPgtoEfetivado(): ?string
    {
        return $this->snPgtoEfetivado;
    }

    public function setSnPgtoEfetivado(?string $snPgtoEfetivado): self
    {
        $this->snPgtoEfetivado = $snPgtoEfetivado;
        return $this;
    }

    public function getCdUsuarioPreparou(): ?int
    {
        return $this->cdUsuarioPreparou;
    }

    public function setCdUsuarioPreparou(?int $cdUsuarioPreparou): self
    {
        $this->cdUsuarioPreparou = $cdUsuarioPreparou;
        return $this;
    }

    public function getCdUsuarioAprovou(): ?int
    {
        return $this->cdUsuarioAprovou;
    }

    public function setCdUsuarioAprovou(?int $cdUsuarioAprovou): self
    {
        $this->cdUsuarioAprovou = $cdUsuarioAprovou;
        return $this;
    }

    public function getCdUsuarioBaixou(): ?int
    {
        return $this->cdUsuarioBaixou;
    }

    public function setCdUsuarioBaixou(?int $cdUsuarioBaixou): self
    {
        $this->cdUsuarioBaixou = $cdUsuarioBaixou;
        return $this;
    }

    public function getCdMovimentoTe(): ?int
    {
        return $this->cdMovimentoTe;
    }

    public function setCdMovimentoTe(?int $cdMovimentoTe): self
    {
        $this->cdMovimentoTe = $cdMovimentoTe;
        return $this;
    }

    public function getNrCheque(): ?int
    {
        return $this->nrCheque;
    }

    public function setNrCheque(?int $nrCheque): self
    {
        $this->nrCheque = $nrCheque;
        return $this;
    }
}
