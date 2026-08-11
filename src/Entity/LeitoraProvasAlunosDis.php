<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LeitoraProvasAlunosDisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasAlunosDisRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_alunos_dis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_aluno_disciplina', columns: ['cd_prova_aluno', 'cd_prova_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROVA_ALUNO', columns: ['cd_prova_aluno'])]
#[ORM\Index(name: 'IX_CD_PROVA_DISCIPLINA', columns: ['cd_prova_disciplina'])]
class LeitoraProvasAlunosDis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_aluno_disciplina', type: 'integer')]
    private ?int $cdProvaAlunoDisciplina = null;

    #[ORM\Column(name: 'cd_prova_aluno', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaAluno = 0;

    #[ORM\Column(name: 'cd_prova_disciplina', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaDisciplina = 0;

    #[ORM\Column(name: 'nr_acertos', type: 'float', nullable: true)]
    private ?float $nrAcertos = null;

    public function __construct(
        int $cdProvaAluno = 0,
        int $cdProvaDisciplina = 0,
        ?float $nrAcertos = null
    ) {
        $this->cdProvaAluno = $cdProvaAluno;
        $this->cdProvaDisciplina = $cdProvaDisciplina;
        $this->nrAcertos = $nrAcertos;
    }

    public function getCdProvaAlunoDisciplina(): ?int
    {
        return $this->cdProvaAlunoDisciplina;
    }

    public function getCdProvaAluno(): int
    {
        return $this->cdProvaAluno;
    }

    public function setCdProvaAluno(int $cdProvaAluno): self
    {
        $this->cdProvaAluno = $cdProvaAluno;
        return $this;
    }

    public function getCdProvaDisciplina(): int
    {
        return $this->cdProvaDisciplina;
    }

    public function setCdProvaDisciplina(int $cdProvaDisciplina): self
    {
        $this->cdProvaDisciplina = $cdProvaDisciplina;
        return $this;
    }

    public function getNrAcertos(): ?float
    {
        return $this->nrAcertos;
    }

    public function setNrAcertos(?float $nrAcertos): self
    {
        $this->nrAcertos = $nrAcertos;
        return $this;
    }
}
