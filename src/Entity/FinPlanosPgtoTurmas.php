<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanosPgtoTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoTurmasRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
class FinPlanosPgtoTurmas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?int $cdPlano = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }
}
