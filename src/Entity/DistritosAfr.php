<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DistritosAfrRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistritosAfrRepository::class)]
#[ORM\Table(
    name: 'distritos_afr',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_distrito', columns: ['cd_distrito'])]
#[ORM\Index(name: 'IX_CODIGO', columns: ['cd_codigo'])]
#[ORM\Index(name: 'IX_CD_PROVINCIA', columns: ['cd_provincia'])]
class DistritosAfr
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_distrito', type: 'integer')]
    private ?int $cdDistrito = null;

    #[ORM\Column(name: 'cd_codigo', type: 'integer', nullable: true)]
    private ?int $cdCodigo = null;

    #[ORM\Column(name: 'cd_provincia', type: 'integer', nullable: true)]
    private ?int $cdProvincia = null;

    #[ORM\Column(name: 'ds_distrito', type: 'string', length: 100, nullable: true)]
    private ?string $dsDistrito = null;

    public function __construct(
        ?int $cdCodigo = null,
        ?int $cdProvincia = null,
        ?string $dsDistrito = null
    ) {
        $this->cdCodigo = $cdCodigo;
        $this->cdProvincia = $cdProvincia;
        $this->dsDistrito = $dsDistrito;
    }

    public function getCdDistrito(): ?int
    {
        return $this->cdDistrito;
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

    public function getCdProvincia(): ?int
    {
        return $this->cdProvincia;
    }

    public function setCdProvincia(?int $cdProvincia): self
    {
        $this->cdProvincia = $cdProvincia;
        return $this;
    }

    public function getDsDistrito(): ?string
    {
        return $this->dsDistrito;
    }

    public function setDsDistrito(?string $dsDistrito): self
    {
        $this->dsDistrito = $dsDistrito;
        return $this;
    }
}
