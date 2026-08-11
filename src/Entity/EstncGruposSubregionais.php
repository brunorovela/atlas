<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposSubregionaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposSubregionaisRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_subregionais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_SUBREGIONAL', columns: ['CD_SUBREGIONAL'])]
class EstncGruposSubregionais
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_SUBREGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSubregional = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdSubregional = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdSubregional = $cdSubregional;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
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
}
