<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuMenusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuMenusRepository::class)]
#[ORM\Table(
    name: 'nu_menus',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_menu', columns: ['cd_menu'])]
#[ORM\Index(name: 'IX_CD_ICONE', columns: ['cd_icone'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_SN_INSTITUICAO', columns: ['sn_instituicao'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
#[ORM\Index(name: 'ix_sn_permite_enviar_app_dt_base', columns: ['sn_permite_enviar_app', 'dt_base'])]
class NuMenus
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_menu', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMenu = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'ds_texto', type: 'string', length: 255, nullable: true)]
    private ?string $dsTexto = null;

    #[ORM\Column(name: 'ds_status', type: 'string', length: 255, nullable: true)]
    private ?string $dsStatus = null;

    #[ORM\Column(name: 'ds_location', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocation = null;

    #[ORM\Column(name: 'cd_menu_dinamico', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMenuDinamico = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'ds_parametros', type: 'string', length: 255, nullable: true)]
    private ?string $dsParametros = null;

    #[ORM\Column(name: 'sn_instituicao', type: TinyIntType::NAME, nullable: true)]
    private ?int $snInstituicao = null;

    #[ORM\Column(name: 'cd_icone', type: 'integer', nullable: true)]
    private ?int $cdIcone = null;

    #[ORM\Column(name: 'sn_separador', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snSeparador = 0;

    #[ORM\Column(name: 'sn_bloqueio_inadimplente', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBloqueioInadimplente = 0;

    #[ORM\Column(name: 'sn_bloqueio_pendencia_avl', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snBloqueioPendenciaAvl = 1;

    #[ORM\Column(name: 'cd_menu_condicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMenuCondicao = null;

    #[ORM\Column(name: 'sn_permite_enviar_app', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPermiteEnviarApp = 0;

    #[ORM\Column(name: 'ds_url_login_automatico_app', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlLoginAutomaticoApp = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_recolher_apos_clique', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snRecolherAposClique = false;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdAcao = null,
        ?string $dsUrl = null,
        ?string $dsTexto = null,
        ?string $dsStatus = null,
        ?string $dsLocation = null,
        ?int $cdMenuDinamico = null,
        int $snAtivo = 1,
        int $nrOrdem = 0,
        ?string $dsParametros = null,
        ?int $snInstituicao = null,
        ?int $cdIcone = null,
        int $snSeparador = 0,
        int $snBloqueioInadimplente = 0,
        int $snBloqueioPendenciaAvl = 1,
        ?int $cdMenuCondicao = null,
        int $snPermiteEnviarApp = 0,
        ?string $dsUrlLoginAutomaticoApp = null,
        ?\DateTimeInterface $dtBase = null,
        ?bool $snRecolherAposClique = false
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdAcao = $cdAcao;
        $this->dsUrl = $dsUrl;
        $this->dsTexto = $dsTexto;
        $this->dsStatus = $dsStatus;
        $this->dsLocation = $dsLocation;
        $this->cdMenuDinamico = $cdMenuDinamico;
        $this->snAtivo = $snAtivo;
        $this->nrOrdem = $nrOrdem;
        $this->dsParametros = $dsParametros;
        $this->snInstituicao = $snInstituicao;
        $this->cdIcone = $cdIcone;
        $this->snSeparador = $snSeparador;
        $this->snBloqueioInadimplente = $snBloqueioInadimplente;
        $this->snBloqueioPendenciaAvl = $snBloqueioPendenciaAvl;
        $this->cdMenuCondicao = $cdMenuCondicao;
        $this->snPermiteEnviarApp = $snPermiteEnviarApp;
        $this->dsUrlLoginAutomaticoApp = $dsUrlLoginAutomaticoApp;
        $this->dtBase = $dtBase;
        $this->snRecolherAposClique = $snRecolherAposClique;
    }

    public function getCdMenu(): ?int
    {
        return $this->cdMenu;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDsTexto(): ?string
    {
        return $this->dsTexto;
    }

    public function setDsTexto(?string $dsTexto): self
    {
        $this->dsTexto = $dsTexto;
        return $this;
    }

    public function getDsStatus(): ?string
    {
        return $this->dsStatus;
    }

    public function setDsStatus(?string $dsStatus): self
    {
        $this->dsStatus = $dsStatus;
        return $this;
    }

    public function getDsLocation(): ?string
    {
        return $this->dsLocation;
    }

    public function setDsLocation(?string $dsLocation): self
    {
        $this->dsLocation = $dsLocation;
        return $this;
    }

    public function getCdMenuDinamico(): ?int
    {
        return $this->cdMenuDinamico;
    }

    public function setCdMenuDinamico(?int $cdMenuDinamico): self
    {
        $this->cdMenuDinamico = $cdMenuDinamico;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsParametros(): ?string
    {
        return $this->dsParametros;
    }

    public function setDsParametros(?string $dsParametros): self
    {
        $this->dsParametros = $dsParametros;
        return $this;
    }

    public function getSnInstituicao(): ?int
    {
        return $this->snInstituicao;
    }

    public function setSnInstituicao(?int $snInstituicao): self
    {
        $this->snInstituicao = $snInstituicao;
        return $this;
    }

    public function getCdIcone(): ?int
    {
        return $this->cdIcone;
    }

    public function setCdIcone(?int $cdIcone): self
    {
        $this->cdIcone = $cdIcone;
        return $this;
    }

    public function getSnSeparador(): int
    {
        return $this->snSeparador;
    }

    public function setSnSeparador(int $snSeparador): self
    {
        $this->snSeparador = $snSeparador;
        return $this;
    }

    public function getSnBloqueioInadimplente(): int
    {
        return $this->snBloqueioInadimplente;
    }

    public function setSnBloqueioInadimplente(int $snBloqueioInadimplente): self
    {
        $this->snBloqueioInadimplente = $snBloqueioInadimplente;
        return $this;
    }

    public function getSnBloqueioPendenciaAvl(): int
    {
        return $this->snBloqueioPendenciaAvl;
    }

    public function setSnBloqueioPendenciaAvl(int $snBloqueioPendenciaAvl): self
    {
        $this->snBloqueioPendenciaAvl = $snBloqueioPendenciaAvl;
        return $this;
    }

    public function getCdMenuCondicao(): ?int
    {
        return $this->cdMenuCondicao;
    }

    public function setCdMenuCondicao(?int $cdMenuCondicao): self
    {
        $this->cdMenuCondicao = $cdMenuCondicao;
        return $this;
    }

    public function getSnPermiteEnviarApp(): int
    {
        return $this->snPermiteEnviarApp;
    }

    public function setSnPermiteEnviarApp(int $snPermiteEnviarApp): self
    {
        $this->snPermiteEnviarApp = $snPermiteEnviarApp;
        return $this;
    }

    public function getDsUrlLoginAutomaticoApp(): ?string
    {
        return $this->dsUrlLoginAutomaticoApp;
    }

    public function setDsUrlLoginAutomaticoApp(?string $dsUrlLoginAutomaticoApp): self
    {
        $this->dsUrlLoginAutomaticoApp = $dsUrlLoginAutomaticoApp;
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

    public function isSnRecolherAposClique(): ?bool
    {
        return $this->snRecolherAposClique;
    }

    public function setSnRecolherAposClique(?bool $snRecolherAposClique): self
    {
        $this->snRecolherAposClique = $snRecolherAposClique;
        return $this;
    }
}
