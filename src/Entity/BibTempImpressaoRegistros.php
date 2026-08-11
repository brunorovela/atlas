<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibTempImpressaoRegistrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTempImpressaoRegistrosRepository::class)]
#[ORM\Table(
    name: 'bib_temp_impressao_registros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_registro', columns: ['cd_registro'])]
class BibTempImpressaoRegistros
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_registro', type: 'string', length: 50)]
    private ?string $cdRegistro = null;

    public function __construct(
        ?string $cdRegistro = null
    ) {
        $this->cdRegistro = $cdRegistro;
    }

    public function getCdRegistro(): ?string
    {
        return $this->cdRegistro;
    }

    public function setCdRegistro(?string $cdRegistro): self
    {
        $this->cdRegistro = $cdRegistro;
        return $this;
    }
}
