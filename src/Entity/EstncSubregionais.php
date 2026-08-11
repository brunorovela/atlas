<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncSubregionaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSubregionaisRepository::class)]
#[ORM\Table(
    name: 'estnc_subregionais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MUNICIPIO_CORREIO', columns: ['CD_MUNICIPIO_CORREIO'])]
#[ORM\Index(name: 'IX_CD_REGIONAL', columns: ['CD_REGIONAL'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['DS_UF'])]
class EstncSubregionais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_SUBREGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSubregional = null;

    #[ORM\Column(name: 'CD_REGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegional = null;

    #[ORM\Column(name: 'CD_MUNICIPIO_CORREIO', type: 'integer')]
    private ?int $cdMunicipioCorreio = null;

    #[ORM\Column(name: 'NM_SUBREGIONAL', type: 'string', length: 255, nullable: true)]
    private ?string $nmSubregional = null;

    #[ORM\Column(name: 'DS_UF', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    public function __construct(
        ?int $cdRegional = null,
        ?int $cdMunicipioCorreio = null,
        ?string $nmSubregional = null,
        ?string $dsUf = null
    ) {
        $this->cdRegional = $cdRegional;
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        $this->nmSubregional = $nmSubregional;
        $this->dsUf = $dsUf;
    }

    public function getCdSubregional(): ?int
    {
        return $this->cdSubregional;
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

    public function getCdMunicipioCorreio(): ?int
    {
        return $this->cdMunicipioCorreio;
    }

    public function setCdMunicipioCorreio(?int $cdMunicipioCorreio): self
    {
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        return $this;
    }

    public function getNmSubregional(): ?string
    {
        return $this->nmSubregional;
    }

    public function setNmSubregional(?string $nmSubregional): self
    {
        $this->nmSubregional = $nmSubregional;
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
