<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncSubregionBairrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSubregionBairrosRepository::class)]
#[ORM\Table(
    name: 'estnc_subregion_bairros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SUBREGIONAL', columns: ['CD_SUBREGIONAL'])]
#[ORM\Index(name: 'IX_CD_BAIRRO', columns: ['CD_BAIRRO'])]
class EstncSubregionBairros
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_SUBREGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSubregional = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_BAIRRO', type: 'integer')]
    private ?int $cdBairro = null;

    public function __construct(
        ?int $cdSubregional = null,
        ?int $cdBairro = null
    ) {
        $this->cdSubregional = $cdSubregional;
        $this->cdBairro = $cdBairro;
    }

    public function getCdSubregional(): ?int
    {
        return $this->cdSubregional;
    }

    public function setCdSubregional(?int $cdSubregional): self
    {
        $this->cdSubregional = $cdSubregional;
        return $this;
    }

    public function getCdBairro(): ?int
    {
        return $this->cdBairro;
    }

    public function setCdBairro(?int $cdBairro): self
    {
        $this->cdBairro = $cdBairro;
        return $this;
    }
}
