<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncTitulosRepository::class)]
#[ORM\Table(
    name: 'estnc_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EMPRESA', columns: ['cd_empresa'])]
#[ORM\Index(name: 'IX_CD_CONTRATO', columns: ['cd_contrato'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TITULO_CRIADOR', columns: ['cd_titulo_criador'])]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['cd_responsavel'])]
#[ORM\Index(name: 'FK_TITULOS_TITULOS_SITUACOES', columns: ['cd_situacao'])]
#[ORM\Index(name: 'FK_ESTNC_TITULOS_NU_GRUPOS', columns: ['cd_responsavel_grupo'])]
#[ORM\Index(name: 'FK_NC_TITULOS_CD_SUPERVISOR', columns: ['cd_supervisor'])]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL_GRUPO', columns: ['cd_responsavel_grupo'])]
#[ORM\Index(name: 'IX_CD_SUPERVISOR', columns: ['cd_supervisor'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_ESTNC_EMPRESA_RESPONSAVEL', columns: ['cd_estnc_empresa_responsavel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ESTNC_TITULOS_NU_GRUPOS', 'colunas' => ['cd_responsavel_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_modelo_contrato', 'colunas' => ['cd_contrato'], 'tabelaAlvo' => 'estnc_contratos', 'colunasAlvo' => ['cd_contrato'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_CURSO', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_EMPRESA', 'colunas' => ['cd_empresa'], 'tabelaAlvo' => 'empresas', 'colunasAlvo' => ['cd_empresa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_ESTAGIO', 'colunas' => ['cd_estagio'], 'tabelaAlvo' => 'estnc_estagios', 'colunasAlvo' => ['cd_estagio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_INSTITUICAO', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_SUPERVISOR', 'colunas' => ['cd_supervisor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_TITULOS_CD_TIT_CRIADOR', 'colunas' => ['cd_titulo_criador'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TITULOS_TITULOS_SITUACOES', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'estnc_titulos_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'cd_empresa', type: 'integer')]
    private ?int $cdEmpresa = null;

    #[ORM\ManyToOne(targetEntity: EstncEstagios::class)]
    #[ORM\JoinColumn(name: 'cd_estagio', referencedColumnName: 'cd_estagio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncEstagios $cdEstagio = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\ManyToOne(targetEntity: EstncContratos::class)]
    #[ORM\JoinColumn(name: 'cd_contrato', referencedColumnName: 'cd_contrato', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncContratos $cdContrato = null;

    #[ORM\Column(name: 'cd_estnc_empresa_responsavel', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstncEmpresaResponsavel = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_supervisor', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdSupervisor = null;

    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'cd_curso', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCurso = null;

    #[ORM\Column(name: 'dt_contrato', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtContrato = null;

    #[ORM\Column(name: 'ds_observacoes', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'dt_validade', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtValidade = null;

    #[ORM\Column(name: 'ds_contrato_preenchido', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsContratoPreenchido = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'vl_convenio', type: 'float', nullable: true, options: ['default' => '0.00'])]
    private ?float $vlConvenio = 0.0;

    #[ORM\Column(name: 'ds_horario', type: 'string', length: 255, nullable: true)]
    private ?string $dsHorario = null;

    #[ORM\Column(name: 'ds_carga', type: 'string', length: 255, nullable: true)]
    private ?string $dsCarga = null;

    #[ORM\Column(name: 'ds_profissao', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsProfissao = null;

    #[ORM\Column(name: 'sn_novo_contrato', type: TinyIntType::NAME, nullable: true)]
    private ?int $snNovoContrato = null;

    #[ORM\Column(name: 'ds_local', type: 'text', length: 65535, nullable: true)]
    private ?string $dsLocal = null;

    #[ORM\Column(name: 'sn_deferido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snDeferido = 0;

    #[ORM\Column(name: 'sn_contrato_interno', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snContratoInterno = 0;

    #[ORM\Column(name: 'sn_impresso', type: TinyIntType::NAME, nullable: true)]
    private ?int $snImpresso = null;

    #[ORM\Column(name: 'vl_bolsa', type: 'float', nullable: true)]
    private ?float $vlBolsa = null;

    #[ORM\Column(name: 'sn_agente_integracao', type: 'boolean', nullable: true)]
    private ?bool $snAgenteIntegracao = null;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExcluido = false;

    #[ORM\Column(name: 'vl_auxilio_transporte', type: 'float', nullable: true)]
    private ?float $vlAuxilioTransporte = null;

    #[ORM\Column(name: 'cd_deferido', type: 'string', length: 50, nullable: true)]
    private ?string $cdDeferido = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'ds_justificativa', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsJustificativa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_titulo_criador', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdTituloCriador = null;

    #[ORM\Column(name: 'cd_tipo_contrato', type: TinyIntType::NAME, nullable: true)]
    private ?int $cdTipoContrato = null;

    #[ORM\Column(name: 'sn_processo_completo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snProcessoCompleto = null;

    #[ORM\Column(name: 'sn_deferido_aluno', type: TinyIntType::NAME, nullable: true)]
    private ?int $snDeferidoAluno = null;

    #[ORM\Column(name: 'sn_deferido_empresa', type: TinyIntType::NAME, nullable: true)]
    private ?int $snDeferidoEmpresa = null;

    #[ORM\Column(name: 'sn_deferido_ie', type: TinyIntType::NAME, nullable: true)]
    private ?int $snDeferidoIe = null;

    #[ORM\Column(name: 'cd_deferido_aluno', type: 'string', length: 50, nullable: true)]
    private ?string $cdDeferidoAluno = null;

    #[ORM\Column(name: 'cd_deferido_empresa', type: 'string', length: 50, nullable: true)]
    private ?string $cdDeferidoEmpresa = null;

    #[ORM\Column(name: 'cd_deferido_ie', type: 'string', length: 50, nullable: true)]
    private ?string $cdDeferidoIe = null;

    #[ORM\Column(name: 'ds_vl_bolsa', type: 'text', length: 65535, nullable: true)]
    private ?string $dsVlBolsa = null;

    #[ORM\Column(name: 'ds_vl_auxilio_transporte', type: 'text', length: 65535, nullable: true)]
    private ?string $dsVlAuxilioTransporte = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'cd_setor', type: 'integer', nullable: true)]
    private ?int $cdSetor = null;

    #[ORM\Column(name: 'ds_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $dsAnexo = null;

    #[ORM\Column(name: 'ds_formacao_supervisor', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFormacaoSupervisor = null;

    #[ORM\Column(name: 'ds_experiencia_supervisor', type: 'string', length: 255, nullable: true)]
    private ?string $dsExperienciaSupervisor = null;

    #[ORM\ManyToOne(targetEntity: EstncTitulosSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncTitulosSituacoes $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_responsavel_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdResponsavelGrupo = null;

    #[ORM\Column(name: 'sn_ie_assinou_papel', type: 'boolean', nullable: true)]
    private ?bool $snIeAssinouPapel = null;

    #[ORM\Column(name: 'sn_empresa_assinou_papel', type: 'boolean', nullable: true)]
    private ?bool $snEmpresaAssinouPapel = null;

    #[ORM\Column(name: 'tp_fluxo', type: 'enum', options: ['default' => 'SISTEMA', 'values' => ['DIGITAL', 'SISTEMA']])]
    private string $tpFluxo = 'SISTEMA';

    #[ORM\Column(name: 'sn_arquivo_enviado', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snArquivoEnviado = 0;

    #[ORM\Column(name: 'dt_indeferido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtIndeferido = null;

    // Sem construtor: 52 propriedades. Use os setters encadeados.

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function getCdEmpresa(): ?int
    {
        return $this->cdEmpresa;
    }

    public function setCdEmpresa(?int $cdEmpresa): self
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
    }

    public function getCdEstagio(): ?EstncEstagios
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?EstncEstagios $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
    }

    public function getCdInstituicao(): ?InstituicoesEnsino
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?InstituicoesEnsino $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getCdContrato(): ?EstncContratos
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?EstncContratos $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
        return $this;
    }

    public function getCdEstncEmpresaResponsavel(): ?int
    {
        return $this->cdEstncEmpresaResponsavel;
    }

    public function setCdEstncEmpresaResponsavel(?int $cdEstncEmpresaResponsavel): self
    {
        $this->cdEstncEmpresaResponsavel = $cdEstncEmpresaResponsavel;
        return $this;
    }

    public function getCdSupervisor(): ?Pessoas
    {
        return $this->cdSupervisor;
    }

    public function setCdSupervisor(?Pessoas $cdSupervisor): self
    {
        $this->cdSupervisor = $cdSupervisor;
        return $this;
    }

    public function getCdCurso(): ?EstncCursos
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?EstncCursos $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getDtContrato(): ?\DateTimeInterface
    {
        return $this->dtContrato;
    }

    public function setDtContrato(?\DateTimeInterface $dtContrato): self
    {
        $this->dtContrato = $dtContrato;
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

    public function getDtValidade(): ?\DateTimeInterface
    {
        return $this->dtValidade;
    }

    public function setDtValidade(?\DateTimeInterface $dtValidade): self
    {
        $this->dtValidade = $dtValidade;
        return $this;
    }

    public function getDsContratoPreenchido(): ?string
    {
        return $this->dsContratoPreenchido;
    }

    public function setDsContratoPreenchido(?string $dsContratoPreenchido): self
    {
        $this->dsContratoPreenchido = $dsContratoPreenchido;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getVlConvenio(): ?float
    {
        return $this->vlConvenio;
    }

    public function setVlConvenio(?float $vlConvenio): self
    {
        $this->vlConvenio = $vlConvenio;
        return $this;
    }

    public function getDsHorario(): ?string
    {
        return $this->dsHorario;
    }

    public function setDsHorario(?string $dsHorario): self
    {
        $this->dsHorario = $dsHorario;
        return $this;
    }

    public function getDsCarga(): ?string
    {
        return $this->dsCarga;
    }

    public function setDsCarga(?string $dsCarga): self
    {
        $this->dsCarga = $dsCarga;
        return $this;
    }

    public function getDsProfissao(): ?string
    {
        return $this->dsProfissao;
    }

    public function setDsProfissao(?string $dsProfissao): self
    {
        $this->dsProfissao = $dsProfissao;
        return $this;
    }

    public function getSnNovoContrato(): ?int
    {
        return $this->snNovoContrato;
    }

    public function setSnNovoContrato(?int $snNovoContrato): self
    {
        $this->snNovoContrato = $snNovoContrato;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getSnDeferido(): ?int
    {
        return $this->snDeferido;
    }

    public function setSnDeferido(?int $snDeferido): self
    {
        $this->snDeferido = $snDeferido;
        return $this;
    }

    public function getSnContratoInterno(): ?int
    {
        return $this->snContratoInterno;
    }

    public function setSnContratoInterno(?int $snContratoInterno): self
    {
        $this->snContratoInterno = $snContratoInterno;
        return $this;
    }

    public function getSnImpresso(): ?int
    {
        return $this->snImpresso;
    }

    public function setSnImpresso(?int $snImpresso): self
    {
        $this->snImpresso = $snImpresso;
        return $this;
    }

    public function getVlBolsa(): ?float
    {
        return $this->vlBolsa;
    }

    public function setVlBolsa(?float $vlBolsa): self
    {
        $this->vlBolsa = $vlBolsa;
        return $this;
    }

    public function isSnAgenteIntegracao(): ?bool
    {
        return $this->snAgenteIntegracao;
    }

    public function setSnAgenteIntegracao(?bool $snAgenteIntegracao): self
    {
        $this->snAgenteIntegracao = $snAgenteIntegracao;
        return $this;
    }

    public function isSnExcluido(): ?bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }

    public function getVlAuxilioTransporte(): ?float
    {
        return $this->vlAuxilioTransporte;
    }

    public function setVlAuxilioTransporte(?float $vlAuxilioTransporte): self
    {
        $this->vlAuxilioTransporte = $vlAuxilioTransporte;
        return $this;
    }

    public function getCdDeferido(): ?string
    {
        return $this->cdDeferido;
    }

    public function setCdDeferido(?string $cdDeferido): self
    {
        $this->cdDeferido = $cdDeferido;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getDsJustificativa(): ?string
    {
        return $this->dsJustificativa;
    }

    public function setDsJustificativa(?string $dsJustificativa): self
    {
        $this->dsJustificativa = $dsJustificativa;
        return $this;
    }

    public function getCdTituloCriador(): ?Pessoas
    {
        return $this->cdTituloCriador;
    }

    public function setCdTituloCriador(?Pessoas $cdTituloCriador): self
    {
        $this->cdTituloCriador = $cdTituloCriador;
        return $this;
    }

    public function getCdTipoContrato(): ?int
    {
        return $this->cdTipoContrato;
    }

    public function setCdTipoContrato(?int $cdTipoContrato): self
    {
        $this->cdTipoContrato = $cdTipoContrato;
        return $this;
    }

    public function getSnProcessoCompleto(): ?int
    {
        return $this->snProcessoCompleto;
    }

    public function setSnProcessoCompleto(?int $snProcessoCompleto): self
    {
        $this->snProcessoCompleto = $snProcessoCompleto;
        return $this;
    }

    public function getSnDeferidoAluno(): ?int
    {
        return $this->snDeferidoAluno;
    }

    public function setSnDeferidoAluno(?int $snDeferidoAluno): self
    {
        $this->snDeferidoAluno = $snDeferidoAluno;
        return $this;
    }

    public function getSnDeferidoEmpresa(): ?int
    {
        return $this->snDeferidoEmpresa;
    }

    public function setSnDeferidoEmpresa(?int $snDeferidoEmpresa): self
    {
        $this->snDeferidoEmpresa = $snDeferidoEmpresa;
        return $this;
    }

    public function getSnDeferidoIe(): ?int
    {
        return $this->snDeferidoIe;
    }

    public function setSnDeferidoIe(?int $snDeferidoIe): self
    {
        $this->snDeferidoIe = $snDeferidoIe;
        return $this;
    }

    public function getCdDeferidoAluno(): ?string
    {
        return $this->cdDeferidoAluno;
    }

    public function setCdDeferidoAluno(?string $cdDeferidoAluno): self
    {
        $this->cdDeferidoAluno = $cdDeferidoAluno;
        return $this;
    }

    public function getCdDeferidoEmpresa(): ?string
    {
        return $this->cdDeferidoEmpresa;
    }

    public function setCdDeferidoEmpresa(?string $cdDeferidoEmpresa): self
    {
        $this->cdDeferidoEmpresa = $cdDeferidoEmpresa;
        return $this;
    }

    public function getCdDeferidoIe(): ?string
    {
        return $this->cdDeferidoIe;
    }

    public function setCdDeferidoIe(?string $cdDeferidoIe): self
    {
        $this->cdDeferidoIe = $cdDeferidoIe;
        return $this;
    }

    public function getDsVlBolsa(): ?string
    {
        return $this->dsVlBolsa;
    }

    public function setDsVlBolsa(?string $dsVlBolsa): self
    {
        $this->dsVlBolsa = $dsVlBolsa;
        return $this;
    }

    public function getDsVlAuxilioTransporte(): ?string
    {
        return $this->dsVlAuxilioTransporte;
    }

    public function setDsVlAuxilioTransporte(?string $dsVlAuxilioTransporte): self
    {
        $this->dsVlAuxilioTransporte = $dsVlAuxilioTransporte;
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

    public function getCdSetor(): ?int
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?int $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
        return $this;
    }

    public function getDsAnexo(): ?string
    {
        return $this->dsAnexo;
    }

    public function setDsAnexo(?string $dsAnexo): self
    {
        $this->dsAnexo = $dsAnexo;
        return $this;
    }

    public function getDsFormacaoSupervisor(): ?string
    {
        return $this->dsFormacaoSupervisor;
    }

    public function setDsFormacaoSupervisor(?string $dsFormacaoSupervisor): self
    {
        $this->dsFormacaoSupervisor = $dsFormacaoSupervisor;
        return $this;
    }

    public function getDsExperienciaSupervisor(): ?string
    {
        return $this->dsExperienciaSupervisor;
    }

    public function setDsExperienciaSupervisor(?string $dsExperienciaSupervisor): self
    {
        $this->dsExperienciaSupervisor = $dsExperienciaSupervisor;
        return $this;
    }

    public function getCdSituacao(): ?EstncTitulosSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?EstncTitulosSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdResponsavelGrupo(): ?NuGrupos
    {
        return $this->cdResponsavelGrupo;
    }

    public function setCdResponsavelGrupo(?NuGrupos $cdResponsavelGrupo): self
    {
        $this->cdResponsavelGrupo = $cdResponsavelGrupo;
        return $this;
    }

    public function isSnIeAssinouPapel(): ?bool
    {
        return $this->snIeAssinouPapel;
    }

    public function setSnIeAssinouPapel(?bool $snIeAssinouPapel): self
    {
        $this->snIeAssinouPapel = $snIeAssinouPapel;
        return $this;
    }

    public function isSnEmpresaAssinouPapel(): ?bool
    {
        return $this->snEmpresaAssinouPapel;
    }

    public function setSnEmpresaAssinouPapel(?bool $snEmpresaAssinouPapel): self
    {
        $this->snEmpresaAssinouPapel = $snEmpresaAssinouPapel;
        return $this;
    }

    public function getTpFluxo(): string
    {
        return $this->tpFluxo;
    }

    public function setTpFluxo(string $tpFluxo): self
    {
        $this->tpFluxo = $tpFluxo;
        return $this;
    }

    public function getSnArquivoEnviado(): ?int
    {
        return $this->snArquivoEnviado;
    }

    public function setSnArquivoEnviado(?int $snArquivoEnviado): self
    {
        $this->snArquivoEnviado = $snArquivoEnviado;
        return $this;
    }

    public function getDtIndeferido(): ?\DateTimeInterface
    {
        return $this->dtIndeferido;
    }

    public function setDtIndeferido(?\DateTimeInterface $dtIndeferido): self
    {
        $this->dtIndeferido = $dtIndeferido;
        return $this;
    }
}
