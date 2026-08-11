<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesRepository::class)]
#[ORM\Table(
    name: 'mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_mensalidade', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_PARCELA', columns: ['parcela'])]
#[ORM\Index(name: 'IX_DATAVENCIMENTO', columns: ['datavencimento'])]
#[ORM\Index(name: 'IX_DT_COMPETENCIA', columns: ['dt_competencia'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_DATAPAGAMENTO', columns: ['datapagamento'])]
#[ORM\Index(name: 'IX_DT_CREDITO', columns: ['dt_credito'])]
#[ORM\Index(name: 'IX_SITUACAO', columns: ['situacao'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_CD_RECIBO', columns: ['cd_recibo'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE_ORIGEM', columns: ['cd_mensalidade_origem'])]
#[ORM\Index(name: 'IX_CD_RESP', columns: ['cd_resp'])]
#[ORM\Index(name: 'IX_TIPOPARCELA', columns: ['tipoparcela'])]
#[ORM\Index(name: 'IX_SN_NFE_GERADA', columns: ['sn_nfe_gerada'])]
#[ORM\Index(name: 'IX_CD_CENTRO_CUSTO', columns: ['cd_centro_custo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_NOSSONUMERO', columns: ['nossonumero'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_NF', columns: ['nr_nf'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_CHEQUE_DEVOLVIDO', columns: ['cd_cheque_devolvido'])]
#[ORM\Index(name: 'IX_CD_PLANO_PARCELA', columns: ['cd_plano_parcela'])]
#[ORM\Index(name: 'IX_DATAEMISSAO', columns: ['dataemissao'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_DEPTO', columns: ['depto'])]
class Mensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'codigoaluno', type: 'integer', nullable: true)]
    private ?int $codigoaluno = null;

    #[ORM\Column(name: 'parcela', type: 'smallint', nullable: true)]
    private ?int $parcela = null;

    #[ORM\Column(name: 'datavencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $datavencimento = null;

    #[ORM\Column(name: 'ds_datavencimento_original', type: 'string', length: 255, nullable: true, options: ['comment' => 'Vencimento original criptografado do titulo integrado com o Receita Garantida. FOR-525'])]
    private ?string $dsDatavencimentoOriginal = null;

    #[ORM\Column(name: 'dt_competencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCompetencia = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'dataemissao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dataemissao = null;

    #[ORM\Column(name: 'nossonumero', type: 'string', length: 30, nullable: true)]
    private ?string $nossonumero = null;

    #[ORM\Column(name: 'cd_desc_condicional', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDescCondicional = null;

    #[ORM\Column(name: 'valorbruto', type: 'float', nullable: true)]
    private ?float $valorbruto = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $cdTipoTitulo = 0;

    #[ORM\Column(name: 'valordesconto', type: 'float', nullable: true)]
    private ?float $valordesconto = null;

    #[ORM\Column(name: 'ds_obs_desc', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObsDesc = null;

    #[ORM\Column(name: 'descontoextra', type: 'float', nullable: true)]
    private ?float $descontoextra = null;

    #[ORM\Column(name: 'valorextra', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $valorextra = 0.0;

    #[ORM\Column(name: 'VALORTOTAL', type: 'float', nullable: true)]
    private ?float $valortotal = null;

    #[ORM\Column(name: 'valorjuros', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $valorjuros = 0.0;

    #[ORM\Column(name: 'valorjuros_fixo', type: 'float', nullable: true)]
    private ?float $valorjurosFixo = null;

    #[ORM\Column(name: 'valordesconto_fixo', type: 'float', nullable: true)]
    private ?float $valordescontoFixo = null;

    #[ORM\Column(name: 'valorpago', type: 'float', nullable: true)]
    private ?float $valorpago = null;

    #[ORM\Column(name: 'vl_faturamento', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlFaturamento = null;

    #[ORM\Column(name: 'datapagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $datapagamento = null;

    #[ORM\Column(name: 'dt_credito', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCredito = null;

    #[ORM\Column(name: 'situacao', type: 'smallint', nullable: true)]
    private ?int $situacao = null;

    #[ORM\Column(name: 'usuario', type: 'string', length: 30, nullable: true)]
    private ?string $usuario = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdUsuario = 0;

    #[ORM\Column(name: 'bloqueto', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $bloqueto = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'databasecorrecao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $databasecorrecao = null;

    #[ORM\Column(name: 'indicecorrecao', type: 'float', nullable: true)]
    private ?float $indicecorrecao = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15, nullable: true)]
    private ?string $curso = null;

    #[ORM\Column(name: 'depto', type: 'smallint', nullable: true)]
    private ?int $depto = null;

    #[ORM\Column(name: 'tipoparcela', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $tipoparcela = 0;

    #[ORM\Column(name: 'ocorrencia_remessa', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $ocorrenciaRemessa = 0;

    #[ORM\Column(name: 'ocorrencia_retorno', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $ocorrenciaRetorno = 0;

    #[ORM\Column(name: 'sn_credito_parcela', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snCreditoParcela = 'N';

    #[ORM\Column(name: 'nr_creditos', type: 'float', nullable: true)]
    private ?float $nrCreditos = null;

    #[ORM\Column(name: 'cd_mensalidade_origem', type: 'integer', nullable: true)]
    private ?int $cdMensalidadeOrigem = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'cd_centro_custo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCentroCusto = 0;

    #[ORM\Column(name: 'cd_plano_conta', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPlanoConta = 0;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 150)]
    private ?string $dsHistorico = null;

    #[ORM\Column(name: 'sn_liberar_juros', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snLiberarJuros = 0;

    #[ORM\Column(name: 'sn_liberar_descontos', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snLiberarDescontos = 0;

    #[ORM\Column(name: 'cd_boleto', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdBoleto = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'vl_pago_moeda', type: 'float', nullable: true)]
    private ?float $vlPagoMoeda = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true)]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'cd_moeda', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdMoeda = 0;

    #[ORM\Column(name: 'cd_moeda_pgto', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdMoedaPgto = 0;

    #[ORM\Column(name: 'CodigoCarta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $codigocarta = null;

    #[ORM\Column(name: 'cd_bolsa', type: 'integer', nullable: true)]
    private ?int $cdBolsa = null;

    #[ORM\Column(name: 'cd_item_plano', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdItemPlano = null;

    #[ORM\Column(name: 'vl_credito', type: 'float', nullable: true)]
    private ?float $vlCredito = null;

    #[ORM\Column(name: 'cd_recibo', type: 'integer', nullable: true)]
    private ?int $cdRecibo = null;

    #[ORM\Column(name: 'nr_nf', type: 'bigint', nullable: true, options: ['unsigned' => true])]
    private ?string $nrNf = null;

    #[ORM\Column(name: 'cd_cheque_devolvido', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdChequeDevolvido = 0;

    #[ORM\Column(name: 'ds_deposito', type: 'string', length: 50, nullable: true)]
    private ?string $dsDeposito = null;

    #[ORM\Column(name: 'sn_nfe_gerada', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNfeGerada = false;

    #[ORM\Column(name: 'cd_autenticacao', type: 'string', length: 50, nullable: true)]
    private ?string $cdAutenticacao = null;

    #[ORM\Column(name: 'cd_resp_nfse', type: 'integer', nullable: true)]
    private ?int $cdRespNfse = null;

    #[ORM\Column(name: 'ds_autentica_impressao', type: 'string', length: 50, nullable: true)]
    private ?string $dsAutenticaImpressao = null;

    #[ORM\Column(name: 'VL_PERCENTUAL_DIVISAO', type: 'float', options: ['default' => '100.00'])]
    private float $vlPercentualDivisao = 100.0;

    #[ORM\Column(name: 'vl_perc_desc_fixo', type: 'float', nullable: true)]
    private ?float $vlPercDescFixo = null;

    #[ORM\Column(name: 'vl_perc_desc_cond', type: 'float', nullable: true)]
    private ?float $vlPercDescCond = null;

    #[ORM\Column(name: 'sn_tipo_nota', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snTipoNota = null;

    #[ORM\Column(name: 'cd_plano_parcela', type: 'integer', nullable: true)]
    private ?int $cdPlanoParcela = null;

    #[ORM\Column(name: 'cd_disciplina_exame_recurso', type: 'integer', nullable: true)]
    private ?int $cdDisciplinaExameRecurso = null;

    #[ORM\Column(name: 'nr_parcelas_operadora', type: 'integer', nullable: true)]
    private ?int $nrParcelasOperadora = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_vencimento_original', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimentoOriginal = null;

    // Sem construtor: 71 propriedades. Use os setters encadeados.

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function getCodigoaluno(): ?int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(?int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getParcela(): ?int
    {
        return $this->parcela;
    }

    public function setParcela(?int $parcela): self
    {
        $this->parcela = $parcela;
        return $this;
    }

    public function getDatavencimento(): ?\DateTimeInterface
    {
        return $this->datavencimento;
    }

    public function setDatavencimento(?\DateTimeInterface $datavencimento): self
    {
        $this->datavencimento = $datavencimento;
        return $this;
    }

    public function getDsDatavencimentoOriginal(): ?string
    {
        return $this->dsDatavencimentoOriginal;
    }

    public function setDsDatavencimentoOriginal(?string $dsDatavencimentoOriginal): self
    {
        $this->dsDatavencimentoOriginal = $dsDatavencimentoOriginal;
        return $this;
    }

    public function getDtCompetencia(): ?\DateTimeInterface
    {
        return $this->dtCompetencia;
    }

    public function setDtCompetencia(?\DateTimeInterface $dtCompetencia): self
    {
        $this->dtCompetencia = $dtCompetencia;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getDataemissao(): ?\DateTimeInterface
    {
        return $this->dataemissao;
    }

    public function setDataemissao(?\DateTimeInterface $dataemissao): self
    {
        $this->dataemissao = $dataemissao;
        return $this;
    }

    public function getNossonumero(): ?string
    {
        return $this->nossonumero;
    }

    public function setNossonumero(?string $nossonumero): self
    {
        $this->nossonumero = $nossonumero;
        return $this;
    }

    public function getCdDescCondicional(): ?int
    {
        return $this->cdDescCondicional;
    }

    public function setCdDescCondicional(?int $cdDescCondicional): self
    {
        $this->cdDescCondicional = $cdDescCondicional;
        return $this;
    }

    public function getValorbruto(): ?float
    {
        return $this->valorbruto;
    }

    public function setValorbruto(?float $valorbruto): self
    {
        $this->valorbruto = $valorbruto;
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

    public function getValordesconto(): ?float
    {
        return $this->valordesconto;
    }

    public function setValordesconto(?float $valordesconto): self
    {
        $this->valordesconto = $valordesconto;
        return $this;
    }

    public function getDsObsDesc(): ?string
    {
        return $this->dsObsDesc;
    }

    public function setDsObsDesc(?string $dsObsDesc): self
    {
        $this->dsObsDesc = $dsObsDesc;
        return $this;
    }

    public function getDescontoextra(): ?float
    {
        return $this->descontoextra;
    }

    public function setDescontoextra(?float $descontoextra): self
    {
        $this->descontoextra = $descontoextra;
        return $this;
    }

    public function getValorextra(): ?float
    {
        return $this->valorextra;
    }

    public function setValorextra(?float $valorextra): self
    {
        $this->valorextra = $valorextra;
        return $this;
    }

    public function getValortotal(): ?float
    {
        return $this->valortotal;
    }

    public function setValortotal(?float $valortotal): self
    {
        $this->valortotal = $valortotal;
        return $this;
    }

    public function getValorjuros(): ?float
    {
        return $this->valorjuros;
    }

    public function setValorjuros(?float $valorjuros): self
    {
        $this->valorjuros = $valorjuros;
        return $this;
    }

    public function getValorjurosFixo(): ?float
    {
        return $this->valorjurosFixo;
    }

    public function setValorjurosFixo(?float $valorjurosFixo): self
    {
        $this->valorjurosFixo = $valorjurosFixo;
        return $this;
    }

    public function getValordescontoFixo(): ?float
    {
        return $this->valordescontoFixo;
    }

    public function setValordescontoFixo(?float $valordescontoFixo): self
    {
        $this->valordescontoFixo = $valordescontoFixo;
        return $this;
    }

    public function getValorpago(): ?float
    {
        return $this->valorpago;
    }

    public function setValorpago(?float $valorpago): self
    {
        $this->valorpago = $valorpago;
        return $this;
    }

    public function getVlFaturamento(): ?float
    {
        return $this->vlFaturamento;
    }

    public function setVlFaturamento(?float $vlFaturamento): self
    {
        $this->vlFaturamento = $vlFaturamento;
        return $this;
    }

    public function getDatapagamento(): ?\DateTimeInterface
    {
        return $this->datapagamento;
    }

    public function setDatapagamento(?\DateTimeInterface $datapagamento): self
    {
        $this->datapagamento = $datapagamento;
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

    public function getSituacao(): ?int
    {
        return $this->situacao;
    }

    public function setSituacao(?int $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;
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

    public function getBloqueto(): ?string
    {
        return $this->bloqueto;
    }

    public function setBloqueto(?string $bloqueto): self
    {
        $this->bloqueto = $bloqueto;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDatabasecorrecao(): ?\DateTimeInterface
    {
        return $this->databasecorrecao;
    }

    public function setDatabasecorrecao(?\DateTimeInterface $databasecorrecao): self
    {
        $this->databasecorrecao = $databasecorrecao;
        return $this;
    }

    public function getIndicecorrecao(): ?float
    {
        return $this->indicecorrecao;
    }

    public function setIndicecorrecao(?float $indicecorrecao): self
    {
        $this->indicecorrecao = $indicecorrecao;
        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getDepto(): ?int
    {
        return $this->depto;
    }

    public function setDepto(?int $depto): self
    {
        $this->depto = $depto;
        return $this;
    }

    public function getTipoparcela(): ?int
    {
        return $this->tipoparcela;
    }

    public function setTipoparcela(?int $tipoparcela): self
    {
        $this->tipoparcela = $tipoparcela;
        return $this;
    }

    public function getOcorrenciaRemessa(): ?int
    {
        return $this->ocorrenciaRemessa;
    }

    public function setOcorrenciaRemessa(?int $ocorrenciaRemessa): self
    {
        $this->ocorrenciaRemessa = $ocorrenciaRemessa;
        return $this;
    }

    public function getOcorrenciaRetorno(): ?int
    {
        return $this->ocorrenciaRetorno;
    }

    public function setOcorrenciaRetorno(?int $ocorrenciaRetorno): self
    {
        $this->ocorrenciaRetorno = $ocorrenciaRetorno;
        return $this;
    }

    public function getSnCreditoParcela(): ?string
    {
        return $this->snCreditoParcela;
    }

    public function setSnCreditoParcela(?string $snCreditoParcela): self
    {
        $this->snCreditoParcela = $snCreditoParcela;
        return $this;
    }

    public function getNrCreditos(): ?float
    {
        return $this->nrCreditos;
    }

    public function setNrCreditos(?float $nrCreditos): self
    {
        $this->nrCreditos = $nrCreditos;
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

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdCentroCusto(): int
    {
        return $this->cdCentroCusto;
    }

    public function setCdCentroCusto(int $cdCentroCusto): self
    {
        $this->cdCentroCusto = $cdCentroCusto;
        return $this;
    }

    public function getCdPlanoConta(): int
    {
        return $this->cdPlanoConta;
    }

    public function setCdPlanoConta(int $cdPlanoConta): self
    {
        $this->cdPlanoConta = $cdPlanoConta;
        return $this;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }

    public function getSnLiberarJuros(): int
    {
        return $this->snLiberarJuros;
    }

    public function setSnLiberarJuros(int $snLiberarJuros): self
    {
        $this->snLiberarJuros = $snLiberarJuros;
        return $this;
    }

    public function getSnLiberarDescontos(): int
    {
        return $this->snLiberarDescontos;
    }

    public function setSnLiberarDescontos(int $snLiberarDescontos): self
    {
        $this->snLiberarDescontos = $snLiberarDescontos;
        return $this;
    }

    public function getCdBoleto(): ?int
    {
        return $this->cdBoleto;
    }

    public function setCdBoleto(?int $cdBoleto): self
    {
        $this->cdBoleto = $cdBoleto;
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

    public function getVlPagoMoeda(): ?float
    {
        return $this->vlPagoMoeda;
    }

    public function setVlPagoMoeda(?float $vlPagoMoeda): self
    {
        $this->vlPagoMoeda = $vlPagoMoeda;
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

    public function getCdMoeda(): ?int
    {
        return $this->cdMoeda;
    }

    public function setCdMoeda(?int $cdMoeda): self
    {
        $this->cdMoeda = $cdMoeda;
        return $this;
    }

    public function getCdMoedaPgto(): ?int
    {
        return $this->cdMoedaPgto;
    }

    public function setCdMoedaPgto(?int $cdMoedaPgto): self
    {
        $this->cdMoedaPgto = $cdMoedaPgto;
        return $this;
    }

    public function getCodigocarta(): ?int
    {
        return $this->codigocarta;
    }

    public function setCodigocarta(?int $codigocarta): self
    {
        $this->codigocarta = $codigocarta;
        return $this;
    }

    public function getCdBolsa(): ?int
    {
        return $this->cdBolsa;
    }

    public function setCdBolsa(?int $cdBolsa): self
    {
        $this->cdBolsa = $cdBolsa;
        return $this;
    }

    public function getCdItemPlano(): ?int
    {
        return $this->cdItemPlano;
    }

    public function setCdItemPlano(?int $cdItemPlano): self
    {
        $this->cdItemPlano = $cdItemPlano;
        return $this;
    }

    public function getVlCredito(): ?float
    {
        return $this->vlCredito;
    }

    public function setVlCredito(?float $vlCredito): self
    {
        $this->vlCredito = $vlCredito;
        return $this;
    }

    public function getCdRecibo(): ?int
    {
        return $this->cdRecibo;
    }

    public function setCdRecibo(?int $cdRecibo): self
    {
        $this->cdRecibo = $cdRecibo;
        return $this;
    }

    public function getNrNf(): ?string
    {
        return $this->nrNf;
    }

    public function setNrNf(?string $nrNf): self
    {
        $this->nrNf = $nrNf;
        return $this;
    }

    public function getCdChequeDevolvido(): ?int
    {
        return $this->cdChequeDevolvido;
    }

    public function setCdChequeDevolvido(?int $cdChequeDevolvido): self
    {
        $this->cdChequeDevolvido = $cdChequeDevolvido;
        return $this;
    }

    public function getDsDeposito(): ?string
    {
        return $this->dsDeposito;
    }

    public function setDsDeposito(?string $dsDeposito): self
    {
        $this->dsDeposito = $dsDeposito;
        return $this;
    }

    public function isSnNfeGerada(): ?bool
    {
        return $this->snNfeGerada;
    }

    public function setSnNfeGerada(?bool $snNfeGerada): self
    {
        $this->snNfeGerada = $snNfeGerada;
        return $this;
    }

    public function getCdAutenticacao(): ?string
    {
        return $this->cdAutenticacao;
    }

    public function setCdAutenticacao(?string $cdAutenticacao): self
    {
        $this->cdAutenticacao = $cdAutenticacao;
        return $this;
    }

    public function getCdRespNfse(): ?int
    {
        return $this->cdRespNfse;
    }

    public function setCdRespNfse(?int $cdRespNfse): self
    {
        $this->cdRespNfse = $cdRespNfse;
        return $this;
    }

    public function getDsAutenticaImpressao(): ?string
    {
        return $this->dsAutenticaImpressao;
    }

    public function setDsAutenticaImpressao(?string $dsAutenticaImpressao): self
    {
        $this->dsAutenticaImpressao = $dsAutenticaImpressao;
        return $this;
    }

    public function getVlPercentualDivisao(): float
    {
        return $this->vlPercentualDivisao;
    }

    public function setVlPercentualDivisao(float $vlPercentualDivisao): self
    {
        $this->vlPercentualDivisao = $vlPercentualDivisao;
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

    public function getSnTipoNota(): ?int
    {
        return $this->snTipoNota;
    }

    public function setSnTipoNota(?int $snTipoNota): self
    {
        $this->snTipoNota = $snTipoNota;
        return $this;
    }

    public function getCdPlanoParcela(): ?int
    {
        return $this->cdPlanoParcela;
    }

    public function setCdPlanoParcela(?int $cdPlanoParcela): self
    {
        $this->cdPlanoParcela = $cdPlanoParcela;
        return $this;
    }

    public function getCdDisciplinaExameRecurso(): ?int
    {
        return $this->cdDisciplinaExameRecurso;
    }

    public function setCdDisciplinaExameRecurso(?int $cdDisciplinaExameRecurso): self
    {
        $this->cdDisciplinaExameRecurso = $cdDisciplinaExameRecurso;
        return $this;
    }

    public function getNrParcelasOperadora(): ?int
    {
        return $this->nrParcelasOperadora;
    }

    public function setNrParcelasOperadora(?int $nrParcelasOperadora): self
    {
        $this->nrParcelasOperadora = $nrParcelasOperadora;
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

    public function getDtVencimentoOriginal(): ?\DateTimeInterface
    {
        return $this->dtVencimentoOriginal;
    }

    public function setDtVencimentoOriginal(?\DateTimeInterface $dtVencimentoOriginal): self
    {
        $this->dtVencimentoOriginal = $dtVencimentoOriginal;
        return $this;
    }
}
