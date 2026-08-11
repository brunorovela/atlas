<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibAutoresTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAutoresTiposRepository::class)]
#[ORM\Table(
    name: 'bib_autores_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibAutoresTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_autor', type: 'integer')]
    private ?int $cdTipoAutor = null;

    #[ORM\Column(name: 'ds_tipo_autor', type: 'string', length: 100)]
    private ?string $dsTipoAutor = null;

    #[ORM\Column(name: 'nr_ordem_importancia', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrOrdemImportancia = 1;

    public function __construct(
        ?string $dsTipoAutor = null,
        int $nrOrdemImportancia = 1
    ) {
        $this->dsTipoAutor = $dsTipoAutor;
        $this->nrOrdemImportancia = $nrOrdemImportancia;
    }

    public function getCdTipoAutor(): ?int
    {
        return $this->cdTipoAutor;
    }

    public function getDsTipoAutor(): ?string
    {
        return $this->dsTipoAutor;
    }

    public function setDsTipoAutor(?string $dsTipoAutor): self
    {
        $this->dsTipoAutor = $dsTipoAutor;
        return $this;
    }

    public function getNrOrdemImportancia(): int
    {
        return $this->nrOrdemImportancia;
    }

    public function setNrOrdemImportancia(int $nrOrdemImportancia): self
    {
        $this->nrOrdemImportancia = $nrOrdemImportancia;
        return $this;
    }
}
