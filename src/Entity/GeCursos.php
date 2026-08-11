<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\GeCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeCursosRepository::class)]
#[ORM\Table(
    name: 'ge_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_NR_ETAPA', columns: ['nr_etapa'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_ge_atividade'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['cd_grade'])]
class GeCursos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosem', type: 'smallint')]
    private ?int $nrAnosem = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_etapa', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrEtapa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_ge_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGeAtividade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grade', type: 'integer')]
    private ?int $cdGrade = null;

    #[ORM\Column(name: 'nr_horas', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $nrHoras = null;

    #[ORM\Column(name: 'sn_validar_horas_grade', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snValidarHorasGrade = 0;

    public function __construct(
        ?string $cdCurso = null,
        ?int $nrAnosem = null,
        ?int $nrEtapa = null,
        ?int $cdGeAtividade = null,
        ?int $cdGrade = null,
        ?float $nrHoras = null,
        ?int $snValidarHorasGrade = 0
    ) {
        $this->cdCurso = $cdCurso;
        $this->nrAnosem = $nrAnosem;
        $this->nrEtapa = $nrEtapa;
        $this->cdGeAtividade = $cdGeAtividade;
        $this->cdGrade = $cdGrade;
        $this->nrHoras = $nrHoras;
        $this->snValidarHorasGrade = $snValidarHorasGrade;
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

    public function getCdGeAtividade(): ?int
    {
        return $this->cdGeAtividade;
    }

    public function setCdGeAtividade(?int $cdGeAtividade): self
    {
        $this->cdGeAtividade = $cdGeAtividade;
        return $this;
    }

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function getNrHoras(): ?float
    {
        return $this->nrHoras;
    }

    public function setNrHoras(?float $nrHoras): self
    {
        $this->nrHoras = $nrHoras;
        return $this;
    }

    public function getSnValidarHorasGrade(): ?int
    {
        return $this->snValidarHorasGrade;
    }

    public function setSnValidarHorasGrade(?int $snValidarHorasGrade): self
    {
        $this->snValidarHorasGrade = $snValidarHorasGrade;
        return $this;
    }
}
