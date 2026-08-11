<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FichaFaltasJustificadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaFaltasJustificadasRepository::class)]
#[ORM\Table(
    name: 'ficha_faltas_justificadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FichaFaltasJustificadas
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_serie', type: 'smallint')]
    private ?int $nrSerie = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'nr_faltas', type: 'integer', options: ['default' => '0'])]
    private int $nrFaltas = 0;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?int $cdDisciplina = null,
        ?int $nrSerie = null,
        ?int $nrEtapa = null,
        int $nrFaltas = 0
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrSerie = $nrSerie;
        $this->nrEtapa = $nrEtapa;
        $this->nrFaltas = $nrFaltas;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
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

    public function getNrFaltas(): int
    {
        return $this->nrFaltas;
    }

    public function setNrFaltas(int $nrFaltas): self
    {
        $this->nrFaltas = $nrFaltas;
        return $this;
    }
}
