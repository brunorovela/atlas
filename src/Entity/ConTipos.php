<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConTiposRepository::class)]
#[ORM\Table(
    name: 'con_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_tipo'])]
class ConTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipo = null;

    public function __construct(
        ?string $dsTipo = null
    ) {
        $this->dsTipo = $dsTipo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }
}
