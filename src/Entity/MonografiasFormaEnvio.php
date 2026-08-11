<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasFormaEnvioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasFormaEnvioRepository::class)]
#[ORM\Table(
    name: 'monografias_forma_envio',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_forma_envio', columns: ['ds_forma_envio'])]
class MonografiasFormaEnvio
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_forma_entrega', type: 'integer')]
    private ?int $cdFormaEntrega = null;

    #[ORM\Column(name: 'ds_forma_envio', type: 'string', length: 255)]
    private ?string $dsFormaEnvio = null;

    public function __construct(
        ?string $dsFormaEnvio = null
    ) {
        $this->dsFormaEnvio = $dsFormaEnvio;
    }

    public function getCdFormaEntrega(): ?int
    {
        return $this->cdFormaEntrega;
    }

    public function getDsFormaEnvio(): ?string
    {
        return $this->dsFormaEnvio;
    }

    public function setDsFormaEnvio(?string $dsFormaEnvio): self
    {
        $this->dsFormaEnvio = $dsFormaEnvio;
        return $this;
    }
}
