<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasPrereqRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasPrereqRepository::class)]
#[ORM\Table(
    name: 'disciplinas_prereq',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['cd_grade'])]
#[ORM\Index(name: 'IX_CD_DISCIPLI', columns: ['cd_discipli'])]
#[ORM\Index(name: 'IX_CD_DISCIPLI_PRE', columns: ['cd_discipli_pre'])]
class DisciplinasPrereq
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_discipli', type: 'integer', options: ['default' => '0'])]
    private int $cdDiscipli = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_discipli_pre', type: 'integer', options: ['default' => '0'])]
    private int $cdDiscipliPre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grade', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdGrade = 0;

    public function __construct(
        string $cdCurso = '',
        int $cdDiscipli = 0,
        int $cdDiscipliPre = 0,
        int $cdGrade = 0
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdDiscipli = $cdDiscipli;
        $this->cdDiscipliPre = $cdDiscipliPre;
        $this->cdGrade = $cdGrade;
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

    public function getCdDiscipli(): int
    {
        return $this->cdDiscipli;
    }

    public function setCdDiscipli(int $cdDiscipli): self
    {
        $this->cdDiscipli = $cdDiscipli;
        return $this;
    }

    public function getCdDiscipliPre(): int
    {
        return $this->cdDiscipliPre;
    }

    public function setCdDiscipliPre(int $cdDiscipliPre): self
    {
        $this->cdDiscipliPre = $cdDiscipliPre;
        return $this;
    }

    public function getCdGrade(): int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }
}
