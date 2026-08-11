<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProfessoresAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessoresAreasRepository::class)]
#[ORM\Table(
    name: 'professores_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ProfessoresAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer')]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_area', type: 'string', length: 255)]
    private ?string $dsArea = null;

    public function __construct(
        ?string $dsArea = null
    ) {
        $this->dsArea = $dsArea;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function getDsArea(): ?string
    {
        return $this->dsArea;
    }

    public function setDsArea(?string $dsArea): self
    {
        $this->dsArea = $dsArea;
        return $this;
    }
}
