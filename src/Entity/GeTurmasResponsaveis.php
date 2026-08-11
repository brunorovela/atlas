<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeTurmasResponsaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeTurmasResponsaveisRepository::class)]
#[ORM\Table(
    name: 'ge_turmas_responsaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para relacionar os responsáveis das turmas.']
)]
#[ORM\UniqueConstraint(name: 'uk_turma_resp', columns: ['cd_curso', 'cd_turma', 'nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class GeTurmasResponsaveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turma_responsavel', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTurmaResponsavel = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    public function __construct(
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?int $nrAnosemestre = null,
        int $cdPessoa = 0
    ) {
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdTurmaResponsavel(): ?int
    {
        return $this->cdTurmaResponsavel;
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

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }
}
