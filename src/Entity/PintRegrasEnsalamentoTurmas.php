<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintRegrasEnsalamentoTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintRegrasEnsalamentoTurmasRepository::class)]
#[ORM\Table(
    name: 'pint_regras_ensalamento_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REGRA_ENSALAMENTO', columns: ['cd_regra_ensalamento'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PintRegrasEnsalamentoTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraTurma = null;

    #[ORM\Column(name: 'cd_regra_ensalamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraEnsalamento = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?int $cdRegraEnsalamento = null,
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdRegraTurma(): ?int
    {
        return $this->cdRegraTurma;
    }

    public function getCdRegraEnsalamento(): ?int
    {
        return $this->cdRegraEnsalamento;
    }

    public function setCdRegraEnsalamento(?int $cdRegraEnsalamento): self
    {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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
