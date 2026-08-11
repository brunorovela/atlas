<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibAssuntosTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAssuntosTiposRepository::class)]
#[ORM\Table(
    name: 'bib_assuntos_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_assunto_tipo', columns: ['cd_assunto_tipo'])]
class BibAssuntosTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assunto_tipo', type: 'integer')]
    private ?int $cdAssuntoTipo = null;

    #[ORM\Column(name: 'ds_assunto_tipo', type: 'string', length: 100, nullable: true)]
    private ?string $dsAssuntoTipo = null;

    public function __construct(
        ?string $dsAssuntoTipo = null
    ) {
        $this->dsAssuntoTipo = $dsAssuntoTipo;
    }

    public function getCdAssuntoTipo(): ?int
    {
        return $this->cdAssuntoTipo;
    }

    public function getDsAssuntoTipo(): ?string
    {
        return $this->dsAssuntoTipo;
    }

    public function setDsAssuntoTipo(?string $dsAssuntoTipo): self
    {
        $this->dsAssuntoTipo = $dsAssuntoTipo;
        return $this;
    }
}
