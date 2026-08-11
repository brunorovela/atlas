<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogradourosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogradourosRepository::class)]
#[ORM\Table(
    name: 'logradouros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_logradouro', columns: ['cd_logradouro'])]
class Logradouros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_logradouro', type: 'integer')]
    private ?int $cdLogradouro = null;

    #[ORM\Column(name: 'ds_logradouro', type: 'string', length: 120, nullable: true, options: ['default' => '0'])]
    private ?string $dsLogradouro = '0';

    public function __construct(
        ?string $dsLogradouro = '0'
    ) {
        $this->dsLogradouro = $dsLogradouro;
    }

    public function getCdLogradouro(): ?int
    {
        return $this->cdLogradouro;
    }

    public function getDsLogradouro(): ?string
    {
        return $this->dsLogradouro;
    }

    public function setDsLogradouro(?string $dsLogradouro): self
    {
        $this->dsLogradouro = $dsLogradouro;
        return $this;
    }
}
