<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DistritosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistritosRepository::class)]
#[ORM\Table(
    name: 'distritos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DISTRITO', columns: ['cd_distrito'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO', columns: ['cd_municipio'])]
class Distritos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_distrito_municipio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDistritoMunicipio = null;

    #[ORM\Column(name: 'cd_distrito', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDistrito = 0;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMunicipio = 0;

    #[ORM\Column(name: 'nr_ano', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'ds_distrito', type: 'string', length: 120, nullable: true)]
    private ?string $dsDistrito = null;

    public function __construct(
        int $cdDistrito = 0,
        int $cdMunicipio = 0,
        ?int $nrAno = null,
        ?string $dsDistrito = null
    ) {
        $this->cdDistrito = $cdDistrito;
        $this->cdMunicipio = $cdMunicipio;
        $this->nrAno = $nrAno;
        $this->dsDistrito = $dsDistrito;
    }

    public function getCdDistritoMunicipio(): ?int
    {
        return $this->cdDistritoMunicipio;
    }

    public function getCdDistrito(): int
    {
        return $this->cdDistrito;
    }

    public function setCdDistrito(int $cdDistrito): self
    {
        $this->cdDistrito = $cdDistrito;
        return $this;
    }

    public function getCdMunicipio(): int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
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
