<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtRiAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtRiAlunoRepository::class)]
#[ORM\Table(
    name: 'agvt_ri_aluno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Representa uma rotina criada para um aluno. 
 Cada aluno deve ter uma rotina em uma turma em um determinado dia.']
)]
#[ORM\UniqueConstraint(name: 'nr_anosemestre', columns: ['nr_anosemestre', 'cd_curso', 'cd_turma', 'cd_professor', 'cd_aluno', 'dt_rotina'])]
#[ORM\UniqueConstraint(name: 'IX_DT_ROTINA', columns: ['nr_anosemestre', 'cd_curso', 'cd_turma', 'cd_professor', 'cd_aluno', 'dt_rotina'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
class AgvtRiAluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rotina', type: 'integer')]
    private ?int $cdRotina = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', nullable: true)]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'dt_rotina', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRotina = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'sn_enviar_mobile', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEnviarMobile = false;

    #[ORM\Column(name: 'dt_liberacao_mobile', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacaoMobile = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdProfessor = null,
        ?int $cdAluno = null,
        ?\DateTimeInterface $dtRotina = null,
        ?string $meDescricao = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?bool $snEnviarMobile = false,
        ?\DateTimeInterface $dtLiberacaoMobile = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdProfessor = $cdProfessor;
        $this->cdAluno = $cdAluno;
        $this->dtRotina = $dtRotina;
        $this->meDescricao = $meDescricao;
        $this->dtAlteracao = $dtAlteracao;
        $this->snEnviarMobile = $snEnviarMobile;
        $this->dtLiberacaoMobile = $dtLiberacaoMobile;
        $this->dtBase = $dtBase;
    }

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getDtRotina(): ?\DateTimeInterface
    {
        return $this->dtRotina;
    }

    public function setDtRotina(?\DateTimeInterface $dtRotina): self
    {
        $this->dtRotina = $dtRotina;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function isSnEnviarMobile(): ?bool
    {
        return $this->snEnviarMobile;
    }

    public function setSnEnviarMobile(?bool $snEnviarMobile): self
    {
        $this->snEnviarMobile = $snEnviarMobile;
        return $this;
    }

    public function getDtLiberacaoMobile(): ?\DateTimeInterface
    {
        return $this->dtLiberacaoMobile;
    }

    public function setDtLiberacaoMobile(?\DateTimeInterface $dtLiberacaoMobile): self
    {
        $this->dtLiberacaoMobile = $dtLiberacaoMobile;
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
