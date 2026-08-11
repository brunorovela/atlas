<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoRelatoriosPortalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosPortalRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios_portal',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_RELATORIO_CD_COLIGADA_MATRIZ', columns: ['cd_relatorio', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'FK__rgo_relatorios', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'FK__rgo_relatorios_portal_api', columns: ['cd_relatorio_portal_api'])]
#[ORM\Index(name: 'FK_rgo_relatorios_portal_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK__rgo_relatorios', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'rgo_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK__rgo_relatorios_portal_api', 'colunas' => ['cd_relatorio_portal_api'], 'tabelaAlvo' => 'rgo_relatorios_portal_api', 'colunasAlvo' => ['cd_rgo_relatorios_portal_api'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_relatorios_portal_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoRelatoriosPortal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_portal', type: 'integer')]
    private ?int $cdRelatorioPortal = null;

    #[ORM\ManyToOne(targetEntity: RgoRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: true, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: RgoRelatoriosPortalApi::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio_portal_api', referencedColumnName: 'cd_rgo_relatorios_portal_api', nullable: true, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatoriosPortalApi $cdRelatorioPortalApi = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'me_json_api_filtros', type: 'text', length: 16777215)]
    private ?string $meJsonApiFiltros = null;

    #[ORM\Column(name: 'me_json_opcoes_impressao', type: 'text', length: 16777215)]
    private ?string $meJsonOpcoesImpressao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'ds_chave_menu', type: 'string', length: 20, nullable: true)]
    private ?string $dsChaveMenu = null;

    public function __construct(
        ?RgoRelatorios $cdRelatorio = null,
        ?RgoRelatoriosPortalApi $cdRelatorioPortalApi = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        ?string $meJsonApiFiltros = null,
        ?string $meJsonOpcoesImpressao = null,
        ?\DateTimeInterface $dtBase = null,
        ?string $dsChaveMenu = null
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdRelatorioPortalApi = $cdRelatorioPortalApi;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->meJsonApiFiltros = $meJsonApiFiltros;
        $this->meJsonOpcoesImpressao = $meJsonOpcoesImpressao;
        $this->dtBase = $dtBase;
        $this->dsChaveMenu = $dsChaveMenu;
    }

    public function getCdRelatorioPortal(): ?int
    {
        return $this->cdRelatorioPortal;
    }

    public function getCdRelatorio(): ?RgoRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?RgoRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdRelatorioPortalApi(): ?RgoRelatoriosPortalApi
    {
        return $this->cdRelatorioPortalApi;
    }

    public function setCdRelatorioPortalApi(?RgoRelatoriosPortalApi $cdRelatorioPortalApi): self
    {
        $this->cdRelatorioPortalApi = $cdRelatorioPortalApi;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getMeJsonApiFiltros(): ?string
    {
        return $this->meJsonApiFiltros;
    }

    public function setMeJsonApiFiltros(?string $meJsonApiFiltros): self
    {
        $this->meJsonApiFiltros = $meJsonApiFiltros;
        return $this;
    }

    public function getMeJsonOpcoesImpressao(): ?string
    {
        return $this->meJsonOpcoesImpressao;
    }

    public function setMeJsonOpcoesImpressao(?string $meJsonOpcoesImpressao): self
    {
        $this->meJsonOpcoesImpressao = $meJsonOpcoesImpressao;
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

    public function getDsChaveMenu(): ?string
    {
        return $this->dsChaveMenu;
    }

    public function setDsChaveMenu(?string $dsChaveMenu): self
    {
        $this->dsChaveMenu = $dsChaveMenu;
        return $this;
    }
}
