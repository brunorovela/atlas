<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeMunicipiosSiafiUnimestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeMunicipiosSiafiUnimestreRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_municipios_siafi_unimestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SIAFI', columns: ['cd_siafi'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO', columns: ['cd_municipio'])]
class FinNfeMunicipiosSiafiUnimestre
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_siafi', type: 'integer')]
    private ?int $cdSiafi = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_municipio', type: 'integer')]
    private ?int $cdMunicipio = null;

    public function __construct(
        ?int $cdSiafi = null,
        ?int $cdMunicipio = null
    ) {
        $this->cdSiafi = $cdSiafi;
        $this->cdMunicipio = $cdMunicipio;
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

    public function getCdMunicipio(): ?int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(?int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }
}
