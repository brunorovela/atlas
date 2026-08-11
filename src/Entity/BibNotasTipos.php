<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibNotasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibNotasTiposRepository::class)]
#[ORM\Table(
    name: 'bib_notas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibNotasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nota_tipo', type: 'integer')]
    private ?int $cdNotaTipo = null;

    #[ORM\Column(name: 'ds_nota_tipo', type: 'string', length: 100)]
    private ?string $dsNotaTipo = null;

    public function __construct(
        ?string $dsNotaTipo = null
    ) {
        $this->dsNotaTipo = $dsNotaTipo;
    }

    public function getCdNotaTipo(): ?int
    {
        return $this->cdNotaTipo;
    }

    public function getDsNotaTipo(): ?string
    {
        return $this->dsNotaTipo;
    }

    public function setDsNotaTipo(?string $dsNotaTipo): self
    {
        $this->dsNotaTipo = $dsNotaTipo;
        return $this;
    }
}
