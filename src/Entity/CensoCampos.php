<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoCamposRepository::class)]
#[ORM\Table(
    name: 'censo_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CensoCampos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'string', length: 10, options: ['default' => ''])]
    private string $cdCampo = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_quadro', type: 'smallint', options: ['default' => '0'])]
    private int $cdQuadro = 0;

    #[ORM\Column(name: 'ds_campo', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'nr_semestre', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrSemestre = 0;

    public function __construct(
        string $cdCampo = '',
        int $cdQuadro = 0,
        ?string $dsCampo = null,
        ?string $dsSql = null,
        ?int $nrSemestre = 0
    ) {
        $this->cdCampo = $cdCampo;
        $this->cdQuadro = $cdQuadro;
        $this->dsCampo = $dsCampo;
        $this->dsSql = $dsSql;
        $this->nrSemestre = $nrSemestre;
    }

    public function getCdCampo(): string
    {
        return $this->cdCampo;
    }

    public function setCdCampo(string $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getCdQuadro(): int
    {
        return $this->cdQuadro;
    }

    public function setCdQuadro(int $cdQuadro): self
    {
        $this->cdQuadro = $cdQuadro;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
        return $this;
    }

    public function getNrSemestre(): ?int
    {
        return $this->nrSemestre;
    }

    public function setNrSemestre(?int $nrSemestre): self
    {
        $this->nrSemestre = $nrSemestre;
        return $this;
    }
}
