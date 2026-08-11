<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DispDisciplinaAgrupamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DispDisciplinaAgrupamentoRepository::class)]
#[ORM\Table(
    name: 'disp_disciplina_agrupamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DispDisciplinaAgrupamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_agrupamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAgrupamento = null;

    #[ORM\Column(name: 'nm_agrupamento', type: 'string', length: 255, nullable: true)]
    private ?string $nmAgrupamento = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, nullable: true)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?string $nmAgrupamento = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdDisciplinaPai = null,
        ?int $cdColigada = null
    ) {
        $this->nmAgrupamento = $nmAgrupamento;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->cdColigada = $cdColigada;
    }

    public function getCdAgrupamento(): ?int
    {
        return $this->cdAgrupamento;
    }

    public function getNmAgrupamento(): ?string
    {
        return $this->nmAgrupamento;
    }

    public function setNmAgrupamento(?string $nmAgrupamento): self
    {
        $this->nmAgrupamento = $nmAgrupamento;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
