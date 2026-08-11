<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OnlineIngressosGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OnlineIngressosGruposRepository::class)]
#[ORM\Table(
    name: 'online_ingressos_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OnlineIngressosGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_ingresso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoIngresso = null;

    #[ORM\Column(name: 'ds_grupo_ingresso', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrupoIngresso = null;

    public function __construct(
        ?string $dsGrupoIngresso = null
    ) {
        $this->dsGrupoIngresso = $dsGrupoIngresso;
    }

    public function getCdGrupoIngresso(): ?int
    {
        return $this->cdGrupoIngresso;
    }

    public function getDsGrupoIngresso(): ?string
    {
        return $this->dsGrupoIngresso;
    }

    public function setDsGrupoIngresso(?string $dsGrupoIngresso): self
    {
        $this->dsGrupoIngresso = $dsGrupoIngresso;
        return $this;
    }
}
