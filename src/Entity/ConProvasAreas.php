<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasAreasRepository::class)]
#[ORM\Table(
    name: 'con_provas_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_area', columns: ['cd_prova_area'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
class ConProvasAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaArea = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'nr_peso', type: 'smallfloat', options: ['default' => '0.000'])]
    private float $nrPeso = 0.0;

    #[ORM\Column(name: 'nr_minima', type: 'float', nullable: true)]
    private ?float $nrMinima = null;

    #[ORM\Column(name: 'nr_criterio_desempate', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrCriterioDesempate = 0;

    public function __construct(
        ?int $cdProva = null,
        ?int $cdArea = null,
        float $nrPeso = 0.0,
        ?float $nrMinima = null,
        ?int $nrCriterioDesempate = 0
    ) {
        $this->cdProva = $cdProva;
        $this->cdArea = $cdArea;
        $this->nrPeso = $nrPeso;
        $this->nrMinima = $nrMinima;
        $this->nrCriterioDesempate = $nrCriterioDesempate;
    }

    public function getCdProvaArea(): ?int
    {
        return $this->cdProvaArea;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getNrPeso(): float
    {
        return $this->nrPeso;
    }

    public function setNrPeso(float $nrPeso): self
    {
        $this->nrPeso = $nrPeso;
        return $this;
    }

    public function getNrMinima(): ?float
    {
        return $this->nrMinima;
    }

    public function setNrMinima(?float $nrMinima): self
    {
        $this->nrMinima = $nrMinima;
        return $this;
    }

    public function getNrCriterioDesempate(): ?int
    {
        return $this->nrCriterioDesempate;
    }

    public function setNrCriterioDesempate(?int $nrCriterioDesempate): self
    {
        $this->nrCriterioDesempate = $nrCriterioDesempate;
        return $this;
    }
}
