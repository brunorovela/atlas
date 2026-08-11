<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoMdlCohortCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoMdlCohortCursosRepository::class)]
#[ORM\Table(
    name: 'integracao_mdl_cohort_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO_UNIMESTRE', columns: ['cd_curso_unimestre'])]
#[ORM\Index(name: 'IX_CD_COHORT_MOODLE', columns: ['cd_cohort_moodle'])]
class IntegracaoMdlCohortCursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mdl_cohort', type: 'bigint')]
    private ?string $cdMdlCohort = null;

    #[ORM\Column(name: 'cd_curso_unimestre', type: 'string', length: 15, nullable: true)]
    private ?string $cdCursoUnimestre = null;

    #[ORM\Column(name: 'cd_cohort_moodle', type: 'bigint', nullable: true)]
    private ?string $cdCohortMoodle = null;

    public function __construct(
        ?string $cdCursoUnimestre = null,
        ?string $cdCohortMoodle = null
    ) {
        $this->cdCursoUnimestre = $cdCursoUnimestre;
        $this->cdCohortMoodle = $cdCohortMoodle;
    }

    public function getCdMdlCohort(): ?string
    {
        return $this->cdMdlCohort;
    }

    public function getCdCursoUnimestre(): ?string
    {
        return $this->cdCursoUnimestre;
    }

    public function setCdCursoUnimestre(?string $cdCursoUnimestre): self
    {
        $this->cdCursoUnimestre = $cdCursoUnimestre;
        return $this;
    }

    public function getCdCohortMoodle(): ?string
    {
        return $this->cdCohortMoodle;
    }

    public function setCdCohortMoodle(?string $cdCohortMoodle): self
    {
        $this->cdCohortMoodle = $cdCohortMoodle;
        return $this;
    }
}
