<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinMovCpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMovCpRepository::class)]
#[ORM\Table(
    name: 'fin_mov_cp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_NR_SEQUENCIA', columns: ['nr_sequencia'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_TE', columns: ['cd_movimento_te'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
class FinMovCp
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['default' => '0'])]
    private int $cdTitulo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_sequencia', type: 'integer', options: ['default' => '0'])]
    private int $nrSequencia = 0;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_movimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMovimento = null;

    #[ORM\Column(name: 'vl_entrada', type: 'float', nullable: true)]
    private ?float $vlEntrada = null;

    #[ORM\Column(name: 'vl_saida', type: 'float', nullable: true)]
    private ?float $vlSaida = null;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true)]
    private ?float $vlMulta = null;

    #[ORM\Column(name: 'vl_juros', type: 'float', nullable: true)]
    private ?float $vlJuros = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'vl_liquido', type: 'float', nullable: true)]
    private ?float $vlLiquido = null;

    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'cd_titulo_credito', type: 'integer', nullable: true)]
    private ?int $cdTituloCredito = null;

    public function __construct(
        int $cdTitulo = 0,
        int $cdColigada = 1,
        int $nrSequencia = 0,
        ?int $cdAcao = null,
        ?\DateTimeInterface $dtMovimento = null,
        ?float $vlEntrada = null,
        ?float $vlSaida = null,
        ?float $vlMulta = null,
        ?float $vlJuros = null,
        ?float $vlDesconto = null,
        ?float $vlLiquido = null,
        ?int $cdMovimentoTe = null,
        ?string $dsObservacao = null,
        ?int $cdUsuario = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?int $cdTituloCredito = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdColigada = $cdColigada;
        $this->nrSequencia = $nrSequencia;
        $this->cdAcao = $cdAcao;
        $this->dtMovimento = $dtMovimento;
        $this->vlEntrada = $vlEntrada;
        $this->vlSaida = $vlSaida;
        $this->vlMulta = $vlMulta;
        $this->vlJuros = $vlJuros;
        $this->vlDesconto = $vlDesconto;
        $this->vlLiquido = $vlLiquido;
        $this->cdMovimentoTe = $cdMovimentoTe;
        $this->dsObservacao = $dsObservacao;
        $this->cdUsuario = $cdUsuario;
        $this->dtPagamento = $dtPagamento;
        $this->cdTituloCredito = $cdTituloCredito;
    }

    public function getCdTitulo(): int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrSequencia(): int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDtMovimento(): ?\DateTimeInterface
    {
        return $this->dtMovimento;
    }

    public function setDtMovimento(?\DateTimeInterface $dtMovimento): self
    {
        $this->dtMovimento = $dtMovimento;
        return $this;
    }

    public function getVlEntrada(): ?float
    {
        return $this->vlEntrada;
    }

    public function setVlEntrada(?float $vlEntrada): self
    {
        $this->vlEntrada = $vlEntrada;
        return $this;
    }

    public function getVlSaida(): ?float
    {
        return $this->vlSaida;
    }

    public function setVlSaida(?float $vlSaida): self
    {
        $this->vlSaida = $vlSaida;
        return $this;
    }

    public function getVlMulta(): ?float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(?float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
        return $this;
    }

    public function getVlJuros(): ?float
    {
        return $this->vlJuros;
    }

    public function setVlJuros(?float $vlJuros): self
    {
        $this->vlJuros = $vlJuros;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlLiquido(): ?float
    {
        return $this->vlLiquido;
    }

    public function setVlLiquido(?float $vlLiquido): self
    {
        $this->vlLiquido = $vlLiquido;
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

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
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

    public function getCdTituloCredito(): ?int
    {
        return $this->cdTituloCredito;
    }

    public function setCdTituloCredito(?int $cdTituloCredito): self
    {
        $this->cdTituloCredito = $cdTituloCredito;
        return $this;
    }
}
