<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LeitoraProvasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasAlunosRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_aluno', columns: ['cd_prova_aluno'])]
#[ORM\UniqueConstraint(name: 'UK_LEIT_PROVAS_ALUNOS_CD_PESSOA_CD_PROVA_GAB_CD_TURMA_NR_ANOSEM', columns: ['cd_pessoa', 'cd_prova_gabarito', 'cd_turma', 'nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PROVA_GABARITO', columns: ['cd_prova_gabarito'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class LeitoraProvasAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_aluno', type: 'integer')]
    private ?int $cdProvaAluno = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_prova_gabarito', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaGabarito = 0;

    #[ORM\Column(name: 'nr_acertos', type: 'float', nullable: true)]
    private ?float $nrAcertos = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    public function __construct(
        int $cdPessoa = 0,
        int $cdProvaGabarito = 0,
        ?float $nrAcertos = null,
        ?string $cdTurma = null,
        int $nrAnosemestre = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdProvaGabarito = $cdProvaGabarito;
        $this->nrAcertos = $nrAcertos;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdProvaAluno(): ?int
    {
        return $this->cdProvaAluno;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdProvaGabarito(): int
    {
        return $this->cdProvaGabarito;
    }

    public function setCdProvaGabarito(int $cdProvaGabarito): self
    {
        $this->cdProvaGabarito = $cdProvaGabarito;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }
}
