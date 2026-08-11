<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosPgtoParcelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoParcelasRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_parcelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_ACAO_MOV_COND', columns: ['cd_acao_mov_desc_condicional'])]
#[ORM\Index(name: 'IX_CD_ACAO_MOV_FIXO', columns: ['cd_acao_mov_desc_fixo'])]
class FinPlanosPgtoParcelas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_parcela', type: 'integer')]
    private ?int $cdPlanoParcela = null;

    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'ds_parcelas', type: 'string', length: 255, nullable: true)]
    private ?string $dsParcelas = null;

    #[ORM\Column(name: 'vl_parcelas', type: 'float')]
    private ?float $vlParcelas = null;

    #[ORM\Column(name: 'vl_desconto_condicional', type: 'float', nullable: true)]
    private ?float $vlDescontoCondicional = null;

    #[ORM\Column(name: 'cd_acao_mov_desc_condicional', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcaoMovDescCondicional = null;

    #[ORM\Column(name: 'vl_desconto_fixo', type: 'float', nullable: true)]
    private ?float $vlDescontoFixo = null;

    #[ORM\Column(name: 'cd_acao_mov_desc_fixo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcaoMovDescFixo = null;

    #[ORM\Column(name: 'ds_tipo_parcela', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipoParcela = null;

    #[ORM\Column(name: 'sn_credito', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snCredito = 0;

    #[ORM\Column(name: 'nr_credito_minimo', type: 'float', nullable: true)]
    private ?float $nrCreditoMinimo = null;

    #[ORM\Column(name: 'nr_parcela_inicial', type: 'integer', nullable: true)]
    private ?int $nrParcelaInicial = null;

    #[ORM\Column(name: 'tp_vencimento', type: TinyIntType::NAME, nullable: true)]
    private ?int $tpVencimento = null;

    #[ORM\Column(name: 'tp_operacao_vencimento', type: TinyIntType::NAME, nullable: true)]
    private ?int $tpOperacaoVencimento = null;

    #[ORM\Column(name: 'nr_dias_vencimento', type: 'integer', nullable: true)]
    private ?int $nrDiasVencimento = null;

    #[ORM\Column(name: 'nr_mes_1semestre', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrMes1semestre = null;

    #[ORM\Column(name: 'nr_mes_2semestre', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrMes2semestre = null;

    #[ORM\Column(name: 'vl_extra', type: 'float', nullable: true)]
    private ?float $vlExtra = null;

    #[ORM\Column(name: 'sn_limitar_vencto_fim_turma', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snLimitarVenctoFimTurma = 0;

    #[ORM\Column(name: 'sn_opcional', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snOpcional = 0;

    #[ORM\Column(name: 'nr_qtd_parcelas_padrao', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $nrQtdParcelasPadrao = 0;

    #[ORM\Column(name: 'nr_parcelas_sem_financiamento', type: 'integer', nullable: true)]
    private ?int $nrParcelasSemFinanciamento = null;

    #[ORM\Column(name: 'nr_tipo_ano_parcelas', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => 'As opções possíveis atualmente são:
1 - Ano da turma
2 - Ano da matrícula'])]
    private int $nrTipoAnoParcelas = 1;

    #[ORM\Column(name: 'sn_desc_condicional_percentual', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snDescCondicionalPercentual = 1;

    #[ORM\Column(name: 'sn_desc_fixo_percentual', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snDescFixoPercentual = 1;

    #[ORM\Column(name: 'cd_plano_parcela_anterior', type: 'integer', nullable: true)]
    private ?int $cdPlanoParcelaAnterior = null;

    #[ORM\Column(name: 'nr_meses_vencimento', type: 'integer', nullable: true)]
    private ?int $nrMesesVencimento = null;

    #[ORM\Column(name: 'sn_credito_minimo_fixo', type: 'boolean', options: ['default' => '0'])]
    private bool $snCreditoMinimoFixo = false;

    #[ORM\Column(name: 'nr_parcelas_valor_fixo', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrParcelasValorFixo = null;

    #[ORM\Column(name: 'vl_parcelas_valor_fixo', type: 'float', nullable: true)]
    private ?float $vlParcelasValorFixo = null;

    // Sem construtor: 31 propriedades. Use os setters encadeados.

    public function getCdPlanoParcela(): ?int
    {
        return $this->cdPlanoParcela;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsParcelas(): ?string
    {
        return $this->dsParcelas;
    }

    public function setDsParcelas(?string $dsParcelas): self
    {
        $this->dsParcelas = $dsParcelas;
        return $this;
    }

    public function getVlParcelas(): ?float
    {
        return $this->vlParcelas;
    }

    public function setVlParcelas(?float $vlParcelas): self
    {
        $this->vlParcelas = $vlParcelas;
        return $this;
    }

    public function getVlDescontoCondicional(): ?float
    {
        return $this->vlDescontoCondicional;
    }

    public function setVlDescontoCondicional(?float $vlDescontoCondicional): self
    {
        $this->vlDescontoCondicional = $vlDescontoCondicional;
        return $this;
    }

    public function getCdAcaoMovDescCondicional(): ?int
    {
        return $this->cdAcaoMovDescCondicional;
    }

    public function setCdAcaoMovDescCondicional(?int $cdAcaoMovDescCondicional): self
    {
        $this->cdAcaoMovDescCondicional = $cdAcaoMovDescCondicional;
        return $this;
    }

    public function getVlDescontoFixo(): ?float
    {
        return $this->vlDescontoFixo;
    }

    public function setVlDescontoFixo(?float $vlDescontoFixo): self
    {
        $this->vlDescontoFixo = $vlDescontoFixo;
        return $this;
    }

    public function getCdAcaoMovDescFixo(): ?int
    {
        return $this->cdAcaoMovDescFixo;
    }

    public function setCdAcaoMovDescFixo(?int $cdAcaoMovDescFixo): self
    {
        $this->cdAcaoMovDescFixo = $cdAcaoMovDescFixo;
        return $this;
    }

    public function getDsTipoParcela(): ?string
    {
        return $this->dsTipoParcela;
    }

    public function setDsTipoParcela(?string $dsTipoParcela): self
    {
        $this->dsTipoParcela = $dsTipoParcela;
        return $this;
    }

    public function getSnCredito(): int
    {
        return $this->snCredito;
    }

    public function setSnCredito(int $snCredito): self
    {
        $this->snCredito = $snCredito;
        return $this;
    }

    public function getNrCreditoMinimo(): ?float
    {
        return $this->nrCreditoMinimo;
    }

    public function setNrCreditoMinimo(?float $nrCreditoMinimo): self
    {
        $this->nrCreditoMinimo = $nrCreditoMinimo;
        return $this;
    }

    public function getNrParcelaInicial(): ?int
    {
        return $this->nrParcelaInicial;
    }

    public function setNrParcelaInicial(?int $nrParcelaInicial): self
    {
        $this->nrParcelaInicial = $nrParcelaInicial;
        return $this;
    }

    public function getTpVencimento(): ?int
    {
        return $this->tpVencimento;
    }

    public function setTpVencimento(?int $tpVencimento): self
    {
        $this->tpVencimento = $tpVencimento;
        return $this;
    }

    public function getTpOperacaoVencimento(): ?int
    {
        return $this->tpOperacaoVencimento;
    }

    public function setTpOperacaoVencimento(?int $tpOperacaoVencimento): self
    {
        $this->tpOperacaoVencimento = $tpOperacaoVencimento;
        return $this;
    }

    public function getNrDiasVencimento(): ?int
    {
        return $this->nrDiasVencimento;
    }

    public function setNrDiasVencimento(?int $nrDiasVencimento): self
    {
        $this->nrDiasVencimento = $nrDiasVencimento;
        return $this;
    }

    public function getNrMes1semestre(): ?int
    {
        return $this->nrMes1semestre;
    }

    public function setNrMes1semestre(?int $nrMes1semestre): self
    {
        $this->nrMes1semestre = $nrMes1semestre;
        return $this;
    }

    public function getNrMes2semestre(): ?int
    {
        return $this->nrMes2semestre;
    }

    public function setNrMes2semestre(?int $nrMes2semestre): self
    {
        $this->nrMes2semestre = $nrMes2semestre;
        return $this;
    }

    public function getVlExtra(): ?float
    {
        return $this->vlExtra;
    }

    public function setVlExtra(?float $vlExtra): self
    {
        $this->vlExtra = $vlExtra;
        return $this;
    }

    public function getSnLimitarVenctoFimTurma(): int
    {
        return $this->snLimitarVenctoFimTurma;
    }

    public function setSnLimitarVenctoFimTurma(int $snLimitarVenctoFimTurma): self
    {
        $this->snLimitarVenctoFimTurma = $snLimitarVenctoFimTurma;
        return $this;
    }

    public function getSnOpcional(): int
    {
        return $this->snOpcional;
    }

    public function setSnOpcional(int $snOpcional): self
    {
        $this->snOpcional = $snOpcional;
        return $this;
    }

    public function getNrQtdParcelasPadrao(): int
    {
        return $this->nrQtdParcelasPadrao;
    }

    public function setNrQtdParcelasPadrao(int $nrQtdParcelasPadrao): self
    {
        $this->nrQtdParcelasPadrao = $nrQtdParcelasPadrao;
        return $this;
    }

    public function getNrParcelasSemFinanciamento(): ?int
    {
        return $this->nrParcelasSemFinanciamento;
    }

    public function setNrParcelasSemFinanciamento(?int $nrParcelasSemFinanciamento): self
    {
        $this->nrParcelasSemFinanciamento = $nrParcelasSemFinanciamento;
        return $this;
    }

    public function getNrTipoAnoParcelas(): int
    {
        return $this->nrTipoAnoParcelas;
    }

    public function setNrTipoAnoParcelas(int $nrTipoAnoParcelas): self
    {
        $this->nrTipoAnoParcelas = $nrTipoAnoParcelas;
        return $this;
    }

    public function getSnDescCondicionalPercentual(): int
    {
        return $this->snDescCondicionalPercentual;
    }

    public function setSnDescCondicionalPercentual(int $snDescCondicionalPercentual): self
    {
        $this->snDescCondicionalPercentual = $snDescCondicionalPercentual;
        return $this;
    }

    public function getSnDescFixoPercentual(): int
    {
        return $this->snDescFixoPercentual;
    }

    public function setSnDescFixoPercentual(int $snDescFixoPercentual): self
    {
        $this->snDescFixoPercentual = $snDescFixoPercentual;
        return $this;
    }

    public function getCdPlanoParcelaAnterior(): ?int
    {
        return $this->cdPlanoParcelaAnterior;
    }

    public function setCdPlanoParcelaAnterior(?int $cdPlanoParcelaAnterior): self
    {
        $this->cdPlanoParcelaAnterior = $cdPlanoParcelaAnterior;
        return $this;
    }

    public function getNrMesesVencimento(): ?int
    {
        return $this->nrMesesVencimento;
    }

    public function setNrMesesVencimento(?int $nrMesesVencimento): self
    {
        $this->nrMesesVencimento = $nrMesesVencimento;
        return $this;
    }

    public function isSnCreditoMinimoFixo(): bool
    {
        return $this->snCreditoMinimoFixo;
    }

    public function setSnCreditoMinimoFixo(bool $snCreditoMinimoFixo): self
    {
        $this->snCreditoMinimoFixo = $snCreditoMinimoFixo;
        return $this;
    }

    public function getNrParcelasValorFixo(): ?int
    {
        return $this->nrParcelasValorFixo;
    }

    public function setNrParcelasValorFixo(?int $nrParcelasValorFixo): self
    {
        $this->nrParcelasValorFixo = $nrParcelasValorFixo;
        return $this;
    }

    public function getVlParcelasValorFixo(): ?float
    {
        return $this->vlParcelasValorFixo;
    }

    public function setVlParcelasValorFixo(?float $vlParcelasValorFixo): self
    {
        $this->vlParcelasValorFixo = $vlParcelasValorFixo;
        return $this;
    }
}
