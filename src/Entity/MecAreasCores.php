<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MecAreasCoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MecAreasCoresRepository::class)]
#[ORM\Table(
    name: 'mec_areas_cores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'nr_nivel', columns: ['nr_nivel'])]
class MecAreasCores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area_cor', type: 'integer')]
    private ?int $cdAreaCor = null;

    #[ORM\Column(name: 'ds_hexadecimal', type: 'string', length: 6, nullable: true)]
    private ?string $dsHexadecimal = null;

    #[ORM\Column(name: 'nr_nivel', type: 'integer', options: ['default' => '1'])]
    private int $nrNivel = 1;

    public function __construct(
        ?string $dsHexadecimal = null,
        int $nrNivel = 1
    ) {
        $this->dsHexadecimal = $dsHexadecimal;
        $this->nrNivel = $nrNivel;
    }

    public function getCdAreaCor(): ?int
    {
        return $this->cdAreaCor;
    }

    public function getDsHexadecimal(): ?string
    {
        return $this->dsHexadecimal;
    }

    public function setDsHexadecimal(?string $dsHexadecimal): self
    {
        $this->dsHexadecimal = $dsHexadecimal;
        return $this;
    }

    public function getNrNivel(): int
    {
        return $this->nrNivel;
    }

    public function setNrNivel(int $nrNivel): self
    {
        $this->nrNivel = $nrNivel;
        return $this;
    }
}
