<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LeitoraProvasDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasDisciplinasRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_disciplina', columns: ['cd_prova_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
class LeitoraProvasDisciplinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_disciplina', type: 'integer')]
    private ?int $cdProvaDisciplina = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['default' => '0'])]
    private int $cdProva = 0;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['default' => '0'])]
    private int $cdDisciplina = 0;

    public function __construct(
        int $cdProva = 0,
        string $cdCurso = '',
        int $cdDisciplina = 0
    ) {
        $this->cdProva = $cdProva;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
    }

    public function getCdProvaDisciplina(): ?int
    {
        return $this->cdProvaDisciplina;
    }

    public function getCdProva(): int
    {
        return $this->cdProva;
    }

    public function setCdProva(int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getCdDisciplina(): int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }
}
