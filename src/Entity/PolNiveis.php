<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolNiveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolNiveisRepository::class)]
#[ORM\Table(
    name: 'pol_niveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PolNiveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nivel', type: 'integer')]
    private ?int $cdNivel = null;

    #[ORM\Column(name: 'ds_nivel', type: 'string', length: 255, nullable: true)]
    private ?string $dsNivel = null;

    public function __construct(
        ?string $dsNivel = null
    ) {
        $this->dsNivel = $dsNivel;
    }

    public function getCdNivel(): ?int
    {
        return $this->cdNivel;
    }

    public function getDsNivel(): ?string
    {
        return $this->dsNivel;
    }

    public function setDsNivel(?string $dsNivel): self
    {
        $this->dsNivel = $dsNivel;
        return $this;
    }
}
