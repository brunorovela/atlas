<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ResHorariosCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResHorariosCategoriasRepository::class)]
#[ORM\Table(
    name: 'res_horarios_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_categoria', columns: ['cd_categoria'])]
class ResHorariosCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 75)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean')]
    private ?bool $snExcluido = null;

    public function __construct(
        ?string $dsCategoria = null,
        ?int $nrOrdem = null,
        ?bool $snExcluido = null
    ) {
        $this->dsCategoria = $dsCategoria;
        $this->nrOrdem = $nrOrdem;
        $this->snExcluido = $snExcluido;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnExcluido(): ?bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
