<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SigaOrigemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaOrigemRepository::class)]
#[ORM\Table(
    name: 'siga_origem',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SigaOrigem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_origem', type: 'integer')]
    private ?int $cdOrigem = null;

    #[ORM\Column(name: 'ds_origem', type: 'string', length: 50, nullable: true)]
    private ?string $dsOrigem = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsOrigem = null,
        ?string $dsChave = null
    ) {
        $this->dsOrigem = $dsOrigem;
        $this->dsChave = $dsChave;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function getDsOrigem(): ?string
    {
        return $this->dsOrigem;
    }

    public function setDsOrigem(?string $dsOrigem): self
    {
        $this->dsOrigem = $dsOrigem;
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
}
