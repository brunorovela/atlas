<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuRelatoriosTiposFiltrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuRelatoriosTiposFiltrosRepository::class)]
#[ORM\Table(
    name: 'nu_relatorios_tipos_filtros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo_filtro', columns: ['cd_tipo_filtro', 'ds_tipo_filtro'])]
class NuRelatoriosTiposFiltros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_filtro', type: 'integer')]
    private ?int $cdTipoFiltro = null;

    #[ORM\Column(name: 'ds_tipo_filtro', type: 'string', length: 50)]
    private ?string $dsTipoFiltro = null;

    public function __construct(
        ?string $dsTipoFiltro = null
    ) {
        $this->dsTipoFiltro = $dsTipoFiltro;
    }

    public function getCdTipoFiltro(): ?int
    {
        return $this->cdTipoFiltro;
    }

    public function getDsTipoFiltro(): ?string
    {
        return $this->dsTipoFiltro;
    }

    public function setDsTipoFiltro(?string $dsTipoFiltro): self
    {
        $this->dsTipoFiltro = $dsTipoFiltro;
        return $this;
    }
}
