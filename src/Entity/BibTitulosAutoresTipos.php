<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibTitulosAutoresTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosAutoresTiposRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_autores_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibTitulosAutoresTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_autoria', type: 'integer')]
    private ?int $cdTipoAutoria = null;

    #[ORM\Column(name: 'ds_tipo_autoria', type: 'string', length: 100)]
    private ?string $dsTipoAutoria = null;

    #[ORM\Column(name: 'nr_ordem_importancia', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrOrdemImportancia = 1;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 10, nullable: true)]
    private ?string $dsSigla = null;

    public function __construct(
        ?string $dsTipoAutoria = null,
        int $nrOrdemImportancia = 1,
        ?string $dsSigla = null
    ) {
        $this->dsTipoAutoria = $dsTipoAutoria;
        $this->nrOrdemImportancia = $nrOrdemImportancia;
        $this->dsSigla = $dsSigla;
    }

    public function getCdTipoAutoria(): ?int
    {
        return $this->cdTipoAutoria;
    }

    public function getDsTipoAutoria(): ?string
    {
        return $this->dsTipoAutoria;
    }

    public function setDsTipoAutoria(?string $dsTipoAutoria): self
    {
        $this->dsTipoAutoria = $dsTipoAutoria;
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

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }
}
