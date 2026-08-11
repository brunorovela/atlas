<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniEquivalenciasLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniEquivalenciasLogsRepository::class)]
#[ORM\Table(
    name: 'uni_equivalencias_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_EQUI_LOG_PESSOAS_CD_USUARIO', columns: ['CD_USUARIO'])]
#[ORM\Index(name: 'FK_EQUI_LOGS_PESSOAS_CD_ALUNO', columns: ['CD_ALUNO'])]
#[ORM\Index(name: 'FK_EQUI_LOGS_CURSOS_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'FK_EQ_LOGS_CD_DISC_DISC_CODIGO', columns: ['CD_DISCIPLINA', 'CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['CD_USUARIO'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['CD_ALUNO'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['CD_DISCIPLINA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_EQ_LOGS_CD_DISC_DISC_CODIGO', 'colunas' => ['CD_DISCIPLINA', 'CD_CURSO'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo', 'curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_EQUI_LOG_PESSOAS_CD_USUARIO', 'colunas' => ['CD_USUARIO'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_EQUI_LOGS_CURSOS_CD_CURSO', 'colunas' => ['CD_CURSO'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_EQUI_LOGS_PESSOAS_CD_ALUNO', 'colunas' => ['CD_ALUNO'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniEquivalenciasLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_EQUIVALENCIA_LOG', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEquivalenciaLog = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_USUARIO', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuario = null;

    #[ORM\Column(name: 'DT_LOG', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'CD_SITUACAO', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_ALUNO', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdAluno = null;

    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'CD_CURSO', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'CD_PROFESSOR_EQ', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProfessorEq = null;

    #[ORM\Column(name: 'NM_INSTITUICAO_EQ', type: 'string', length: 100, nullable: true)]
    private ?string $nmInstituicaoEq = null;

    #[ORM\Column(name: 'NM_CURSO_EQ', type: 'string', length: 100, nullable: true)]
    private ?string $nmCursoEq = null;

    #[ORM\Column(name: 'NM_DISCIPLINA_EQ', type: 'text', length: 16777215, nullable: true)]
    private ?string $nmDisciplinaEq = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE_EQ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestreEq = null;

    #[ORM\Column(name: 'VL_CARGA_HORARIA_EQ', type: 'float', nullable: true)]
    private ?float $vlCargaHorariaEq = null;

    #[ORM\Column(name: 'VL_NOTA_EQ', type: 'float', nullable: true)]
    private ?float $vlNotaEq = null;

    #[ORM\Column(name: 'VL_FREQUENCIA_EQ', type: 'float', nullable: true)]
    private ?float $vlFrequenciaEq = null;

    #[ORM\Column(name: 'VL_CONTEUDO_EQ', type: 'float', nullable: true)]
    private ?float $vlConteudoEq = null;

    #[ORM\Column(name: 'DS_CONCEITO_EQ', type: 'string', length: 10, nullable: true)]
    private ?string $dsConceitoEq = null;

    #[ORM\Column(name: 'TP_ACAO', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'E'])]
    private string $tpAcao = 'E';

    #[ORM\Column(name: 'TX_MOTIVO', type: 'text', length: 65535)]
    private ?string $txMotivo = null;

    #[ORM\Column(name: 'NR_FICHA_EXCLUIDA', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $nrFichaExcluida = null;

    public function __construct(
        ?Pessoas $cdUsuario = null,
        ?\DateTimeInterface $dtLog = null,
        ?int $cdSituacao = null,
        ?Pessoas $cdAluno = null,
        ?int $cdDisciplina = null,
        ?CursosMestre $cdCurso = null,
        ?int $cdProfessorEq = null,
        ?string $nmInstituicaoEq = null,
        ?string $nmCursoEq = null,
        ?string $nmDisciplinaEq = null,
        ?int $nrAnosemestreEq = null,
        ?float $vlCargaHorariaEq = null,
        ?float $vlNotaEq = null,
        ?float $vlFrequenciaEq = null,
        ?float $vlConteudoEq = null,
        ?string $dsConceitoEq = null,
        string $tpAcao = 'E',
        ?string $txMotivo = null,
        ?string $nrFichaExcluida = null
    ) {
        $this->cdUsuario = $cdUsuario;
        $this->dtLog = $dtLog;
        $this->cdSituacao = $cdSituacao;
        $this->cdAluno = $cdAluno;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdCurso = $cdCurso;
        $this->cdProfessorEq = $cdProfessorEq;
        $this->nmInstituicaoEq = $nmInstituicaoEq;
        $this->nmCursoEq = $nmCursoEq;
        $this->nmDisciplinaEq = $nmDisciplinaEq;
        $this->nrAnosemestreEq = $nrAnosemestreEq;
        $this->vlCargaHorariaEq = $vlCargaHorariaEq;
        $this->vlNotaEq = $vlNotaEq;
        $this->vlFrequenciaEq = $vlFrequenciaEq;
        $this->vlConteudoEq = $vlConteudoEq;
        $this->dsConceitoEq = $dsConceitoEq;
        $this->tpAcao = $tpAcao;
        $this->txMotivo = $txMotivo;
        $this->nrFichaExcluida = $nrFichaExcluida;
    }

    public function getCdEquivalenciaLog(): ?int
    {
        return $this->cdEquivalenciaLog;
    }

    public function getCdUsuario(): ?Pessoas
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?Pessoas $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
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

    public function getCdAluno(): ?Pessoas
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?Pessoas $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
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

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdProfessorEq(): ?int
    {
        return $this->cdProfessorEq;
    }

    public function setCdProfessorEq(?int $cdProfessorEq): self
    {
        $this->cdProfessorEq = $cdProfessorEq;
        return $this;
    }

    public function getNmInstituicaoEq(): ?string
    {
        return $this->nmInstituicaoEq;
    }

    public function setNmInstituicaoEq(?string $nmInstituicaoEq): self
    {
        $this->nmInstituicaoEq = $nmInstituicaoEq;
        return $this;
    }

    public function getNmCursoEq(): ?string
    {
        return $this->nmCursoEq;
    }

    public function setNmCursoEq(?string $nmCursoEq): self
    {
        $this->nmCursoEq = $nmCursoEq;
        return $this;
    }

    public function getNmDisciplinaEq(): ?string
    {
        return $this->nmDisciplinaEq;
    }

    public function setNmDisciplinaEq(?string $nmDisciplinaEq): self
    {
        $this->nmDisciplinaEq = $nmDisciplinaEq;
        return $this;
    }

    public function getNrAnosemestreEq(): ?int
    {
        return $this->nrAnosemestreEq;
    }

    public function setNrAnosemestreEq(?int $nrAnosemestreEq): self
    {
        $this->nrAnosemestreEq = $nrAnosemestreEq;
        return $this;
    }

    public function getVlCargaHorariaEq(): ?float
    {
        return $this->vlCargaHorariaEq;
    }

    public function setVlCargaHorariaEq(?float $vlCargaHorariaEq): self
    {
        $this->vlCargaHorariaEq = $vlCargaHorariaEq;
        return $this;
    }

    public function getVlNotaEq(): ?float
    {
        return $this->vlNotaEq;
    }

    public function setVlNotaEq(?float $vlNotaEq): self
    {
        $this->vlNotaEq = $vlNotaEq;
        return $this;
    }

    public function getVlFrequenciaEq(): ?float
    {
        return $this->vlFrequenciaEq;
    }

    public function setVlFrequenciaEq(?float $vlFrequenciaEq): self
    {
        $this->vlFrequenciaEq = $vlFrequenciaEq;
        return $this;
    }

    public function getVlConteudoEq(): ?float
    {
        return $this->vlConteudoEq;
    }

    public function setVlConteudoEq(?float $vlConteudoEq): self
    {
        $this->vlConteudoEq = $vlConteudoEq;
        return $this;
    }

    public function getDsConceitoEq(): ?string
    {
        return $this->dsConceitoEq;
    }

    public function setDsConceitoEq(?string $dsConceitoEq): self
    {
        $this->dsConceitoEq = $dsConceitoEq;
        return $this;
    }

    public function getTpAcao(): string
    {
        return $this->tpAcao;
    }

    public function setTpAcao(string $tpAcao): self
    {
        $this->tpAcao = $tpAcao;
        return $this;
    }

    public function getTxMotivo(): ?string
    {
        return $this->txMotivo;
    }

    public function setTxMotivo(?string $txMotivo): self
    {
        $this->txMotivo = $txMotivo;
        return $this;
    }

    public function getNrFichaExcluida(): ?string
    {
        return $this->nrFichaExcluida;
    }

    public function setNrFichaExcluida(?string $nrFichaExcluida): self
    {
        $this->nrFichaExcluida = $nrFichaExcluida;
        return $this;
    }
}
