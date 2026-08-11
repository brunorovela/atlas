<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MatriculasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculasRepository::class)]
#[ORM\Table(
    name: 'matriculas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['codigoaluno', 'turma', 'anosemestre'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_CD_INGRESSO', columns: ['cd_ingresso'])]
#[ORM\Index(name: 'IX_CD_MATRICULA_CURSO', columns: ['cd_matricula_curso'])]
#[ORM\Index(name: 'IX_SITUACAO', columns: ['situacao'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_ID_MATRICULA', columns: ['id_matricula'])]
#[ORM\Index(name: 'IX_CD_PESSOA_MATRICULOU', columns: ['cd_pessoa_matriculou'])]
#[ORM\Index(name: 'FK_MATRICULAS_CD_PLANO_PGTO', columns: ['cd_plano_pgto'])]
#[ORM\Index(name: 'FK_MATRICULAS_CD_POLO', columns: ['cd_polo'])]
#[ORM\Index(name: 'FK_matriculas_id_turma_itinerario_obrigatorio', columns: ['id_turma_itinerario_obrigatorio'])]
#[ORM\Index(name: 'idx_mat_composto', columns: ['cd_matricula_curso', 'codigoaluno'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_MATRICULAS_CD_POLO', 'colunas' => ['cd_polo'], 'tabelaAlvo' => 'unim_polo', 'colunasAlvo' => ['cd_polo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_matriculas_id_turma_itinerario_obrigatorio', 'colunas' => ['id_turma_itinerario_obrigatorio'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['id_matricula']
)]
class Matriculas
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Column(name: 'dataemissao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dataemissao = null;

    #[ORM\Column(name: 'usuario', type: 'string', length: 30, nullable: true)]
    private ?string $usuario = null;

    #[ORM\Column(name: 'planopagamento', type: 'integer', nullable: true)]
    private ?int $planopagamento = null;

    #[ORM\Column(name: 'situacao', type: 'smallint', nullable: true)]
    private ?int $situacao = null;

    #[ORM\Column(name: 'situacaoescolar', type: 'smallint', nullable: true)]
    private ?int $situacaoescolar = null;

    #[ORM\Column(name: 'impresso', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $impresso = null;

    #[ORM\Column(name: 'datasaida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $datasaida = null;

    #[ORM\Column(name: 'dataentrada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dataentrada = null;

    #[ORM\Column(name: 'planodesconto', type: 'integer', nullable: true)]
    private ?int $planodesconto = null;

    #[ORM\Column(name: 'diploma', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $diploma = null;

    #[ORM\Column(name: 'cd_ingresso', type: 'integer', nullable: true, options: ['default' => '8'])]
    private ?int $cdIngresso = 8;

    #[ORM\Column(name: 'cd_instituicao_origem', type: 'integer', nullable: true)]
    private ?int $cdInstituicaoOrigem = null;

    #[ORM\Column(name: 'turmadependencia', type: 'string', length: 50, nullable: true)]
    private ?string $turmadependencia = null;

    #[ORM\Column(name: 'nr_aluno', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrAluno = 0;

    #[ORM\Column(name: 'cd_matricula', type: 'string', length: 20, nullable: true)]
    private ?string $cdMatricula = null;

    #[ORM\Column(name: 'frequencia_global', type: 'float', nullable: true)]
    private ?float $frequenciaGlobal = null;

    #[ORM\Column(name: 'nr_dia_pgto', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiaPgto = null;

    #[ORM\Column(name: 'cd_matricula_curso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMatriculaCurso = null;

    #[ORM\Column(name: 'cd_pessoa_matriculou', type: 'integer', nullable: true)]
    private ?int $cdPessoaMatriculou = null;

    #[ORM\Column(name: 'sn_matricula_internet', type: 'boolean', options: ['default' => '0'])]
    private bool $snMatriculaInternet = false;

    #[ORM\Column(name: 'cd_turma_anterior', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurmaAnterior = null;

    #[ORM\Column(name: 'dt_inicio_aula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioAula = null;

    #[ORM\Column(name: 'dt_fim_aula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimAula = null;

    #[ORM\Column(name: 'id_matricula', type: 'integer')]
    private ?int $idMatricula = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_plano_pgto', type: 'integer', nullable: true)]
    private ?int $cdPlanoPgto = null;

    #[ORM\ManyToOne(targetEntity: UnimPolo::class)]
    #[ORM\JoinColumn(name: 'cd_polo', referencedColumnName: 'cd_polo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimPolo $cdPolo = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma_itinerario_obrigatorio', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurmaItinerarioObrigatorio = null;

    // Sem construtor: 32 propriedades. Use os setters encadeados.

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
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

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getDataemissao(): ?\DateTimeInterface
    {
        return $this->dataemissao;
    }

    public function setDataemissao(?\DateTimeInterface $dataemissao): self
    {
        $this->dataemissao = $dataemissao;
        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getPlanopagamento(): ?int
    {
        return $this->planopagamento;
    }

    public function setPlanopagamento(?int $planopagamento): self
    {
        $this->planopagamento = $planopagamento;
        return $this;
    }

    public function getSituacao(): ?int
    {
        return $this->situacao;
    }

    public function setSituacao(?int $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    public function getSituacaoescolar(): ?int
    {
        return $this->situacaoescolar;
    }

    public function setSituacaoescolar(?int $situacaoescolar): self
    {
        $this->situacaoescolar = $situacaoescolar;
        return $this;
    }

    public function getImpresso(): ?string
    {
        return $this->impresso;
    }

    public function setImpresso(?string $impresso): self
    {
        $this->impresso = $impresso;
        return $this;
    }

    public function getDatasaida(): ?\DateTimeInterface
    {
        return $this->datasaida;
    }

    public function setDatasaida(?\DateTimeInterface $datasaida): self
    {
        $this->datasaida = $datasaida;
        return $this;
    }

    public function getDataentrada(): ?\DateTimeInterface
    {
        return $this->dataentrada;
    }

    public function setDataentrada(?\DateTimeInterface $dataentrada): self
    {
        $this->dataentrada = $dataentrada;
        return $this;
    }

    public function getPlanodesconto(): ?int
    {
        return $this->planodesconto;
    }

    public function setPlanodesconto(?int $planodesconto): self
    {
        $this->planodesconto = $planodesconto;
        return $this;
    }

    public function getDiploma(): ?string
    {
        return $this->diploma;
    }

    public function setDiploma(?string $diploma): self
    {
        $this->diploma = $diploma;
        return $this;
    }

    public function getCdIngresso(): ?int
    {
        return $this->cdIngresso;
    }

    public function setCdIngresso(?int $cdIngresso): self
    {
        $this->cdIngresso = $cdIngresso;
        return $this;
    }

    public function getCdInstituicaoOrigem(): ?int
    {
        return $this->cdInstituicaoOrigem;
    }

    public function setCdInstituicaoOrigem(?int $cdInstituicaoOrigem): self
    {
        $this->cdInstituicaoOrigem = $cdInstituicaoOrigem;
        return $this;
    }

    public function getTurmadependencia(): ?string
    {
        return $this->turmadependencia;
    }

    public function setTurmadependencia(?string $turmadependencia): self
    {
        $this->turmadependencia = $turmadependencia;
        return $this;
    }

    public function getNrAluno(): ?int
    {
        return $this->nrAluno;
    }

    public function setNrAluno(?int $nrAluno): self
    {
        $this->nrAluno = $nrAluno;
        return $this;
    }

    public function getCdMatricula(): ?string
    {
        return $this->cdMatricula;
    }

    public function setCdMatricula(?string $cdMatricula): self
    {
        $this->cdMatricula = $cdMatricula;
        return $this;
    }

    public function getFrequenciaGlobal(): ?float
    {
        return $this->frequenciaGlobal;
    }

    public function setFrequenciaGlobal(?float $frequenciaGlobal): self
    {
        $this->frequenciaGlobal = $frequenciaGlobal;
        return $this;
    }

    public function getNrDiaPgto(): ?int
    {
        return $this->nrDiaPgto;
    }

    public function setNrDiaPgto(?int $nrDiaPgto): self
    {
        $this->nrDiaPgto = $nrDiaPgto;
        return $this;
    }

    public function getCdMatriculaCurso(): ?int
    {
        return $this->cdMatriculaCurso;
    }

    public function setCdMatriculaCurso(?int $cdMatriculaCurso): self
    {
        $this->cdMatriculaCurso = $cdMatriculaCurso;
        return $this;
    }

    public function getCdPessoaMatriculou(): ?int
    {
        return $this->cdPessoaMatriculou;
    }

    public function setCdPessoaMatriculou(?int $cdPessoaMatriculou): self
    {
        $this->cdPessoaMatriculou = $cdPessoaMatriculou;
        return $this;
    }

    public function isSnMatriculaInternet(): bool
    {
        return $this->snMatriculaInternet;
    }

    public function setSnMatriculaInternet(bool $snMatriculaInternet): self
    {
        $this->snMatriculaInternet = $snMatriculaInternet;
        return $this;
    }

    public function getCdTurmaAnterior(): ?string
    {
        return $this->cdTurmaAnterior;
    }

    public function setCdTurmaAnterior(?string $cdTurmaAnterior): self
    {
        $this->cdTurmaAnterior = $cdTurmaAnterior;
        return $this;
    }

    public function getDtInicioAula(): ?\DateTimeInterface
    {
        return $this->dtInicioAula;
    }

    public function setDtInicioAula(?\DateTimeInterface $dtInicioAula): self
    {
        $this->dtInicioAula = $dtInicioAula;
        return $this;
    }

    public function getDtFimAula(): ?\DateTimeInterface
    {
        return $this->dtFimAula;
    }

    public function setDtFimAula(?\DateTimeInterface $dtFimAula): self
    {
        $this->dtFimAula = $dtFimAula;
        return $this;
    }

    public function getIdMatricula(): ?int
    {
        return $this->idMatricula;
    }

    public function setIdMatricula(?int $idMatricula): self
    {
        $this->idMatricula = $idMatricula;
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

    public function getCdPlanoPgto(): ?int
    {
        return $this->cdPlanoPgto;
    }

    public function setCdPlanoPgto(?int $cdPlanoPgto): self
    {
        $this->cdPlanoPgto = $cdPlanoPgto;
        return $this;
    }

    public function getCdPolo(): ?UnimPolo
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?UnimPolo $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
        return $this;
    }

    public function getIdTurmaItinerarioObrigatorio(): ?Turmas
    {
        return $this->idTurmaItinerarioObrigatorio;
    }

    public function setIdTurmaItinerarioObrigatorio(?Turmas $idTurmaItinerarioObrigatorio): self
    {
        $this->idTurmaItinerarioObrigatorio = $idTurmaItinerarioObrigatorio;
        return $this;
    }
}
