<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncRegionMunicipiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncRegionMunicipiosRepository::class)]
#[ORM\Table(
    name: 'estnc_region_municipios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REGIONAL', columns: ['CD_REGIONAL'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO_CORREIO', columns: ['CD_MUNICIPIO_CORREIO'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['DS_UF'])]
class EstncRegionMunicipios
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_REGIONAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegional = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_MUNICIPIO_CORREIO', type: 'integer')]
    private ?int $cdMunicipioCorreio = null;

    #[ORM\Id]
    #[ORM\Column(name: 'DS_UF', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsUf = '';

    public function __construct(
        ?int $cdRegional = null,
        ?int $cdMunicipioCorreio = null,
        string $dsUf = ''
    ) {
        $this->cdRegional = $cdRegional;
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        $this->dsUf = $dsUf;
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

    public function getDsUf(): string
    {
        return $this->dsUf;
    }

    public function setDsUf(string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }
}
