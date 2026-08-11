<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinMovCrRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMovCrRepository::class)]
#[ORM\Table(
    name: 'fin_mov_cr',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_TE', columns: ['cd_movimento_te'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE_ORIGEM', columns: ['cd_mensalidade_origem'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE_CREDITO', columns: ['cd_mensalidade_credito'])]
#[ORM\Index(name: 'FK_FIN_MOV_CR_CD_COLIGADA_COLIGADAS_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'idx_fin_mov_cr_mens_col_acao', columns: ['cd_mensalidade', 'cd_coligada', 'cd_acao'])]
#[ORM\Index(name: 'idx_fin_mov_cr_orig_col_acao', columns: ['cd_mensalidade_origem', 'cd_coligada', 'cd_acao'])]
class FinMovCr
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['default' => '0'])]
    private int $cdMensalidade = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_SEQUENCIA', type: 'integer', options: ['default' => '1'])]
    private int $nrSequencia = 1;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_movimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMovimento = null;

    #[ORM\Column(name: 'vl_entrada', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlEntrada = 0.0;

    #[ORM\Column(name: 'vl_saida', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlSaida = 0.0;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlMulta = 0.0;

    #[ORM\Column(name: 'vl_juros', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlJuros = 0.0;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlDesconto = 0.0;

    #[ORM\Column(name: 'vl_liquido', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlLiquido = 0.0;

    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', nullable: true)]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_mensalidade_credito', type: 'integer', nullable: true)]
    private ?int $cdMensalidadeCredito = null;

    #[ORM\Column(name: 'sn_desc_aplicado', type: 'boolean', options: ['default' => '0'])]
    private bool $snDescAplicado = false;

    #[ORM\Column(name: 'sn_desc_condicional', type: 'boolean', options: ['default' => '0'])]
    private bool $snDescCondicional = false;

    #[ORM\Column(name: 'vl_desconto_previsto', type: 'float', nullable: true)]
    private ?float $vlDescontoPrevisto = null;

    #[ORM\Column(name: 'cd_mensalidade_origem', type: 'integer', nullable: true)]
    private ?int $cdMensalidadeOrigem = null;

    #[ORM\Column(name: 'sn_desc_plano_pagamento', type: 'boolean', options: ['default' => '0'])]
    private bool $snDescPlanoPagamento = false;

    #[ORM\Column(name: 'vl_perc_desc_fixo', type: 'float', nullable: true)]
    private ?float $vlPercDescFixo = null;

    #[ORM\Column(name: 'vl_perc_desc_cond', type: 'float', nullable: true)]
    private ?float $vlPercDescCond = null;

    // Sem construtor: 22 propriedades. Use os setters encadeados.

    public function getCdMensalidade(): int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
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

    public function getCdMensalidadeCredito(): ?int
    {
        return $this->cdMensalidadeCredito;
    }

    public function setCdMensalidadeCredito(?int $cdMensalidadeCredito): self
    {
        $this->cdMensalidadeCredito = $cdMensalidadeCredito;
        return $this;
    }

    public function isSnDescAplicado(): bool
    {
        return $this->snDescAplicado;
    }

    public function setSnDescAplicado(bool $snDescAplicado): self
    {
        $this->snDescAplicado = $snDescAplicado;
        return $this;
    }

    public function isSnDescCondicional(): bool
    {
        return $this->snDescCondicional;
    }

    public function setSnDescCondicional(bool $snDescCondicional): self
    {
        $this->snDescCondicional = $snDescCondicional;
        return $this;
    }

    public function getVlDescontoPrevisto(): ?float
    {
        return $this->vlDescontoPrevisto;
    }

    public function setVlDescontoPrevisto(?float $vlDescontoPrevisto): self
    {
        $this->vlDescontoPrevisto = $vlDescontoPrevisto;
        return $this;
    }

    public function getCdMensalidadeOrigem(): ?int
    {
        return $this->cdMensalidadeOrigem;
    }

    public function setCdMensalidadeOrigem(?int $cdMensalidadeOrigem): self
    {
        $this->cdMensalidadeOrigem = $cdMensalidadeOrigem;
        return $this;
    }

    public function isSnDescPlanoPagamento(): bool
    {
        return $this->snDescPlanoPagamento;
    }

    public function setSnDescPlanoPagamento(bool $snDescPlanoPagamento): self
    {
        $this->snDescPlanoPagamento = $snDescPlanoPagamento;
        return $this;
    }

    public function getVlPercDescFixo(): ?float
    {
        return $this->vlPercDescFixo;
    }

    public function setVlPercDescFixo(?float $vlPercDescFixo): self
    {
        $this->vlPercDescFixo = $vlPercDescFixo;
        return $this;
    }

    public function getVlPercDescCond(): ?float
    {
        return $this->vlPercDescCond;
    }

    public function setVlPercDescCond(?float $vlPercDescCond): self
    {
        $this->vlPercDescCond = $vlPercDescCond;
        return $this;
    }
}
