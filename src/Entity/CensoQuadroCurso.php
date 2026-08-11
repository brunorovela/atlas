<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoQuadroCursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoQuadroCursoRepository::class)]
#[ORM\Table(
    name: 'censo_quadro_curso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUADRO', columns: ['cd_quadro'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class CensoQuadroCurso
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_quadro', type: 'smallint', options: ['default' => '0'])]
    private int $cdQuadro = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    public function __construct(
        int $cdQuadro = 0,
        ?string $cdCurso = null
    ) {
        $this->cdQuadro = $cdQuadro;
        $this->cdCurso = $cdCurso;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }
}
