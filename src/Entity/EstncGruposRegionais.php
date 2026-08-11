<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposRegionaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposRegionaisRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_regionais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_REGIONAL', columns: ['CD_REGIONAL'])]
class EstncGruposRegionais
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_REGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegional = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdRegional = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdRegional = $cdRegional;
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

    public function getCdRegional(): ?int
    {
        return $this->cdRegional;
    }

    public function setCdRegional(?int $cdRegional): self
    {
        $this->cdRegional = $cdRegional;
        return $this;
    }
}
