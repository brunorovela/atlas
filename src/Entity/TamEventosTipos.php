<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TamEventosTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosTiposRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['CD_TIPO'])]
class TamEventosTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'DS_TIPO', type: 'string', length: 100)]
    private ?string $dsTipo = null;

    public function __construct(
        ?string $dsTipo = null
    ) {
        $this->dsTipo = $dsTipo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
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
