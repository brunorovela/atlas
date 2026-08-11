<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompCategoriasColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompCategoriasColigadasRepository::class)]
#[ORM\Table(
    name: 'comp_categorias_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CompCategoriasColigadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria_coligada', type: 'integer')]
    private ?int $cdCategoriaColigada = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $cdCategoria = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdCategoria = $cdCategoria;
    }

    public function getCdCategoriaColigada(): ?int
    {
        return $this->cdCategoriaColigada;
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

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }
}
