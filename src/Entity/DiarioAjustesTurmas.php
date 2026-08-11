<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioAjustesTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAjustesTurmasRepository::class)]
#[ORM\Table(
    name: 'diario_ajustes_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['cd_ajuste', 'cd_turma', 'nr_anosem', 'nr_etapa'])]
#[ORM\Index(name: 'IX_CD_AJUSTE', columns: ['cd_ajuste'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_NR_ETAPA', columns: ['nr_etapa'])]
class DiarioAjustesTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ajuste_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAjusteTurma = null;

    #[ORM\Column(name: 'cd_ajuste', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAjuste = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    #[ORM\Column(name: 'nr_etapa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrEtapa = null;

    public function __construct(
        ?int $cdAjuste = null,
        ?string $cdTurma = null,
        ?int $nrAnosem = null,
        ?int $nrEtapa = null
    ) {
        $this->cdAjuste = $cdAjuste;
        $this->cdTurma = $cdTurma;
        $this->nrAnosem = $nrAnosem;
        $this->nrEtapa = $nrEtapa;
    }

    public function getCdAjusteTurma(): ?int
    {
        return $this->cdAjusteTurma;
    }

    public function getCdAjuste(): ?int
    {
        return $this->cdAjuste;
    }

    public function setCdAjuste(?int $cdAjuste): self
    {
        $this->cdAjuste = $cdAjuste;
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

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }
}
