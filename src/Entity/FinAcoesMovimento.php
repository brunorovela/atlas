<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinAcoesMovimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinAcoesMovimentoRepository::class)]
#[ORM\Table(
    name: 'fin_acoes_movimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ixAcaoAutomatica', columns: ['cd_acao_automatica'])]
#[ORM\Index(name: 'IX_CD_TIPO_ACAO', columns: ['cd_tipo_acao'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_CAIXA', columns: ['cd_movimento_caixa'])]
#[ORM\Index(name: 'IX_CD_ACAO_AUTOMATICA', columns: ['cd_acao_automatica'])]
#[ORM\Index(name: 'IX_CD_PLANO_CONTA', columns: ['cd_plano_conta'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_ESTORNO', columns: ['cd_movimento_estorno'])]
#[ORM\Index(name: 'idx_fam_tipo_dias_acao', columns: ['cd_tipo_acao', 'nr_dias_prazo_desconto', 'cd_acao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_fin_acoes_movimento_fin_acoes_automaticas', 'colunas' => ['cd_acao_automatica'], 'tabelaAlvo' => 'fin_acoes_automaticas', 'colunasAlvo' => ['cd_acao_auto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_fin_acoes_movimento_fin_acoes_tipos', 'colunas' => ['cd_tipo_acao'], 'tabelaAlvo' => 'fin_acoes_tipos', 'colunasAlvo' => ['cd_tipo_acao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinAcoesMovimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAcao = null;

    #[ORM\ManyToOne(targetEntity: FinAcoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_acao', referencedColumnName: 'cd_tipo_acao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinAcoesTipos $cdTipoAcao = null;

    #[ORM\Column(name: 'cd_movimento_caixa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdMovimentoCaixa = 0;

    #[ORM\Column(name: 'sn_ativo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAtivo = null;

    #[ORM\Column(name: 'cd_origem', type: 'smallint', nullable: true)]
    private ?int $cdOrigem = null;

    #[ORM\Column(name: 'tp_entrada_saida', type: 'smallint', nullable: true)]
    private ?int $tpEntradaSaida = null;

    #[ORM\Column(name: 'cd_movimento_estorno', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMovimentoEstorno = null;

    #[ORM\ManyToOne(targetEntity: FinAcoesAutomaticas::class)]
    #[ORM\JoinColumn(name: 'cd_acao_automatica', referencedColumnName: 'cd_acao_auto', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinAcoesAutomaticas $cdAcaoAutomatica = null;

    #[ORM\Column(name: 'cd_plano_conta', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPlanoConta = 0;

    #[ORM\Column(name: 'cd_historico_baixa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdHistoricoBaixa = 0;

    #[ORM\Column(name: 'ds_historico_baixa', type: 'string', length: 250, nullable: true)]
    private ?string $dsHistoricoBaixa = null;

    #[ORM\Column(name: 'vl_perc_desconto', type: 'float', nullable: true)]
    private ?float $vlPercDesconto = null;

    #[ORM\Column(name: 'sn_altera_desconto', type: 'boolean', nullable: true)]
    private ?bool $snAlteraDesconto = null;

    #[ORM\Column(name: 'sn_desconto_valor_fixo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDescontoValorFixo = false;

    #[ORM\Column(name: 'sn_oculta_no_contrato', type: 'boolean', options: ['default' => '0'])]
    private bool $snOcultaNoContrato = false;

    #[ORM\Column(name: 'sn_integrar_principia', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrarPrincipia = false;

    #[ORM\Column(name: 'nr_dias_prazo_desconto', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasPrazoDesconto = 0;

    public function __construct(
        ?string $dsAcao = null,
        ?FinAcoesTipos $cdTipoAcao = null,
        ?int $cdMovimentoCaixa = 0,
        ?string $snAtivo = null,
        ?int $cdOrigem = null,
        ?int $tpEntradaSaida = null,
        ?int $cdMovimentoEstorno = null,
        ?FinAcoesAutomaticas $cdAcaoAutomatica = null,
        ?int $cdPlanoConta = 0,
        ?int $cdHistoricoBaixa = 0,
        ?string $dsHistoricoBaixa = null,
        ?float $vlPercDesconto = null,
        ?bool $snAlteraDesconto = null,
        ?bool $snDescontoValorFixo = false,
        bool $snOcultaNoContrato = false,
        bool $snIntegrarPrincipia = false,
        ?int $nrDiasPrazoDesconto = 0
    ) {
        $this->dsAcao = $dsAcao;
        $this->cdTipoAcao = $cdTipoAcao;
        $this->cdMovimentoCaixa = $cdMovimentoCaixa;
        $this->snAtivo = $snAtivo;
        $this->cdOrigem = $cdOrigem;
        $this->tpEntradaSaida = $tpEntradaSaida;
        $this->cdMovimentoEstorno = $cdMovimentoEstorno;
        $this->cdAcaoAutomatica = $cdAcaoAutomatica;
        $this->cdPlanoConta = $cdPlanoConta;
        $this->cdHistoricoBaixa = $cdHistoricoBaixa;
        $this->dsHistoricoBaixa = $dsHistoricoBaixa;
        $this->vlPercDesconto = $vlPercDesconto;
        $this->snAlteraDesconto = $snAlteraDesconto;
        $this->snDescontoValorFixo = $snDescontoValorFixo;
        $this->snOcultaNoContrato = $snOcultaNoContrato;
        $this->snIntegrarPrincipia = $snIntegrarPrincipia;
        $this->nrDiasPrazoDesconto = $nrDiasPrazoDesconto;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function getCdTipoAcao(): ?FinAcoesTipos
    {
        return $this->cdTipoAcao;
    }

    public function setCdTipoAcao(?FinAcoesTipos $cdTipoAcao): self
    {
        $this->cdTipoAcao = $cdTipoAcao;
        return $this;
    }

    public function getCdMovimentoCaixa(): ?int
    {
        return $this->cdMovimentoCaixa;
    }

    public function setCdMovimentoCaixa(?int $cdMovimentoCaixa): self
    {
        $this->cdMovimentoCaixa = $cdMovimentoCaixa;
        return $this;
    }

    public function getSnAtivo(): ?string
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?string $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getTpEntradaSaida(): ?int
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?int $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
        return $this;
    }

    public function getCdMovimentoEstorno(): ?int
    {
        return $this->cdMovimentoEstorno;
    }

    public function setCdMovimentoEstorno(?int $cdMovimentoEstorno): self
    {
        $this->cdMovimentoEstorno = $cdMovimentoEstorno;
        return $this;
    }

    public function getCdAcaoAutomatica(): ?FinAcoesAutomaticas
    {
        return $this->cdAcaoAutomatica;
    }

    public function setCdAcaoAutomatica(?FinAcoesAutomaticas $cdAcaoAutomatica): self
    {
        $this->cdAcaoAutomatica = $cdAcaoAutomatica;
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

    public function getVlPercDesconto(): ?float
    {
        return $this->vlPercDesconto;
    }

    public function setVlPercDesconto(?float $vlPercDesconto): self
    {
        $this->vlPercDesconto = $vlPercDesconto;
        return $this;
    }

    public function isSnAlteraDesconto(): ?bool
    {
        return $this->snAlteraDesconto;
    }

    public function setSnAlteraDesconto(?bool $snAlteraDesconto): self
    {
        $this->snAlteraDesconto = $snAlteraDesconto;
        return $this;
    }

    public function isSnDescontoValorFixo(): ?bool
    {
        return $this->snDescontoValorFixo;
    }

    public function setSnDescontoValorFixo(?bool $snDescontoValorFixo): self
    {
        $this->snDescontoValorFixo = $snDescontoValorFixo;
        return $this;
    }

    public function isSnOcultaNoContrato(): bool
    {
        return $this->snOcultaNoContrato;
    }

    public function setSnOcultaNoContrato(bool $snOcultaNoContrato): self
    {
        $this->snOcultaNoContrato = $snOcultaNoContrato;
        return $this;
    }

    public function isSnIntegrarPrincipia(): bool
    {
        return $this->snIntegrarPrincipia;
    }

    public function setSnIntegrarPrincipia(bool $snIntegrarPrincipia): self
    {
        $this->snIntegrarPrincipia = $snIntegrarPrincipia;
        return $this;
    }

    public function getNrDiasPrazoDesconto(): ?int
    {
        return $this->nrDiasPrazoDesconto;
    }

    public function setNrDiasPrazoDesconto(?int $nrDiasPrazoDesconto): self
    {
        $this->nrDiasPrazoDesconto = $nrDiasPrazoDesconto;
        return $this;
    }
}
