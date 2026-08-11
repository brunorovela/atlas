<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuIdiomasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIdiomasRepository::class)]
#[ORM\Table(
    name: 'nu_idiomas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxIdioma', columns: ['ds_sigla'])]
#[ORM\Index(name: 'IX_DS_SIGLA', columns: ['ds_sigla'])]
#[ORM\Index(name: 'IX_CD_PAIS', columns: ['cd_pais'])]
class NuIdiomas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_idioma', type: 'integer')]
    private ?int $cdIdioma = null;

    #[ORM\Column(name: 'cd_pais', type: 'integer')]
    private ?int $cdPais = null;

    #[ORM\Column(name: 'ds_idioma', type: 'string', length: 100)]
    private ?string $dsIdioma = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 5, nullable: true)]
    private ?string $dsSigla = null;

    public function __construct(
        ?int $cdPais = null,
        ?string $dsIdioma = null,
        ?string $dsSigla = null
    ) {
        $this->cdPais = $cdPais;
        $this->dsIdioma = $dsIdioma;
        $this->dsSigla = $dsSigla;
    }

    public function getCdIdioma(): ?int
    {
        return $this->cdIdioma;
    }

    public function getCdPais(): ?int
    {
        return $this->cdPais;
    }

    public function setCdPais(?int $cdPais): self
    {
        $this->cdPais = $cdPais;
        return $this;
    }

    public function getDsIdioma(): ?string
    {
        return $this->dsIdioma;
    }

    public function setDsIdioma(?string $dsIdioma): self
    {
        $this->dsIdioma = $dsIdioma;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }
}
