<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TurmasHorariosConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasHorariosConfigRepository::class)]
#[ORM\Table(
    name: 'turmas_horarios_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_TURMAS_HORARIOS_TURMA_BASE', columns: ['nr_anosemestre', 'cd_turma_base'])]
#[ORM\Index(name: 'IDX_TURMAS_HORARIOS_TURMA', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'FK_TURMAS_HORARIOS_HORARIO', columns: ['cd_horario'])]
#[ORM\Index(name: 'FK_TURMASHORA_SALA_UNI_SALAS', columns: ['cd_sala'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_NR_DIA_SEMANA', columns: ['nr_dia_semana'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
#[ORM\Index(name: 'IX_DT_INICIAL', columns: ['dt_inicial'])]
#[ORM\Index(name: 'IX_DT_FINAL', columns: ['dt_final'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE_CD_TURMA_CD_DISCIPLINA', columns: ['nr_anosemestre', 'cd_turma', 'cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE_CD_HORARIO_NR_DIA_SEMANA', columns: ['nr_anosemestre', 'cd_horario', 'nr_dia_semana'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TURMASHORA_SALA_UNIM_SALA_CD_SALA', 'colunas' => ['cd_sala'], 'tabelaAlvo' => 'unim_sala', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'turmas_horarios_config_ibfk_1', 'colunas' => ['nr_anosemestre', 'cd_turma_base'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'turmas_horarios_config_ibfk_2', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'turmas_horarios_config_ibfk_3', 'colunas' => ['cd_horario'], 'tabelaAlvo' => 'horarios', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TurmasHorariosConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turmas_horarios', type: 'integer')]
    private ?int $cdTurmasHorarios = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_turma_base', type: 'string', length: 50)]
    private ?string $cdTurmaBase = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_horario', type: 'integer')]
    private ?int $cdHorario = null;

    #[ORM\Column(name: 'nr_dia_semana', type: 'smallint')]
    private ?int $nrDiaSemana = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'ds_legenda', type: 'string', length: 50, nullable: true)]
    private ?string $dsLegenda = null;

    #[ORM\Column(name: 'dt_inicial', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    #[ORM\ManyToOne(targetEntity: UnimSala::class)]
    #[ORM\JoinColumn(name: 'cd_sala', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimSala $cdSala = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?string $cdTurmaBase = null,
        ?int $cdDisciplina = null,
        ?int $cdHorario = null,
        ?int $nrDiaSemana = null,
        int $cdProfessor = 0,
        ?string $dsLegenda = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        bool $snAtivo = false,
        ?UnimSala $cdSala = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdTurmaBase = $cdTurmaBase;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdHorario = $cdHorario;
        $this->nrDiaSemana = $nrDiaSemana;
        $this->cdProfessor = $cdProfessor;
        $this->dsLegenda = $dsLegenda;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snAtivo = $snAtivo;
        $this->cdSala = $cdSala;
        $this->dtBase = $dtBase;
    }

    public function getCdTurmasHorarios(): ?int
    {
        return $this->cdTurmasHorarios;
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

    public function getCdTurmaBase(): ?string
    {
        return $this->cdTurmaBase;
    }

    public function setCdTurmaBase(?string $cdTurmaBase): self
    {
        $this->cdTurmaBase = $cdTurmaBase;
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

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function setCdHorario(?int $cdHorario): self
    {
        $this->cdHorario = $cdHorario;
        return $this;
    }

    public function getNrDiaSemana(): ?int
    {
        return $this->nrDiaSemana;
    }

    public function setNrDiaSemana(?int $nrDiaSemana): self
    {
        $this->nrDiaSemana = $nrDiaSemana;
        return $this;
    }

    public function getCdProfessor(): int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDsLegenda(): ?string
    {
        return $this->dsLegenda;
    }

    public function setDsLegenda(?string $dsLegenda): self
    {
        $this->dsLegenda = $dsLegenda;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdSala(): ?UnimSala
    {
        return $this->cdSala;
    }

    public function setCdSala(?UnimSala $cdSala): self
    {
        $this->cdSala = $cdSala;
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
