<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinCadastroContasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCadastroContasRepository::class)]
#[ORM\Table(
    name: 'fin_cadastro_contas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CONTA', columns: ['tp_conta'])]
#[ORM\Index(name: 'IX_FINCADCON_CD_CAIXA', columns: ['cd_caixa', 'cd_coligada'])]
class FinCadastroContas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_caixa', type: 'integer')]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'sn_todas_coligadas', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snTodasColigadas = 0;

    #[ORM\Column(name: 'ds_caixa', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaixa = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'tp_conta', type: 'smallint', nullable: true)]
    private ?int $tpConta = null;

    #[ORM\Column(name: 'nm_banco', type: 'string', length: 100, nullable: true)]
    private ?string $nmBanco = null;

    #[ORM\Column(name: 'nr_banco', type: 'string', length: 30, nullable: true)]
    private ?string $nrBanco = null;

    #[ORM\Column(name: 'nr_agencia', type: 'string', length: 30, nullable: true)]
    private ?string $nrAgencia = null;

    #[ORM\Column(name: 'nm_agencia', type: 'string', length: 100, nullable: true)]
    private ?string $nmAgencia = null;

    #[ORM\Column(name: 'nr_conta', type: 'string', length: 50, nullable: true)]
    private ?string $nrConta = null;

    #[ORM\Column(name: 'nr_float_bancario', type: 'smallint', nullable: true)]
    private ?int $nrFloatBancario = null;

    #[ORM\Column(name: 'sn_baixa_dias_uteis', type: 'integer', options: ['default' => '0'])]
    private int $snBaixaDiasUteis = 0;

    #[ORM\Column(name: 'dt_criacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'vl_saldo_inicio', type: 'float', nullable: true)]
    private ?float $vlSaldoInicio = null;

    #[ORM\Column(name: 'sn_ativa', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAtiva = null;

    #[ORM\Column(name: 'sn_conta_resultado', type: 'boolean', options: ['default' => '1'])]
    private bool $snContaResultado = true;

    #[ORM\Column(name: 'nr_uso_banco', type: 'string', length: 20, nullable: true)]
    private ?string $nrUsoBanco = null;

    #[ORM\Column(name: 'ds_mensagem_bloqueto', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMensagemBloqueto = null;

    #[ORM\Column(name: 'sn_multa', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snMulta = 'N';

    #[ORM\Column(name: 'sn_juros', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snJuros = 'N';

    #[ORM\Column(name: 'sn_correcao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snCorrecao = 'N';

    #[ORM\Column(name: 'sn_juros_mensal', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snJurosMensal = 'N';

    #[ORM\Column(name: 'vl_multa_percent', type: 'float', nullable: true)]
    private ?float $vlMultaPercent = null;

    #[ORM\Column(name: 'vl_juros_percent', type: 'float', nullable: true)]
    private ?float $vlJurosPercent = null;

    #[ORM\Column(name: 'vl_juros_mensal', type: 'float', nullable: true)]
    private ?float $vlJurosMensal = null;

    #[ORM\Column(name: 'nr_dias_acrescimo', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasAcrescimo = 0;

    #[ORM\Column(name: 'nr_dias_desconto', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasDesconto = 0;

    #[ORM\Column(name: 'vl_dias_desc_perc', type: 'float', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?float $vlDiasDescPerc = 0.0;

    #[ORM\Column(name: 'nr_carteira', type: 'string', length: 20, nullable: true)]
    private ?string $nrCarteira = null;

    #[ORM\Column(name: 'nr_convenio', type: 'string', length: 15, nullable: true)]
    private ?string $nrConvenio = null;

    #[ORM\Column(name: 'nm_cedente', type: 'string', length: 100, nullable: true)]
    private ?string $nmCedente = null;

    #[ORM\Column(name: 'ds_cnpj_cedente', type: 'string', length: 50, nullable: true)]
    private ?string $dsCnpjCedente = null;

    #[ORM\Column(name: 'nr_transacao', type: 'string', length: 5, nullable: true)]
    private ?string $nrTransacao = null;

    #[ORM\Column(name: 'ds_identificacao_retorno', type: 'string', length: 30, nullable: true)]
    private ?string $dsIdentificacaoRetorno = null;

    #[ORM\Column(name: 'nm_arquivo_bloqueto', type: 'string', length: 50, nullable: true)]
    private ?string $nmArquivoBloqueto = null;

    #[ORM\Column(name: 'ds_nn_prefixo', type: 'string', length: 20, nullable: true)]
    private ?string $dsNnPrefixo = null;

    #[ORM\Column(name: 'nr_ultimo_cheque', type: 'integer', nullable: true)]
    private ?int $nrUltimoCheque = null;

    #[ORM\Column(name: 'dt_saldo_base', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaldoBase = null;

    #[ORM\Column(name: 'nr_nn_ultimo', type: 'integer', nullable: true)]
    private ?int $nrNnUltimo = null;

    #[ORM\Column(name: 'nr_nn_tamanho', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '8'])]
    private ?int $nrNnTamanho = 8;

    #[ORM\Column(name: 'cd_boleto_online', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdBoletoOnline = null;

    #[ORM\Column(name: 'cd_plano_conta', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPlanoConta = 0;

    #[ORM\Column(name: 'cd_conta_desconto', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaDesconto = 0;

    #[ORM\Column(name: 'cd_conta_acrescimo', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaAcrescimo = 0;

    #[ORM\Column(name: 'sn_saldo_disponivel', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snSaldoDisponivel = 1;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 100, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'cd_conta_tarifa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdContaTarifa = null;

    #[ORM\Column(name: 'cd_centro_tarifa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentroTarifa = null;

    #[ORM\Column(name: 'ds_grupo_categoria', type: 'string', length: 100, nullable: true)]
    private ?string $dsGrupoCategoria = null;

    #[ORM\Column(name: 'sn_transf_aberta', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snTransfAberta = false;

    #[ORM\Column(name: 'sn_ignorar_dda', type: 'boolean', nullable: true)]
    private ?bool $snIgnorarDda = null;

    #[ORM\Column(name: 'cd_historico_baixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdHistoricoBaixa = null;

    #[ORM\Column(name: 'ds_historico_baixa', type: 'string', length: 250, nullable: true)]
    private ?string $dsHistoricoBaixa = null;

    #[ORM\Column(name: 'cd_historico_desc', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdHistoricoDesc = null;

    #[ORM\Column(name: 'ds_historico_desc', type: 'string', length: 250, nullable: true)]
    private ?string $dsHistoricoDesc = null;

    #[ORM\Column(name: 'cd_historico_juros', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdHistoricoJuros = null;

    #[ORM\Column(name: 'ds_historico_juros', type: 'string', length: 250, nullable: true)]
    private ?string $dsHistoricoJuros = null;

    #[ORM\Column(name: 'cd_conta_desc_cp', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaDescCp = 0;

    #[ORM\Column(name: 'cd_conta_multa_cp', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaMultaCp = 0;

    #[ORM\Column(name: 'cd_conta_juros_cp', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdContaJurosCp = 0;

    #[ORM\Column(name: 'ds_endereco_cedente', type: 'string', length: 255, nullable: true)]
    private ?string $dsEnderecoCedente = null;

    #[ORM\Column(name: 'sn_conta_bs2', type: 'boolean', options: ['default' => '0'])]
    private bool $snContaBs2 = false;

    #[ORM\Column(name: 'sn_conta_itau', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snContaItau = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_aceite', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snAceite = 'N';

    #[ORM\Column(name: 'ds_especie', type: 'string', length: 5, options: ['default' => 'DS'])]
    private string $dsEspecie = 'DS';

    #[ORM\Column(name: 'sn_utiliza_pix_bs2', type: 'boolean', options: ['default' => '0'])]
    private bool $snUtilizaPixBs2 = false;

    #[ORM\Column(name: 'sn_conta_sicredi', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snContaSicredi = 0;

    #[ORM\Column(name: 'sn_conta_sicoob', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snContaSicoob = 0;

    #[ORM\Column(name: 'sn_conta_banco_do_brasil', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snContaBancoDoBrasil = 0;

    #[ORM\Column(name: 'nr_variacao_carteira', type: 'string', length: 20, nullable: true)]
    private ?string $nrVariacaoCarteira = null;

    #[ORM\Column(name: 'nr_dias_limite_pagamento_apos_vencimento', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasLimitePagamentoAposVencimento = 0;

    #[ORM\Column(name: 'nr_posto', type: 'string', length: 2, nullable: true)]
    private ?string $nrPosto = null;

    // Sem construtor: 73 propriedades. Use os setters encadeados.

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
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

    public function getSnTodasColigadas(): int
    {
        return $this->snTodasColigadas;
    }

    public function setSnTodasColigadas(int $snTodasColigadas): self
    {
        $this->snTodasColigadas = $snTodasColigadas;
        return $this;
    }

    public function getDsCaixa(): ?string
    {
        return $this->dsCaixa;
    }

    public function setDsCaixa(?string $dsCaixa): self
    {
        $this->dsCaixa = $dsCaixa;
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

    public function getTpConta(): ?int
    {
        return $this->tpConta;
    }

    public function setTpConta(?int $tpConta): self
    {
        $this->tpConta = $tpConta;
        return $this;
    }

    public function getNmBanco(): ?string
    {
        return $this->nmBanco;
    }

    public function setNmBanco(?string $nmBanco): self
    {
        $this->nmBanco = $nmBanco;
        return $this;
    }

    public function getNrBanco(): ?string
    {
        return $this->nrBanco;
    }

    public function setNrBanco(?string $nrBanco): self
    {
        $this->nrBanco = $nrBanco;
        return $this;
    }

    public function getNrAgencia(): ?string
    {
        return $this->nrAgencia;
    }

    public function setNrAgencia(?string $nrAgencia): self
    {
        $this->nrAgencia = $nrAgencia;
        return $this;
    }

    public function getNmAgencia(): ?string
    {
        return $this->nmAgencia;
    }

    public function setNmAgencia(?string $nmAgencia): self
    {
        $this->nmAgencia = $nmAgencia;
        return $this;
    }

    public function getNrConta(): ?string
    {
        return $this->nrConta;
    }

    public function setNrConta(?string $nrConta): self
    {
        $this->nrConta = $nrConta;
        return $this;
    }

    public function getNrFloatBancario(): ?int
    {
        return $this->nrFloatBancario;
    }

    public function setNrFloatBancario(?int $nrFloatBancario): self
    {
        $this->nrFloatBancario = $nrFloatBancario;
        return $this;
    }

    public function getSnBaixaDiasUteis(): int
    {
        return $this->snBaixaDiasUteis;
    }

    public function setSnBaixaDiasUteis(int $snBaixaDiasUteis): self
    {
        $this->snBaixaDiasUteis = $snBaixaDiasUteis;
        return $this;
    }

    public function getDtCriacao(): ?\DateTimeInterface
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao(?\DateTimeInterface $dtCriacao): self
    {
        $this->dtCriacao = $dtCriacao;
        return $this;
    }

    public function getVlSaldoInicio(): ?float
    {
        return $this->vlSaldoInicio;
    }

    public function setVlSaldoInicio(?float $vlSaldoInicio): self
    {
        $this->vlSaldoInicio = $vlSaldoInicio;
        return $this;
    }

    public function getSnAtiva(): ?string
    {
        return $this->snAtiva;
    }

    public function setSnAtiva(?string $snAtiva): self
    {
        $this->snAtiva = $snAtiva;
        return $this;
    }

    public function isSnContaResultado(): bool
    {
        return $this->snContaResultado;
    }

    public function setSnContaResultado(bool $snContaResultado): self
    {
        $this->snContaResultado = $snContaResultado;
        return $this;
    }

    public function getNrUsoBanco(): ?string
    {
        return $this->nrUsoBanco;
    }

    public function setNrUsoBanco(?string $nrUsoBanco): self
    {
        $this->nrUsoBanco = $nrUsoBanco;
        return $this;
    }

    public function getDsMensagemBloqueto(): ?string
    {
        return $this->dsMensagemBloqueto;
    }

    public function setDsMensagemBloqueto(?string $dsMensagemBloqueto): self
    {
        $this->dsMensagemBloqueto = $dsMensagemBloqueto;
        return $this;
    }

    public function getSnMulta(): ?string
    {
        return $this->snMulta;
    }

    public function setSnMulta(?string $snMulta): self
    {
        $this->snMulta = $snMulta;
        return $this;
    }

    public function getSnJuros(): ?string
    {
        return $this->snJuros;
    }

    public function setSnJuros(?string $snJuros): self
    {
        $this->snJuros = $snJuros;
        return $this;
    }

    public function getSnCorrecao(): ?string
    {
        return $this->snCorrecao;
    }

    public function setSnCorrecao(?string $snCorrecao): self
    {
        $this->snCorrecao = $snCorrecao;
        return $this;
    }

    public function getSnJurosMensal(): ?string
    {
        return $this->snJurosMensal;
    }

    public function setSnJurosMensal(?string $snJurosMensal): self
    {
        $this->snJurosMensal = $snJurosMensal;
        return $this;
    }

    public function getVlMultaPercent(): ?float
    {
        return $this->vlMultaPercent;
    }

    public function setVlMultaPercent(?float $vlMultaPercent): self
    {
        $this->vlMultaPercent = $vlMultaPercent;
        return $this;
    }

    public function getVlJurosPercent(): ?float
    {
        return $this->vlJurosPercent;
    }

    public function setVlJurosPercent(?float $vlJurosPercent): self
    {
        $this->vlJurosPercent = $vlJurosPercent;
        return $this;
    }

    public function getVlJurosMensal(): ?float
    {
        return $this->vlJurosMensal;
    }

    public function setVlJurosMensal(?float $vlJurosMensal): self
    {
        $this->vlJurosMensal = $vlJurosMensal;
        return $this;
    }

    public function getNrDiasAcrescimo(): ?int
    {
        return $this->nrDiasAcrescimo;
    }

    public function setNrDiasAcrescimo(?int $nrDiasAcrescimo): self
    {
        $this->nrDiasAcrescimo = $nrDiasAcrescimo;
        return $this;
    }

    public function getNrDiasDesconto(): ?int
    {
        return $this->nrDiasDesconto;
    }

    public function setNrDiasDesconto(?int $nrDiasDesconto): self
    {
        $this->nrDiasDesconto = $nrDiasDesconto;
        return $this;
    }

    public function getVlDiasDescPerc(): ?float
    {
        return $this->vlDiasDescPerc;
    }

    public function setVlDiasDescPerc(?float $vlDiasDescPerc): self
    {
        $this->vlDiasDescPerc = $vlDiasDescPerc;
        return $this;
    }

    public function getNrCarteira(): ?string
    {
        return $this->nrCarteira;
    }

    public function setNrCarteira(?string $nrCarteira): self
    {
        $this->nrCarteira = $nrCarteira;
        return $this;
    }

    public function getNrConvenio(): ?string
    {
        return $this->nrConvenio;
    }

    public function setNrConvenio(?string $nrConvenio): self
    {
        $this->nrConvenio = $nrConvenio;
        return $this;
    }

    public function getNmCedente(): ?string
    {
        return $this->nmCedente;
    }

    public function setNmCedente(?string $nmCedente): self
    {
        $this->nmCedente = $nmCedente;
        return $this;
    }

    public function getDsCnpjCedente(): ?string
    {
        return $this->dsCnpjCedente;
    }

    public function setDsCnpjCedente(?string $dsCnpjCedente): self
    {
        $this->dsCnpjCedente = $dsCnpjCedente;
        return $this;
    }

    public function getNrTransacao(): ?string
    {
        return $this->nrTransacao;
    }

    public function setNrTransacao(?string $nrTransacao): self
    {
        $this->nrTransacao = $nrTransacao;
        return $this;
    }

    public function getDsIdentificacaoRetorno(): ?string
    {
        return $this->dsIdentificacaoRetorno;
    }

    public function setDsIdentificacaoRetorno(?string $dsIdentificacaoRetorno): self
    {
        $this->dsIdentificacaoRetorno = $dsIdentificacaoRetorno;
        return $this;
    }

    public function getNmArquivoBloqueto(): ?string
    {
        return $this->nmArquivoBloqueto;
    }

    public function setNmArquivoBloqueto(?string $nmArquivoBloqueto): self
    {
        $this->nmArquivoBloqueto = $nmArquivoBloqueto;
        return $this;
    }

    public function getDsNnPrefixo(): ?string
    {
        return $this->dsNnPrefixo;
    }

    public function setDsNnPrefixo(?string $dsNnPrefixo): self
    {
        $this->dsNnPrefixo = $dsNnPrefixo;
        return $this;
    }

    public function getNrUltimoCheque(): ?int
    {
        return $this->nrUltimoCheque;
    }

    public function setNrUltimoCheque(?int $nrUltimoCheque): self
    {
        $this->nrUltimoCheque = $nrUltimoCheque;
        return $this;
    }

    public function getDtSaldoBase(): ?\DateTimeInterface
    {
        return $this->dtSaldoBase;
    }

    public function setDtSaldoBase(?\DateTimeInterface $dtSaldoBase): self
    {
        $this->dtSaldoBase = $dtSaldoBase;
        return $this;
    }

    public function getNrNnUltimo(): ?int
    {
        return $this->nrNnUltimo;
    }

    public function setNrNnUltimo(?int $nrNnUltimo): self
    {
        $this->nrNnUltimo = $nrNnUltimo;
        return $this;
    }

    public function getNrNnTamanho(): ?int
    {
        return $this->nrNnTamanho;
    }

    public function setNrNnTamanho(?int $nrNnTamanho): self
    {
        $this->nrNnTamanho = $nrNnTamanho;
        return $this;
    }

    public function getCdBoletoOnline(): ?int
    {
        return $this->cdBoletoOnline;
    }

    public function setCdBoletoOnline(?int $cdBoletoOnline): self
    {
        $this->cdBoletoOnline = $cdBoletoOnline;
        return $this;
    }

    public function getCdPlanoConta(): ?int
    {
        return $this->cdPlanoConta;
    }

    public function setCdPlanoConta(?int $cdPlanoConta): self
    {
        $this->cdPlanoConta = $cdPlanoConta;
        return $this;
    }

    public function getCdContaDesconto(): ?int
    {
        return $this->cdContaDesconto;
    }

    public function setCdContaDesconto(?int $cdContaDesconto): self
    {
        $this->cdContaDesconto = $cdContaDesconto;
        return $this;
    }

    public function getCdContaAcrescimo(): ?int
    {
        return $this->cdContaAcrescimo;
    }

    public function setCdContaAcrescimo(?int $cdContaAcrescimo): self
    {
        $this->cdContaAcrescimo = $cdContaAcrescimo;
        return $this;
    }

    public function getSnSaldoDisponivel(): ?int
    {
        return $this->snSaldoDisponivel;
    }

    public function setSnSaldoDisponivel(?int $snSaldoDisponivel): self
    {
        $this->snSaldoDisponivel = $snSaldoDisponivel;
        return $this;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getCdContaTarifa(): ?int
    {
        return $this->cdContaTarifa;
    }

    public function setCdContaTarifa(?int $cdContaTarifa): self
    {
        $this->cdContaTarifa = $cdContaTarifa;
        return $this;
    }

    public function getCdCentroTarifa(): ?int
    {
        return $this->cdCentroTarifa;
    }

    public function setCdCentroTarifa(?int $cdCentroTarifa): self
    {
        $this->cdCentroTarifa = $cdCentroTarifa;
        return $this;
    }

    public function getDsGrupoCategoria(): ?string
    {
        return $this->dsGrupoCategoria;
    }

    public function setDsGrupoCategoria(?string $dsGrupoCategoria): self
    {
        $this->dsGrupoCategoria = $dsGrupoCategoria;
        return $this;
    }

    public function isSnTransfAberta(): ?bool
    {
        return $this->snTransfAberta;
    }

    public function setSnTransfAberta(?bool $snTransfAberta): self
    {
        $this->snTransfAberta = $snTransfAberta;
        return $this;
    }

    public function isSnIgnorarDda(): ?bool
    {
        return $this->snIgnorarDda;
    }

    public function setSnIgnorarDda(?bool $snIgnorarDda): self
    {
        $this->snIgnorarDda = $snIgnorarDda;
        return $this;
    }

    public function getCdHistoricoBaixa(): ?int
    {
        return $this->cdHistoricoBaixa;
    }

    public function setCdHistoricoBaixa(?int $cdHistoricoBaixa): self
    {
        $this->cdHistoricoBaixa = $cdHistoricoBaixa;
        return $this;
    }

    public function getDsHistoricoBaixa(): ?string
    {
        return $this->dsHistoricoBaixa;
    }

    public function setDsHistoricoBaixa(?string $dsHistoricoBaixa): self
    {
        $this->dsHistoricoBaixa = $dsHistoricoBaixa;
        return $this;
    }

    public function getCdHistoricoDesc(): ?int
    {
        return $this->cdHistoricoDesc;
    }

    public function setCdHistoricoDesc(?int $cdHistoricoDesc): self
    {
        $this->cdHistoricoDesc = $cdHistoricoDesc;
        return $this;
    }

    public function getDsHistoricoDesc(): ?string
    {
        return $this->dsHistoricoDesc;
    }

    public function setDsHistoricoDesc(?string $dsHistoricoDesc): self
    {
        $this->dsHistoricoDesc = $dsHistoricoDesc;
        return $this;
    }

    public function getCdHistoricoJuros(): ?int
    {
        return $this->cdHistoricoJuros;
    }

    public function setCdHistoricoJuros(?int $cdHistoricoJuros): self
    {
        $this->cdHistoricoJuros = $cdHistoricoJuros;
        return $this;
    }

    public function getDsHistoricoJuros(): ?string
    {
        return $this->dsHistoricoJuros;
    }

    public function setDsHistoricoJuros(?string $dsHistoricoJuros): self
    {
        $this->dsHistoricoJuros = $dsHistoricoJuros;
        return $this;
    }

    public function getCdContaDescCp(): ?int
    {
        return $this->cdContaDescCp;
    }

    public function setCdContaDescCp(?int $cdContaDescCp): self
    {
        $this->cdContaDescCp = $cdContaDescCp;
        return $this;
    }

    public function getCdContaMultaCp(): ?int
    {
        return $this->cdContaMultaCp;
    }

    public function setCdContaMultaCp(?int $cdContaMultaCp): self
    {
        $this->cdContaMultaCp = $cdContaMultaCp;
        return $this;
    }

    public function getCdContaJurosCp(): ?int
    {
        return $this->cdContaJurosCp;
    }

    public function setCdContaJurosCp(?int $cdContaJurosCp): self
    {
        $this->cdContaJurosCp = $cdContaJurosCp;
        return $this;
    }

    public function getDsEnderecoCedente(): ?string
    {
        return $this->dsEnderecoCedente;
    }

    public function setDsEnderecoCedente(?string $dsEnderecoCedente): self
    {
        $this->dsEnderecoCedente = $dsEnderecoCedente;
        return $this;
    }

    public function isSnContaBs2(): bool
    {
        return $this->snContaBs2;
    }

    public function setSnContaBs2(bool $snContaBs2): self
    {
        $this->snContaBs2 = $snContaBs2;
        return $this;
    }

    public function isSnContaItau(): ?bool
    {
        return $this->snContaItau;
    }

    public function setSnContaItau(?bool $snContaItau): self
    {
        $this->snContaItau = $snContaItau;
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

    public function getSnAceite(): string
    {
        return $this->snAceite;
    }

    public function setSnAceite(string $snAceite): self
    {
        $this->snAceite = $snAceite;
        return $this;
    }

    public function getDsEspecie(): string
    {
        return $this->dsEspecie;
    }

    public function setDsEspecie(string $dsEspecie): self
    {
        $this->dsEspecie = $dsEspecie;
        return $this;
    }

    public function isSnUtilizaPixBs2(): bool
    {
        return $this->snUtilizaPixBs2;
    }

    public function setSnUtilizaPixBs2(bool $snUtilizaPixBs2): self
    {
        $this->snUtilizaPixBs2 = $snUtilizaPixBs2;
        return $this;
    }

    public function getSnContaSicredi(): ?int
    {
        return $this->snContaSicredi;
    }

    public function setSnContaSicredi(?int $snContaSicredi): self
    {
        $this->snContaSicredi = $snContaSicredi;
        return $this;
    }

    public function getSnContaSicoob(): ?int
    {
        return $this->snContaSicoob;
    }

    public function setSnContaSicoob(?int $snContaSicoob): self
    {
        $this->snContaSicoob = $snContaSicoob;
        return $this;
    }

    public function getSnContaBancoDoBrasil(): ?int
    {
        return $this->snContaBancoDoBrasil;
    }

    public function setSnContaBancoDoBrasil(?int $snContaBancoDoBrasil): self
    {
        $this->snContaBancoDoBrasil = $snContaBancoDoBrasil;
        return $this;
    }

    public function getNrVariacaoCarteira(): ?string
    {
        return $this->nrVariacaoCarteira;
    }

    public function setNrVariacaoCarteira(?string $nrVariacaoCarteira): self
    {
        $this->nrVariacaoCarteira = $nrVariacaoCarteira;
        return $this;
    }

    public function getNrDiasLimitePagamentoAposVencimento(): ?int
    {
        return $this->nrDiasLimitePagamentoAposVencimento;
    }

    public function setNrDiasLimitePagamentoAposVencimento(?int $nrDiasLimitePagamentoAposVencimento): self
    {
        $this->nrDiasLimitePagamentoAposVencimento = $nrDiasLimitePagamentoAposVencimento;
        return $this;
    }

    public function getNrPosto(): ?string
    {
        return $this->nrPosto;
    }

    public function setNrPosto(?string $nrPosto): self
    {
        $this->nrPosto = $nrPosto;
        return $this;
    }
}
