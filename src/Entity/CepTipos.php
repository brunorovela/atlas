<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CepTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CepTiposRepository::class)]
#[ORM\Table(
    name: 'cep_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CepTipos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Column(name: 'nm_tipo', type: 'string', length: 30, nullable: true)]
    private ?string $nmTipo = null;

    #[ORM\Column(name: 'nm_tipo_abreviado', type: 'string', length: 10, nullable: true)]
    private ?string $nmTipoAbreviado = null;

    public function __construct(
        int $cdTipo = 0,
        ?string $nmTipo = null,
        ?string $nmTipoAbreviado = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->nmTipo = $nmTipo;
        $this->nmTipoAbreviado = $nmTipoAbreviado;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getNmTipo(): ?string
    {
        return $this->nmTipo;
    }

    public function setNmTipo(?string $nmTipo): self
    {
        $this->nmTipo = $nmTipo;
        return $this;
    }

    public function getNmTipoAbreviado(): ?string
    {
        return $this->nmTipoAbreviado;
    }

    public function setNmTipoAbreviado(?string $nmTipoAbreviado): self
    {
        $this->nmTipoAbreviado = $nmTipoAbreviado;
        return $this;
    }
}
