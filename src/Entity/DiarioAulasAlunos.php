<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\DiarioAulasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAulasAlunosRepository::class)]
#[ORM\Table(
    name: 'diario_aulas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_BIMESTRE', columns: ['cd_bimestre'])]
#[ORM\Index(name: 'IX_NR_AULA', columns: ['nr_aula'])]
#[ORM\Index(name: 'IX_CHAVE_COMPLETA', columns: ['cd_turma', 'nr_anosem', 'cd_disciplina', 'cd_bimestre', 'nr_aula'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_AULA_ALUNO', columns: ['cd_aula_aluno'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_aula_aluno']
)]
class DiarioAulasAlunos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosem = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDisciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_bimestre', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdBimestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_aula', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAula = 0;

    #[ORM\Column(name: 'ds_freq', type: 'string', length: 24, nullable: true)]
    private ?string $dsFreq = null;

    #[ORM\Column(name: 'sn_importada', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snImportada = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_aula_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAulaAluno = null;

    public function __construct(
        int $cdPessoa = 0,
        ?string $cdTurma = null,
        int $nrAnosem = 0,
        int $cdDisciplina = 0,
        int $cdBimestre = 0,
        int $nrAula = 0,
        ?string $dsFreq = null,
        int $snImportada = 0,
        ?\DateTimeInterface $dtBase = null,
        ?int $cdAulaAluno = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->nrAnosem = $nrAnosem;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrAula = $nrAula;
        $this->dsFreq = $dsFreq;
        $this->snImportada = $snImportada;
        $this->dtBase = $dtBase;
        $this->cdAulaAluno = $cdAulaAluno;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrAnosem(): int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
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

    public function getCdBimestre(): int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrAula(): int
    {
        return $this->nrAula;
    }

    public function setNrAula(int $nrAula): self
    {
        $this->nrAula = $nrAula;
        return $this;
    }

    public function getDsFreq(): ?string
    {
        return $this->dsFreq;
    }

    public function setDsFreq(?string $dsFreq): self
    {
        $this->dsFreq = $dsFreq;
        return $this;
    }

    public function getSnImportada(): int
    {
        return $this->snImportada;
    }

    public function setSnImportada(int $snImportada): self
    {
        $this->snImportada = $snImportada;
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

    public function getCdAulaAluno(): ?int
    {
        return $this->cdAulaAluno;
    }

    public function setCdAulaAluno(?int $cdAulaAluno): self
    {
        $this->cdAulaAluno = $cdAulaAluno;
        return $this;
    }
}
