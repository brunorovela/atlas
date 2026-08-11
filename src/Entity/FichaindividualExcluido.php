<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FichaindividualExcluidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaindividualExcluidoRepository::class)]
#[ORM\Table(
    name: 'fichaindividual_excluido',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FichaindividualExcluido
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fichaindividual_excluido', type: 'integer')]
    private ?int $cdFichaindividualExcluido = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_turma_matricula', type: 'string', length: 50)]
    private ?string $cdTurmaMatricula = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_situacao', type: 'smallint')]
    private ?int $nrSituacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $cdTurma = null,
        ?string $cdTurmaMatricula = null,
        ?int $cdDisciplina = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?int $nrSituacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->cdTurmaMatricula = $cdTurmaMatricula;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->nrSituacao = $nrSituacao;
        $this->dtBase = $dtBase;
    }

    public function getCdFichaindividualExcluido(): ?int
    {
        return $this->cdFichaindividualExcluido;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdTurmaMatricula(): ?string
    {
        return $this->cdTurmaMatricula;
    }

    public function setCdTurmaMatricula(?string $cdTurmaMatricula): self
    {
        $this->cdTurmaMatricula = $cdTurmaMatricula;
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

    public function getNrSituacao(): ?int
    {
        return $this->nrSituacao;
    }

    public function setNrSituacao(?int $nrSituacao): self
    {
        $this->nrSituacao = $nrSituacao;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
