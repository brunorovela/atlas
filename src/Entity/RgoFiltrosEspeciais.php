<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoFiltrosEspeciaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoFiltrosEspeciaisRepository::class)]
#[ORM\Table(
    name: 'rgo_filtros_especiais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_FILTRO', columns: ['ds_filtro'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RgoFiltrosEspeciais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_filtro', type: 'integer')]
    private ?int $cdFiltro = null;

    #[ORM\Column(name: 'ds_filtro', type: 'string', length: 255)]
    private ?string $dsFiltro = null;

    #[ORM\Column(name: 'me_consulta', type: 'text', length: 65535)]
    private ?string $meConsulta = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsFiltro = null,
        ?string $meConsulta = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsFiltro = $dsFiltro;
        $this->meConsulta = $meConsulta;
        $this->dtBase = $dtBase;
    }

    public function getCdFiltro(): ?int
    {
        return $this->cdFiltro;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }

    public function getMeConsulta(): ?string
    {
        return $this->meConsulta;
    }

    public function setMeConsulta(?string $meConsulta): self
    {
        $this->meConsulta = $meConsulta;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
