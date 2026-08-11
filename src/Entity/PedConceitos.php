<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PedConceitosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedConceitosRepository::class)]
#[ORM\Table(
    name: 'ped_conceitos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONCEITO', columns: ['cd_conceito'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_CONCEITO', columns: ['cd_grupo_conceito'])]
class PedConceitos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conceito', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConceito = null;

    #[ORM\Column(name: 'ds_conceito', type: 'string', length: 255)]
    private ?string $dsConceito = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 50, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'cd_tipo', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_grupo_conceito', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupoConceito = null;

    #[ORM\Column(name: 'nr_nota', type: 'float', nullable: true)]
    private ?float $nrNota = null;

    public function __construct(
        ?string $dsConceito = null,
        ?string $dsSigla = null,
        ?int $cdTipo = null,
        ?int $cdGrupoConceito = null,
        ?float $nrNota = null
    ) {
        $this->dsConceito = $dsConceito;
        $this->dsSigla = $dsSigla;
        $this->cdTipo = $cdTipo;
        $this->cdGrupoConceito = $cdGrupoConceito;
        $this->nrNota = $nrNota;
    }

    public function getCdConceito(): ?int
    {
        return $this->cdConceito;
    }

    public function getDsConceito(): ?string
    {
        return $this->dsConceito;
    }

    public function setDsConceito(?string $dsConceito): self
    {
        $this->dsConceito = $dsConceito;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdGrupoConceito(): ?int
    {
        return $this->cdGrupoConceito;
    }

    public function setCdGrupoConceito(?int $cdGrupoConceito): self
    {
        $this->cdGrupoConceito = $cdGrupoConceito;
        return $this;
    }

    public function getNrNota(): ?float
    {
        return $this->nrNota;
    }

    public function setNrNota(?float $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }
}
