<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PedGrupoConceitosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedGrupoConceitosRepository::class)]
#[ORM\Table(
    name: 'ped_grupo_conceitos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PedGrupoConceitos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_conceito', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoConceito = null;

    #[ORM\Column(name: 'ds_grupo_conceito', type: 'string', length: 255)]
    private ?string $dsGrupoConceito = null;

    #[ORM\Column(name: 'cd_conceito_padrao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConceitoPadrao = null;

    public function __construct(
        ?string $dsGrupoConceito = null,
        ?int $cdConceitoPadrao = null
    ) {
        $this->dsGrupoConceito = $dsGrupoConceito;
        $this->cdConceitoPadrao = $cdConceitoPadrao;
    }

    public function getCdGrupoConceito(): ?int
    {
        return $this->cdGrupoConceito;
    }

    public function getDsGrupoConceito(): ?string
    {
        return $this->dsGrupoConceito;
    }

    public function setDsGrupoConceito(?string $dsGrupoConceito): self
    {
        $this->dsGrupoConceito = $dsGrupoConceito;
        return $this;
    }

    public function getCdConceitoPadrao(): ?int
    {
        return $this->cdConceitoPadrao;
    }

    public function setCdConceitoPadrao(?int $cdConceitoPadrao): self
    {
        $this->cdConceitoPadrao = $cdConceitoPadrao;
        return $this;
    }
}
