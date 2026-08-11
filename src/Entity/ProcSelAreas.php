<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcSelAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcSelAreasRepository::class)]
#[ORM\Table(
    name: 'proc_sel_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ProcSelAreas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_area', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdArea = '';

    #[ORM\Column(name: 'ds_area', type: 'string', length: 100, nullable: true)]
    private ?string $dsArea = null;

    public function __construct(
        string $cdArea = '',
        ?string $dsArea = null
    ) {
        $this->cdArea = $cdArea;
        $this->dsArea = $dsArea;
    }

    public function getCdArea(): string
    {
        return $this->cdArea;
    }

    public function setCdArea(string $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
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
