<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoQuadroCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoQuadroCamposRepository::class)]
#[ORM\Table(
    name: 'censo_quadro_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUADRO', columns: ['cd_quadro'])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
class CensoQuadroCampos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_quadro', type: 'smallint', options: ['default' => '0'])]
    private int $cdQuadro = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCampo = 0;

    public function __construct(
        int $cdQuadro = 0,
        int $cdCampo = 0
    ) {
        $this->cdQuadro = $cdQuadro;
        $this->cdCampo = $cdCampo;
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

    public function getCdCampo(): int
    {
        return $this->cdCampo;
    }

    public function setCdCampo(int $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }
}
