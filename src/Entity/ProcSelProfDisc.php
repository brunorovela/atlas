<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcSelProfDiscRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcSelProfDiscRepository::class)]
#[ORM\Table(
    name: 'proc_sel_prof_disc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROC_SEL', columns: ['cd_proc_sel'])]
#[ORM\Index(name: 'IX_CD_DISC', columns: ['cd_disc'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class ProcSelProfDisc
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_proc_sel', type: 'integer', options: ['default' => '0'])]
    private int $cdProcSel = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disc', type: 'integer', options: ['default' => '0'])]
    private int $cdDisc = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Column(name: 'ds_titulacao_minima', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsTitulacaoMinima = null;

    #[ORM\Column(name: 'sn_matutino', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snMatutino = null;

    #[ORM\Column(name: 'sn_vespertino', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snVespertino = null;

    #[ORM\Column(name: 'sn_noturno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snNoturno = null;

    public function __construct(
        int $cdProcSel = 0,
        int $cdDisc = 0,
        string $cdCurso = '',
        ?string $dsTitulacaoMinima = null,
        ?string $snMatutino = null,
        ?string $snVespertino = null,
        ?string $snNoturno = null
    ) {
        $this->cdProcSel = $cdProcSel;
        $this->cdDisc = $cdDisc;
        $this->cdCurso = $cdCurso;
        $this->dsTitulacaoMinima = $dsTitulacaoMinima;
        $this->snMatutino = $snMatutino;
        $this->snVespertino = $snVespertino;
        $this->snNoturno = $snNoturno;
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

    public function getCdDisc(): int
    {
        return $this->cdDisc;
    }

    public function setCdDisc(int $cdDisc): self
    {
        $this->cdDisc = $cdDisc;
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

    public function getDsTitulacaoMinima(): ?string
    {
        return $this->dsTitulacaoMinima;
    }

    public function setDsTitulacaoMinima(?string $dsTitulacaoMinima): self
    {
        $this->dsTitulacaoMinima = $dsTitulacaoMinima;
        return $this;
    }

    public function getSnMatutino(): ?string
    {
        return $this->snMatutino;
    }

    public function setSnMatutino(?string $snMatutino): self
    {
        $this->snMatutino = $snMatutino;
        return $this;
    }

    public function getSnVespertino(): ?string
    {
        return $this->snVespertino;
    }

    public function setSnVespertino(?string $snVespertino): self
    {
        $this->snVespertino = $snVespertino;
        return $this;
    }

    public function getSnNoturno(): ?string
    {
        return $this->snNoturno;
    }

    public function setSnNoturno(?string $snNoturno): self
    {
        $this->snNoturno = $snNoturno;
        return $this;
    }
}
