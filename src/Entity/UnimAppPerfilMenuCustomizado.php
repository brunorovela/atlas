<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimAppPerfilMenuCustomizadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppPerfilMenuCustomizadoRepository::class)]
#[ORM\Table(
    name: 'unim_app_perfil_menu_customizado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_cd_app_perfil_cd_menu', columns: ['cd_app_perfil', 'cd_menu'])]
#[ORM\Index(name: 'cd_menu', columns: ['cd_menu'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[ORM\Index(name: 'IDX_E3336029ECB3FD36', columns: ['cd_app_perfil'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_app_perfil_menu_customizado_ibfk_1', 'colunas' => ['cd_app_perfil'], 'tabelaAlvo' => 'unim_app_perfil', 'colunasAlvo' => ['cd_app_perfil'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_app_perfil_menu_customizado_ibfk_2', 'colunas' => ['cd_menu'], 'tabelaAlvo' => 'nu_menus', 'colunasAlvo' => ['cd_menu'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAppPerfilMenuCustomizado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_app_perfil_menu_customizado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppPerfilMenuCustomizado = null;

    #[ORM\ManyToOne(targetEntity: UnimAppPerfil::class)]
    #[ORM\JoinColumn(name: 'cd_app_perfil', referencedColumnName: 'cd_app_perfil', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppPerfil $cdAppPerfil = null;

    #[ORM\ManyToOne(targetEntity: NuMenus::class)]
    #[ORM\JoinColumn(name: 'cd_menu', referencedColumnName: 'cd_menu', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?NuMenus $cdMenu = null;

    #[ORM\Column(name: 'sn_abrir_link_dentro_app', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAbrirLinkDentroApp = 1;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimAppPerfil $cdAppPerfil = null,
        ?NuMenus $cdMenu = null,
        ?int $snAbrirLinkDentroApp = 1,
        ?int $snAtivo = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAppPerfil = $cdAppPerfil;
        $this->cdMenu = $cdMenu;
        $this->snAbrirLinkDentroApp = $snAbrirLinkDentroApp;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdAppPerfilMenuCustomizado(): ?int
    {
        return $this->cdAppPerfilMenuCustomizado;
    }

    public function getCdAppPerfil(): ?UnimAppPerfil
    {
        return $this->cdAppPerfil;
    }

    public function setCdAppPerfil(?UnimAppPerfil $cdAppPerfil): self
    {
        $this->cdAppPerfil = $cdAppPerfil;
        return $this;
    }

    public function getCdMenu(): ?NuMenus
    {
        return $this->cdMenu;
    }

    public function setCdMenu(?NuMenus $cdMenu): self
    {
        $this->cdMenu = $cdMenu;
        return $this;
    }

    public function getSnAbrirLinkDentroApp(): ?int
    {
        return $this->snAbrirLinkDentroApp;
    }

    public function setSnAbrirLinkDentroApp(?int $snAbrirLinkDentroApp): self
    {
        $this->snAbrirLinkDentroApp = $snAbrirLinkDentroApp;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
