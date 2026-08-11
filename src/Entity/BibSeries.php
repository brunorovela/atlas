<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibSeriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibSeriesRepository::class)]
#[ORM\Table(
    name: 'bib_series',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_bib_series_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_series_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibSeries
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_serie', type: 'integer')]
    private ?int $cdSerie = null;

    #[ORM\Column(name: 'ds_serie', type: 'string', length: 100)]
    private ?string $dsSerie = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsSerie = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsSerie = $dsSerie;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdSerie(): ?int
    {
        return $this->cdSerie;
    }

    public function getDsSerie(): ?string
    {
        return $this->dsSerie;
    }

    public function setDsSerie(?string $dsSerie): self
    {
        $this->dsSerie = $dsSerie;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
