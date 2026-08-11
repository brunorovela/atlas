<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompCategoriasRepository::class)]
#[ORM\Table(
    name: 'comp_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['CD_TIPO_TITULO'])]
class CompCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATEGORIA', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'DS_CATEGORIA', type: 'string', length: 255)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'SN_CANTINA', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCantina = false;

    #[ORM\Column(name: 'SN_VENDA_PRODUTO', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snVendaProduto = true;

    public function __construct(
        ?int $cdTipoTitulo = null,
        ?string $dsCategoria = null,
        ?bool $snCantina = false,
        ?bool $snVendaProduto = true
    ) {
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->dsCategoria = $dsCategoria;
        $this->snCantina = $snCantina;
        $this->snVendaProduto = $snVendaProduto;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
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

    public function isSnCantina(): ?bool
    {
        return $this->snCantina;
    }

    public function setSnCantina(?bool $snCantina): self
    {
        $this->snCantina = $snCantina;
        return $this;
    }

    public function isSnVendaProduto(): ?bool
    {
        return $this->snVendaProduto;
    }

    public function setSnVendaProduto(?bool $snVendaProduto): self
    {
        $this->snVendaProduto = $snVendaProduto;
        return $this;
    }
}
