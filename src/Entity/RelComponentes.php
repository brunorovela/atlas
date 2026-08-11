<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RelComponentesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelComponentesRepository::class)]
#[ORM\Table(
    name: 'rel_componentes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class RelComponentes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_componente', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdComponente = null;

    #[ORM\Column(name: 'ds_componente', type: 'string', length: 20)]
    private ?string $dsComponente = null;

    #[ORM\Column(name: 'nm_classe', type: 'string', length: 20)]
    private ?string $nmClasse = null;

    public function __construct(
        ?int $cdComponente = null,
        ?string $dsComponente = null,
        ?string $nmClasse = null
    ) {
        $this->cdComponente = $cdComponente;
        $this->dsComponente = $dsComponente;
        $this->nmClasse = $nmClasse;
    }

    public function getCdComponente(): ?int
    {
        return $this->cdComponente;
    }

    public function setCdComponente(?int $cdComponente): self
    {
        $this->cdComponente = $cdComponente;
        return $this;
    }

    public function getDsComponente(): ?string
    {
        return $this->dsComponente;
    }

    public function setDsComponente(?string $dsComponente): self
    {
        $this->dsComponente = $dsComponente;
        return $this;
    }

    public function getNmClasse(): ?string
    {
        return $this->nmClasse;
    }

    public function setNmClasse(?string $nmClasse): self
    {
        $this->nmClasse = $nmClasse;
        return $this;
    }
}
