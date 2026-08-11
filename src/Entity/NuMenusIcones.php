<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuMenusIconesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuMenusIconesRepository::class)]
#[ORM\Table(
    name: 'nu_menus_icones',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuMenusIcones
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_icone', type: 'integer')]
    private ?int $cdIcone = null;

    #[ORM\Column(name: 'nm_icone', type: 'string', length: 255)]
    private ?string $nmIcone = null;

    public function __construct(
        ?string $nmIcone = null
    ) {
        $this->nmIcone = $nmIcone;
    }

    public function getCdIcone(): ?int
    {
        return $this->cdIcone;
    }

    public function getNmIcone(): ?string
    {
        return $this->nmIcone;
    }

    public function setNmIcone(?string $nmIcone): self
    {
        $this->nmIcone = $nmIcone;
        return $this;
    }
}
