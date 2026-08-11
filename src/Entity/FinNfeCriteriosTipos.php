<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeCriteriosTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeCriteriosTiposRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_criterios_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeCriteriosTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_criterio_tipo', type: 'integer')]
    private ?int $cdNfeCriterioTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipo = null;

    public function __construct(
        ?string $dsTipo = null
    ) {
        $this->dsTipo = $dsTipo;
    }

    public function getCdNfeCriterioTipo(): ?int
    {
        return $this->cdNfeCriterioTipo;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }
}
