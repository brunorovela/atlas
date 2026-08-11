<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProvinciasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvinciasRepository::class)]
#[ORM\Table(
    name: 'provincias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_provincia', columns: ['cd_provincia'])]
#[ORM\Index(name: 'IX_CD_CODIGO', columns: ['cd_codigo'])]
class Provincias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_provincia', type: 'integer')]
    private ?int $cdProvincia = null;

    #[ORM\Column(name: 'cd_codigo', type: 'integer', nullable: true)]
    private ?int $cdCodigo = null;

    #[ORM\Column(name: 'ds_provincia', type: 'string', length: 50, nullable: true)]
    private ?string $dsProvincia = null;

    public function __construct(
        ?int $cdCodigo = null,
        ?string $dsProvincia = null
    ) {
        $this->cdCodigo = $cdCodigo;
        $this->dsProvincia = $dsProvincia;
    }

    public function getCdProvincia(): ?int
    {
        return $this->cdProvincia;
    }

    public function getCdCodigo(): ?int
    {
        return $this->cdCodigo;
    }

    public function setCdCodigo(?int $cdCodigo): self
    {
        $this->cdCodigo = $cdCodigo;
        return $this;
    }

    public function getDsProvincia(): ?string
    {
        return $this->dsProvincia;
    }

    public function setDsProvincia(?string $dsProvincia): self
    {
        $this->dsProvincia = $dsProvincia;
        return $this;
    }
}
