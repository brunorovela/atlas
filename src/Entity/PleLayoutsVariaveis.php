<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PleLayoutsVariaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleLayoutsVariaveisRepository::class)]
#[ORM\Table(
    name: 'ple_layouts_variaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['cd_layout', 'ds_variavel'])]
#[ORM\Index(name: 'IX_DS_VARIAVEL', columns: ['ds_variavel'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
class PleLayoutsVariaveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout_variavel', type: 'integer')]
    private ?int $cdLayoutVariavel = null;

    #[ORM\Column(name: 'ds_variavel', type: 'string', length: 60, nullable: true)]
    private ?string $dsVariavel = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true)]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['default' => '0'])]
    private int $cdLayout = 0;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snObrigatorio = false;

    #[ORM\Column(name: 'sn_adicionavel', type: 'integer', options: ['default' => '0'])]
    private int $snAdicionavel = 0;

    #[ORM\Column(name: 'cd_layout_variavel_mae', type: 'integer', nullable: true)]
    private ?int $cdLayoutVariavelMae = null;

    #[ORM\Column(name: 'ds_sql_opcoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSqlOpcoes = null;

    #[ORM\Column(name: 'SN_HTML', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snHtml = 0;

    #[ORM\Column(name: 'nm_variavel', type: 'string', length: 200, nullable: true)]
    private ?string $nmVariavel = null;

    #[ORM\Column(name: 'nr_sequencia', type: 'smallint', nullable: true)]
    private ?int $nrSequencia = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 200, nullable: true)]
    private ?string $dsGrupo = null;

    public function __construct(
        ?string $dsVariavel = null,
        ?int $cdTipo = null,
        int $cdLayout = 0,
        ?bool $snObrigatorio = false,
        int $snAdicionavel = 0,
        ?int $cdLayoutVariavelMae = null,
        ?string $dsSqlOpcoes = null,
        int $snHtml = 0,
        ?string $nmVariavel = null,
        ?int $nrSequencia = null,
        ?string $dsGrupo = null
    ) {
        $this->dsVariavel = $dsVariavel;
        $this->cdTipo = $cdTipo;
        $this->cdLayout = $cdLayout;
        $this->snObrigatorio = $snObrigatorio;
        $this->snAdicionavel = $snAdicionavel;
        $this->cdLayoutVariavelMae = $cdLayoutVariavelMae;
        $this->dsSqlOpcoes = $dsSqlOpcoes;
        $this->snHtml = $snHtml;
        $this->nmVariavel = $nmVariavel;
        $this->nrSequencia = $nrSequencia;
        $this->dsGrupo = $dsGrupo;
    }

    public function getCdLayoutVariavel(): ?int
    {
        return $this->cdLayoutVariavel;
    }

    public function getDsVariavel(): ?string
    {
        return $this->dsVariavel;
    }

    public function setDsVariavel(?string $dsVariavel): self
    {
        $this->dsVariavel = $dsVariavel;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdLayout(): int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function isSnObrigatorio(): ?bool
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?bool $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function getSnAdicionavel(): int
    {
        return $this->snAdicionavel;
    }

    public function setSnAdicionavel(int $snAdicionavel): self
    {
        $this->snAdicionavel = $snAdicionavel;
        return $this;
    }

    public function getCdLayoutVariavelMae(): ?int
    {
        return $this->cdLayoutVariavelMae;
    }

    public function setCdLayoutVariavelMae(?int $cdLayoutVariavelMae): self
    {
        $this->cdLayoutVariavelMae = $cdLayoutVariavelMae;
        return $this;
    }

    public function getDsSqlOpcoes(): ?string
    {
        return $this->dsSqlOpcoes;
    }

    public function setDsSqlOpcoes(?string $dsSqlOpcoes): self
    {
        $this->dsSqlOpcoes = $dsSqlOpcoes;
        return $this;
    }

    public function getSnHtml(): int
    {
        return $this->snHtml;
    }

    public function setSnHtml(int $snHtml): self
    {
        $this->snHtml = $snHtml;
        return $this;
    }

    public function getNmVariavel(): ?string
    {
        return $this->nmVariavel;
    }

    public function setNmVariavel(?string $nmVariavel): self
    {
        $this->nmVariavel = $nmVariavel;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }
}
