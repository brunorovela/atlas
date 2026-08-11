<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAreasRepository::class)]
#[ORM\Table(
    name: 'estnc_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_area', type: 'string', length: 255, nullable: true)]
    private ?string $dsArea = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsArea = null,
        ?int $snAtivo = null
    ) {
        $this->dsArea = $dsArea;
        $this->snAtivo = $snAtivo;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
