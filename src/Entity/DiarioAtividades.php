<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAtividadesRepository::class)]
#[ORM\Table(
    name: 'diario_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Guarda informações de atividades das disciplinas de um pro']
)]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_BIMESTRE', columns: ['nr_bimestre'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class DiarioAtividades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['unsigned' => true, 'comment' => 'Código da atividade.'])]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'dt_atividade', type: 'datetime', nullable: true, options: ['comment' => 'Data da atividade.'])]
    private ?\DateTimeInterface $dtAtividade = null;

    #[ORM\Column(name: 'nr_carga_horaria', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Carga horária.'])]
    private ?int $nrCargaHoraria = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 255, nullable: true, options: ['comment' => 'Descrição da atividade.'])]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'ds_observacoes', type: 'string', length: 255, nullable: true, options: ['comment' => 'Observações da atividade.'])]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 255, nullable: true, options: ['comment' => 'Turma da atividade.'])]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, nullable: true, options: ['comment' => 'Curso da atividade.'])]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Anosemestre da atividade.'])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Disciplina da atividade.'])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_bimestre', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Bimestre da atividade.'])]
    private ?int $nrBimestre = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Código do professor responsável pela disciplina.'])]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?\DateTimeInterface $dtAtividade = null,
        ?int $nrCargaHoraria = null,
        ?string $dsAtividade = null,
        ?string $dsObservacoes = null,
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?int $nrAnosemestre = null,
        ?int $cdDisciplina = null,
        ?int $nrBimestre = null,
        ?int $cdProfessor = null,
        ?int $cdGrupo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dtAtividade = $dtAtividade;
        $this->nrCargaHoraria = $nrCargaHoraria;
        $this->dsAtividade = $dsAtividade;
        $this->dsObservacoes = $dsObservacoes;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrBimestre = $nrBimestre;
        $this->cdProfessor = $cdProfessor;
        $this->cdGrupo = $cdGrupo;
        $this->dtBase = $dtBase;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function getDtAtividade(): ?\DateTimeInterface
    {
        return $this->dtAtividade;
    }

    public function setDtAtividade(?\DateTimeInterface $dtAtividade): self
    {
        $this->dtAtividade = $dtAtividade;
        return $this;
    }

    public function getNrCargaHoraria(): ?int
    {
        return $this->nrCargaHoraria;
    }

    public function setNrCargaHoraria(?int $nrCargaHoraria): self
    {
        $this->nrCargaHoraria = $nrCargaHoraria;
        return $this;
    }

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getNrBimestre(): ?int
    {
        return $this->nrBimestre;
    }

    public function setNrBimestre(?int $nrBimestre): self
    {
        $this->nrBimestre = $nrBimestre;
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

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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
