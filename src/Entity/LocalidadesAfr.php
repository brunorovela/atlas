<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LocalidadesAfrRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalidadesAfrRepository::class)]
#[ORM\Table(
    name: 'localidades_afr',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_localidade', columns: ['cd_localidade'])]
#[ORM\Index(name: 'IX_CD_DISTRITO', columns: ['cd_distrito'])]
#[ORM\Index(name: 'IX_CD_PROVINCIA', columns: ['cd_provincia'])]
class LocalidadesAfr
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_localidade', type: 'integer')]
    private ?int $cdLocalidade = null;

    #[ORM\Column(name: 'cd_codigo', type: 'string', length: 15, nullable: true)]
    private ?string $cdCodigo = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 50, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_localidade', type: 'string', length: 100, nullable: true)]
    private ?string $dsLocalidade = null;

    #[ORM\Column(name: 'ds_posto', type: 'string', length: 100, nullable: true)]
    private ?string $dsPosto = null;

    #[ORM\Column(name: 'cd_distrito', type: 'integer', nullable: true)]
    private ?int $cdDistrito = null;

    #[ORM\Column(name: 'cd_provincia', type: 'integer', nullable: true)]
    private ?int $cdProvincia = null;

    public function __construct(
        ?string $cdCodigo = null,
        ?string $dsBairro = null,
        ?string $dsLocalidade = null,
        ?string $dsPosto = null,
        ?int $cdDistrito = null,
        ?int $cdProvincia = null
    ) {
        $this->cdCodigo = $cdCodigo;
        $this->dsBairro = $dsBairro;
        $this->dsLocalidade = $dsLocalidade;
        $this->dsPosto = $dsPosto;
        $this->cdDistrito = $cdDistrito;
        $this->cdProvincia = $cdProvincia;
    }

    public function getCdLocalidade(): ?int
    {
        return $this->cdLocalidade;
    }

    public function getCdCodigo(): ?string
    {
        return $this->cdCodigo;
    }

    public function setCdCodigo(?string $cdCodigo): self
    {
        $this->cdCodigo = $cdCodigo;
        return $this;
    }

    public function getDsBairro(): ?string
    {
        return $this->dsBairro;
    }

    public function setDsBairro(?string $dsBairro): self
    {
        $this->dsBairro = $dsBairro;
        return $this;
    }

    public function getDsLocalidade(): ?string
    {
        return $this->dsLocalidade;
    }

    public function setDsLocalidade(?string $dsLocalidade): self
    {
        $this->dsLocalidade = $dsLocalidade;
        return $this;
    }

    public function getDsPosto(): ?string
    {
        return $this->dsPosto;
    }

    public function setDsPosto(?string $dsPosto): self
    {
        $this->dsPosto = $dsPosto;
        return $this;
    }

    public function getCdDistrito(): ?int
    {
        return $this->cdDistrito;
    }

    public function setCdDistrito(?int $cdDistrito): self
    {
        $this->cdDistrito = $cdDistrito;
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
}
