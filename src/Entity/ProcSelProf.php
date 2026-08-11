<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcSelProfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcSelProfRepository::class)]
#[ORM\Table(
    name: 'proc_sel_prof',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_PLANO_PGTO', columns: ['cd_plano_pgto'])]
class ProcSelProf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_proc_sel', type: 'integer', options: ['default' => '0'])]
    private int $cdProcSel = 0;

    #[ORM\Column(name: 'ds_proc_sel', type: 'string', length: 100, nullable: true)]
    private ?string $dsProcSel = null;

    #[ORM\Column(name: 'sn_aberto', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAberto = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_plano_pgto', type: 'integer', nullable: true)]
    private ?int $cdPlanoPgto = null;

    public function __construct(
        int $cdProcSel = 0,
        ?string $dsProcSel = null,
        ?string $snAberto = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPlanoPgto = null
    ) {
        $this->cdProcSel = $cdProcSel;
        $this->dsProcSel = $dsProcSel;
        $this->snAberto = $snAberto;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPlanoPgto = $cdPlanoPgto;
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

    public function getDsProcSel(): ?string
    {
        return $this->dsProcSel;
    }

    public function setDsProcSel(?string $dsProcSel): self
    {
        $this->dsProcSel = $dsProcSel;
        return $this;
    }

    public function getSnAberto(): ?string
    {
        return $this->snAberto;
    }

    public function setSnAberto(?string $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdPlanoPgto(): ?int
    {
        return $this->cdPlanoPgto;
    }

    public function setCdPlanoPgto(?int $cdPlanoPgto): self
    {
        $this->cdPlanoPgto = $cdPlanoPgto;
        return $this;
    }
}
