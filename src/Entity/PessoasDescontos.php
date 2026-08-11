<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasDescontosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasDescontosRepository::class)]
#[ORM\Table(
    name: 'pessoas_descontos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_DESCONTO', columns: ['cd_desconto'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
#[ORM\Index(name: 'IX_CD_PESSOA_INDICADA', columns: ['CD_PESSOA_INDICADA'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
#[ORM\Index(name: 'IX_NR_PARC_INICIO', columns: ['nr_parc_inicio'])]
#[ORM\Index(name: 'IX_NR_PARC_FIM', columns: ['nr_parc_fim'])]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['CD_RESPONSAVEL'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'FK_PESSOAS_DESCONTOS_TIPOS_TITULO_CD_TIPO_TITULO_CD_COL_MATRIZ', columns: ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'])]
class PessoasDescontos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_desconto_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDescontoPessoa = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_desconto', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDesconto = null;

    #[ORM\Column(name: 'vl_anosem_inicio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $vlAnosemInicio = 0;

    #[ORM\Column(name: 'vl_anosem_fim', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $vlAnosemFim = 0;

    #[ORM\Column(name: 'cd_depto', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDepto = 0;

    #[ORM\Column(name: 'sn_primeira_parcela', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snPrimeiraParcela = null;

    #[ORM\Column(name: 'CD_PESSOA_INDICADA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaIndicada = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'vl_percentual', type: 'float', nullable: true)]
    private ?float $vlPercentual = null;

    #[ORM\Column(name: 'nr_parc_inicio', type: 'smallint', nullable: true)]
    private ?int $nrParcInicio = null;

    #[ORM\Column(name: 'nr_parc_fim', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcFim = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 150, nullable: true)]
    private ?string $dsHistorico = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'TX_OBSERVACOES', type: 'text', length: 65535, nullable: true)]
    private ?string $txObservacoes = null;

    #[ORM\Column(name: 'CD_RESPONSAVEL', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'TP_DESCONTO', type: 'boolean', options: ['default' => '1'])]
    private bool $tpDesconto = true;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'sn_manter_desconto_fixo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snManterDescontoFixo = 0;

    #[ORM\Column(name: 'nr_forma_aplicar_divisao', type: 'smallint', nullable: true)]
    private ?int $nrFormaAplicarDivisao = null;

    #[ORM\Column(name: 'VL_FIXO', type: 'float', nullable: true)]
    private ?float $vlFixo = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'SN_ALTERAR_VENCTO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAlterarVencto = 0;

    #[ORM\Column(name: 'DT_VENCTO_INICIAL', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVenctoInicial = null;

    #[ORM\Column(name: 'SN_ALTERAR_TIPO_TITULO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAlterarTipoTitulo = 0;

    #[ORM\Column(name: 'SN_DIVIDIR_DESCONTO_CONDICIONAL', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snDividirDescontoCondicional = 0;

    #[ORM\Column(name: 'sn_desconto_por_media', type: 'boolean', options: ['default' => '0'])]
    private bool $snDescontoPorMedia = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 28 propriedades. Use os setters encadeados.

    public function getCdDescontoPessoa(): ?int
    {
        return $this->cdDescontoPessoa;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdDesconto(): ?int
    {
        return $this->cdDesconto;
    }

    public function setCdDesconto(?int $cdDesconto): self
    {
        $this->cdDesconto = $cdDesconto;
        return $this;
    }

    public function getVlAnosemInicio(): int
    {
        return $this->vlAnosemInicio;
    }

    public function setVlAnosemInicio(int $vlAnosemInicio): self
    {
        $this->vlAnosemInicio = $vlAnosemInicio;
        return $this;
    }

    public function getVlAnosemFim(): int
    {
        return $this->vlAnosemFim;
    }

    public function setVlAnosemFim(int $vlAnosemFim): self
    {
        $this->vlAnosemFim = $vlAnosemFim;
        return $this;
    }

    public function getCdDepto(): int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }

    public function getSnPrimeiraParcela(): ?string
    {
        return $this->snPrimeiraParcela;
    }

    public function setSnPrimeiraParcela(?string $snPrimeiraParcela): self
    {
        $this->snPrimeiraParcela = $snPrimeiraParcela;
        return $this;
    }

    public function getCdPessoaIndicada(): ?int
    {
        return $this->cdPessoaIndicada;
    }

    public function setCdPessoaIndicada(?int $cdPessoaIndicada): self
    {
        $this->cdPessoaIndicada = $cdPessoaIndicada;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getVlPercentual(): ?float
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?float $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getNrParcInicio(): ?int
    {
        return $this->nrParcInicio;
    }

    public function setNrParcInicio(?int $nrParcInicio): self
    {
        $this->nrParcInicio = $nrParcInicio;
        return $this;
    }

    public function getNrParcFim(): ?int
    {
        return $this->nrParcFim;
    }

    public function setNrParcFim(?int $nrParcFim): self
    {
        $this->nrParcFim = $nrParcFim;
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

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getTxObservacoes(): ?string
    {
        return $this->txObservacoes;
    }

    public function setTxObservacoes(?string $txObservacoes): self
    {
        $this->txObservacoes = $txObservacoes;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function isTpDesconto(): bool
    {
        return $this->tpDesconto;
    }

    public function setTpDesconto(bool $tpDesconto): self
    {
        $this->tpDesconto = $tpDesconto;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getSnManterDescontoFixo(): ?int
    {
        return $this->snManterDescontoFixo;
    }

    public function setSnManterDescontoFixo(?int $snManterDescontoFixo): self
    {
        $this->snManterDescontoFixo = $snManterDescontoFixo;
        return $this;
    }

    public function getNrFormaAplicarDivisao(): ?int
    {
        return $this->nrFormaAplicarDivisao;
    }

    public function setNrFormaAplicarDivisao(?int $nrFormaAplicarDivisao): self
    {
        $this->nrFormaAplicarDivisao = $nrFormaAplicarDivisao;
        return $this;
    }

    public function getVlFixo(): ?float
    {
        return $this->vlFixo;
    }

    public function setVlFixo(?float $vlFixo): self
    {
        $this->vlFixo = $vlFixo;
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

    public function getSnAlterarVencto(): int
    {
        return $this->snAlterarVencto;
    }

    public function setSnAlterarVencto(int $snAlterarVencto): self
    {
        $this->snAlterarVencto = $snAlterarVencto;
        return $this;
    }

    public function getDtVenctoInicial(): ?\DateTimeInterface
    {
        return $this->dtVenctoInicial;
    }

    public function setDtVenctoInicial(?\DateTimeInterface $dtVenctoInicial): self
    {
        $this->dtVenctoInicial = $dtVenctoInicial;
        return $this;
    }

    public function getSnAlterarTipoTitulo(): int
    {
        return $this->snAlterarTipoTitulo;
    }

    public function setSnAlterarTipoTitulo(int $snAlterarTipoTitulo): self
    {
        $this->snAlterarTipoTitulo = $snAlterarTipoTitulo;
        return $this;
    }

    public function getSnDividirDescontoCondicional(): int
    {
        return $this->snDividirDescontoCondicional;
    }

    public function setSnDividirDescontoCondicional(int $snDividirDescontoCondicional): self
    {
        $this->snDividirDescontoCondicional = $snDividirDescontoCondicional;
        return $this;
    }

    public function isSnDescontoPorMedia(): bool
    {
        return $this->snDescontoPorMedia;
    }

    public function setSnDescontoPorMedia(bool $snDescontoPorMedia): self
    {
        $this->snDescontoPorMedia = $snDescontoPorMedia;
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
}
