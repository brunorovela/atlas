<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimAppPerfilMenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppPerfilMenuRepository::class)]
#[ORM\Table(
    name: 'unim_app_perfil_menu',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_UNIM_APP_PERFIL_MENU_CD_APP_MENU', columns: ['cd_app_menu'])]
#[ORM\Index(name: 'IX_UNIM_APP_PERFIL_MENU_CD_APP_PERFIL', columns: ['cd_app_perfil'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_app_perfil_menu_ibfk_2', 'colunas' => ['cd_app_menu'], 'tabelaAlvo' => 'unim_app_menu', 'colunasAlvo' => ['cd_app_menu'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_app_perfil_menu_ibfk_3', 'colunas' => ['cd_app_perfil'], 'tabelaAlvo' => 'unim_app_perfil', 'colunasAlvo' => ['cd_app_perfil'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAppPerfilMenu
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimAppPerfil::class)]
    #[ORM\JoinColumn(name: 'cd_app_perfil', referencedColumnName: 'cd_app_perfil', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppPerfil $cdAppPerfil = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimAppMenu::class)]
    #[ORM\JoinColumn(name: 'cd_app_menu', referencedColumnName: 'cd_app_menu', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppMenu $cdAppMenu = null;

    #[ORM\Column(name: 'ds_menu', type: 'string', length: 255, nullable: true)]
    private ?string $dsMenu = null;

    #[ORM\Column(name: 'ds_titulo_timeline', type: 'string', length: 255, nullable: true)]
    private ?string $dsTituloTimeline = null;

    #[ORM\Column(name: 'me_descricao_timeline', type: 'string', length: 255, nullable: true)]
    private ?string $meDescricaoTimeline = null;

    #[ORM\Column(name: 'sn_permitir_desmarcar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snPermitirDesmarcar = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    public function __construct(
        ?UnimAppPerfil $cdAppPerfil = null,
        ?UnimAppMenu $cdAppMenu = null,
        ?string $dsMenu = null,
        ?string $dsTituloTimeline = null,
        ?string $meDescricaoTimeline = null,
        ?int $snPermitirDesmarcar = 0,
        ?\DateTimeInterface $dtBase = null,
        bool $snAtivo = true
    ) {
        $this->cdAppPerfil = $cdAppPerfil;
        $this->cdAppMenu = $cdAppMenu;
        $this->dsMenu = $dsMenu;
        $this->dsTituloTimeline = $dsTituloTimeline;
        $this->meDescricaoTimeline = $meDescricaoTimeline;
        $this->snPermitirDesmarcar = $snPermitirDesmarcar;
        $this->dtBase = $dtBase;
        $this->snAtivo = $snAtivo;
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

    public function getCdAppMenu(): ?UnimAppMenu
    {
        return $this->cdAppMenu;
    }

    public function setCdAppMenu(?UnimAppMenu $cdAppMenu): self
    {
        $this->cdAppMenu = $cdAppMenu;
        return $this;
    }

    public function getDsMenu(): ?string
    {
        return $this->dsMenu;
    }

    public function setDsMenu(?string $dsMenu): self
    {
        $this->dsMenu = $dsMenu;
        return $this;
    }

    public function getDsTituloTimeline(): ?string
    {
        return $this->dsTituloTimeline;
    }

    public function setDsTituloTimeline(?string $dsTituloTimeline): self
    {
        $this->dsTituloTimeline = $dsTituloTimeline;
        return $this;
    }

    public function getMeDescricaoTimeline(): ?string
    {
        return $this->meDescricaoTimeline;
    }

    public function setMeDescricaoTimeline(?string $meDescricaoTimeline): self
    {
        $this->meDescricaoTimeline = $meDescricaoTimeline;
        return $this;
    }

    public function getSnPermitirDesmarcar(): ?int
    {
        return $this->snPermitirDesmarcar;
    }

    public function setSnPermitirDesmarcar(?int $snPermitirDesmarcar): self
    {
        $this->snPermitirDesmarcar = $snPermitirDesmarcar;
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

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
