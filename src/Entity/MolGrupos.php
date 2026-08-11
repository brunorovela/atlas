<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolGruposRepository::class)]
#[ORM\Table(
    name: 'mol_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MolGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrupo = null;

    public function __construct(
        ?string $dsGrupo = null
    ) {
        $this->dsGrupo = $dsGrupo;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
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
