<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcSelAreasDiscRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcSelAreasDiscRepository::class)]
#[ORM\Table(
    name: 'proc_sel_areas_disc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_DISC', columns: ['cd_disc'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class ProcSelAreasDisc
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_area', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdArea = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disc', type: 'integer', options: ['default' => '0'])]
    private int $cdDisc = 0;

    public function __construct(
        string $cdArea = '',
        string $cdCurso = '',
        int $cdDisc = 0
    ) {
        $this->cdArea = $cdArea;
        $this->cdCurso = $cdCurso;
        $this->cdDisc = $cdDisc;
    }

    public function getCdArea(): string
    {
        return $this->cdArea;
    }

    public function setCdArea(string $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdDisc(): int
    {
        return $this->cdDisc;
    }

    public function setCdDisc(int $cdDisc): self
    {
        $this->cdDisc = $cdDisc;
        return $this;
    }
}
