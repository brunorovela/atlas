<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MextCategoriaFiltroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextCategoriaFiltroRepository::class)]
#[ORM\Table(
    name: 'mext_categoria_filtro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MextCategoriaFiltro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria_filtro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCategoriaFiltro = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'nr_dias', type: 'integer')]
    private ?int $nrDias = null;

    #[ORM\Column(name: 'sn_segunda', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSegunda = false;

    #[ORM\Column(name: 'sn_terca', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snTerca = false;

    #[ORM\Column(name: 'sn_quarta', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snQuarta = false;

    #[ORM\Column(name: 'sn_quinta', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snQuinta = false;

    #[ORM\Column(name: 'sn_sexta', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSexta = false;

    #[ORM\Column(name: 'sn_sabado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSabado = false;

    #[ORM\Column(name: 'sn_domingo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDomingo = false;

    public function __construct(
        ?string $dsCategoria = null,
        ?int $nrDias = null,
        ?bool $snSegunda = false,
        ?bool $snTerca = false,
        ?bool $snQuarta = false,
        ?bool $snQuinta = false,
        ?bool $snSexta = false,
        ?bool $snSabado = false,
        ?bool $snDomingo = false
    ) {
        $this->dsCategoria = $dsCategoria;
        $this->nrDias = $nrDias;
        $this->snSegunda = $snSegunda;
        $this->snTerca = $snTerca;
        $this->snQuarta = $snQuarta;
        $this->snQuinta = $snQuinta;
        $this->snSexta = $snSexta;
        $this->snSabado = $snSabado;
        $this->snDomingo = $snDomingo;
    }

    public function getCdCategoriaFiltro(): ?int
    {
        return $this->cdCategoriaFiltro;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getNrDias(): ?int
    {
        return $this->nrDias;
    }

    public function setNrDias(?int $nrDias): self
    {
        $this->nrDias = $nrDias;
        return $this;
    }

    public function isSnSegunda(): ?bool
    {
        return $this->snSegunda;
    }

    public function setSnSegunda(?bool $snSegunda): self
    {
        $this->snSegunda = $snSegunda;
        return $this;
    }

    public function isSnTerca(): ?bool
    {
        return $this->snTerca;
    }

    public function setSnTerca(?bool $snTerca): self
    {
        $this->snTerca = $snTerca;
        return $this;
    }

    public function isSnQuarta(): ?bool
    {
        return $this->snQuarta;
    }

    public function setSnQuarta(?bool $snQuarta): self
    {
        $this->snQuarta = $snQuarta;
        return $this;
    }

    public function isSnQuinta(): ?bool
    {
        return $this->snQuinta;
    }

    public function setSnQuinta(?bool $snQuinta): self
    {
        $this->snQuinta = $snQuinta;
        return $this;
    }

    public function isSnSexta(): ?bool
    {
        return $this->snSexta;
    }

    public function setSnSexta(?bool $snSexta): self
    {
        $this->snSexta = $snSexta;
        return $this;
    }

    public function isSnSabado(): ?bool
    {
        return $this->snSabado;
    }

    public function setSnSabado(?bool $snSabado): self
    {
        $this->snSabado = $snSabado;
        return $this;
    }

    public function isSnDomingo(): ?bool
    {
        return $this->snDomingo;
    }

    public function setSnDomingo(?bool $snDomingo): self
    {
        $this->snDomingo = $snDomingo;
        return $this;
    }
}
