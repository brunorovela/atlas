<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoCamposFiltroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoCamposFiltroRepository::class)]
#[ORM\Table(
    name: 'censo_campos_filtro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUADRO', columns: ['cd_quadro'])]
class CensoCamposFiltro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'string', length: 20)]
    private ?string $cdCampo = null;

    #[ORM\Column(name: 'cd_quadro', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdQuadro = 0;

    #[ORM\Column(name: 'ds_filtro', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFiltro = null;

    public function __construct(
        ?string $cdCampo = null,
        ?int $cdQuadro = 0,
        ?string $dsFiltro = null
    ) {
        $this->cdCampo = $cdCampo;
        $this->cdQuadro = $cdQuadro;
        $this->dsFiltro = $dsFiltro;
    }

    public function getCdCampo(): ?string
    {
        return $this->cdCampo;
    }

    public function setCdCampo(?string $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getCdQuadro(): ?int
    {
        return $this->cdQuadro;
    }

    public function setCdQuadro(?int $cdQuadro): self
    {
        $this->cdQuadro = $cdQuadro;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }
}
