<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasCamposCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasCamposCategoriasRepository::class)]
#[ORM\Table(
    name: 'pessoas_campos_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
class PessoasCamposCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'nm_categoria', type: 'string', length: 255)]
    private ?string $nmCategoria = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    public function __construct(
        ?string $nmCategoria = null,
        ?int $cdAcao = null
    ) {
        $this->nmCategoria = $nmCategoria;
        $this->cdAcao = $cdAcao;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function getNmCategoria(): ?string
    {
        return $this->nmCategoria;
    }

    public function setNmCategoria(?string $nmCategoria): self
    {
        $this->nmCategoria = $nmCategoria;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }
}
