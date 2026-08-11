<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcSelProfAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcSelProfAreasRepository::class)]
#[ORM\Table(
    name: 'proc_sel_prof_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROC_SEL', columns: ['cd_proc_sel'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
class ProcSelProfAreas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_proc_sel', type: 'integer', options: ['default' => '0'])]
    private int $cdProcSel = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_area', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdArea = '';

    #[ORM\Column(name: 'ds_tema', type: 'string', length: 255, nullable: true)]
    private ?string $dsTema = null;

    public function __construct(
        int $cdProcSel = 0,
        string $cdArea = '',
        ?string $dsTema = null
    ) {
        $this->cdProcSel = $cdProcSel;
        $this->cdArea = $cdArea;
        $this->dsTema = $dsTema;
    }

    public function getCdProcSel(): int
    {
        return $this->cdProcSel;
    }

    public function setCdProcSel(int $cdProcSel): self
    {
        $this->cdProcSel = $cdProcSel;
        return $this;
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

    public function getDsTema(): ?string
    {
        return $this->dsTema;
    }

    public function setDsTema(?string $dsTema): self
    {
        $this->dsTema = $dsTema;
        return $this;
    }
}
