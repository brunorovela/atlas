<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioJustificaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioJustificaRepository::class)]
#[ORM\Table(
    name: 'diario_justifica',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_BIMESTRE', columns: ['cd_bimestre'])]
#[ORM\Index(name: 'IX_NR_AULA', columns: ['nr_aula'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class DiarioJustifica
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_justificativa', type: 'integer')]
    private ?int $cdJustificativa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_bimestre', type: 'smallint')]
    private ?int $cdBimestre = null;

    #[ORM\Column(name: 'nr_aula', type: 'smallint')]
    private ?int $nrAula = null;

    #[ORM\Column(name: 'dt_aula', type: 'datetime')]
    private ?\DateTimeInterface $dtAula = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_qtd_aulas', type: 'smallint')]
    private ?int $nrQtdAulas = null;

    #[ORM\Column(name: 'cd_usuario_registrou', type: 'integer')]
    private ?int $cdUsuarioRegistrou = null;

    #[ORM\Column(name: 'ds_justificativa', type: 'string', length: 255)]
    private ?string $dsJustificativa = null;

    #[ORM\Column(name: 'dt_justificativa', type: 'datetime')]
    private ?\DateTimeInterface $dtJustificativa = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdBimestre = null,
        ?int $nrAula = null,
        ?\DateTimeInterface $dtAula = null,
        ?int $cdPessoa = null,
        ?int $nrQtdAulas = null,
        ?int $cdUsuarioRegistrou = null,
        ?string $dsJustificativa = null,
        ?\DateTimeInterface $dtJustificativa = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrAula = $nrAula;
        $this->dtAula = $dtAula;
        $this->cdPessoa = $cdPessoa;
        $this->nrQtdAulas = $nrQtdAulas;
        $this->cdUsuarioRegistrou = $cdUsuarioRegistrou;
        $this->dsJustificativa = $dsJustificativa;
        $this->dtJustificativa = $dtJustificativa;
    }

    public function getCdJustificativa(): ?int
    {
        return $this->cdJustificativa;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdBimestre(): ?int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(?int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrAula(): ?int
    {
        return $this->nrAula;
    }

    public function setNrAula(?int $nrAula): self
    {
        $this->nrAula = $nrAula;
        return $this;
    }

    public function getDtAula(): ?\DateTimeInterface
    {
        return $this->dtAula;
    }

    public function setDtAula(?\DateTimeInterface $dtAula): self
    {
        $this->dtAula = $dtAula;
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

    public function getNrQtdAulas(): ?int
    {
        return $this->nrQtdAulas;
    }

    public function setNrQtdAulas(?int $nrQtdAulas): self
    {
        $this->nrQtdAulas = $nrQtdAulas;
        return $this;
    }

    public function getCdUsuarioRegistrou(): ?int
    {
        return $this->cdUsuarioRegistrou;
    }

    public function setCdUsuarioRegistrou(?int $cdUsuarioRegistrou): self
    {
        $this->cdUsuarioRegistrou = $cdUsuarioRegistrou;
        return $this;
    }

    public function getDsJustificativa(): ?string
    {
        return $this->dsJustificativa;
    }

    public function setDsJustificativa(?string $dsJustificativa): self
    {
        $this->dsJustificativa = $dsJustificativa;
        return $this;
    }

    public function getDtJustificativa(): ?\DateTimeInterface
    {
        return $this->dtJustificativa;
    }

    public function setDtJustificativa(?\DateTimeInterface $dtJustificativa): self
    {
        $this->dtJustificativa = $dtJustificativa;
        return $this;
    }
}
