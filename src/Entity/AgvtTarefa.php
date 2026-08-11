<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtTarefaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtTarefaRepository::class)]
#[ORM\Table(
    name: 'agvt_tarefa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Esta tabela representa uma tarefa de casa, com um prazo definido.']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
class AgvtTarefa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tarefa', type: 'integer')]
    private ?int $cdTarefa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'dt_prazo_entrega', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrazoEntrega = null;

    #[ORM\Column(name: 'ds_objetivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsObjetivo = null;

    #[ORM\Column(name: 'me_tarefa', type: 'text', length: 65535, nullable: true)]
    private ?string $meTarefa = null;

    #[ORM\Column(name: 'me_material', type: 'text', length: 65535, nullable: true)]
    private ?string $meMaterial = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDisciplina = 0;

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
        ?\DateTimeInterface $dtPrazoEntrega = null,
        ?string $dsObjetivo = null,
        ?string $meTarefa = null,
        ?string $meMaterial = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?int $cdDisciplina = 0,
        ?bool $snEnviarMobile = false,
        ?\DateTimeInterface $dtLiberacaoMobile = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdProfessor = $cdProfessor;
        $this->dtPrazoEntrega = $dtPrazoEntrega;
        $this->dsObjetivo = $dsObjetivo;
        $this->meTarefa = $meTarefa;
        $this->meMaterial = $meMaterial;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdDisciplina = $cdDisciplina;
        $this->snEnviarMobile = $snEnviarMobile;
        $this->dtLiberacaoMobile = $dtLiberacaoMobile;
        $this->dtBase = $dtBase;
    }

    public function getCdTarefa(): ?int
    {
        return $this->cdTarefa;
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

    public function getDtPrazoEntrega(): ?\DateTimeInterface
    {
        return $this->dtPrazoEntrega;
    }

    public function setDtPrazoEntrega(?\DateTimeInterface $dtPrazoEntrega): self
    {
        $this->dtPrazoEntrega = $dtPrazoEntrega;
        return $this;
    }

    public function getDsObjetivo(): ?string
    {
        return $this->dsObjetivo;
    }

    public function setDsObjetivo(?string $dsObjetivo): self
    {
        $this->dsObjetivo = $dsObjetivo;
        return $this;
    }

    public function getMeTarefa(): ?string
    {
        return $this->meTarefa;
    }

    public function setMeTarefa(?string $meTarefa): self
    {
        $this->meTarefa = $meTarefa;
        return $this;
    }

    public function getMeMaterial(): ?string
    {
        return $this->meMaterial;
    }

    public function setMeMaterial(?string $meMaterial): self
    {
        $this->meMaterial = $meMaterial;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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
