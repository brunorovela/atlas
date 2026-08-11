<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuRelatoriosCabecalhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosCabecalhosRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios_cabecalhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_cabecalho', columns: ['cd_cabecalho'])]
class NuRelatoriosCabecalhos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cabecalho', type: 'integer')]
    private ?int $cdCabecalho = null;

    #[ORM\Column(name: 'nm_cabecalho', type: 'string', length: 255, nullable: true)]
    private ?string $nmCabecalho = null;

    #[ORM\Column(name: 'ds_campos', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsCampos = null;

    #[ORM\Column(name: 'im_cabecalho1', type: 'blob', length: 65535, nullable: true)]
    private ?string $imCabecalho1 = null;

    #[ORM\Column(name: 'im_cabecalho2', type: 'blob', length: 65535, nullable: true)]
    private ?string $imCabecalho2 = null;

    #[ORM\Column(name: 'im_cabecalho3', type: 'blob', length: 65535, nullable: true)]
    private ?string $imCabecalho3 = null;

    #[ORM\Column(name: 'im_cabecalho4', type: 'blob', length: 65535, nullable: true)]
    private ?string $imCabecalho4 = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', nullable: true)]
    private ?int $cdColigadaMatriz = null;

    public function __construct(
        ?string $nmCabecalho = null,
        ?string $dsCampos = null,
        ?string $imCabecalho1 = null,
        ?string $imCabecalho2 = null,
        ?string $imCabecalho3 = null,
        ?string $imCabecalho4 = null,
        ?int $cdColigada = null,
        ?int $cdColigadaMatriz = null
    ) {
        $this->nmCabecalho = $nmCabecalho;
        $this->dsCampos = $dsCampos;
        $this->imCabecalho1 = $imCabecalho1;
        $this->imCabecalho2 = $imCabecalho2;
        $this->imCabecalho3 = $imCabecalho3;
        $this->imCabecalho4 = $imCabecalho4;
        $this->cdColigada = $cdColigada;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function getNmCabecalho(): ?string
    {
        return $this->nmCabecalho;
    }

    public function setNmCabecalho(?string $nmCabecalho): self
    {
        $this->nmCabecalho = $nmCabecalho;
        return $this;
    }

    public function getDsCampos(): ?string
    {
        return $this->dsCampos;
    }

    public function setDsCampos(?string $dsCampos): self
    {
        $this->dsCampos = $dsCampos;
        return $this;
    }

    public function getImCabecalho1(): ?string
    {
        return $this->imCabecalho1;
    }

    public function setImCabecalho1(?string $imCabecalho1): self
    {
        $this->imCabecalho1 = $imCabecalho1;
        return $this;
    }

    public function getImCabecalho2(): ?string
    {
        return $this->imCabecalho2;
    }

    public function setImCabecalho2(?string $imCabecalho2): self
    {
        $this->imCabecalho2 = $imCabecalho2;
        return $this;
    }

    public function getImCabecalho3(): ?string
    {
        return $this->imCabecalho3;
    }

    public function setImCabecalho3(?string $imCabecalho3): self
    {
        $this->imCabecalho3 = $imCabecalho3;
        return $this;
    }

    public function getImCabecalho4(): ?string
    {
        return $this->imCabecalho4;
    }

    public function setImCabecalho4(?string $imCabecalho4): self
    {
        $this->imCabecalho4 = $imCabecalho4;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
