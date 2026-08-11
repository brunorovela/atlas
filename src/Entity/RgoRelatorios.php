<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoRelatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_AGRUPAMENTO', columns: ['cd_agrupamento'])]
#[ORM\Index(name: 'IX_CD_FORMATO', columns: ['cd_formato'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_rgo_relatorios_rgo_agrupamentos', 'colunas' => ['cd_agrupamento'], 'tabelaAlvo' => 'rgo_agrupamentos', 'colunasAlvo' => ['cd_agrupamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_relatorios_rgo_formatos', 'colunas' => ['cd_formato'], 'tabelaAlvo' => 'rgo_formatos', 'colunasAlvo' => ['cd_formato'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_relatorios_rgo_tipos', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'rgo_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoRelatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio', type: 'integer')]
    private ?int $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: RgoTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoTipos $cdTipo = null;

    #[ORM\ManyToOne(targetEntity: RgoAgrupamentos::class)]
    #[ORM\JoinColumn(name: 'cd_agrupamento', referencedColumnName: 'cd_agrupamento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoAgrupamentos $cdAgrupamento = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'nm_relatorio', type: 'string', length: 255)]
    private ?string $nmRelatorio = null;

    #[ORM\Column(name: 'sn_padrao', type: 'boolean', options: ['default' => '0'])]
    private bool $snPadrao = false;

    #[ORM\Column(name: 'ds_filtro', type: 'text', length: 65535, nullable: true)]
    private ?string $dsFiltro = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 50, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'me_relatorio_index', type: 'text', length: 16777215, nullable: true)]
    private ?string $meRelatorioIndex = null;

    #[ORM\Column(name: 'me_relatorio_config', type: 'text', length: 16777215, nullable: true)]
    private ?string $meRelatorioConfig = null;

    #[ORM\Column(name: 'me_relatorio_view', type: 'text', length: 16777215, nullable: true)]
    private ?string $meRelatorioView = null;

    #[ORM\Column(name: 'cd_relatorio_template', type: 'integer', nullable: true)]
    private ?int $cdRelatorioTemplate = null;

    #[ORM\ManyToOne(targetEntity: RgoFormatos::class)]
    #[ORM\JoinColumn(name: 'cd_formato', referencedColumnName: 'cd_formato', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoFormatos $cdFormato = null;

    #[ORM\Column(name: 'me_documentacao_padrao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDocumentacaoPadrao = null;

    #[ORM\Column(name: 'me_documentacao_cliente', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDocumentacaoCliente = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_autentique', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAutentique = false;

    #[ORM\Column(name: 'ds_autentique_config', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAutentiqueConfig = null;

    public function __construct(
        ?RgoTipos $cdTipo = null,
        ?RgoAgrupamentos $cdAgrupamento = null,
        bool $snAtivo = true,
        ?string $nmRelatorio = null,
        bool $snPadrao = false,
        ?string $dsFiltro = null,
        ?string $nmArquivo = null,
        ?string $meRelatorioIndex = null,
        ?string $meRelatorioConfig = null,
        ?string $meRelatorioView = null,
        ?int $cdRelatorioTemplate = null,
        ?RgoFormatos $cdFormato = null,
        ?string $meDocumentacaoPadrao = null,
        ?string $meDocumentacaoCliente = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null,
        ?bool $snAutentique = false,
        ?string $dsAutentiqueConfig = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdAgrupamento = $cdAgrupamento;
        $this->snAtivo = $snAtivo;
        $this->nmRelatorio = $nmRelatorio;
        $this->snPadrao = $snPadrao;
        $this->dsFiltro = $dsFiltro;
        $this->nmArquivo = $nmArquivo;
        $this->meRelatorioIndex = $meRelatorioIndex;
        $this->meRelatorioConfig = $meRelatorioConfig;
        $this->meRelatorioView = $meRelatorioView;
        $this->cdRelatorioTemplate = $cdRelatorioTemplate;
        $this->cdFormato = $cdFormato;
        $this->meDocumentacaoPadrao = $meDocumentacaoPadrao;
        $this->meDocumentacaoCliente = $meDocumentacaoCliente;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
        $this->snAutentique = $snAutentique;
        $this->dsAutentiqueConfig = $dsAutentiqueConfig;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function getCdTipo(): ?RgoTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?RgoTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdAgrupamento(): ?RgoAgrupamentos
    {
        return $this->cdAgrupamento;
    }

    public function setCdAgrupamento(?RgoAgrupamentos $cdAgrupamento): self
    {
        $this->cdAgrupamento = $cdAgrupamento;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNmRelatorio(): ?string
    {
        return $this->nmRelatorio;
    }

    public function setNmRelatorio(?string $nmRelatorio): self
    {
        $this->nmRelatorio = $nmRelatorio;
        return $this;
    }

    public function isSnPadrao(): bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getMeRelatorioIndex(): ?string
    {
        return $this->meRelatorioIndex;
    }

    public function setMeRelatorioIndex(?string $meRelatorioIndex): self
    {
        $this->meRelatorioIndex = $meRelatorioIndex;
        return $this;
    }

    public function getMeRelatorioConfig(): ?string
    {
        return $this->meRelatorioConfig;
    }

    public function setMeRelatorioConfig(?string $meRelatorioConfig): self
    {
        $this->meRelatorioConfig = $meRelatorioConfig;
        return $this;
    }

    public function getMeRelatorioView(): ?string
    {
        return $this->meRelatorioView;
    }

    public function setMeRelatorioView(?string $meRelatorioView): self
    {
        $this->meRelatorioView = $meRelatorioView;
        return $this;
    }

    public function getCdRelatorioTemplate(): ?int
    {
        return $this->cdRelatorioTemplate;
    }

    public function setCdRelatorioTemplate(?int $cdRelatorioTemplate): self
    {
        $this->cdRelatorioTemplate = $cdRelatorioTemplate;
        return $this;
    }

    public function getCdFormato(): ?RgoFormatos
    {
        return $this->cdFormato;
    }

    public function setCdFormato(?RgoFormatos $cdFormato): self
    {
        $this->cdFormato = $cdFormato;
        return $this;
    }

    public function getMeDocumentacaoPadrao(): ?string
    {
        return $this->meDocumentacaoPadrao;
    }

    public function setMeDocumentacaoPadrao(?string $meDocumentacaoPadrao): self
    {
        $this->meDocumentacaoPadrao = $meDocumentacaoPadrao;
        return $this;
    }

    public function getMeDocumentacaoCliente(): ?string
    {
        return $this->meDocumentacaoCliente;
    }

    public function setMeDocumentacaoCliente(?string $meDocumentacaoCliente): self
    {
        $this->meDocumentacaoCliente = $meDocumentacaoCliente;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function isSnAutentique(): ?bool
    {
        return $this->snAutentique;
    }

    public function setSnAutentique(?bool $snAutentique): self
    {
        $this->snAutentique = $snAutentique;
        return $this;
    }

    public function getDsAutentiqueConfig(): ?string
    {
        return $this->dsAutentiqueConfig;
    }

    public function setDsAutentiqueConfig(?string $dsAutentiqueConfig): self
    {
        $this->dsAutentiqueConfig = $dsAutentiqueConfig;
        return $this;
    }
}
