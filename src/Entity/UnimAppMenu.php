<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimAppMenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppMenuRepository::class)]
#[ORM\Table(
    name: 'unim_app_menu',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CHAVE', columns: ['ds_chave'])]
class UnimAppMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_app_menu', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppMenu = null;

    #[ORM\Column(name: 'ds_menu', type: 'string', length: 255, nullable: true)]
    private ?string $dsMenu = null;

    #[ORM\Column(name: 'ds_titulo_timeline', type: 'string', length: 255, nullable: true)]
    private ?string $dsTituloTimeline = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'me_descricao_timeline', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricaoTimeline = null;

    public function __construct(
        ?string $dsMenu = null,
        ?string $dsTituloTimeline = null,
        ?string $dsChave = null,
        ?int $snAtivo = 0,
        ?string $meDescricaoTimeline = null
    ) {
        $this->dsMenu = $dsMenu;
        $this->dsTituloTimeline = $dsTituloTimeline;
        $this->dsChave = $dsChave;
        $this->snAtivo = $snAtivo;
        $this->meDescricaoTimeline = $meDescricaoTimeline;
    }

    public function getCdAppMenu(): ?int
    {
        return $this->cdAppMenu;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function getMeDescricaoTimeline(): ?string
    {
        return $this->meDescricaoTimeline;
    }

    public function setMeDescricaoTimeline(?string $meDescricaoTimeline): self
    {
        $this->meDescricaoTimeline = $meDescricaoTimeline;
        return $this;
    }
}
