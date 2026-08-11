<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinConfigFinanciamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigFinanciamentoRepository::class)]
#[ORM\Table(
    name: 'fin_config_financiamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_FIN_CONFIG_FINANCIAMENTO_DS_FINANCIAMENTO', columns: ['DS_FINANCIAMENTO'])]
#[ORM\Index(name: 'FK_FIN_CONFIG_FINANCIAMENTO_CD_RESPONSAVEL_PESSOAS_CD_PESSOA', columns: ['CD_RESPONSAVEL'])]
#[ORM\Index(name: 'FK_CONFIG_FINAN_CD_TIPO_TITULO_CD_COL_MATRIZ_CONFIG_TIPOS_TITULO', columns: ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONFIG_FINAN_CD_TIPO_TITULO_CD_COL_MATRIZ_CONFIG_TIPOS_TITULO', 'colunas' => ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_tipos_titulo', 'colunasAlvo' => ['cd_tipo_titulo', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_CONFIG_FINANCIAMENTO_CD_RESPONSAVEL_PESSOAS_CD_PESSOA', 'colunas' => ['CD_RESPONSAVEL'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinConfigFinanciamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_FINANCIAMENTO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinanciamento = null;

    #[ORM\Column(name: 'DS_FINANCIAMENTO', type: 'string', length: 255)]
    private ?string $dsFinanciamento = null;

    #[ORM\Column(name: 'VL_PERCENTUAL', type: 'decimal', precision: 5, scale: 2, options: ['default' => '0.00'])]
    private string $vlPercentual = '0.00';

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_RESPONSAVEL', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdResponsavel = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'TP_DATA_VENCTO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $tpDataVencto = null;

    #[ORM\Column(name: 'SN_OUTROS_DESCONTOS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snOutrosDescontos = 0;

    #[ORM\Column(name: 'TX_CONTRATO', type: 'text', length: 16777215, nullable: true)]
    private ?string $txContrato = null;

    #[ORM\Column(name: 'TX_VARIAVEIS', type: 'text', length: 16777215, nullable: true)]
    private ?string $txVariaveis = null;

    #[ORM\Column(name: 'SN_RENOVACAO_AUTO', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRenovacaoAuto = 0;

    #[ORM\Column(name: 'sn_retirar_descontos_atuais', type: 'boolean', options: ['default' => '0'])]
    private bool $snRetirarDescontosAtuais = false;

    public function __construct(
        ?string $dsFinanciamento = null,
        string $vlPercentual = '0.00',
        ?Pessoas $cdResponsavel = null,
        ?int $cdTipoTitulo = null,
        ?int $cdColigadaMatriz = null,
        ?int $tpDataVencto = null,
        int $snOutrosDescontos = 0,
        ?string $txContrato = null,
        ?string $txVariaveis = null,
        ?int $snRenovacaoAuto = 0,
        bool $snRetirarDescontosAtuais = false
    ) {
        $this->dsFinanciamento = $dsFinanciamento;
        $this->vlPercentual = $vlPercentual;
        $this->cdResponsavel = $cdResponsavel;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->tpDataVencto = $tpDataVencto;
        $this->snOutrosDescontos = $snOutrosDescontos;
        $this->txContrato = $txContrato;
        $this->txVariaveis = $txVariaveis;
        $this->snRenovacaoAuto = $snRenovacaoAuto;
        $this->snRetirarDescontosAtuais = $snRetirarDescontosAtuais;
    }

    public function getCdFinanciamento(): ?int
    {
        return $this->cdFinanciamento;
    }

    public function getDsFinanciamento(): ?string
    {
        return $this->dsFinanciamento;
    }

    public function setDsFinanciamento(?string $dsFinanciamento): self
    {
        $this->dsFinanciamento = $dsFinanciamento;
        return $this;
    }

    public function getVlPercentual(): string
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(string $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getCdResponsavel(): ?Pessoas
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?Pessoas $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
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

    public function getTpDataVencto(): ?int
    {
        return $this->tpDataVencto;
    }

    public function setTpDataVencto(?int $tpDataVencto): self
    {
        $this->tpDataVencto = $tpDataVencto;
        return $this;
    }

    public function getSnOutrosDescontos(): int
    {
        return $this->snOutrosDescontos;
    }

    public function setSnOutrosDescontos(int $snOutrosDescontos): self
    {
        $this->snOutrosDescontos = $snOutrosDescontos;
        return $this;
    }

    public function getTxContrato(): ?string
    {
        return $this->txContrato;
    }

    public function setTxContrato(?string $txContrato): self
    {
        $this->txContrato = $txContrato;
        return $this;
    }

    public function getTxVariaveis(): ?string
    {
        return $this->txVariaveis;
    }

    public function setTxVariaveis(?string $txVariaveis): self
    {
        $this->txVariaveis = $txVariaveis;
        return $this;
    }

    public function getSnRenovacaoAuto(): ?int
    {
        return $this->snRenovacaoAuto;
    }

    public function setSnRenovacaoAuto(?int $snRenovacaoAuto): self
    {
        $this->snRenovacaoAuto = $snRenovacaoAuto;
        return $this;
    }

    public function isSnRetirarDescontosAtuais(): bool
    {
        return $this->snRetirarDescontosAtuais;
    }

    public function setSnRetirarDescontosAtuais(bool $snRetirarDescontosAtuais): self
    {
        $this->snRetirarDescontosAtuais = $snRetirarDescontosAtuais;
        return $this;
    }
}
