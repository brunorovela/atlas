<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteMenuPortalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteMenuPortalRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_menu_portal',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_cap_jornada_etapa_componente_menu_portal', columns: ['cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'FK_cap_jornada_etapa_componente_menu_portal_nu_menus', columns: ['cd_menu'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_etapa_componente_menu_portal', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_jornada_etapa_componente_menu_portal_nu_menus', 'colunas' => ['cd_menu'], 'tabelaAlvo' => 'nu_menus', 'colunasAlvo' => ['cd_menu'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteMenuPortal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\ManyToOne(targetEntity: NuMenus::class)]
    #[ORM\JoinColumn(name: 'cd_menu', referencedColumnName: 'cd_menu', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?NuMenus $cdMenu = null;

    #[ORM\Column(name: 'me_texto', type: 'text', length: 65535, nullable: true)]
    private ?string $meTexto = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?NuMenus $cdMenu = null,
        ?string $meTexto = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->cdMenu = $cdMenu;
        $this->meTexto = $meTexto;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
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

    public function getMeTexto(): ?string
    {
        return $this->meTexto;
    }

    public function setMeTexto(?string $meTexto): self
    {
        $this->meTexto = $meTexto;
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
