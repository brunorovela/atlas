<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimCalendarioCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCalendarioCategoriasRepository::class)]
#[ORM\Table(
    name: 'unim_calendario_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MENU', columns: ['cd_menu'])]
class UnimCalendarioCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 50, nullable: true)]
    private ?string $dsCor = null;

    #[ORM\Column(name: 'ds_cor_fonte', type: 'binary', length: 50, nullable: true)]
    private ?string $dsCorFonte = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'cd_menu', type: 'integer', nullable: true)]
    private ?int $cdMenu = null;

    public function __construct(
        ?string $dsCategoria = null,
        ?string $dsCor = null,
        ?string $dsCorFonte = null,
        ?int $snAtivo = null,
        ?int $cdMenu = null
    ) {
        $this->dsCategoria = $dsCategoria;
        $this->dsCor = $dsCor;
        $this->dsCorFonte = $dsCorFonte;
        $this->snAtivo = $snAtivo;
        $this->cdMenu = $cdMenu;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
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

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }

    public function getDsCorFonte(): ?string
    {
        return $this->dsCorFonte;
    }

    public function setDsCorFonte(?string $dsCorFonte): self
    {
        $this->dsCorFonte = $dsCorFonte;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdMenu(): ?int
    {
        return $this->cdMenu;
    }

    public function setCdMenu(?int $cdMenu): self
    {
        $this->cdMenu = $cdMenu;
        return $this;
    }
}
