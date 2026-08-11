<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ParametrosCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametrosCategoriasRepository::class)]
#[ORM\Table(
    name: 'parametros_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ParametrosCategorias
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_categoria', type: 'integer', options: ['default' => '0'])]
    private int $cdCategoria = 0;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 150, nullable: true)]
    private ?string $dsCategoria = null;

    public function __construct(
        int $cdCategoria = 0,
        ?string $dsCategoria = null
    ) {
        $this->cdCategoria = $cdCategoria;
        $this->dsCategoria = $dsCategoria;
    }

    public function getCdCategoria(): int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
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
}
