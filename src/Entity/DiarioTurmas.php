<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioTurmasRepository::class)]
#[ORM\Table(
    name: 'diario_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['turma', 'anosemestre', 'disciplina', 'bimestre', 'cd_grupo'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_BIMESTRE', columns: ['bimestre'])]
class DiarioTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diario_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDiarioTurma = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'disciplina', type: 'integer', nullable: true)]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'bimestre', type: 'smallint', nullable: true)]
    private ?int $bimestre = null;

    #[ORM\Column(name: 'professor', type: 'integer', nullable: true)]
    private ?int $professor = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15, nullable: true)]
    private ?string $curso = null;

    #[ORM\Column(name: 'dataentrega', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dataentrega = null;

    #[ORM\Column(name: 'formula_media', type: 'string', length: 200, nullable: true)]
    private ?string $formulaMedia = null;

    #[ORM\Column(name: 'nr_ch_extra', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $nrChExtra = null;

    #[ORM\Column(name: 'dt_ent_extra', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtEntExtra = null;

    #[ORM\Column(name: 'dt_enc_extra', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtEncExtra = null;

    #[ORM\Column(name: 'ds_ativ_extra', type: 'text', nullable: true)]
    private ?string $dsAtivExtra = null;

    #[ORM\Column(name: 'sn_liberado', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snLiberado = 'N';

    #[ORM\Column(name: 'sn_diario_fechado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDiarioFechado = false;

    #[ORM\Column(name: 'dt_envio_exame', type: 'datetime', nullable: true, options: ['comment' => 'Grava a última data de envio das notas do exame, preenchimento automático pelo sistema com data atual.'])]
    private ?\DateTimeInterface $dtEnvioExame = null;

    #[ORM\Column(name: 'dt_envio_2epoca', type: 'datetime', nullable: true, options: ['comment' => 'Grava a última data de envio das notas de segunda epoca, preenchimento automático pelo sistema com data atual.'])]
    private ?\DateTimeInterface $dtEnvio2epoca = null;

    #[ORM\Column(name: 'sn_manter_professor', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snManterProfessor = 0;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdGrupo = 0;

    #[ORM\Column(name: 'dt_envio_emn', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvioEmn = null;

    public function __construct(
        ?string $turma = null,
        ?int $anosemestre = null,
        ?int $disciplina = null,
        ?int $bimestre = null,
        ?int $professor = null,
        ?string $curso = null,
        ?\DateTimeInterface $dataentrega = null,
        ?string $formulaMedia = null,
        ?float $nrChExtra = null,
        ?\DateTimeInterface $dtEntExtra = null,
        ?\DateTimeInterface $dtEncExtra = null,
        ?string $dsAtivExtra = null,
        string $snLiberado = 'N',
        ?bool $snDiarioFechado = false,
        ?\DateTimeInterface $dtEnvioExame = null,
        ?\DateTimeInterface $dtEnvio2epoca = null,
        int $snManterProfessor = 0,
        ?int $cdGrupo = 0,
        ?\DateTimeInterface $dtEnvioEmn = null
    ) {
        $this->turma = $turma;
        $this->anosemestre = $anosemestre;
        $this->disciplina = $disciplina;
        $this->bimestre = $bimestre;
        $this->professor = $professor;
        $this->curso = $curso;
        $this->dataentrega = $dataentrega;
        $this->formulaMedia = $formulaMedia;
        $this->nrChExtra = $nrChExtra;
        $this->dtEntExtra = $dtEntExtra;
        $this->dtEncExtra = $dtEncExtra;
        $this->dsAtivExtra = $dsAtivExtra;
        $this->snLiberado = $snLiberado;
        $this->snDiarioFechado = $snDiarioFechado;
        $this->dtEnvioExame = $dtEnvioExame;
        $this->dtEnvio2epoca = $dtEnvio2epoca;
        $this->snManterProfessor = $snManterProfessor;
        $this->cdGrupo = $cdGrupo;
        $this->dtEnvioEmn = $dtEnvioEmn;
    }

    public function getCdDiarioTurma(): ?int
    {
        return $this->cdDiarioTurma;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDisciplina(): ?int
    {
        return $this->disciplina;
    }

    public function setDisciplina(?int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getBimestre(): ?int
    {
        return $this->bimestre;
    }

    public function setBimestre(?int $bimestre): self
    {
        $this->bimestre = $bimestre;
        return $this;
    }

    public function getProfessor(): ?int
    {
        return $this->professor;
    }

    public function setProfessor(?int $professor): self
    {
        $this->professor = $professor;
        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getDataentrega(): ?\DateTimeInterface
    {
        return $this->dataentrega;
    }

    public function setDataentrega(?\DateTimeInterface $dataentrega): self
    {
        $this->dataentrega = $dataentrega;
        return $this;
    }

    public function getFormulaMedia(): ?string
    {
        return $this->formulaMedia;
    }

    public function setFormulaMedia(?string $formulaMedia): self
    {
        $this->formulaMedia = $formulaMedia;
        return $this;
    }

    public function getNrChExtra(): ?float
    {
        return $this->nrChExtra;
    }

    public function setNrChExtra(?float $nrChExtra): self
    {
        $this->nrChExtra = $nrChExtra;
        return $this;
    }

    public function getDtEntExtra(): ?\DateTimeInterface
    {
        return $this->dtEntExtra;
    }

    public function setDtEntExtra(?\DateTimeInterface $dtEntExtra): self
    {
        $this->dtEntExtra = $dtEntExtra;
        return $this;
    }

    public function getDtEncExtra(): ?\DateTimeInterface
    {
        return $this->dtEncExtra;
    }

    public function setDtEncExtra(?\DateTimeInterface $dtEncExtra): self
    {
        $this->dtEncExtra = $dtEncExtra;
        return $this;
    }

    public function getDsAtivExtra(): ?string
    {
        return $this->dsAtivExtra;
    }

    public function setDsAtivExtra(?string $dsAtivExtra): self
    {
        $this->dsAtivExtra = $dsAtivExtra;
        return $this;
    }

    public function getSnLiberado(): string
    {
        return $this->snLiberado;
    }

    public function setSnLiberado(string $snLiberado): self
    {
        $this->snLiberado = $snLiberado;
        return $this;
    }

    public function isSnDiarioFechado(): ?bool
    {
        return $this->snDiarioFechado;
    }

    public function setSnDiarioFechado(?bool $snDiarioFechado): self
    {
        $this->snDiarioFechado = $snDiarioFechado;
        return $this;
    }

    public function getDtEnvioExame(): ?\DateTimeInterface
    {
        return $this->dtEnvioExame;
    }

    public function setDtEnvioExame(?\DateTimeInterface $dtEnvioExame): self
    {
        $this->dtEnvioExame = $dtEnvioExame;
        return $this;
    }

    public function getDtEnvio2epoca(): ?\DateTimeInterface
    {
        return $this->dtEnvio2epoca;
    }

    public function setDtEnvio2epoca(?\DateTimeInterface $dtEnvio2epoca): self
    {
        $this->dtEnvio2epoca = $dtEnvio2epoca;
        return $this;
    }

    public function getSnManterProfessor(): int
    {
        return $this->snManterProfessor;
    }

    public function setSnManterProfessor(int $snManterProfessor): self
    {
        $this->snManterProfessor = $snManterProfessor;
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

    public function getDtEnvioEmn(): ?\DateTimeInterface
    {
        return $this->dtEnvioEmn;
    }

    public function setDtEnvioEmn(?\DateTimeInterface $dtEnvioEmn): self
    {
        $this->dtEnvioEmn = $dtEnvioEmn;
        return $this;
    }
}
