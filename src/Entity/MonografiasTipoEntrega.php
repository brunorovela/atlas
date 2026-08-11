<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasTipoEntregaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasTipoEntregaRepository::class)]
#[ORM\Table(
    name: 'monografias_tipo_entrega',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MonografiasTipoEntrega
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_monografia_tipo_entrega', type: 'integer')]
    private ?int $cdMonografiaTipoEntrega = null;

    #[ORM\Column(name: 'ds_tipo_entrega', type: 'string', length: 155, nullable: true)]
    private ?string $dsTipoEntrega = null;

    public function __construct(
        ?string $dsTipoEntrega = null
    ) {
        $this->dsTipoEntrega = $dsTipoEntrega;
    }

    public function getCdMonografiaTipoEntrega(): ?int
    {
        return $this->cdMonografiaTipoEntrega;
    }

    public function getDsTipoEntrega(): ?string
    {
        return $this->dsTipoEntrega;
    }

    public function setDsTipoEntrega(?string $dsTipoEntrega): self
    {
        $this->dsTipoEntrega = $dsTipoEntrega;
        return $this;
    }
}
