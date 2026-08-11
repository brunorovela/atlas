<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\InstituicoesEnsinoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstituicoesEnsinoRepository::class)]
#[ORM\Table(
    name: 'instituicoes_ensino',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['cd_instituicao'])]
#[ORM\UniqueConstraint(name: 'idx_nmInst', columns: ['nm_instituicao', 'ds_cidade', 'ds_estado'])]
#[ORM\Index(name: 'IX_NM_INSTITUICAO', columns: ['nm_instituicao'])]
#[ORM\Index(name: 'IX_DS_CIDADE', columns: ['ds_cidade'])]
#[ORM\Index(name: 'IX_DS_ESTADO', columns: ['ds_estado'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO_CORREIO', columns: ['cd_municipio_correio'])]
#[ORM\Index(name: 'IX_CD_BAIRRO', columns: ['cd_bairro'])]
#[ORM\Index(name: 'fk_cd_tipo_credenciamento', columns: ['cd_tipo_credenciamento'])]
#[ORM\Index(name: 'fk_cd_tipo_reconhecimento', columns: ['cd_tipo_reconhecimento'])]
#[ORM\Index(name: 'fk_cd_tipo_renovacao', columns: ['cd_tipo_renovacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_tipo_credenciamento', 'colunas' => ['cd_tipo_credenciamento'], 'tabelaAlvo' => 'tipo_certificadora', 'colunasAlvo' => ['cd_tipo_certificadora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_tipo_reconhecimento', 'colunas' => ['cd_tipo_reconhecimento'], 'tabelaAlvo' => 'tipo_certificadora', 'colunasAlvo' => ['cd_tipo_certificadora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_tipo_renovacao', 'colunas' => ['cd_tipo_renovacao'], 'tabelaAlvo' => 'tipo_certificadora', 'colunasAlvo' => ['cd_tipo_certificadora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InstituicoesEnsino
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_instituicao', type: 'integer')]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'nm_instituicao', type: 'string', length: 120, nullable: true)]
    private ?string $nmInstituicao = null;

    #[ORM\Column(name: 'ds_credenciamento', type: 'string', length: 150, nullable: true)]
    private ?string $dsCredenciamento = null;

    #[ORM\Column(name: 'nm_fantasia', type: 'string', length: 80, nullable: true)]
    private ?string $nmFantasia = null;

    #[ORM\Column(name: 'ds_endereco', type: 'string', length: 80, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 50, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 50, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_cidade', type: 'string', length: 50, nullable: true)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_estado', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsEstado = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_diretor', type: 'string', length: 80, nullable: true)]
    private ?string $dsDiretor = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_telefone1', type: 'string', length: 25, nullable: true)]
    private ?string $dsTelefone1 = null;

    #[ORM\Column(name: 'ds_telefone2', type: 'string', length: 25, nullable: true)]
    private ?string $dsTelefone2 = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 100, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'ds_site', type: 'string', length: 100, nullable: true)]
    private ?string $dsSite = null;

    #[ORM\Column(name: 'sn_educacao_infantil', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEducacaoInfantil = null;

    #[ORM\Column(name: 'sn_ensino_fundamental', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnsinoFundamental = null;

    #[ORM\Column(name: 'sn_ensino_medio', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnsinoMedio = null;

    #[ORM\Column(name: 'sn_ensino_superior', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnsinoSuperior = null;

    #[ORM\Column(name: 'sn_cursos_profissionalizantes', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snCursosProfissionalizantes = null;

    #[ORM\Column(name: 'sn_ensino_especial', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnsinoEspecial = null;

    #[ORM\Column(name: 'sn_unidade_certificadora', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snUnidadeCertificadora = 0;

    #[ORM\Column(name: 'sn_convenio', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snConvenio = 0;

    #[ORM\Column(name: 'im_logo', type: 'blob', length: 65535, nullable: true)]
    private ?string $imLogo = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 14, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'ds_inscricao_estadual', type: 'string', length: 255, nullable: true)]
    private ?string $dsInscricaoEstadual = null;

    #[ORM\Column(name: 'cd_constituicao', type: 'boolean', nullable: true)]
    private ?bool $cdConstituicao = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_pessoa_contato', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaContato = null;

    #[ORM\Column(name: 'ds_numero', type: 'integer', nullable: true)]
    private ?int $dsNumero = null;

    #[ORM\Column(name: 'cd_municipio_correio', type: 'integer', nullable: true)]
    private ?int $cdMunicipioCorreio = null;

    #[ORM\Column(name: 'cd_bairro', type: 'integer', nullable: true)]
    private ?int $cdBairro = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'NR_PRAZO_RETROATIVO', type: 'integer', nullable: true)]
    private ?int $nrPrazoRetroativo = null;

    #[ORM\Column(name: 'sn_assina_pelo_aluno', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAssinaPeloAluno = 0;

    #[ORM\Column(name: 'nr_qtd_dias_documentos', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrQtdDiasDocumentos = 0;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', nullable: true)]
    private ?int $cdMunicipio = null;

    #[ORM\Column(name: 'sn_irregular', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snIrregular = false;

    #[ORM\Column(name: 'dt_inicio_irregular', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtInicioIrregular = null;

    #[ORM\Column(name: 'dt_fim_irregular', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFimIrregular = null;

    #[ORM\Column(name: 'cd_instituicao_mec', type: 'integer', nullable: true)]
    private ?int $cdInstituicaoMec = null;

    #[ORM\Column(name: 'ds_cnpj_instituicao', type: 'string', length: 14, nullable: true)]
    private ?string $dsCnpjInstituicao = null;

    #[ORM\Column(name: 'nr_numero_endereco', type: 'integer', nullable: true)]
    private ?int $nrNumeroEndereco = null;

    #[ORM\ManyToOne(targetEntity: TipoCertificadora::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_credenciamento', referencedColumnName: 'cd_tipo_certificadora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TipoCertificadora $cdTipoCredenciamento = null;

    #[ORM\Column(name: 'nr_credenciamento', type: 'integer', nullable: true)]
    private ?int $nrCredenciamento = null;

    #[ORM\Column(name: 'dt_credenciamento', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCredenciamento = null;

    #[ORM\Column(name: 'ds_credenciamento_veiculo_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoVeiculoPublicacao = null;

    #[ORM\Column(name: 'dt_credenciamento_publicacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCredenciamentoPublicacao = null;

    #[ORM\Column(name: 'ds_credenciamento_secao_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoSecaoPublicacao = null;

    #[ORM\Column(name: 'ds_credenciamento_pagina_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoPaginaPublicacao = null;

    #[ORM\Column(name: 'ds_credenciamento_dou', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoDou = null;

    #[ORM\Column(name: 'ds_credenciamento_ies', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoIes = null;

    #[ORM\Column(name: 'ds_credenciamento_tipo_ies', type: 'string', length: 120, nullable: true)]
    private ?string $dsCredenciamentoTipoIes = null;

    #[ORM\Column(name: 'dt_credenciamento_ies', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCredenciamentoIes = null;

    #[ORM\Column(name: 'dt_credenciamento_protocolo_ies', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCredenciamentoProtocoloIes = null;

    #[ORM\Column(name: 'ds_recredenciamento_veiculo_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoVeiculoPublicacao = null;

    #[ORM\Column(name: 'dt_recredenciamento_publicacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoPublicacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_secao_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoSecaoPublicacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_pagina_publicacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoPaginaPublicacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_dou', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoDou = null;

    #[ORM\Column(name: 'ds_recredenciamento_ies', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoIes = null;

    #[ORM\Column(name: 'ds_recredenciamento_tipo_ies', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoTipoIes = null;

    #[ORM\Column(name: 'dt_recredenciamento_ies', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoIes = null;

    #[ORM\Column(name: 'dt_recredenciamento_protocolo_ies', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoProtocoloIes = null;

    #[ORM\Column(name: 'ds_recredenciamento_veiculo_publicacao_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoVeiculoPublicacaoRenovacao = null;

    #[ORM\Column(name: 'dt_recredenciamento_publicacao_renovacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoPublicacaoRenovacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_publicacao_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoPublicacaoRenovacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_pagina_publicacao_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoPaginaPublicacaoRenovacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_dou_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoDouRenovacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_processo_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoProcessoRenovacao = null;

    #[ORM\Column(name: 'ds_recredenciamento_tipo_processo_renovacao', type: 'string', length: 120, nullable: true)]
    private ?string $dsRecredenciamentoTipoProcessoRenovacao = null;

    #[ORM\Column(name: 'dt_recredenciamento_processo_renovacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoProcessoRenovacao = null;

    #[ORM\Column(name: 'dt_recredenciamento_protocolo_renovacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecredenciamentoProtocoloRenovacao = null;

    #[ORM\ManyToOne(targetEntity: TipoCertificadora::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_reconhecimento', referencedColumnName: 'cd_tipo_certificadora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TipoCertificadora $cdTipoReconhecimento = null;

    #[ORM\Column(name: 'nr_reconhecimento', type: 'integer', nullable: true)]
    private ?int $nrReconhecimento = null;

    #[ORM\Column(name: 'dt_reconhecimento', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtReconhecimento = null;

    #[ORM\ManyToOne(targetEntity: TipoCertificadora::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_renovacao', referencedColumnName: 'cd_tipo_certificadora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TipoCertificadora $cdTipoRenovacao = null;

    #[ORM\Column(name: 'nr_renovacao', type: 'integer', nullable: true)]
    private ?int $nrRenovacao = null;

    #[ORM\Column(name: 'dt_renovacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRenovacao = null;

    #[ORM\Column(name: 'ds_razao_social_mantenedora', type: 'string', length: 255, nullable: true)]
    private ?string $dsRazaoSocialMantenedora = null;

    #[ORM\Column(name: 'ds_cnpj_mantenedora', type: 'string', length: 14, nullable: true)]
    private ?string $dsCnpjMantenedora = null;

    #[ORM\Column(name: 'ds_endereco_mantenedora', type: 'string', length: 80, nullable: true)]
    private ?string $dsEnderecoMantenedora = null;

    #[ORM\Column(name: 'nr_numero_mantenedora', type: 'integer', nullable: true)]
    private ?int $nrNumeroMantenedora = null;

    #[ORM\Column(name: 'ds_complemento_mantenedora', type: 'string', length: 50, nullable: true)]
    private ?string $dsComplementoMantenedora = null;

    #[ORM\Column(name: 'ds_bairro_mantenedora', type: 'string', length: 50, nullable: true)]
    private ?string $dsBairroMantenedora = null;

    #[ORM\Column(name: 'cd_municipio_mantenedora', type: 'integer', nullable: true)]
    private ?int $cdMunicipioMantenedora = null;

    #[ORM\Column(name: 'ds_uf_mantenedora', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUfMantenedora = null;

    #[ORM\Column(name: 'ds_cep_mantenedora', type: 'string', length: 8, nullable: true)]
    private ?string $dsCepMantenedora = null;

    #[ORM\Column(name: 'cd_ato_regulatorio_tipo', type: 'integer', nullable: true, options: ['comment' => 'Tipo do Ato Regulatório'])]
    private ?int $cdAtoRegulatorioTipo = null;

    #[ORM\Column(name: 'nr_ato_regulatorio', type: 'string', length: 8, nullable: true, options: ['comment' => 'Número do Ato'])]
    private ?string $nrAtoRegulatorio = null;

    #[ORM\Column(name: 'dt_ato_regulatorio', type: 'date', nullable: true, options: ['comment' => 'Data do Ato Regulatório'])]
    private ?\DateTimeInterface $dtAtoRegulatorio = null;

    #[ORM\Column(name: 'ds_ato_regulatorio_veiculo_comunicacao', type: 'string', length: 120, nullable: true, options: ['comment' => 'Veículo de publicação do Ato Regulatório'])]
    private ?string $dsAtoRegulatorioVeiculoComunicacao = null;

    #[ORM\Column(name: 'dt_ato_regulatorio_publicacao', type: 'date', nullable: true, options: ['comment' => 'Data de Publicação do Ato Regulatório'])]
    private ?\DateTimeInterface $dtAtoRegulatorioPublicacao = null;

    #[ORM\Column(name: 'nr_ato_regulatorio_secao_publicacao', type: 'integer', nullable: true, options: ['comment' => 'Seção de publicação do Ato Regulatório'])]
    private ?int $nrAtoRegulatorioSecaoPublicacao = null;

    #[ORM\Column(name: 'ds_ato_regulatorio_pagina_publicacao', type: 'integer', nullable: true, options: ['comment' => 'Página de publicação do Ato Regulatório'])]
    private ?int $dsAtoRegulatorioPaginaPublicacao = null;

    #[ORM\Column(name: 'nr_ato_regulatorio_dou', type: 'integer', nullable: true, options: ['comment' => 'DOU do Ato Regulatório'])]
    private ?int $nrAtoRegulatorioDou = null;

    #[ORM\Column(name: 'cd_descredenciamento_tipo', type: 'integer', nullable: true, options: ['comment' => 'Tipo de Descredenciamento'])]
    private ?int $cdDescredenciamentoTipo = null;

    #[ORM\Column(name: 'ds_descredenciamento_numero', type: 'string', length: 8, nullable: true, options: ['comment' => 'Número do Descredenciamento'])]
    private ?string $dsDescredenciamentoNumero = null;

    #[ORM\Column(name: 'dt_descredenciamento', type: 'date', nullable: true, options: ['comment' => 'Data do Descredenciamento'])]
    private ?\DateTimeInterface $dtDescredenciamento = null;

    #[ORM\Column(name: 'ds_descredenciamento_veiculo_publicacao', type: 'string', length: 120, nullable: true, options: ['comment' => 'Veículo de publicação do Descredenciamento'])]
    private ?string $dsDescredenciamentoVeiculoPublicacao = null;

    #[ORM\Column(name: 'dt_descredenciamento_publicacao', type: 'date', nullable: true, options: ['comment' => 'Data de Publicação do Descredenciamento'])]
    private ?\DateTimeInterface $dtDescredenciamentoPublicacao = null;

    #[ORM\Column(name: 'nr_descredenciamento_secao_publicacao', type: 'integer', nullable: true, options: ['comment' => 'Seção de publicação do Descredenciamento'])]
    private ?int $nrDescredenciamentoSecaoPublicacao = null;

    #[ORM\Column(name: 'ds_descredenciamento_pagina_publicacao', type: 'integer', nullable: true, options: ['comment' => 'Página de publicação do Descredenciamento'])]
    private ?int $dsDescredenciamentoPaginaPublicacao = null;

    #[ORM\Column(name: 'nr_descredenciamento_dou', type: 'integer', nullable: true, options: ['comment' => 'DOU do Descredenciamento'])]
    private ?int $nrDescredenciamentoDou = null;

    // Sem construtor: 104 propriedades. Use os setters encadeados.

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function getNmInstituicao(): ?string
    {
        return $this->nmInstituicao;
    }

    public function setNmInstituicao(?string $nmInstituicao): self
    {
        $this->nmInstituicao = $nmInstituicao;
        return $this;
    }

    public function getDsCredenciamento(): ?string
    {
        return $this->dsCredenciamento;
    }

    public function setDsCredenciamento(?string $dsCredenciamento): self
    {
        $this->dsCredenciamento = $dsCredenciamento;
        return $this;
    }

    public function getNmFantasia(): ?string
    {
        return $this->nmFantasia;
    }

    public function setNmFantasia(?string $nmFantasia): self
    {
        $this->nmFantasia = $nmFantasia;
        return $this;
    }

    public function getDsEndereco(): ?string
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco(?string $dsEndereco): self
    {
        $this->dsEndereco = $dsEndereco;
        return $this;
    }

    public function getDsComplemento(): ?string
    {
        return $this->dsComplemento;
    }

    public function setDsComplemento(?string $dsComplemento): self
    {
        $this->dsComplemento = $dsComplemento;
        return $this;
    }

    public function getDsBairro(): ?string
    {
        return $this->dsBairro;
    }

    public function setDsBairro(?string $dsBairro): self
    {
        $this->dsBairro = $dsBairro;
        return $this;
    }

    public function getDsCidade(): ?string
    {
        return $this->dsCidade;
    }

    public function setDsCidade(?string $dsCidade): self
    {
        $this->dsCidade = $dsCidade;
        return $this;
    }

    public function getDsEstado(): ?string
    {
        return $this->dsEstado;
    }

    public function setDsEstado(?string $dsEstado): self
    {
        $this->dsEstado = $dsEstado;
        return $this;
    }

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
        return $this;
    }

    public function getDsDiretor(): ?string
    {
        return $this->dsDiretor;
    }

    public function setDsDiretor(?string $dsDiretor): self
    {
        $this->dsDiretor = $dsDiretor;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getDsTelefone1(): ?string
    {
        return $this->dsTelefone1;
    }

    public function setDsTelefone1(?string $dsTelefone1): self
    {
        $this->dsTelefone1 = $dsTelefone1;
        return $this;
    }

    public function getDsTelefone2(): ?string
    {
        return $this->dsTelefone2;
    }

    public function setDsTelefone2(?string $dsTelefone2): self
    {
        $this->dsTelefone2 = $dsTelefone2;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getDsSite(): ?string
    {
        return $this->dsSite;
    }

    public function setDsSite(?string $dsSite): self
    {
        $this->dsSite = $dsSite;
        return $this;
    }

    public function getSnEducacaoInfantil(): ?string
    {
        return $this->snEducacaoInfantil;
    }

    public function setSnEducacaoInfantil(?string $snEducacaoInfantil): self
    {
        $this->snEducacaoInfantil = $snEducacaoInfantil;
        return $this;
    }

    public function getSnEnsinoFundamental(): ?string
    {
        return $this->snEnsinoFundamental;
    }

    public function setSnEnsinoFundamental(?string $snEnsinoFundamental): self
    {
        $this->snEnsinoFundamental = $snEnsinoFundamental;
        return $this;
    }

    public function getSnEnsinoMedio(): ?string
    {
        return $this->snEnsinoMedio;
    }

    public function setSnEnsinoMedio(?string $snEnsinoMedio): self
    {
        $this->snEnsinoMedio = $snEnsinoMedio;
        return $this;
    }

    public function getSnEnsinoSuperior(): ?string
    {
        return $this->snEnsinoSuperior;
    }

    public function setSnEnsinoSuperior(?string $snEnsinoSuperior): self
    {
        $this->snEnsinoSuperior = $snEnsinoSuperior;
        return $this;
    }

    public function getSnCursosProfissionalizantes(): ?string
    {
        return $this->snCursosProfissionalizantes;
    }

    public function setSnCursosProfissionalizantes(?string $snCursosProfissionalizantes): self
    {
        $this->snCursosProfissionalizantes = $snCursosProfissionalizantes;
        return $this;
    }

    public function getSnEnsinoEspecial(): ?string
    {
        return $this->snEnsinoEspecial;
    }

    public function setSnEnsinoEspecial(?string $snEnsinoEspecial): self
    {
        $this->snEnsinoEspecial = $snEnsinoEspecial;
        return $this;
    }

    public function getSnUnidadeCertificadora(): ?int
    {
        return $this->snUnidadeCertificadora;
    }

    public function setSnUnidadeCertificadora(?int $snUnidadeCertificadora): self
    {
        $this->snUnidadeCertificadora = $snUnidadeCertificadora;
        return $this;
    }

    public function getSnConvenio(): ?int
    {
        return $this->snConvenio;
    }

    public function setSnConvenio(?int $snConvenio): self
    {
        $this->snConvenio = $snConvenio;
        return $this;
    }

    public function getImLogo(): ?string
    {
        return $this->imLogo;
    }

    public function setImLogo(?string $imLogo): self
    {
        $this->imLogo = $imLogo;
        return $this;
    }

    public function getDsCnpj(): ?string
    {
        return $this->dsCnpj;
    }

    public function setDsCnpj(?string $dsCnpj): self
    {
        $this->dsCnpj = $dsCnpj;
        return $this;
    }

    public function getDsInscricaoEstadual(): ?string
    {
        return $this->dsInscricaoEstadual;
    }

    public function setDsInscricaoEstadual(?string $dsInscricaoEstadual): self
    {
        $this->dsInscricaoEstadual = $dsInscricaoEstadual;
        return $this;
    }

    public function isCdConstituicao(): ?bool
    {
        return $this->cdConstituicao;
    }

    public function setCdConstituicao(?bool $cdConstituicao): self
    {
        $this->cdConstituicao = $cdConstituicao;
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

    public function getCdPessoaContato(): ?int
    {
        return $this->cdPessoaContato;
    }

    public function setCdPessoaContato(?int $cdPessoaContato): self
    {
        $this->cdPessoaContato = $cdPessoaContato;
        return $this;
    }

    public function getDsNumero(): ?int
    {
        return $this->dsNumero;
    }

    public function setDsNumero(?int $dsNumero): self
    {
        $this->dsNumero = $dsNumero;
        return $this;
    }

    public function getCdMunicipioCorreio(): ?int
    {
        return $this->cdMunicipioCorreio;
    }

    public function setCdMunicipioCorreio(?int $cdMunicipioCorreio): self
    {
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        return $this;
    }

    public function getCdBairro(): ?int
    {
        return $this->cdBairro;
    }

    public function setCdBairro(?int $cdBairro): self
    {
        $this->cdBairro = $cdBairro;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getNrPrazoRetroativo(): ?int
    {
        return $this->nrPrazoRetroativo;
    }

    public function setNrPrazoRetroativo(?int $nrPrazoRetroativo): self
    {
        $this->nrPrazoRetroativo = $nrPrazoRetroativo;
        return $this;
    }

    public function getSnAssinaPeloAluno(): int
    {
        return $this->snAssinaPeloAluno;
    }

    public function setSnAssinaPeloAluno(int $snAssinaPeloAluno): self
    {
        $this->snAssinaPeloAluno = $snAssinaPeloAluno;
        return $this;
    }

    public function getNrQtdDiasDocumentos(): int
    {
        return $this->nrQtdDiasDocumentos;
    }

    public function setNrQtdDiasDocumentos(int $nrQtdDiasDocumentos): self
    {
        $this->nrQtdDiasDocumentos = $nrQtdDiasDocumentos;
        return $this;
    }

    public function getCdMunicipio(): ?int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(?int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }

    public function isSnIrregular(): ?bool
    {
        return $this->snIrregular;
    }

    public function setSnIrregular(?bool $snIrregular): self
    {
        $this->snIrregular = $snIrregular;
        return $this;
    }

    public function getDtInicioIrregular(): ?\DateTimeInterface
    {
        return $this->dtInicioIrregular;
    }

    public function setDtInicioIrregular(?\DateTimeInterface $dtInicioIrregular): self
    {
        $this->dtInicioIrregular = $dtInicioIrregular;
        return $this;
    }

    public function getDtFimIrregular(): ?\DateTimeInterface
    {
        return $this->dtFimIrregular;
    }

    public function setDtFimIrregular(?\DateTimeInterface $dtFimIrregular): self
    {
        $this->dtFimIrregular = $dtFimIrregular;
        return $this;
    }

    public function getCdInstituicaoMec(): ?int
    {
        return $this->cdInstituicaoMec;
    }

    public function setCdInstituicaoMec(?int $cdInstituicaoMec): self
    {
        $this->cdInstituicaoMec = $cdInstituicaoMec;
        return $this;
    }

    public function getDsCnpjInstituicao(): ?string
    {
        return $this->dsCnpjInstituicao;
    }

    public function setDsCnpjInstituicao(?string $dsCnpjInstituicao): self
    {
        $this->dsCnpjInstituicao = $dsCnpjInstituicao;
        return $this;
    }

    public function getNrNumeroEndereco(): ?int
    {
        return $this->nrNumeroEndereco;
    }

    public function setNrNumeroEndereco(?int $nrNumeroEndereco): self
    {
        $this->nrNumeroEndereco = $nrNumeroEndereco;
        return $this;
    }

    public function getCdTipoCredenciamento(): ?TipoCertificadora
    {
        return $this->cdTipoCredenciamento;
    }

    public function setCdTipoCredenciamento(?TipoCertificadora $cdTipoCredenciamento): self
    {
        $this->cdTipoCredenciamento = $cdTipoCredenciamento;
        return $this;
    }

    public function getNrCredenciamento(): ?int
    {
        return $this->nrCredenciamento;
    }

    public function setNrCredenciamento(?int $nrCredenciamento): self
    {
        $this->nrCredenciamento = $nrCredenciamento;
        return $this;
    }

    public function getDtCredenciamento(): ?\DateTimeInterface
    {
        return $this->dtCredenciamento;
    }

    public function setDtCredenciamento(?\DateTimeInterface $dtCredenciamento): self
    {
        $this->dtCredenciamento = $dtCredenciamento;
        return $this;
    }

    public function getDsCredenciamentoVeiculoPublicacao(): ?string
    {
        return $this->dsCredenciamentoVeiculoPublicacao;
    }

    public function setDsCredenciamentoVeiculoPublicacao(?string $dsCredenciamentoVeiculoPublicacao): self
    {
        $this->dsCredenciamentoVeiculoPublicacao = $dsCredenciamentoVeiculoPublicacao;
        return $this;
    }

    public function getDtCredenciamentoPublicacao(): ?\DateTimeInterface
    {
        return $this->dtCredenciamentoPublicacao;
    }

    public function setDtCredenciamentoPublicacao(?\DateTimeInterface $dtCredenciamentoPublicacao): self
    {
        $this->dtCredenciamentoPublicacao = $dtCredenciamentoPublicacao;
        return $this;
    }

    public function getDsCredenciamentoSecaoPublicacao(): ?string
    {
        return $this->dsCredenciamentoSecaoPublicacao;
    }

    public function setDsCredenciamentoSecaoPublicacao(?string $dsCredenciamentoSecaoPublicacao): self
    {
        $this->dsCredenciamentoSecaoPublicacao = $dsCredenciamentoSecaoPublicacao;
        return $this;
    }

    public function getDsCredenciamentoPaginaPublicacao(): ?string
    {
        return $this->dsCredenciamentoPaginaPublicacao;
    }

    public function setDsCredenciamentoPaginaPublicacao(?string $dsCredenciamentoPaginaPublicacao): self
    {
        $this->dsCredenciamentoPaginaPublicacao = $dsCredenciamentoPaginaPublicacao;
        return $this;
    }

    public function getDsCredenciamentoDou(): ?string
    {
        return $this->dsCredenciamentoDou;
    }

    public function setDsCredenciamentoDou(?string $dsCredenciamentoDou): self
    {
        $this->dsCredenciamentoDou = $dsCredenciamentoDou;
        return $this;
    }

    public function getDsCredenciamentoIes(): ?string
    {
        return $this->dsCredenciamentoIes;
    }

    public function setDsCredenciamentoIes(?string $dsCredenciamentoIes): self
    {
        $this->dsCredenciamentoIes = $dsCredenciamentoIes;
        return $this;
    }

    public function getDsCredenciamentoTipoIes(): ?string
    {
        return $this->dsCredenciamentoTipoIes;
    }

    public function setDsCredenciamentoTipoIes(?string $dsCredenciamentoTipoIes): self
    {
        $this->dsCredenciamentoTipoIes = $dsCredenciamentoTipoIes;
        return $this;
    }

    public function getDtCredenciamentoIes(): ?\DateTimeInterface
    {
        return $this->dtCredenciamentoIes;
    }

    public function setDtCredenciamentoIes(?\DateTimeInterface $dtCredenciamentoIes): self
    {
        $this->dtCredenciamentoIes = $dtCredenciamentoIes;
        return $this;
    }

    public function getDtCredenciamentoProtocoloIes(): ?\DateTimeInterface
    {
        return $this->dtCredenciamentoProtocoloIes;
    }

    public function setDtCredenciamentoProtocoloIes(?\DateTimeInterface $dtCredenciamentoProtocoloIes): self
    {
        $this->dtCredenciamentoProtocoloIes = $dtCredenciamentoProtocoloIes;
        return $this;
    }

    public function getDsRecredenciamentoVeiculoPublicacao(): ?string
    {
        return $this->dsRecredenciamentoVeiculoPublicacao;
    }

    public function setDsRecredenciamentoVeiculoPublicacao(?string $dsRecredenciamentoVeiculoPublicacao): self
    {
        $this->dsRecredenciamentoVeiculoPublicacao = $dsRecredenciamentoVeiculoPublicacao;
        return $this;
    }

    public function getDtRecredenciamentoPublicacao(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoPublicacao;
    }

    public function setDtRecredenciamentoPublicacao(?\DateTimeInterface $dtRecredenciamentoPublicacao): self
    {
        $this->dtRecredenciamentoPublicacao = $dtRecredenciamentoPublicacao;
        return $this;
    }

    public function getDsRecredenciamentoSecaoPublicacao(): ?string
    {
        return $this->dsRecredenciamentoSecaoPublicacao;
    }

    public function setDsRecredenciamentoSecaoPublicacao(?string $dsRecredenciamentoSecaoPublicacao): self
    {
        $this->dsRecredenciamentoSecaoPublicacao = $dsRecredenciamentoSecaoPublicacao;
        return $this;
    }

    public function getDsRecredenciamentoPaginaPublicacao(): ?string
    {
        return $this->dsRecredenciamentoPaginaPublicacao;
    }

    public function setDsRecredenciamentoPaginaPublicacao(?string $dsRecredenciamentoPaginaPublicacao): self
    {
        $this->dsRecredenciamentoPaginaPublicacao = $dsRecredenciamentoPaginaPublicacao;
        return $this;
    }

    public function getDsRecredenciamentoDou(): ?string
    {
        return $this->dsRecredenciamentoDou;
    }

    public function setDsRecredenciamentoDou(?string $dsRecredenciamentoDou): self
    {
        $this->dsRecredenciamentoDou = $dsRecredenciamentoDou;
        return $this;
    }

    public function getDsRecredenciamentoIes(): ?string
    {
        return $this->dsRecredenciamentoIes;
    }

    public function setDsRecredenciamentoIes(?string $dsRecredenciamentoIes): self
    {
        $this->dsRecredenciamentoIes = $dsRecredenciamentoIes;
        return $this;
    }

    public function getDsRecredenciamentoTipoIes(): ?string
    {
        return $this->dsRecredenciamentoTipoIes;
    }

    public function setDsRecredenciamentoTipoIes(?string $dsRecredenciamentoTipoIes): self
    {
        $this->dsRecredenciamentoTipoIes = $dsRecredenciamentoTipoIes;
        return $this;
    }

    public function getDtRecredenciamentoIes(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoIes;
    }

    public function setDtRecredenciamentoIes(?\DateTimeInterface $dtRecredenciamentoIes): self
    {
        $this->dtRecredenciamentoIes = $dtRecredenciamentoIes;
        return $this;
    }

    public function getDtRecredenciamentoProtocoloIes(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoProtocoloIes;
    }

    public function setDtRecredenciamentoProtocoloIes(?\DateTimeInterface $dtRecredenciamentoProtocoloIes): self
    {
        $this->dtRecredenciamentoProtocoloIes = $dtRecredenciamentoProtocoloIes;
        return $this;
    }

    public function getDsRecredenciamentoVeiculoPublicacaoRenovacao(): ?string
    {
        return $this->dsRecredenciamentoVeiculoPublicacaoRenovacao;
    }

    public function setDsRecredenciamentoVeiculoPublicacaoRenovacao(?string $dsRecredenciamentoVeiculoPublicacaoRenovacao): self
    {
        $this->dsRecredenciamentoVeiculoPublicacaoRenovacao = $dsRecredenciamentoVeiculoPublicacaoRenovacao;
        return $this;
    }

    public function getDtRecredenciamentoPublicacaoRenovacao(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoPublicacaoRenovacao;
    }

    public function setDtRecredenciamentoPublicacaoRenovacao(?\DateTimeInterface $dtRecredenciamentoPublicacaoRenovacao): self
    {
        $this->dtRecredenciamentoPublicacaoRenovacao = $dtRecredenciamentoPublicacaoRenovacao;
        return $this;
    }

    public function getDsRecredenciamentoPublicacaoRenovacao(): ?string
    {
        return $this->dsRecredenciamentoPublicacaoRenovacao;
    }

    public function setDsRecredenciamentoPublicacaoRenovacao(?string $dsRecredenciamentoPublicacaoRenovacao): self
    {
        $this->dsRecredenciamentoPublicacaoRenovacao = $dsRecredenciamentoPublicacaoRenovacao;
        return $this;
    }

    public function getDsRecredenciamentoPaginaPublicacaoRenovacao(): ?string
    {
        return $this->dsRecredenciamentoPaginaPublicacaoRenovacao;
    }

    public function setDsRecredenciamentoPaginaPublicacaoRenovacao(?string $dsRecredenciamentoPaginaPublicacaoRenovacao): self
    {
        $this->dsRecredenciamentoPaginaPublicacaoRenovacao = $dsRecredenciamentoPaginaPublicacaoRenovacao;
        return $this;
    }

    public function getDsRecredenciamentoDouRenovacao(): ?string
    {
        return $this->dsRecredenciamentoDouRenovacao;
    }

    public function setDsRecredenciamentoDouRenovacao(?string $dsRecredenciamentoDouRenovacao): self
    {
        $this->dsRecredenciamentoDouRenovacao = $dsRecredenciamentoDouRenovacao;
        return $this;
    }

    public function getDsRecredenciamentoProcessoRenovacao(): ?string
    {
        return $this->dsRecredenciamentoProcessoRenovacao;
    }

    public function setDsRecredenciamentoProcessoRenovacao(?string $dsRecredenciamentoProcessoRenovacao): self
    {
        $this->dsRecredenciamentoProcessoRenovacao = $dsRecredenciamentoProcessoRenovacao;
        return $this;
    }

    public function getDsRecredenciamentoTipoProcessoRenovacao(): ?string
    {
        return $this->dsRecredenciamentoTipoProcessoRenovacao;
    }

    public function setDsRecredenciamentoTipoProcessoRenovacao(?string $dsRecredenciamentoTipoProcessoRenovacao): self
    {
        $this->dsRecredenciamentoTipoProcessoRenovacao = $dsRecredenciamentoTipoProcessoRenovacao;
        return $this;
    }

    public function getDtRecredenciamentoProcessoRenovacao(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoProcessoRenovacao;
    }

    public function setDtRecredenciamentoProcessoRenovacao(?\DateTimeInterface $dtRecredenciamentoProcessoRenovacao): self
    {
        $this->dtRecredenciamentoProcessoRenovacao = $dtRecredenciamentoProcessoRenovacao;
        return $this;
    }

    public function getDtRecredenciamentoProtocoloRenovacao(): ?\DateTimeInterface
    {
        return $this->dtRecredenciamentoProtocoloRenovacao;
    }

    public function setDtRecredenciamentoProtocoloRenovacao(?\DateTimeInterface $dtRecredenciamentoProtocoloRenovacao): self
    {
        $this->dtRecredenciamentoProtocoloRenovacao = $dtRecredenciamentoProtocoloRenovacao;
        return $this;
    }

    public function getCdTipoReconhecimento(): ?TipoCertificadora
    {
        return $this->cdTipoReconhecimento;
    }

    public function setCdTipoReconhecimento(?TipoCertificadora $cdTipoReconhecimento): self
    {
        $this->cdTipoReconhecimento = $cdTipoReconhecimento;
        return $this;
    }

    public function getNrReconhecimento(): ?int
    {
        return $this->nrReconhecimento;
    }

    public function setNrReconhecimento(?int $nrReconhecimento): self
    {
        $this->nrReconhecimento = $nrReconhecimento;
        return $this;
    }

    public function getDtReconhecimento(): ?\DateTimeInterface
    {
        return $this->dtReconhecimento;
    }

    public function setDtReconhecimento(?\DateTimeInterface $dtReconhecimento): self
    {
        $this->dtReconhecimento = $dtReconhecimento;
        return $this;
    }

    public function getCdTipoRenovacao(): ?TipoCertificadora
    {
        return $this->cdTipoRenovacao;
    }

    public function setCdTipoRenovacao(?TipoCertificadora $cdTipoRenovacao): self
    {
        $this->cdTipoRenovacao = $cdTipoRenovacao;
        return $this;
    }

    public function getNrRenovacao(): ?int
    {
        return $this->nrRenovacao;
    }

    public function setNrRenovacao(?int $nrRenovacao): self
    {
        $this->nrRenovacao = $nrRenovacao;
        return $this;
    }

    public function getDtRenovacao(): ?\DateTimeInterface
    {
        return $this->dtRenovacao;
    }

    public function setDtRenovacao(?\DateTimeInterface $dtRenovacao): self
    {
        $this->dtRenovacao = $dtRenovacao;
        return $this;
    }

    public function getDsRazaoSocialMantenedora(): ?string
    {
        return $this->dsRazaoSocialMantenedora;
    }

    public function setDsRazaoSocialMantenedora(?string $dsRazaoSocialMantenedora): self
    {
        $this->dsRazaoSocialMantenedora = $dsRazaoSocialMantenedora;
        return $this;
    }

    public function getDsCnpjMantenedora(): ?string
    {
        return $this->dsCnpjMantenedora;
    }

    public function setDsCnpjMantenedora(?string $dsCnpjMantenedora): self
    {
        $this->dsCnpjMantenedora = $dsCnpjMantenedora;
        return $this;
    }

    public function getDsEnderecoMantenedora(): ?string
    {
        return $this->dsEnderecoMantenedora;
    }

    public function setDsEnderecoMantenedora(?string $dsEnderecoMantenedora): self
    {
        $this->dsEnderecoMantenedora = $dsEnderecoMantenedora;
        return $this;
    }

    public function getNrNumeroMantenedora(): ?int
    {
        return $this->nrNumeroMantenedora;
    }

    public function setNrNumeroMantenedora(?int $nrNumeroMantenedora): self
    {
        $this->nrNumeroMantenedora = $nrNumeroMantenedora;
        return $this;
    }

    public function getDsComplementoMantenedora(): ?string
    {
        return $this->dsComplementoMantenedora;
    }

    public function setDsComplementoMantenedora(?string $dsComplementoMantenedora): self
    {
        $this->dsComplementoMantenedora = $dsComplementoMantenedora;
        return $this;
    }

    public function getDsBairroMantenedora(): ?string
    {
        return $this->dsBairroMantenedora;
    }

    public function setDsBairroMantenedora(?string $dsBairroMantenedora): self
    {
        $this->dsBairroMantenedora = $dsBairroMantenedora;
        return $this;
    }

    public function getCdMunicipioMantenedora(): ?int
    {
        return $this->cdMunicipioMantenedora;
    }

    public function setCdMunicipioMantenedora(?int $cdMunicipioMantenedora): self
    {
        $this->cdMunicipioMantenedora = $cdMunicipioMantenedora;
        return $this;
    }

    public function getDsUfMantenedora(): ?string
    {
        return $this->dsUfMantenedora;
    }

    public function setDsUfMantenedora(?string $dsUfMantenedora): self
    {
        $this->dsUfMantenedora = $dsUfMantenedora;
        return $this;
    }

    public function getDsCepMantenedora(): ?string
    {
        return $this->dsCepMantenedora;
    }

    public function setDsCepMantenedora(?string $dsCepMantenedora): self
    {
        $this->dsCepMantenedora = $dsCepMantenedora;
        return $this;
    }

    public function getCdAtoRegulatorioTipo(): ?int
    {
        return $this->cdAtoRegulatorioTipo;
    }

    public function setCdAtoRegulatorioTipo(?int $cdAtoRegulatorioTipo): self
    {
        $this->cdAtoRegulatorioTipo = $cdAtoRegulatorioTipo;
        return $this;
    }

    public function getNrAtoRegulatorio(): ?string
    {
        return $this->nrAtoRegulatorio;
    }

    public function setNrAtoRegulatorio(?string $nrAtoRegulatorio): self
    {
        $this->nrAtoRegulatorio = $nrAtoRegulatorio;
        return $this;
    }

    public function getDtAtoRegulatorio(): ?\DateTimeInterface
    {
        return $this->dtAtoRegulatorio;
    }

    public function setDtAtoRegulatorio(?\DateTimeInterface $dtAtoRegulatorio): self
    {
        $this->dtAtoRegulatorio = $dtAtoRegulatorio;
        return $this;
    }

    public function getDsAtoRegulatorioVeiculoComunicacao(): ?string
    {
        return $this->dsAtoRegulatorioVeiculoComunicacao;
    }

    public function setDsAtoRegulatorioVeiculoComunicacao(?string $dsAtoRegulatorioVeiculoComunicacao): self
    {
        $this->dsAtoRegulatorioVeiculoComunicacao = $dsAtoRegulatorioVeiculoComunicacao;
        return $this;
    }

    public function getDtAtoRegulatorioPublicacao(): ?\DateTimeInterface
    {
        return $this->dtAtoRegulatorioPublicacao;
    }

    public function setDtAtoRegulatorioPublicacao(?\DateTimeInterface $dtAtoRegulatorioPublicacao): self
    {
        $this->dtAtoRegulatorioPublicacao = $dtAtoRegulatorioPublicacao;
        return $this;
    }

    public function getNrAtoRegulatorioSecaoPublicacao(): ?int
    {
        return $this->nrAtoRegulatorioSecaoPublicacao;
    }

    public function setNrAtoRegulatorioSecaoPublicacao(?int $nrAtoRegulatorioSecaoPublicacao): self
    {
        $this->nrAtoRegulatorioSecaoPublicacao = $nrAtoRegulatorioSecaoPublicacao;
        return $this;
    }

    public function getDsAtoRegulatorioPaginaPublicacao(): ?int
    {
        return $this->dsAtoRegulatorioPaginaPublicacao;
    }

    public function setDsAtoRegulatorioPaginaPublicacao(?int $dsAtoRegulatorioPaginaPublicacao): self
    {
        $this->dsAtoRegulatorioPaginaPublicacao = $dsAtoRegulatorioPaginaPublicacao;
        return $this;
    }

    public function getNrAtoRegulatorioDou(): ?int
    {
        return $this->nrAtoRegulatorioDou;
    }

    public function setNrAtoRegulatorioDou(?int $nrAtoRegulatorioDou): self
    {
        $this->nrAtoRegulatorioDou = $nrAtoRegulatorioDou;
        return $this;
    }

    public function getCdDescredenciamentoTipo(): ?int
    {
        return $this->cdDescredenciamentoTipo;
    }

    public function setCdDescredenciamentoTipo(?int $cdDescredenciamentoTipo): self
    {
        $this->cdDescredenciamentoTipo = $cdDescredenciamentoTipo;
        return $this;
    }

    public function getDsDescredenciamentoNumero(): ?string
    {
        return $this->dsDescredenciamentoNumero;
    }

    public function setDsDescredenciamentoNumero(?string $dsDescredenciamentoNumero): self
    {
        $this->dsDescredenciamentoNumero = $dsDescredenciamentoNumero;
        return $this;
    }

    public function getDtDescredenciamento(): ?\DateTimeInterface
    {
        return $this->dtDescredenciamento;
    }

    public function setDtDescredenciamento(?\DateTimeInterface $dtDescredenciamento): self
    {
        $this->dtDescredenciamento = $dtDescredenciamento;
        return $this;
    }

    public function getDsDescredenciamentoVeiculoPublicacao(): ?string
    {
        return $this->dsDescredenciamentoVeiculoPublicacao;
    }

    public function setDsDescredenciamentoVeiculoPublicacao(?string $dsDescredenciamentoVeiculoPublicacao): self
    {
        $this->dsDescredenciamentoVeiculoPublicacao = $dsDescredenciamentoVeiculoPublicacao;
        return $this;
    }

    public function getDtDescredenciamentoPublicacao(): ?\DateTimeInterface
    {
        return $this->dtDescredenciamentoPublicacao;
    }

    public function setDtDescredenciamentoPublicacao(?\DateTimeInterface $dtDescredenciamentoPublicacao): self
    {
        $this->dtDescredenciamentoPublicacao = $dtDescredenciamentoPublicacao;
        return $this;
    }

    public function getNrDescredenciamentoSecaoPublicacao(): ?int
    {
        return $this->nrDescredenciamentoSecaoPublicacao;
    }

    public function setNrDescredenciamentoSecaoPublicacao(?int $nrDescredenciamentoSecaoPublicacao): self
    {
        $this->nrDescredenciamentoSecaoPublicacao = $nrDescredenciamentoSecaoPublicacao;
        return $this;
    }

    public function getDsDescredenciamentoPaginaPublicacao(): ?int
    {
        return $this->dsDescredenciamentoPaginaPublicacao;
    }

    public function setDsDescredenciamentoPaginaPublicacao(?int $dsDescredenciamentoPaginaPublicacao): self
    {
        $this->dsDescredenciamentoPaginaPublicacao = $dsDescredenciamentoPaginaPublicacao;
        return $this;
    }

    public function getNrDescredenciamentoDou(): ?int
    {
        return $this->nrDescredenciamentoDou;
    }

    public function setNrDescredenciamentoDou(?int $nrDescredenciamentoDou): self
    {
        $this->nrDescredenciamentoDou = $nrDescredenciamentoDou;
        return $this;
    }
}
