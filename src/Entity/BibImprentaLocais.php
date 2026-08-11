<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibImprentaLocaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibImprentaLocaisRepository::class)]
#[ORM\Table(
    name: 'bib_imprenta_locais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ESTADO', columns: ['cd_estado'])]
class BibImprentaLocais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_imprenta_local', type: 'integer')]
    private ?int $cdImprentaLocal = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 100)]
    private ?string $dsLocal = null;

    #[ORM\Column(name: 'cd_estado', type: 'integer', nullable: true)]
    private ?int $cdEstado = null;

    public function __construct(
        ?string $dsLocal = null,
        ?int $cdEstado = null
    ) {
        $this->dsLocal = $dsLocal;
        $this->cdEstado = $cdEstado;
    }

    public function getCdImprentaLocal(): ?int
    {
        return $this->cdImprentaLocal;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getCdEstado(): ?int
    {
        return $this->cdEstado;
    }

    public function setCdEstado(?int $cdEstado): self
    {
        $this->cdEstado = $cdEstado;
        return $this;
    }
}
