<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OuvGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvGruposRepository::class)]
#[ORM\Table(
    name: 'ouv_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OuvGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'nm_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $nmGrupo = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    public function __construct(
        ?string $nmGrupo = null,
        ?bool $snAtivo = null
    ) {
        $this->nmGrupo = $nmGrupo;
        $this->snAtivo = $snAtivo;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getNmGrupo(): ?string
    {
        return $this->nmGrupo;
    }

    public function setNmGrupo(?string $nmGrupo): self
    {
        $this->nmGrupo = $nmGrupo;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
