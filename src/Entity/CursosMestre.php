<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CursosMestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosMestreRepository::class)]
#[ORM\Table(
    name: 'cursos_mestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ID_CURSO', columns: ['ID_CURSO'])]
#[ORM\Index(name: 'IX_ID_CURSO', columns: ['ID_CURSO'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'idx_cursos_mestre_ds_curso_dt_base', columns: ['DS_CURSO', 'dt_base'])]
#[ORM\Index(name: 'FK_cursos_mestre_uni_relatorio_template', columns: ['cd_contrato_inscricao'])]
#[ORM\Index(name: 'IX_CM_NR_GRAU', columns: ['NR_GRAU'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cursos_mestre_uni_relatorio_template', 'colunas' => ['cd_contrato_inscricao'], 'tabelaAlvo' => 'uni_relatorio_template', 'colunasAlvo' => ['cd_relatorio_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['ID_CURSO']
)]
class CursosMestre
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Column(name: 'DS_CURSO', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'DS_APELIDO', type: 'string', length: 255, nullable: true)]
    private ?string $dsApelido = null;

    #[ORM\Column(name: 'NR_GRAU', type: 'smallint', nullable: true)]
    private ?int $nrGrau = null;

    #[ORM\Column(name: 'DS_HABILITACAO', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsHabilitacao = '';

    #[ORM\Column(name: 'SN_ATIVO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snAtivo = 'S';

    #[ORM\Column(name: 'NR_RELEVANCIA', type: 'smallint', options: ['default' => '1'])]
    private int $nrRelevancia = 1;

    #[ORM\Column(name: 'CD_TITULACAO', type: 'integer', nullable: true)]
    private ?int $cdTitulacao = null;

    #[ORM\Column(name: 'NR_INCREMENTO', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrIncremento = null;

    #[ORM\Column(name: 'ID_CURSO', type: 'integer')]
    private ?int $idCurso = null;

    #[ORM\Column(name: 'CD_AREA', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'CD_MODALIDADE_MEC', type: 'integer', nullable: true)]
    private ?int $cdModalidadeMec = null;

    #[ORM\Column(name: 'ds_modalidade_curso_inep', type: 'enum', options: ['default' => 'presencial', 'values' => ['presencial', 'semipresencial', 'ead']])]
    private string $dsModalidadeCursoInep = 'presencial';

    #[ORM\Column(name: 'vl_pct_presencial_obrigatorio', type: 'decimal', precision: 10, scale: 2, options: ['default' => '100.00'])]
    private string $vlPctPresencialObrigatorio = '100.00';

    #[ORM\Column(name: 'vl_pct_presencial_sincrona_mediada', type: 'decimal', precision: 10, scale: 2, options: ['default' => '0.00'])]
    private string $vlPctPresencialSincronaMediada = '0.00';

    #[ORM\Column(name: 'vl_pct_ead_assincrona_maxima', type: 'decimal', precision: 10, scale: 2, options: ['default' => '0.00'])]
    private string $vlPctEadAssincronaMaxima = '0.00';

    #[ORM\Column(name: 'sn_nao_verif_disc_aprovadas', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snNaoVerifDiscAprovadas = 0;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'DS_MASCARA_SERIE', type: 'string', length: 255, nullable: true, options: ['default' => '$SERIE'])]
    private ?string $dsMascaraSerie = '$SERIE';

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'me_objetivo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObjetivo = null;

    #[ORM\Column(name: 'nr_diploma_processo_registro', type: 'integer', nullable: true)]
    private ?int $nrDiplomaProcessoRegistro = null;

    #[ORM\Column(name: 'ds_diploma_processo_registro', type: 'string', length: 120, nullable: true)]
    private ?string $dsDiplomaProcessoRegistro = null;

    #[ORM\Column(name: 'dt_diploma_processo_registro', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtDiplomaProcessoRegistro = null;

    #[ORM\Column(name: 'dt_diploma_protocolo_envio', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtDiplomaProtocoloEnvio = null;

    #[ORM\Column(name: 'ds_diploma_veiculo_autorizacao_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_veiculo'])]
    private ?string $dsDiplomaVeiculoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_publicacao_autorizacao_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_publicacao'])]
    private ?\DateTimeInterface $dtDiplomaPublicacaoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_publicacao_autorizacao_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_secao'])]
    private ?string $dsDiplomaPublicacaoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_pagina_autorizacao_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_pagina'])]
    private ?string $dsDiplomaPaginaAutorizacaoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_dou_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_dou'])]
    private ?string $dsDiplomaNumeroDouDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_processo_autorizacao_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_processo'])]
    private ?string $dsDiplomaNumeroProcessoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_tipo_processo_autorizacao_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_tipo_processo'])]
    private ?string $dsDiplomaTipoProcessoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_processo_autorizacao_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_processo'])]
    private ?\DateTimeInterface $dtDiplomaProcessoAutorizacaoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_protocol_autorizacao_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_protocolo'])]
    private ?\DateTimeInterface $dtDiplomaProtocolAutorizacaoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_veiculo_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_veiculo'])]
    private ?string $dsDiplomaVeiculoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_publicacao_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_publicacao'])]
    private ?\DateTimeInterface $dtDiplomaPublicacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_secao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_secao'])]
    private ?string $dsDiplomaSecaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_pagina_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_pagina'])]
    private ?string $dsDiplomaPaginaReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_dou_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_dou'])]
    private ?string $dsDiplomaNumeroDouReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_processo'])]
    private ?string $dsDiplomaNumeroReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_tipo_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_tipo_processo'])]
    private ?string $dsDiplomaTipoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_processo_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_processo'])]
    private ?\DateTimeInterface $dtDiplomaProcessoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_protocolo_envio_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_protocolo'])]
    private ?\DateTimeInterface $dtDiplomaProtocoloEnvioReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_tipo_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.'])]
    private ?string $dsDiplomaTipoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_certificadora'])]
    private ?string $dsDiplomaNumeroRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_renovacao_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_ato'])]
    private ?\DateTimeInterface $dtDiplomaRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_veiculo_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_veiculo'])]
    private ?string $dsDiplomaVeiculoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_publicacao_renovacao_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_publicacao'])]
    private ?\DateTimeInterface $dtDiplomaPublicacaoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_secao_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_secao'])]
    private ?string $dsDiplomaSecaoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_pagina_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_pagina'])]
    private ?string $dsDiplomaPaginaRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_dou_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_dou'])]
    private ?string $dsDiplomaNumeroDouRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_numero_processo_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.nr_processo'])]
    private ?string $dsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_tipo_processo_renovacao_reconhecimento_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.ds_tipo_processo'])]
    private ?string $dsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_processo_renovacao_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_processo'])]
    private ?\DateTimeInterface $dtDiplomaProcessoRenovacaoReconhecimentoDesativado = null;

    #[ORM\Column(name: 'dt_diploma_processo_renovacao_envio_reconhecimento_DESATIVADO', type: 'date', nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_atos_oficiais.dt_protocolo'])]
    private ?\DateTimeInterface $dtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_carga_integralizada_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_coligadas.nr_carga_horaria_relogio_integralizada'])]
    private ?string $dsDiplomaCargaIntegralizadaDesativado = null;

    #[ORM\Column(name: 'ds_diploma_carga_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo movido para a tabela cursos_coligadas.nr_carga_horaria_relogio'])]
    private ?string $dsDiplomaCargaDesativado = null;

    #[ORM\Column(name: 'ds_diploma_conceito_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo inutilizado'])]
    private ?string $dsDiplomaConceitoDesativado = null;

    #[ORM\Column(name: 'ds_diploma_conceito_rm_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo inutilizado'])]
    private ?string $dsDiplomaConceitoRmDesativado = null;

    #[ORM\Column(name: 'ds_diploma_conceito_especifico_DESATIVADO', type: 'string', length: 120, nullable: true, options: ['comment' => 'Campo inutilizado'])]
    private ?string $dsDiplomaConceitoEspecificoDesativado = null;

    #[ORM\Column(name: 'ds_enfase_curso', type: 'string', length: 120, nullable: true)]
    private ?string $dsEnfaseCurso = null;

    #[ORM\Column(name: 'ds_cod_curriculo_curso_mec', type: 'string', length: 50, nullable: true)]
    private ?string $dsCodCurriculoCursoMec = null;

    #[ORM\ManyToOne(targetEntity: UniRelatorioTemplate::class)]
    #[ORM\JoinColumn(name: 'cd_contrato_inscricao', referencedColumnName: 'cd_relatorio_template', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniRelatorioTemplate $cdContratoInscricao = null;

    #[ORM\Column(name: 'sn_bloqueio_integracao_principia', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueioIntegracaoPrincipia = 0;

    // Sem construtor: 64 propriedades. Use os setters encadeados.

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getDsApelido(): ?string
    {
        return $this->dsApelido;
    }

    public function setDsApelido(?string $dsApelido): self
    {
        $this->dsApelido = $dsApelido;
        return $this;
    }

    public function getNrGrau(): ?int
    {
        return $this->nrGrau;
    }

    public function setNrGrau(?int $nrGrau): self
    {
        $this->nrGrau = $nrGrau;
        return $this;
    }

    public function getDsHabilitacao(): ?string
    {
        return $this->dsHabilitacao;
    }

    public function setDsHabilitacao(?string $dsHabilitacao): self
    {
        $this->dsHabilitacao = $dsHabilitacao;
        return $this;
    }

    public function getSnAtivo(): ?string
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?string $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNrRelevancia(): int
    {
        return $this->nrRelevancia;
    }

    public function setNrRelevancia(int $nrRelevancia): self
    {
        $this->nrRelevancia = $nrRelevancia;
        return $this;
    }

    public function getCdTitulacao(): ?int
    {
        return $this->cdTitulacao;
    }

    public function setCdTitulacao(?int $cdTitulacao): self
    {
        $this->cdTitulacao = $cdTitulacao;
        return $this;
    }

    public function getNrIncremento(): ?int
    {
        return $this->nrIncremento;
    }

    public function setNrIncremento(?int $nrIncremento): self
    {
        $this->nrIncremento = $nrIncremento;
        return $this;
    }

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function setIdCurso(?int $idCurso): self
    {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getCdModalidadeMec(): ?int
    {
        return $this->cdModalidadeMec;
    }

    public function setCdModalidadeMec(?int $cdModalidadeMec): self
    {
        $this->cdModalidadeMec = $cdModalidadeMec;
        return $this;
    }

    public function getDsModalidadeCursoInep(): string
    {
        return $this->dsModalidadeCursoInep;
    }

    public function setDsModalidadeCursoInep(string $dsModalidadeCursoInep): self
    {
        $this->dsModalidadeCursoInep = $dsModalidadeCursoInep;
        return $this;
    }

    public function getVlPctPresencialObrigatorio(): string
    {
        return $this->vlPctPresencialObrigatorio;
    }

    public function setVlPctPresencialObrigatorio(string $vlPctPresencialObrigatorio): self
    {
        $this->vlPctPresencialObrigatorio = $vlPctPresencialObrigatorio;
        return $this;
    }

    public function getVlPctPresencialSincronaMediada(): string
    {
        return $this->vlPctPresencialSincronaMediada;
    }

    public function setVlPctPresencialSincronaMediada(string $vlPctPresencialSincronaMediada): self
    {
        $this->vlPctPresencialSincronaMediada = $vlPctPresencialSincronaMediada;
        return $this;
    }

    public function getVlPctEadAssincronaMaxima(): string
    {
        return $this->vlPctEadAssincronaMaxima;
    }

    public function setVlPctEadAssincronaMaxima(string $vlPctEadAssincronaMaxima): self
    {
        $this->vlPctEadAssincronaMaxima = $vlPctEadAssincronaMaxima;
        return $this;
    }

    public function getSnNaoVerifDiscAprovadas(): int
    {
        return $this->snNaoVerifDiscAprovadas;
    }

    public function setSnNaoVerifDiscAprovadas(int $snNaoVerifDiscAprovadas): self
    {
        $this->snNaoVerifDiscAprovadas = $snNaoVerifDiscAprovadas;
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

    public function getDsMascaraSerie(): ?string
    {
        return $this->dsMascaraSerie;
    }

    public function setDsMascaraSerie(?string $dsMascaraSerie): self
    {
        $this->dsMascaraSerie = $dsMascaraSerie;
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

    public function getMeObjetivo(): ?string
    {
        return $this->meObjetivo;
    }

    public function setMeObjetivo(?string $meObjetivo): self
    {
        $this->meObjetivo = $meObjetivo;
        return $this;
    }

    public function getNrDiplomaProcessoRegistro(): ?int
    {
        return $this->nrDiplomaProcessoRegistro;
    }

    public function setNrDiplomaProcessoRegistro(?int $nrDiplomaProcessoRegistro): self
    {
        $this->nrDiplomaProcessoRegistro = $nrDiplomaProcessoRegistro;
        return $this;
    }

    public function getDsDiplomaProcessoRegistro(): ?string
    {
        return $this->dsDiplomaProcessoRegistro;
    }

    public function setDsDiplomaProcessoRegistro(?string $dsDiplomaProcessoRegistro): self
    {
        $this->dsDiplomaProcessoRegistro = $dsDiplomaProcessoRegistro;
        return $this;
    }

    public function getDtDiplomaProcessoRegistro(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProcessoRegistro;
    }

    public function setDtDiplomaProcessoRegistro(?\DateTimeInterface $dtDiplomaProcessoRegistro): self
    {
        $this->dtDiplomaProcessoRegistro = $dtDiplomaProcessoRegistro;
        return $this;
    }

    public function getDtDiplomaProtocoloEnvio(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProtocoloEnvio;
    }

    public function setDtDiplomaProtocoloEnvio(?\DateTimeInterface $dtDiplomaProtocoloEnvio): self
    {
        $this->dtDiplomaProtocoloEnvio = $dtDiplomaProtocoloEnvio;
        return $this;
    }

    public function getDsDiplomaVeiculoAutorizacaoDesativado(): ?string
    {
        return $this->dsDiplomaVeiculoAutorizacaoDesativado;
    }

    public function setDsDiplomaVeiculoAutorizacaoDesativado(?string $dsDiplomaVeiculoAutorizacaoDesativado): self
    {
        $this->dsDiplomaVeiculoAutorizacaoDesativado = $dsDiplomaVeiculoAutorizacaoDesativado;
        return $this;
    }

    public function getDtDiplomaPublicacaoAutorizacaoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaPublicacaoAutorizacaoDesativado;
    }

    public function setDtDiplomaPublicacaoAutorizacaoDesativado(?\DateTimeInterface $dtDiplomaPublicacaoAutorizacaoDesativado): self
    {
        $this->dtDiplomaPublicacaoAutorizacaoDesativado = $dtDiplomaPublicacaoAutorizacaoDesativado;
        return $this;
    }

    public function getDsDiplomaPublicacaoAutorizacaoDesativado(): ?string
    {
        return $this->dsDiplomaPublicacaoAutorizacaoDesativado;
    }

    public function setDsDiplomaPublicacaoAutorizacaoDesativado(?string $dsDiplomaPublicacaoAutorizacaoDesativado): self
    {
        $this->dsDiplomaPublicacaoAutorizacaoDesativado = $dsDiplomaPublicacaoAutorizacaoDesativado;
        return $this;
    }

    public function getDsDiplomaPaginaAutorizacaoDesativado(): ?string
    {
        return $this->dsDiplomaPaginaAutorizacaoDesativado;
    }

    public function setDsDiplomaPaginaAutorizacaoDesativado(?string $dsDiplomaPaginaAutorizacaoDesativado): self
    {
        $this->dsDiplomaPaginaAutorizacaoDesativado = $dsDiplomaPaginaAutorizacaoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroDouDesativado(): ?string
    {
        return $this->dsDiplomaNumeroDouDesativado;
    }

    public function setDsDiplomaNumeroDouDesativado(?string $dsDiplomaNumeroDouDesativado): self
    {
        $this->dsDiplomaNumeroDouDesativado = $dsDiplomaNumeroDouDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroProcessoAutorizacaoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroProcessoAutorizacaoDesativado;
    }

    public function setDsDiplomaNumeroProcessoAutorizacaoDesativado(?string $dsDiplomaNumeroProcessoAutorizacaoDesativado): self
    {
        $this->dsDiplomaNumeroProcessoAutorizacaoDesativado = $dsDiplomaNumeroProcessoAutorizacaoDesativado;
        return $this;
    }

    public function getDsDiplomaTipoProcessoAutorizacaoDesativado(): ?string
    {
        return $this->dsDiplomaTipoProcessoAutorizacaoDesativado;
    }

    public function setDsDiplomaTipoProcessoAutorizacaoDesativado(?string $dsDiplomaTipoProcessoAutorizacaoDesativado): self
    {
        $this->dsDiplomaTipoProcessoAutorizacaoDesativado = $dsDiplomaTipoProcessoAutorizacaoDesativado;
        return $this;
    }

    public function getDtDiplomaProcessoAutorizacaoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProcessoAutorizacaoDesativado;
    }

    public function setDtDiplomaProcessoAutorizacaoDesativado(?\DateTimeInterface $dtDiplomaProcessoAutorizacaoDesativado): self
    {
        $this->dtDiplomaProcessoAutorizacaoDesativado = $dtDiplomaProcessoAutorizacaoDesativado;
        return $this;
    }

    public function getDtDiplomaProtocolAutorizacaoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProtocolAutorizacaoDesativado;
    }

    public function setDtDiplomaProtocolAutorizacaoDesativado(?\DateTimeInterface $dtDiplomaProtocolAutorizacaoDesativado): self
    {
        $this->dtDiplomaProtocolAutorizacaoDesativado = $dtDiplomaProtocolAutorizacaoDesativado;
        return $this;
    }

    public function getDsDiplomaVeiculoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaVeiculoReconhecimentoDesativado;
    }

    public function setDsDiplomaVeiculoReconhecimentoDesativado(?string $dsDiplomaVeiculoReconhecimentoDesativado): self
    {
        $this->dsDiplomaVeiculoReconhecimentoDesativado = $dsDiplomaVeiculoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaPublicacaoReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaPublicacaoReconhecimentoDesativado;
    }

    public function setDtDiplomaPublicacaoReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaPublicacaoReconhecimentoDesativado): self
    {
        $this->dtDiplomaPublicacaoReconhecimentoDesativado = $dtDiplomaPublicacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaSecaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaSecaoReconhecimentoDesativado;
    }

    public function setDsDiplomaSecaoReconhecimentoDesativado(?string $dsDiplomaSecaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaSecaoReconhecimentoDesativado = $dsDiplomaSecaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaPaginaReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaPaginaReconhecimentoDesativado;
    }

    public function setDsDiplomaPaginaReconhecimentoDesativado(?string $dsDiplomaPaginaReconhecimentoDesativado): self
    {
        $this->dsDiplomaPaginaReconhecimentoDesativado = $dsDiplomaPaginaReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroDouReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroDouReconhecimentoDesativado;
    }

    public function setDsDiplomaNumeroDouReconhecimentoDesativado(?string $dsDiplomaNumeroDouReconhecimentoDesativado): self
    {
        $this->dsDiplomaNumeroDouReconhecimentoDesativado = $dsDiplomaNumeroDouReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroReconhecimentoDesativado;
    }

    public function setDsDiplomaNumeroReconhecimentoDesativado(?string $dsDiplomaNumeroReconhecimentoDesativado): self
    {
        $this->dsDiplomaNumeroReconhecimentoDesativado = $dsDiplomaNumeroReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaTipoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaTipoReconhecimentoDesativado;
    }

    public function setDsDiplomaTipoReconhecimentoDesativado(?string $dsDiplomaTipoReconhecimentoDesativado): self
    {
        $this->dsDiplomaTipoReconhecimentoDesativado = $dsDiplomaTipoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaProcessoReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProcessoReconhecimentoDesativado;
    }

    public function setDtDiplomaProcessoReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaProcessoReconhecimentoDesativado): self
    {
        $this->dtDiplomaProcessoReconhecimentoDesativado = $dtDiplomaProcessoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaProtocoloEnvioReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProtocoloEnvioReconhecimentoDesativado;
    }

    public function setDtDiplomaProtocoloEnvioReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaProtocoloEnvioReconhecimentoDesativado): self
    {
        $this->dtDiplomaProtocoloEnvioReconhecimentoDesativado = $dtDiplomaProtocoloEnvioReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaTipoRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaTipoRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaTipoRenovacaoReconhecimentoDesativado(?string $dsDiplomaTipoRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaTipoRenovacaoReconhecimentoDesativado = $dsDiplomaTipoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaNumeroRenovacaoReconhecimentoDesativado(?string $dsDiplomaNumeroRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaNumeroRenovacaoReconhecimentoDesativado = $dsDiplomaNumeroRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaRenovacaoReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaRenovacaoReconhecimentoDesativado;
    }

    public function setDtDiplomaRenovacaoReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaRenovacaoReconhecimentoDesativado): self
    {
        $this->dtDiplomaRenovacaoReconhecimentoDesativado = $dtDiplomaRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaVeiculoRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaVeiculoRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaVeiculoRenovacaoReconhecimentoDesativado(?string $dsDiplomaVeiculoRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaVeiculoRenovacaoReconhecimentoDesativado = $dsDiplomaVeiculoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaPublicacaoRenovacaoReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaPublicacaoRenovacaoReconhecimentoDesativado;
    }

    public function setDtDiplomaPublicacaoRenovacaoReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaPublicacaoRenovacaoReconhecimentoDesativado): self
    {
        $this->dtDiplomaPublicacaoRenovacaoReconhecimentoDesativado = $dtDiplomaPublicacaoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaSecaoRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaSecaoRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaSecaoRenovacaoReconhecimentoDesativado(?string $dsDiplomaSecaoRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaSecaoRenovacaoReconhecimentoDesativado = $dsDiplomaSecaoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaPaginaRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaPaginaRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaPaginaRenovacaoReconhecimentoDesativado(?string $dsDiplomaPaginaRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaPaginaRenovacaoReconhecimentoDesativado = $dsDiplomaPaginaRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroDouRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroDouRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaNumeroDouRenovacaoReconhecimentoDesativado(?string $dsDiplomaNumeroDouRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaNumeroDouRenovacaoReconhecimentoDesativado = $dsDiplomaNumeroDouRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado(?string $dsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado = $dsDiplomaNumeroProcessoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado(): ?string
    {
        return $this->dsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado;
    }

    public function setDsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado(?string $dsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado): self
    {
        $this->dsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado = $dsDiplomaTipoProcessoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaProcessoRenovacaoReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProcessoRenovacaoReconhecimentoDesativado;
    }

    public function setDtDiplomaProcessoRenovacaoReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaProcessoRenovacaoReconhecimentoDesativado): self
    {
        $this->dtDiplomaProcessoRenovacaoReconhecimentoDesativado = $dtDiplomaProcessoRenovacaoReconhecimentoDesativado;
        return $this;
    }

    public function getDtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado(): ?\DateTimeInterface
    {
        return $this->dtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado;
    }

    public function setDtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado(?\DateTimeInterface $dtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado): self
    {
        $this->dtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado = $dtDiplomaProcessoRenovacaoEnvioReconhecimentoDesativado;
        return $this;
    }

    public function getDsDiplomaCargaIntegralizadaDesativado(): ?string
    {
        return $this->dsDiplomaCargaIntegralizadaDesativado;
    }

    public function setDsDiplomaCargaIntegralizadaDesativado(?string $dsDiplomaCargaIntegralizadaDesativado): self
    {
        $this->dsDiplomaCargaIntegralizadaDesativado = $dsDiplomaCargaIntegralizadaDesativado;
        return $this;
    }

    public function getDsDiplomaCargaDesativado(): ?string
    {
        return $this->dsDiplomaCargaDesativado;
    }

    public function setDsDiplomaCargaDesativado(?string $dsDiplomaCargaDesativado): self
    {
        $this->dsDiplomaCargaDesativado = $dsDiplomaCargaDesativado;
        return $this;
    }

    public function getDsDiplomaConceitoDesativado(): ?string
    {
        return $this->dsDiplomaConceitoDesativado;
    }

    public function setDsDiplomaConceitoDesativado(?string $dsDiplomaConceitoDesativado): self
    {
        $this->dsDiplomaConceitoDesativado = $dsDiplomaConceitoDesativado;
        return $this;
    }

    public function getDsDiplomaConceitoRmDesativado(): ?string
    {
        return $this->dsDiplomaConceitoRmDesativado;
    }

    public function setDsDiplomaConceitoRmDesativado(?string $dsDiplomaConceitoRmDesativado): self
    {
        $this->dsDiplomaConceitoRmDesativado = $dsDiplomaConceitoRmDesativado;
        return $this;
    }

    public function getDsDiplomaConceitoEspecificoDesativado(): ?string
    {
        return $this->dsDiplomaConceitoEspecificoDesativado;
    }

    public function setDsDiplomaConceitoEspecificoDesativado(?string $dsDiplomaConceitoEspecificoDesativado): self
    {
        $this->dsDiplomaConceitoEspecificoDesativado = $dsDiplomaConceitoEspecificoDesativado;
        return $this;
    }

    public function getDsEnfaseCurso(): ?string
    {
        return $this->dsEnfaseCurso;
    }

    public function setDsEnfaseCurso(?string $dsEnfaseCurso): self
    {
        $this->dsEnfaseCurso = $dsEnfaseCurso;
        return $this;
    }

    public function getDsCodCurriculoCursoMec(): ?string
    {
        return $this->dsCodCurriculoCursoMec;
    }

    public function setDsCodCurriculoCursoMec(?string $dsCodCurriculoCursoMec): self
    {
        $this->dsCodCurriculoCursoMec = $dsCodCurriculoCursoMec;
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

    public function getSnBloqueioIntegracaoPrincipia(): ?int
    {
        return $this->snBloqueioIntegracaoPrincipia;
    }

    public function setSnBloqueioIntegracaoPrincipia(?int $snBloqueioIntegracaoPrincipia): self
    {
        $this->snBloqueioIntegracaoPrincipia = $snBloqueioIntegracaoPrincipia;
        return $this;
    }
}
