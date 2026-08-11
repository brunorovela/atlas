<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeMunicipiosSiafiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeMunicipiosSiafiRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_municipios_siafi',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SIAFI', columns: ['cd_siafi'])]
class FinNfeMunicipiosSiafi
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_siafi', type: 'integer')]
    private ?int $cdSiafi = null;

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 2, nullable: true)]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'ds_municipio', type: 'string', length: 255, nullable: true)]
    private ?string $dsMunicipio = null;

    public function __construct(
        ?int $cdSiafi = null,
        ?string $dsUf = null,
        ?string $dsMunicipio = null
    ) {
        $this->cdSiafi = $cdSiafi;
        $this->dsUf = $dsUf;
        $this->dsMunicipio = $dsMunicipio;
    }

    public function getCdSiafi(): ?int
    {
        return $this->cdSiafi;
    }

    public function setCdSiafi(?int $cdSiafi): self
    {
        $this->cdSiafi = $cdSiafi;
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

    public function getDsMunicipio(): ?string
    {
        return $this->dsMunicipio;
    }

    public function setDsMunicipio(?string $dsMunicipio): self
    {
        $this->dsMunicipio = $dsMunicipio;
        return $this;
    }
}
