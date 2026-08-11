<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasRepository::class)]
#[ORM\Table(
    name: 'turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['anosemestre', 'codigo'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CODIGO', columns: ['codigo'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['cd_grade'])]
#[ORM\Index(name: 'IX_SERIE', columns: ['serie'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE_CURSO_CD_COLIGADA_DATAFIM', columns: ['anosemestre', 'curso', 'cd_coligada', 'datafim'])]
#[ORM\Index(name: 'IX_CD_SALA', columns: ['cd_sala'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE_CODIGO_CURSO', columns: ['anosemestre', 'codigo', 'curso'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_revisao'])]
#[ORM\Index(name: 'FK_turmas_uni_grupo_inscricao', columns: ['cd_uni_grupo_inscricao'])]
#[ORM\Index(name: 'FK_turmas_uni_relatorio_template', columns: ['cd_contrato_inscricao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_turmas_avaliacoes_parametros_matriz', 'colunas' => ['cd_avaliacao'], 'tabelaAlvo' => 'avaliacoes_parametros_matriz', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_turmas_uni_grupo_inscricao', 'colunas' => ['cd_uni_grupo_inscricao'], 'tabelaAlvo' => 'uni_grupo_inscricao', 'colunasAlvo' => ['cd_uni_grupo_inscricao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_turmas_uni_relatorio_template', 'colunas' => ['cd_contrato_inscricao'], 'tabelaAlvo' => 'uni_relatorio_template', 'colunasAlvo' => ['cd_relatorio_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TURMAS_UNIM_SALA_CD_SALA', 'colunas' => ['cd_sala'], 'tabelaAlvo' => 'unim_sala', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Turmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $idTurma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'codigo', type: 'string', length: 50)]
    private ?string $codigo = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Column(name: 'grau', type: 'smallint', nullable: true)]
    private ?int $grau = null;

    #[ORM\Column(name: 'serie', type: 'smallint', options: ['default' => '1'])]
    private int $serie = 1;

    #[ORM\Column(name: 'turno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $turno = null;

    #[ORM\Column(name: 'descricao', type: 'string', length: 255, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'contrato', type: 'string', length: 50, nullable: true)]
    private ?string $contrato = null;

    #[ORM\Column(name: 'vagas', type: 'smallint', nullable: true)]
    private ?int $vagas = null;

    #[ORM\Column(name: 'sn_bloquear_vagas', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snBloquearVagas = 0;

    #[ORM\Column(name: 'horainicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $horainicio = null;

    #[ORM\Column(name: 'horafim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $horafim = null;

    #[ORM\Column(name: 'datainicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $datainicio = null;

    #[ORM\Column(name: 'datafim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $datafim = null;

    #[ORM\Column(name: 'idadeconclusao', type: 'smallint', nullable: true)]
    private ?int $idadeconclusao = null;

    #[ORM\Column(name: 'dataconclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dataconclusao = null;

    #[ORM\Column(name: 'diassemanaisletivos', type: 'float', nullable: true)]
    private ?float $diassemanaisletivos = null;

    #[ORM\Column(name: 'horarioletivo', type: 'string', length: 50, nullable: true)]
    private ?string $horarioletivo = null;

    #[ORM\Column(name: 'horasaula', type: 'string', length: 20, nullable: true)]
    private ?string $horasaula = null;

    #[ORM\Column(name: 'obshistorico', type: 'text', length: 16777215, nullable: true)]
    private ?string $obshistorico = null;

    #[ORM\Column(name: 'vl_ordem', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $vlOrdem = null;

    #[ORM\Column(name: 'professor_responsavel', type: 'integer', nullable: true)]
    private ?int $professorResponsavel = null;

    #[ORM\Column(name: 'sn_inscricao_online', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snInscricaoOnline = null;

    #[ORM\ManyToOne(targetEntity: AvaliacoesParametrosMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao', referencedColumnName: 'cd_avaliacao', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesParametrosMatriz $cdAvaliacao = null;

    #[ORM\Column(name: 'cd_campus', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdCampus = 0;

    #[ORM\Column(name: 'cd_proxima_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdProximaTurma = null;

    #[ORM\Column(name: 'cd_centro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentro = null;

    #[ORM\Column(name: 'sn_terminal_acesso', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snTerminalAcesso = 0;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_caixa_pix', type: 'integer', nullable: true)]
    private ?int $cdCaixaPix = null;

    #[ORM\Column(name: 'sn_alterar_boleto', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAlterarBoleto = 1;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'nr_min_alunos', type: 'smallint', nullable: true)]
    private ?int $nrMinAlunos = null;

    #[ORM\Column(name: 'cd_grade', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdGrade = 0;

    #[ORM\Column(name: 'sn_bloquear_disc_pendentes', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloquearDiscPendentes = false;

    #[ORM\Column(name: 'cd_etapa_mec', type: 'integer', nullable: true)]
    private ?int $cdEtapaMec = null;

    #[ORM\Column(name: 'cd_unidade_certificadora', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUnidadeCertificadora = null;

    #[ORM\Column(name: 'sn_turma_especial', type: TinyIntType::NAME, options: ['default' => '0', 'comment' => '0 = turma não é especial, 1 = turma é especial'])]
    private int $snTurmaEspecial = 0;

    #[ORM\ManyToOne(targetEntity: UnimSala::class)]
    #[ORM\JoinColumn(name: 'cd_sala', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimSala $cdSala = null;

    #[ORM\Column(name: 'SN_ATIVA', type: 'smallint', nullable: true, options: ['default' => '1'])]
    private ?int $snAtiva = 1;

    #[ORM\Column(name: 'obscontrato', type: 'text', length: 16777215, nullable: true)]
    private ?string $obscontrato = null;

    #[ORM\Column(name: 'obsgerais', type: 'text', length: 16777215, nullable: true)]
    private ?string $obsgerais = null;

    #[ORM\Column(name: 'cd_situacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'dt_inicio_monografia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioMonografia = null;

    #[ORM\Column(name: 'dt_fim_monografia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimMonografia = null;

    #[ORM\Column(name: 'professor_responsavel2', type: 'integer', nullable: true)]
    private ?int $professorResponsavel2 = null;

    #[ORM\Column(name: 'SN_USAR_PLANO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snUsarPlano = 1;

    #[ORM\Column(name: 'CD_PLANO_PADRAO', type: 'integer', nullable: true)]
    private ?int $cdPlanoPadrao = null;

    #[ORM\Column(name: 'dt_inicio_financeiro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioFinanceiro = null;

    #[ORM\Column(name: 'dt_fim_financeiro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimFinanceiro = null;

    #[ORM\Column(name: 'sn_cronograma_geren_inicio_fim', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCronogramaGerenInicioFim = 0;

    #[ORM\Column(name: 'sn_exporta_moodle', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snExportaMoodle = 0;

    #[ORM\Column(name: 'cd_proximo_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdProximoCurso = null;

    #[ORM\Column(name: 'sn_proximo_curso', type: 'boolean', options: ['default' => '0'])]
    private bool $snProximoCurso = false;

    #[ORM\Column(name: 'sn_matricula_mesmo_anosem', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snMatriculaMesmoAnosem = 0;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'cd_proxima_turma_repr', type: 'string', length: 50, nullable: true)]
    private ?string $cdProximaTurmaRepr = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\ManyToOne(targetEntity: UniGrupoInscricao::class)]
    #[ORM\JoinColumn(name: 'cd_uni_grupo_inscricao', referencedColumnName: 'cd_uni_grupo_inscricao', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UniGrupoInscricao $cdUniGrupoInscricao = null;

    #[ORM\ManyToOne(targetEntity: UniRelatorioTemplate::class)]
    #[ORM\JoinColumn(name: 'cd_contrato_inscricao', referencedColumnName: 'cd_relatorio_template', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniRelatorioTemplate $cdContratoInscricao = null;

    #[ORM\Column(name: 'sn_itinerario', type: 'boolean', options: ['default' => '0'])]
    private bool $snItinerario = false;

    #[ORM\Column(name: 'ds_nome_intinerario', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeIntinerario = null;

    #[ORM\Column(name: 'cd_modalidade_ensino_mec', type: 'smallint', nullable: true)]
    private ?int $cdModalidadeEnsinoMec = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 64 propriedades. Use os setters encadeados.

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
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

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;
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

    public function getGrau(): ?int
    {
        return $this->grau;
    }

    public function setGrau(?int $grau): self
    {
        $this->grau = $grau;
        return $this;
    }

    public function getSerie(): int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;
        return $this;
    }

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getContrato(): ?string
    {
        return $this->contrato;
    }

    public function setContrato(?string $contrato): self
    {
        $this->contrato = $contrato;
        return $this;
    }

    public function getVagas(): ?int
    {
        return $this->vagas;
    }

    public function setVagas(?int $vagas): self
    {
        $this->vagas = $vagas;
        return $this;
    }

    public function getSnBloquearVagas(): ?int
    {
        return $this->snBloquearVagas;
    }

    public function setSnBloquearVagas(?int $snBloquearVagas): self
    {
        $this->snBloquearVagas = $snBloquearVagas;
        return $this;
    }

    public function getHorainicio(): ?\DateTimeInterface
    {
        return $this->horainicio;
    }

    public function setHorainicio(?\DateTimeInterface $horainicio): self
    {
        $this->horainicio = $horainicio;
        return $this;
    }

    public function getHorafim(): ?\DateTimeInterface
    {
        return $this->horafim;
    }

    public function setHorafim(?\DateTimeInterface $horafim): self
    {
        $this->horafim = $horafim;
        return $this;
    }

    public function getDatainicio(): ?\DateTimeInterface
    {
        return $this->datainicio;
    }

    public function setDatainicio(?\DateTimeInterface $datainicio): self
    {
        $this->datainicio = $datainicio;
        return $this;
    }

    public function getDatafim(): ?\DateTimeInterface
    {
        return $this->datafim;
    }

    public function setDatafim(?\DateTimeInterface $datafim): self
    {
        $this->datafim = $datafim;
        return $this;
    }

    public function getIdadeconclusao(): ?int
    {
        return $this->idadeconclusao;
    }

    public function setIdadeconclusao(?int $idadeconclusao): self
    {
        $this->idadeconclusao = $idadeconclusao;
        return $this;
    }

    public function getDataconclusao(): ?\DateTimeInterface
    {
        return $this->dataconclusao;
    }

    public function setDataconclusao(?\DateTimeInterface $dataconclusao): self
    {
        $this->dataconclusao = $dataconclusao;
        return $this;
    }

    public function getDiassemanaisletivos(): ?float
    {
        return $this->diassemanaisletivos;
    }

    public function setDiassemanaisletivos(?float $diassemanaisletivos): self
    {
        $this->diassemanaisletivos = $diassemanaisletivos;
        return $this;
    }

    public function getHorarioletivo(): ?string
    {
        return $this->horarioletivo;
    }

    public function setHorarioletivo(?string $horarioletivo): self
    {
        $this->horarioletivo = $horarioletivo;
        return $this;
    }

    public function getHorasaula(): ?string
    {
        return $this->horasaula;
    }

    public function setHorasaula(?string $horasaula): self
    {
        $this->horasaula = $horasaula;
        return $this;
    }

    public function getObshistorico(): ?string
    {
        return $this->obshistorico;
    }

    public function setObshistorico(?string $obshistorico): self
    {
        $this->obshistorico = $obshistorico;
        return $this;
    }

    public function getVlOrdem(): ?int
    {
        return $this->vlOrdem;
    }

    public function setVlOrdem(?int $vlOrdem): self
    {
        $this->vlOrdem = $vlOrdem;
        return $this;
    }

    public function getProfessorResponsavel(): ?int
    {
        return $this->professorResponsavel;
    }

    public function setProfessorResponsavel(?int $professorResponsavel): self
    {
        $this->professorResponsavel = $professorResponsavel;
        return $this;
    }

    public function getSnInscricaoOnline(): ?string
    {
        return $this->snInscricaoOnline;
    }

    public function setSnInscricaoOnline(?string $snInscricaoOnline): self
    {
        $this->snInscricaoOnline = $snInscricaoOnline;
        return $this;
    }

    public function getCdAvaliacao(): ?AvaliacoesParametrosMatriz
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?AvaliacoesParametrosMatriz $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdCampus(): ?int
    {
        return $this->cdCampus;
    }

    public function setCdCampus(?int $cdCampus): self
    {
        $this->cdCampus = $cdCampus;
        return $this;
    }

    public function getCdProximaTurma(): ?string
    {
        return $this->cdProximaTurma;
    }

    public function setCdProximaTurma(?string $cdProximaTurma): self
    {
        $this->cdProximaTurma = $cdProximaTurma;
        return $this;
    }

    public function getCdCentro(): ?int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(?int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }

    public function getSnTerminalAcesso(): int
    {
        return $this->snTerminalAcesso;
    }

    public function setSnTerminalAcesso(int $snTerminalAcesso): self
    {
        $this->snTerminalAcesso = $snTerminalAcesso;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getCdCaixaPix(): ?int
    {
        return $this->cdCaixaPix;
    }

    public function setCdCaixaPix(?int $cdCaixaPix): self
    {
        $this->cdCaixaPix = $cdCaixaPix;
        return $this;
    }

    public function getSnAlterarBoleto(): ?int
    {
        return $this->snAlterarBoleto;
    }

    public function setSnAlterarBoleto(?int $snAlterarBoleto): self
    {
        $this->snAlterarBoleto = $snAlterarBoleto;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrMinAlunos(): ?int
    {
        return $this->nrMinAlunos;
    }

    public function setNrMinAlunos(?int $nrMinAlunos): self
    {
        $this->nrMinAlunos = $nrMinAlunos;
        return $this;
    }

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function isSnBloquearDiscPendentes(): ?bool
    {
        return $this->snBloquearDiscPendentes;
    }

    public function setSnBloquearDiscPendentes(?bool $snBloquearDiscPendentes): self
    {
        $this->snBloquearDiscPendentes = $snBloquearDiscPendentes;
        return $this;
    }

    public function getCdEtapaMec(): ?int
    {
        return $this->cdEtapaMec;
    }

    public function setCdEtapaMec(?int $cdEtapaMec): self
    {
        $this->cdEtapaMec = $cdEtapaMec;
        return $this;
    }

    public function getCdUnidadeCertificadora(): ?int
    {
        return $this->cdUnidadeCertificadora;
    }

    public function setCdUnidadeCertificadora(?int $cdUnidadeCertificadora): self
    {
        $this->cdUnidadeCertificadora = $cdUnidadeCertificadora;
        return $this;
    }

    public function getSnTurmaEspecial(): int
    {
        return $this->snTurmaEspecial;
    }

    public function setSnTurmaEspecial(int $snTurmaEspecial): self
    {
        $this->snTurmaEspecial = $snTurmaEspecial;
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

    public function getSnAtiva(): ?int
    {
        return $this->snAtiva;
    }

    public function setSnAtiva(?int $snAtiva): self
    {
        $this->snAtiva = $snAtiva;
        return $this;
    }

    public function getObscontrato(): ?string
    {
        return $this->obscontrato;
    }

    public function setObscontrato(?string $obscontrato): self
    {
        $this->obscontrato = $obscontrato;
        return $this;
    }

    public function getObsgerais(): ?string
    {
        return $this->obsgerais;
    }

    public function setObsgerais(?string $obsgerais): self
    {
        $this->obsgerais = $obsgerais;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDtInicioMonografia(): ?\DateTimeInterface
    {
        return $this->dtInicioMonografia;
    }

    public function setDtInicioMonografia(?\DateTimeInterface $dtInicioMonografia): self
    {
        $this->dtInicioMonografia = $dtInicioMonografia;
        return $this;
    }

    public function getDtFimMonografia(): ?\DateTimeInterface
    {
        return $this->dtFimMonografia;
    }

    public function setDtFimMonografia(?\DateTimeInterface $dtFimMonografia): self
    {
        $this->dtFimMonografia = $dtFimMonografia;
        return $this;
    }

    public function getProfessorResponsavel2(): ?int
    {
        return $this->professorResponsavel2;
    }

    public function setProfessorResponsavel2(?int $professorResponsavel2): self
    {
        $this->professorResponsavel2 = $professorResponsavel2;
        return $this;
    }

    public function getSnUsarPlano(): int
    {
        return $this->snUsarPlano;
    }

    public function setSnUsarPlano(int $snUsarPlano): self
    {
        $this->snUsarPlano = $snUsarPlano;
        return $this;
    }

    public function getCdPlanoPadrao(): ?int
    {
        return $this->cdPlanoPadrao;
    }

    public function setCdPlanoPadrao(?int $cdPlanoPadrao): self
    {
        $this->cdPlanoPadrao = $cdPlanoPadrao;
        return $this;
    }

    public function getDtInicioFinanceiro(): ?\DateTimeInterface
    {
        return $this->dtInicioFinanceiro;
    }

    public function setDtInicioFinanceiro(?\DateTimeInterface $dtInicioFinanceiro): self
    {
        $this->dtInicioFinanceiro = $dtInicioFinanceiro;
        return $this;
    }

    public function getDtFimFinanceiro(): ?\DateTimeInterface
    {
        return $this->dtFimFinanceiro;
    }

    public function setDtFimFinanceiro(?\DateTimeInterface $dtFimFinanceiro): self
    {
        $this->dtFimFinanceiro = $dtFimFinanceiro;
        return $this;
    }

    public function getSnCronogramaGerenInicioFim(): int
    {
        return $this->snCronogramaGerenInicioFim;
    }

    public function setSnCronogramaGerenInicioFim(int $snCronogramaGerenInicioFim): self
    {
        $this->snCronogramaGerenInicioFim = $snCronogramaGerenInicioFim;
        return $this;
    }

    public function getSnExportaMoodle(): int
    {
        return $this->snExportaMoodle;
    }

    public function setSnExportaMoodle(int $snExportaMoodle): self
    {
        $this->snExportaMoodle = $snExportaMoodle;
        return $this;
    }

    public function getCdProximoCurso(): ?string
    {
        return $this->cdProximoCurso;
    }

    public function setCdProximoCurso(?string $cdProximoCurso): self
    {
        $this->cdProximoCurso = $cdProximoCurso;
        return $this;
    }

    public function isSnProximoCurso(): bool
    {
        return $this->snProximoCurso;
    }

    public function setSnProximoCurso(bool $snProximoCurso): self
    {
        $this->snProximoCurso = $snProximoCurso;
        return $this;
    }

    public function getSnMatriculaMesmoAnosem(): int
    {
        return $this->snMatriculaMesmoAnosem;
    }

    public function setSnMatriculaMesmoAnosem(int $snMatriculaMesmoAnosem): self
    {
        $this->snMatriculaMesmoAnosem = $snMatriculaMesmoAnosem;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
        return $this;
    }

    public function getCdProximaTurmaRepr(): ?string
    {
        return $this->cdProximaTurmaRepr;
    }

    public function setCdProximaTurmaRepr(?string $cdProximaTurmaRepr): self
    {
        $this->cdProximaTurmaRepr = $cdProximaTurmaRepr;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getCdUniGrupoInscricao(): ?UniGrupoInscricao
    {
        return $this->cdUniGrupoInscricao;
    }

    public function setCdUniGrupoInscricao(?UniGrupoInscricao $cdUniGrupoInscricao): self
    {
        $this->cdUniGrupoInscricao = $cdUniGrupoInscricao;
        return $this;
    }

    public function getCdContratoInscricao(): ?UniRelatorioTemplate
    {
        return $this->cdContratoInscricao;
    }

    public function setCdContratoInscricao(?UniRelatorioTemplate $cdContratoInscricao): self
    {
        $this->cdContratoInscricao = $cdContratoInscricao;
        return $this;
    }

    public function isSnItinerario(): bool
    {
        return $this->snItinerario;
    }

    public function setSnItinerario(bool $snItinerario): self
    {
        $this->snItinerario = $snItinerario;
        return $this;
    }

    public function getDsNomeIntinerario(): ?string
    {
        return $this->dsNomeIntinerario;
    }

    public function setDsNomeIntinerario(?string $dsNomeIntinerario): self
    {
        $this->dsNomeIntinerario = $dsNomeIntinerario;
        return $this;
    }

    public function getCdModalidadeEnsinoMec(): ?int
    {
        return $this->cdModalidadeEnsinoMec;
    }

    public function setCdModalidadeEnsinoMec(?int $cdModalidadeEnsinoMec): self
    {
        $this->cdModalidadeEnsinoMec = $cdModalidadeEnsinoMec;
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
