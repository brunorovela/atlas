<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MatriculasCursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculasCursoRepository::class)]
#[ORM\Table(
    name: 'matriculas_curso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_pessoa_curso_anosem', columns: ['cd_pessoa', 'cd_curso', 'nr_anosem_ingresso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['cd_grade'])]
#[ORM\Index(name: 'IX_CD_GRADE_CD_CURSO', columns: ['cd_grade', 'cd_curso'])]
#[ORM\Index(name: 'fk_cd_pessoa_termo', columns: ['cd_pessoa_termo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_pessoa_termo', 'colunas' => ['cd_pessoa_termo'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MatriculasCurso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMatriculaCurso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'nr_matricula', type: 'string', length: 20, nullable: true)]
    private ?string $nrMatricula = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_grade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrade = null;

    #[ORM\Column(name: 'nr_anosem_grade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemGrade = null;

    #[ORM\Column(name: 'nr_anosem_ingresso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemIngresso = null;

    #[ORM\Column(name: 'cd_turno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $cdTurno = null;

    #[ORM\Column(name: 'dt_ingresso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIngresso = null;

    #[ORM\Column(name: 'cd_ingresso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdIngresso = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdSituacao = 0;

    #[ORM\Column(name: 'nr_anosem_conclusao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemConclusao = null;

    #[ORM\Column(name: 'dt_conclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtConclusao = null;

    #[ORM\Column(name: 'dt_colacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtColacao = null;

    #[ORM\Column(name: 'dt_exp_diploma', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExpDiploma = null;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'ds_obs', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObs = null;

    #[ORM\Column(name: 'nr_media_curso', type: 'smallfloat', nullable: true)]
    private ?float $nrMediaCurso = null;

    #[ORM\Column(name: 'nr_cert_folha', type: 'integer', nullable: true)]
    private ?int $nrCertFolha = null;

    #[ORM\Column(name: 'nr_cert_registro', type: 'integer', nullable: true)]
    private ?int $nrCertRegistro = null;

    #[ORM\Column(name: 'cd_cert_livro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCertLivro = null;

    #[ORM\Column(name: 'sn_bloqueio_nr_media_curso', type: 'smallint', options: ['default' => '0'])]
    private int $snBloqueioNrMediaCurso = 0;

    #[ORM\Column(name: 'sn_gerado_manual', type: 'boolean', nullable: true)]
    private ?bool $snGeradoManual = null;

    #[ORM\Column(name: 'dt_certificado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCertificado = null;

    #[ORM\Column(name: 'nr_serie_diploma', type: 'string', length: 255, nullable: true)]
    private ?string $nrSerieDiploma = null;

    #[ORM\Column(name: 'cd_responsavel_registro', type: 'integer', nullable: true)]
    private ?int $cdResponsavelRegistro = null;

    #[ORM\Column(name: 'nr_processo', type: 'string', length: 255, nullable: true)]
    private ?string $nrProcesso = null;

    #[ORM\Column(name: 'dt_publicacao_dou', type: 'datetime', nullable: true, options: ['comment' => 'DOU significa Diário Oficial da União'])]
    private ?\DateTimeInterface $dtPublicacaoDou = null;

    #[ORM\Column(name: 'situacao_processo', type: 'integer', nullable: true)]
    private ?int $situacaoProcesso = null;

    #[ORM\Column(name: 'ds_situacao_enade', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacaoEnade = null;

    #[ORM\Column(name: 'ds_situacao_enade2', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacaoEnade2 = null;

    #[ORM\Column(name: 'ds_situacao_enade3', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacaoEnade3 = null;

    #[ORM\Column(name: 'ds_situacao_enade_outros', type: 'string', length: 120, nullable: true)]
    private ?string $dsSituacaoEnadeOutros = null;

    #[ORM\Column(name: 'ds_situacao_enade2_outros', type: 'string', length: 120, nullable: true)]
    private ?string $dsSituacaoEnade2Outros = null;

    #[ORM\Column(name: 'ds_situacao_enade3_outros', type: 'string', length: 120, nullable: true)]
    private ?string $dsSituacaoEnade3Outros = null;

    #[ORM\Column(name: 'dt_prova_enade', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtProvaEnade = null;

    #[ORM\Column(name: 'dt_prova_enade2', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtProvaEnade2 = null;

    #[ORM\Column(name: 'dt_prova_enade3', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtProvaEnade3 = null;

    #[ORM\Column(name: 'ds_observacao_enade', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacaoEnade = null;

    #[ORM\Column(name: 'ds_observacao_enade2', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacaoEnade2 = null;

    #[ORM\Column(name: 'ds_observacao_enade3', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacaoEnade3 = null;

    #[ORM\Column(name: 'dt_emissao_historico', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEmissaoHistorico = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_termo', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaTermo = null;

    #[ORM\Column(name: 'ds_chave_tipo_comprovante', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveTipoComprovante = null;

    #[ORM\Column(name: 'ds_observacao_comprovante', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacaoComprovante = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_transferencia_assistida', type: 'integer', nullable: true)]
    private ?int $snTransferenciaAssistida = null;

    #[ORM\Column(name: 'sn_dip_emissao_decisao_judicial', type: 'integer', nullable: true)]
    private ?int $snDipEmissaoDecisaoJudicial = null;

    #[ORM\Column(name: 'ds_numero_processo_judicial', type: 'string', length: 80, nullable: true)]
    private ?string $dsNumeroProcessoJudicial = null;

    #[ORM\Column(name: 'ds_nome_juiz', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeJuiz = null;

    #[ORM\Column(name: 'ds_decisao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDecisao = null;

    #[ORM\Column(name: 'ds_declaracoes_acerca_processo', type: 'string', length: 255, nullable: true)]
    private ?string $dsDeclaracoesAcercaProcesso = null;

    // Sem construtor: 52 propriedades. Use os setters encadeados.

    public function getCdMatriculaCurso(): ?int
    {
        return $this->cdMatriculaCurso;
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

    public function getNrMatricula(): ?string
    {
        return $this->nrMatricula;
    }

    public function setNrMatricula(?string $nrMatricula): self
    {
        $this->nrMatricula = $nrMatricula;
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

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function getNrAnosemGrade(): ?int
    {
        return $this->nrAnosemGrade;
    }

    public function setNrAnosemGrade(?int $nrAnosemGrade): self
    {
        $this->nrAnosemGrade = $nrAnosemGrade;
        return $this;
    }

    public function getNrAnosemIngresso(): ?int
    {
        return $this->nrAnosemIngresso;
    }

    public function setNrAnosemIngresso(?int $nrAnosemIngresso): self
    {
        $this->nrAnosemIngresso = $nrAnosemIngresso;
        return $this;
    }

    public function getCdTurno(): ?string
    {
        return $this->cdTurno;
    }

    public function setCdTurno(?string $cdTurno): self
    {
        $this->cdTurno = $cdTurno;
        return $this;
    }

    public function getDtIngresso(): ?\DateTimeInterface
    {
        return $this->dtIngresso;
    }

    public function setDtIngresso(?\DateTimeInterface $dtIngresso): self
    {
        $this->dtIngresso = $dtIngresso;
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

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrAnosemConclusao(): ?int
    {
        return $this->nrAnosemConclusao;
    }

    public function setNrAnosemConclusao(?int $nrAnosemConclusao): self
    {
        $this->nrAnosemConclusao = $nrAnosemConclusao;
        return $this;
    }

    public function getDtConclusao(): ?\DateTimeInterface
    {
        return $this->dtConclusao;
    }

    public function setDtConclusao(?\DateTimeInterface $dtConclusao): self
    {
        $this->dtConclusao = $dtConclusao;
        return $this;
    }

    public function getDtColacao(): ?\DateTimeInterface
    {
        return $this->dtColacao;
    }

    public function setDtColacao(?\DateTimeInterface $dtColacao): self
    {
        $this->dtColacao = $dtColacao;
        return $this;
    }

    public function getDtExpDiploma(): ?\DateTimeInterface
    {
        return $this->dtExpDiploma;
    }

    public function setDtExpDiploma(?\DateTimeInterface $dtExpDiploma): self
    {
        $this->dtExpDiploma = $dtExpDiploma;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }

    public function getDsObs(): ?string
    {
        return $this->dsObs;
    }

    public function setDsObs(?string $dsObs): self
    {
        $this->dsObs = $dsObs;
        return $this;
    }

    public function getNrMediaCurso(): ?float
    {
        return $this->nrMediaCurso;
    }

    public function setNrMediaCurso(?float $nrMediaCurso): self
    {
        $this->nrMediaCurso = $nrMediaCurso;
        return $this;
    }

    public function getNrCertFolha(): ?int
    {
        return $this->nrCertFolha;
    }

    public function setNrCertFolha(?int $nrCertFolha): self
    {
        $this->nrCertFolha = $nrCertFolha;
        return $this;
    }

    public function getNrCertRegistro(): ?int
    {
        return $this->nrCertRegistro;
    }

    public function setNrCertRegistro(?int $nrCertRegistro): self
    {
        $this->nrCertRegistro = $nrCertRegistro;
        return $this;
    }

    public function getCdCertLivro(): ?int
    {
        return $this->cdCertLivro;
    }

    public function setCdCertLivro(?int $cdCertLivro): self
    {
        $this->cdCertLivro = $cdCertLivro;
        return $this;
    }

    public function getSnBloqueioNrMediaCurso(): int
    {
        return $this->snBloqueioNrMediaCurso;
    }

    public function setSnBloqueioNrMediaCurso(int $snBloqueioNrMediaCurso): self
    {
        $this->snBloqueioNrMediaCurso = $snBloqueioNrMediaCurso;
        return $this;
    }

    public function isSnGeradoManual(): ?bool
    {
        return $this->snGeradoManual;
    }

    public function setSnGeradoManual(?bool $snGeradoManual): self
    {
        $this->snGeradoManual = $snGeradoManual;
        return $this;
    }

    public function getDtCertificado(): ?\DateTimeInterface
    {
        return $this->dtCertificado;
    }

    public function setDtCertificado(?\DateTimeInterface $dtCertificado): self
    {
        $this->dtCertificado = $dtCertificado;
        return $this;
    }

    public function getNrSerieDiploma(): ?string
    {
        return $this->nrSerieDiploma;
    }

    public function setNrSerieDiploma(?string $nrSerieDiploma): self
    {
        $this->nrSerieDiploma = $nrSerieDiploma;
        return $this;
    }

    public function getCdResponsavelRegistro(): ?int
    {
        return $this->cdResponsavelRegistro;
    }

    public function setCdResponsavelRegistro(?int $cdResponsavelRegistro): self
    {
        $this->cdResponsavelRegistro = $cdResponsavelRegistro;
        return $this;
    }

    public function getNrProcesso(): ?string
    {
        return $this->nrProcesso;
    }

    public function setNrProcesso(?string $nrProcesso): self
    {
        $this->nrProcesso = $nrProcesso;
        return $this;
    }

    public function getDtPublicacaoDou(): ?\DateTimeInterface
    {
        return $this->dtPublicacaoDou;
    }

    public function setDtPublicacaoDou(?\DateTimeInterface $dtPublicacaoDou): self
    {
        $this->dtPublicacaoDou = $dtPublicacaoDou;
        return $this;
    }

    public function getSituacaoProcesso(): ?int
    {
        return $this->situacaoProcesso;
    }

    public function setSituacaoProcesso(?int $situacaoProcesso): self
    {
        $this->situacaoProcesso = $situacaoProcesso;
        return $this;
    }

    public function getDsSituacaoEnade(): ?string
    {
        return $this->dsSituacaoEnade;
    }

    public function setDsSituacaoEnade(?string $dsSituacaoEnade): self
    {
        $this->dsSituacaoEnade = $dsSituacaoEnade;
        return $this;
    }

    public function getDsSituacaoEnade2(): ?string
    {
        return $this->dsSituacaoEnade2;
    }

    public function setDsSituacaoEnade2(?string $dsSituacaoEnade2): self
    {
        $this->dsSituacaoEnade2 = $dsSituacaoEnade2;
        return $this;
    }

    public function getDsSituacaoEnade3(): ?string
    {
        return $this->dsSituacaoEnade3;
    }

    public function setDsSituacaoEnade3(?string $dsSituacaoEnade3): self
    {
        $this->dsSituacaoEnade3 = $dsSituacaoEnade3;
        return $this;
    }

    public function getDsSituacaoEnadeOutros(): ?string
    {
        return $this->dsSituacaoEnadeOutros;
    }

    public function setDsSituacaoEnadeOutros(?string $dsSituacaoEnadeOutros): self
    {
        $this->dsSituacaoEnadeOutros = $dsSituacaoEnadeOutros;
        return $this;
    }

    public function getDsSituacaoEnade2Outros(): ?string
    {
        return $this->dsSituacaoEnade2Outros;
    }

    public function setDsSituacaoEnade2Outros(?string $dsSituacaoEnade2Outros): self
    {
        $this->dsSituacaoEnade2Outros = $dsSituacaoEnade2Outros;
        return $this;
    }

    public function getDsSituacaoEnade3Outros(): ?string
    {
        return $this->dsSituacaoEnade3Outros;
    }

    public function setDsSituacaoEnade3Outros(?string $dsSituacaoEnade3Outros): self
    {
        $this->dsSituacaoEnade3Outros = $dsSituacaoEnade3Outros;
        return $this;
    }

    public function getDtProvaEnade(): ?\DateTimeInterface
    {
        return $this->dtProvaEnade;
    }

    public function setDtProvaEnade(?\DateTimeInterface $dtProvaEnade): self
    {
        $this->dtProvaEnade = $dtProvaEnade;
        return $this;
    }

    public function getDtProvaEnade2(): ?\DateTimeInterface
    {
        return $this->dtProvaEnade2;
    }

    public function setDtProvaEnade2(?\DateTimeInterface $dtProvaEnade2): self
    {
        $this->dtProvaEnade2 = $dtProvaEnade2;
        return $this;
    }

    public function getDtProvaEnade3(): ?\DateTimeInterface
    {
        return $this->dtProvaEnade3;
    }

    public function setDtProvaEnade3(?\DateTimeInterface $dtProvaEnade3): self
    {
        $this->dtProvaEnade3 = $dtProvaEnade3;
        return $this;
    }

    public function getDsObservacaoEnade(): ?string
    {
        return $this->dsObservacaoEnade;
    }

    public function setDsObservacaoEnade(?string $dsObservacaoEnade): self
    {
        $this->dsObservacaoEnade = $dsObservacaoEnade;
        return $this;
    }

    public function getDsObservacaoEnade2(): ?string
    {
        return $this->dsObservacaoEnade2;
    }

    public function setDsObservacaoEnade2(?string $dsObservacaoEnade2): self
    {
        $this->dsObservacaoEnade2 = $dsObservacaoEnade2;
        return $this;
    }

    public function getDsObservacaoEnade3(): ?string
    {
        return $this->dsObservacaoEnade3;
    }

    public function setDsObservacaoEnade3(?string $dsObservacaoEnade3): self
    {
        $this->dsObservacaoEnade3 = $dsObservacaoEnade3;
        return $this;
    }

    public function getDtEmissaoHistorico(): ?\DateTimeInterface
    {
        return $this->dtEmissaoHistorico;
    }

    public function setDtEmissaoHistorico(?\DateTimeInterface $dtEmissaoHistorico): self
    {
        $this->dtEmissaoHistorico = $dtEmissaoHistorico;
        return $this;
    }

    public function getCdPessoaTermo(): ?Pessoas
    {
        return $this->cdPessoaTermo;
    }

    public function setCdPessoaTermo(?Pessoas $cdPessoaTermo): self
    {
        $this->cdPessoaTermo = $cdPessoaTermo;
        return $this;
    }

    public function getDsChaveTipoComprovante(): ?string
    {
        return $this->dsChaveTipoComprovante;
    }

    public function setDsChaveTipoComprovante(?string $dsChaveTipoComprovante): self
    {
        $this->dsChaveTipoComprovante = $dsChaveTipoComprovante;
        return $this;
    }

    public function getDsObservacaoComprovante(): ?string
    {
        return $this->dsObservacaoComprovante;
    }

    public function setDsObservacaoComprovante(?string $dsObservacaoComprovante): self
    {
        $this->dsObservacaoComprovante = $dsObservacaoComprovante;
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

    public function getSnTransferenciaAssistida(): ?int
    {
        return $this->snTransferenciaAssistida;
    }

    public function setSnTransferenciaAssistida(?int $snTransferenciaAssistida): self
    {
        $this->snTransferenciaAssistida = $snTransferenciaAssistida;
        return $this;
    }

    public function getSnDipEmissaoDecisaoJudicial(): ?int
    {
        return $this->snDipEmissaoDecisaoJudicial;
    }

    public function setSnDipEmissaoDecisaoJudicial(?int $snDipEmissaoDecisaoJudicial): self
    {
        $this->snDipEmissaoDecisaoJudicial = $snDipEmissaoDecisaoJudicial;
        return $this;
    }

    public function getDsNumeroProcessoJudicial(): ?string
    {
        return $this->dsNumeroProcessoJudicial;
    }

    public function setDsNumeroProcessoJudicial(?string $dsNumeroProcessoJudicial): self
    {
        $this->dsNumeroProcessoJudicial = $dsNumeroProcessoJudicial;
        return $this;
    }

    public function getDsNomeJuiz(): ?string
    {
        return $this->dsNomeJuiz;
    }

    public function setDsNomeJuiz(?string $dsNomeJuiz): self
    {
        $this->dsNomeJuiz = $dsNomeJuiz;
        return $this;
    }

    public function getDsDecisao(): ?string
    {
        return $this->dsDecisao;
    }

    public function setDsDecisao(?string $dsDecisao): self
    {
        $this->dsDecisao = $dsDecisao;
        return $this;
    }

    public function getDsDeclaracoesAcercaProcesso(): ?string
    {
        return $this->dsDeclaracoesAcercaProcesso;
    }

    public function setDsDeclaracoesAcercaProcesso(?string $dsDeclaracoesAcercaProcesso): self
    {
        $this->dsDeclaracoesAcercaProcesso = $dsDeclaracoesAcercaProcesso;
        return $this;
    }
}
