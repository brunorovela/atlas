<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncRegionaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncRegionaisRepository::class)]
#[ORM\Table(
    name: 'estnc_regionais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncRegionais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_REGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegional = null;

    #[ORM\Column(name: 'NM_REGIONAL', type: 'string', length: 255, nullable: true)]
    private ?string $nmRegional = null;

    #[ORM\Column(name: 'DS_UF', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    public function __construct(
        ?string $nmRegional = null,
        ?string $dsUf = null
    ) {
        $this->nmRegional = $nmRegional;
        $this->dsUf = $dsUf;
    }

    public function getCdRegional(): ?int
    {
        return $this->cdRegional;
    }

    public function getNmRegional(): ?string
    {
        return $this->nmRegional;
    }

    public function setNmRegional(?string $nmRegional): self
    {
        $this->nmRegional = $nmRegional;
        return $this;
    }

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }
}
