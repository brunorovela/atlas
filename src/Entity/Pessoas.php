<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasRepository::class)]
#[ORM\Table(
    name: 'pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_LOGIN', columns: ['ds_login'])]
#[ORM\Index(name: 'IX_CD_RESP_ACAD', columns: ['cd_resp_acad'])]
#[ORM\Index(name: 'IX_CD_RESP_FINAN', columns: ['cd_resp_finan'])]
#[ORM\Index(name: 'IX_CD_PAI', columns: ['cd_pai'])]
#[ORM\Index(name: 'IX_CD_MAE', columns: ['cd_mae'])]
#[ORM\Index(name: 'IX_CD_USUARIO_PESSOA', columns: ['cd_usuario_pessoa'])]
#[ORM\Index(name: 'IX_CD_BAIRRO', columns: ['cd_bairro'])]
#[ORM\Index(name: 'IX_DS_SENHA', columns: ['ds_senha'])]
#[ORM\Index(name: 'IX_DS_LOGIN', columns: ['ds_login'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_DS_CPF', columns: ['ds_cpf'])]
#[ORM\Index(name: 'FK_pessoas_unim_grau_escolaridade', columns: ['cd_grau_escolaridade'])]
#[ORM\Index(name: 'FK_pessoas_coligadas_matriz_cd_coligada_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_pessoas_coligadas_matriz_cd_coligada_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_pessoas_unim_grau_escolaridade', 'colunas' => ['cd_grau_escolaridade'], 'tabelaAlvo' => 'unim_grau_escolaridade', 'colunasAlvo' => ['cd_grau_escolaridade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Pessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_resp_finan', type: 'integer', nullable: true)]
    private ?int $cdRespFinan = null;

    #[ORM\Column(name: 'cd_resp_acad', type: 'integer', nullable: true)]
    private ?int $cdRespAcad = null;

    #[ORM\Column(name: 'cd_mae', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMae = null;

    #[ORM\Column(name: 'cd_pai', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPai = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 60, nullable: true)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'nm_contato', type: 'string', length: 100, nullable: true)]
    private ?string $nmContato = null;

    #[ORM\Column(name: 'dt_nascimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNascimento = null;

    #[ORM\Column(name: 'ds_cidade_nascimento', type: 'string', length: 50, nullable: true)]
    private ?string $dsCidadeNascimento = null;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMunicipio = null;

    #[ORM\Column(name: 'ds_estado_nascimento', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsEstadoNascimento = null;

    #[ORM\Column(name: 'ds_pais_nascimento', type: 'string', length: 50, nullable: true)]
    private ?string $dsPaisNascimento = null;

    #[ORM\Column(name: 'cd_pais', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPais = null;

    #[ORM\Column(name: 'cd_pais_nascimento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPaisNascimento = null;

    #[ORM\Column(name: 'cd_logradouro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdLogradouro = null;

    #[ORM\Column(name: 'ds_logradouro', type: 'string', length: 150, nullable: true)]
    private ?string $dsLogradouro = null;

    #[ORM\Column(name: 'ds_logradouro_nro', type: 'string', length: 10, nullable: true)]
    private ?string $dsLogradouroNro = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 150, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'cd_zona_residencia', type: 'smallint', nullable: true, options: ['default' => '1'])]
    private ?int $cdZonaResidencia = 1;

    #[ORM\Column(name: 'ds_religiao', type: 'string', length: 50, nullable: true)]
    private ?string $dsReligiao = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 50, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_cidade', type: 'string', length: 50, nullable: true)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_estado', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsEstado = null;

    #[ORM\Column(name: 'ds_pais', type: 'string', length: 50, nullable: true)]
    private ?string $dsPais = null;

    #[ORM\Column(name: 'ds_sexo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsSexo = null;

    #[ORM\Column(name: 'ds_nacionalidade', type: 'string', length: 50, nullable: true)]
    private ?string $dsNacionalidade = null;

    #[ORM\Column(name: 'ds_identidade', type: 'string', length: 20, nullable: true)]
    private ?string $dsIdentidade = null;

    #[ORM\Column(name: 'cd_orgao_emissor', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOrgaoEmissor = null;

    #[ORM\Column(name: 'ds_identidade_orgao_exp', type: 'string', length: 50, nullable: true)]
    private ?string $dsIdentidadeOrgaoExp = null;

    #[ORM\Column(name: 'dt_identidade_expedicao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIdentidadeExpedicao = null;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 15, nullable: true)]
    private ?string $dsCpf = null;

    #[ORM\Column(name: 'ds_rm_corporacao', type: 'string', length: 20, nullable: true)]
    private ?string $dsRmCorporacao = null;

    #[ORM\Column(name: 'nr_dia_vencimento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiaVencimento = null;

    #[ORM\Column(name: 'sn_nao_bloquear_financeiro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snNaoBloquearFinanceiro = 0;

    #[ORM\Column(name: 'ds_rm_org_numero', type: 'string', length: 20, nullable: true)]
    private ?string $dsRmOrgNumero = null;

    #[ORM\Column(name: 'dt_rm_exp', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRmExp = null;

    #[ORM\Column(name: 'ds_rm_doc_numero', type: 'string', length: 20, nullable: true)]
    private ?string $dsRmDocNumero = null;

    #[ORM\Column(name: 'ds_rm_orgao', type: 'string', length: 20, nullable: true)]
    private ?string $dsRmOrgao = null;

    #[ORM\Column(name: 'ds_rm_doc_tipo', type: 'string', length: 60, nullable: true)]
    private ?string $dsRmDocTipo = null;

    #[ORM\Column(name: 'ds_titulo_numero', type: 'string', length: 20, nullable: true)]
    private ?string $dsTituloNumero = null;

    #[ORM\Column(name: 'ds_titulo_secao', type: 'string', length: 10, nullable: true)]
    private ?string $dsTituloSecao = null;

    #[ORM\Column(name: 'ds_titulo_zona', type: 'string', length: 10, nullable: true)]
    private ?string $dsTituloZona = null;

    #[ORM\Column(name: 'dt_titulo_emissao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtTituloEmissao = null;

    #[ORM\Column(name: 'nm_pai', type: 'string', length: 80, nullable: true)]
    private ?string $nmPai = null;

    #[ORM\Column(name: 'nm_mae', type: 'string', length: 80, nullable: true)]
    private ?string $nmMae = null;

    #[ORM\Column(name: 'cd_estado_civil', type: 'smallint', nullable: true)]
    private ?int $cdEstadoCivil = null;

    #[ORM\Column(name: 'ds_estado_civil', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsEstadoCivil = null;

    #[ORM\Column(name: 'nm_conjuge', type: 'string', length: 80, nullable: true)]
    private ?string $nmConjuge = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'cd_pessoa_alteracao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaAlteracao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'nm_sem_acento', type: 'string', length: 80, nullable: true)]
    private ?string $nmSemAcento = null;

    #[ORM\Column(name: 'ds_arquivo_documento', type: 'string', length: 100, nullable: true)]
    private ?string $dsArquivoDocumento = null;

    #[ORM\Column(name: 'cd_empresa', type: 'integer', nullable: true)]
    private ?int $cdEmpresa = null;

    #[ORM\Column(name: 'ds_cargo', type: 'string', length: 80, nullable: true)]
    private ?string $dsCargo = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'ds_login', type: 'string', length: 100, nullable: true)]
    private ?string $dsLogin = null;

    #[ORM\Column(name: 'ds_senha', type: 'string', length: 32, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'ds_senha_nova', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenhaNova = null;

    #[ORM\Column(name: 'ds_senha_md4', type: 'string', length: 32, nullable: true)]
    private ?string $dsSenhaMd4 = null;

    #[ORM\Column(name: 'sn_senha_provisoria', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snSenhaProvisoria = null;

    #[ORM\Column(name: 'dt_senha_expira', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSenhaExpira = null;

    #[ORM\Column(name: 'sn_bloqueto_empresa', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snBloquetoEmpresa = 'N';

    #[ORM\Column(name: 'im_pessoa', type: 'blob', length: 16777215, nullable: true)]
    private ?string $imPessoa = null;

    #[ORM\Column(name: 'sn_foto_publica', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snFotoPublica = 'S';

    #[ORM\Column(name: 'sn_pai', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snPai = 'N';

    #[ORM\Column(name: 'sn_mae', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snMae = 'N';

    #[ORM\Column(name: 'tp_pessoa', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'F'])]
    private ?string $tpPessoa = 'F';

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 14, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'ds_inscri_estadual', type: 'string', length: 50, nullable: true)]
    private ?string $dsInscriEstadual = null;

    #[ORM\Column(name: 'tp_cert', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $tpCert = 0;

    #[ORM\Column(name: 'nr_cert_termo', type: 'string', length: 50, nullable: true)]
    private ?string $nrCertTermo = null;

    #[ORM\Column(name: 'ds_cert_folha', type: 'string', length: 8, nullable: true)]
    private ?string $dsCertFolha = null;

    #[ORM\Column(name: 'ds_cert_livro', type: 'string', length: 8, nullable: true)]
    private ?string $dsCertLivro = null;

    #[ORM\Column(name: 'dt_cert', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCert = null;

    #[ORM\Column(name: 'ds_cert_uf', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsCertUf = null;

    #[ORM\Column(name: 'ds_cert_orgao', type: 'string', length: 100, nullable: true)]
    private ?string $dsCertOrgao = null;

    #[ORM\Column(name: 'cd_municipio_nasc', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMunicipioNasc = null;

    #[ORM\Column(name: 'nr_praca', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPraca = null;

    #[ORM\Column(name: 'cd_estado_nascimento', type: 'smallint', nullable: true)]
    private ?int $cdEstadoNascimento = null;

    #[ORM\Column(name: 'cd_estado', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdEstado = null;

    #[ORM\Column(name: 'cd_convenio', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdConvenio = 0;

    #[ORM\Column(name: 'sn_pai_resp', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snPaiResp = 1;

    #[ORM\Column(name: 'sn_mae_resp', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snMaeResp = 1;

    #[ORM\Column(name: 'cd_cert_uf', type: 'smallint', nullable: true)]
    private ?int $cdCertUf = null;

    #[ORM\Column(name: 'cd_localidade', type: 'integer', nullable: true)]
    private ?int $cdLocalidade = null;

    #[ORM\Column(name: 'cd_localidade_nasc', type: 'integer', nullable: true)]
    private ?int $cdLocalidadeNasc = null;

    #[ORM\Column(name: 'sn_pais_como_resp', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snPaisComoResp = 1;

    #[ORM\Column(name: 'sn_obito', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snObito = 0;

    #[ORM\Column(name: 'sn_requerimentos_email', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snRequerimentosEmail = 'S';

    #[ORM\Column(name: 'cd_instituicao_ensino', type: 'smallint', nullable: true)]
    private ?int $cdInstituicaoEnsino = null;

    #[ORM\Column(name: 'cd_raca', type: 'smallint', nullable: true, options: ['comment' => 'Busca da tabela de situacoes'])]
    private ?int $cdRaca = null;

    #[ORM\Column(name: 'cd_mec', type: 'string', length: 30, nullable: true)]
    private ?string $cdMec = null;

    #[ORM\Column(name: 'sn_foto', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'S'])]
    private ?string $snFoto = 'S';

    #[ORM\Column(name: 'ds_tipo_substituicao_rg_aluno', type: 'string', length: 120, nullable: true)]
    private ?string $dsTipoSubstituicaoRgAluno = null;

    #[ORM\Column(name: 'ds_substituicao_rg_aluno', type: 'string', length: 120, nullable: true)]
    private ?string $dsSubstituicaoRgAluno = null;

    #[ORM\Column(name: 'sn_bloqueado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueado = 0;

    #[ORM\Column(name: 'cd_usuario_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuarioPessoa = null;

    #[ORM\Column(name: 'ds_inscri_municipal', type: 'string', length: 50, nullable: true)]
    private ?string $dsInscriMunicipal = null;

    #[ORM\Column(name: 'cd_bairro', type: 'integer', nullable: true)]
    private ?int $cdBairro = null;

    #[ORM\Column(name: 'sn_bloq_cartas', type: 'boolean', nullable: true)]
    private ?bool $snBloqCartas = null;

    #[ORM\Column(name: 'sn_bloq_emails', type: 'boolean', nullable: true)]
    private ?bool $snBloqEmails = null;

    #[ORM\Column(name: 'sn_naturalizado', type: 'boolean', nullable: true)]
    private ?bool $snNaturalizado = null;

    #[ORM\Column(name: 'dt_identidade_expiracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIdentidadeExpiracao = null;

    #[ORM\Column(name: 'ds_matricula', type: 'string', length: 40, nullable: true)]
    private ?string $dsMatricula = null;

    #[ORM\Column(name: 'sn_pode_retirar_material', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snPodeRetirarMaterial = false;

    #[ORM\Column(name: 'ds_passaporte', type: 'string', length: 50, nullable: true)]
    private ?string $dsPassaporte = null;

    #[ORM\Column(name: 'ds_forma_conheceu', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormaConheceu = null;

    #[ORM\Column(name: 'ds_formacao_academica', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormacaoAcademica = null;

    #[ORM\Column(name: 'nm_pessoa_oficial', type: 'string', length: 60, nullable: true, options: ['comment' => 'somente utilizado quando a pessoa opta por usar um nome social, caso contrario o nm_pessoa é o nome oficial'])]
    private ?string $nmPessoaOficial = null;

    #[ORM\Column(name: 'sn_nome_social', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snNomeSocial = 0;

    #[ORM\Column(name: 'ds_profissao', type: 'string', length: 255, nullable: true)]
    private ?string $dsProfissao = null;

    #[ORM\Column(name: 'ds_local_trabalho', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocalTrabalho = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_fornecedor', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snFornecedor = 0;

    #[ORM\Column(name: 'cd_pessoa_antigo', type: 'integer', nullable: true)]
    private ?int $cdPessoaAntigo = null;

    #[ORM\ManyToOne(targetEntity: UnimGrauEscolaridade::class)]
    #[ORM\JoinColumn(name: 'cd_grau_escolaridade', referencedColumnName: 'cd_grau_escolaridade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimGrauEscolaridade $cdGrauEscolaridade = null;

    #[ORM\Column(name: 'ds_identidade_uf', type: 'string', length: 50, nullable: true, options: ['comment' => 'NAO UTILIZAR ESSE CAMPO, ELE SERA REMOVIDO - GOS-379'])]
    private ?string $dsIdentidadeUf = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'sn_bloqueio_integracao_principia', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueioIntegracaoPrincipia = 0;

    #[ORM\Column(name: 'sn_emancipado', type: 'boolean', nullable: true)]
    private ?bool $snEmancipado = null;

    // Sem construtor: 123 propriedades. Use os setters encadeados.

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdRespFinan(): ?int
    {
        return $this->cdRespFinan;
    }

    public function setCdRespFinan(?int $cdRespFinan): self
    {
        $this->cdRespFinan = $cdRespFinan;
        return $this;
    }

    public function getCdRespAcad(): ?int
    {
        return $this->cdRespAcad;
    }

    public function setCdRespAcad(?int $cdRespAcad): self
    {
        $this->cdRespAcad = $cdRespAcad;
        return $this;
    }

    public function getCdMae(): ?int
    {
        return $this->cdMae;
    }

    public function setCdMae(?int $cdMae): self
    {
        $this->cdMae = $cdMae;
        return $this;
    }

    public function getCdPai(): ?int
    {
        return $this->cdPai;
    }

    public function setCdPai(?int $cdPai): self
    {
        $this->cdPai = $cdPai;
        return $this;
    }

    public function getNmPessoa(): ?string
    {
        return $this->nmPessoa;
    }

    public function setNmPessoa(?string $nmPessoa): self
    {
        $this->nmPessoa = $nmPessoa;
        return $this;
    }

    public function getNmContato(): ?string
    {
        return $this->nmContato;
    }

    public function setNmContato(?string $nmContato): self
    {
        $this->nmContato = $nmContato;
        return $this;
    }

    public function getDtNascimento(): ?\DateTimeInterface
    {
        return $this->dtNascimento;
    }

    public function setDtNascimento(?\DateTimeInterface $dtNascimento): self
    {
        $this->dtNascimento = $dtNascimento;
        return $this;
    }

    public function getDsCidadeNascimento(): ?string
    {
        return $this->dsCidadeNascimento;
    }

    public function setDsCidadeNascimento(?string $dsCidadeNascimento): self
    {
        $this->dsCidadeNascimento = $dsCidadeNascimento;
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

    public function getDsEstadoNascimento(): ?string
    {
        return $this->dsEstadoNascimento;
    }

    public function setDsEstadoNascimento(?string $dsEstadoNascimento): self
    {
        $this->dsEstadoNascimento = $dsEstadoNascimento;
        return $this;
    }

    public function getDsPaisNascimento(): ?string
    {
        return $this->dsPaisNascimento;
    }

    public function setDsPaisNascimento(?string $dsPaisNascimento): self
    {
        $this->dsPaisNascimento = $dsPaisNascimento;
        return $this;
    }

    public function getCdPais(): ?int
    {
        return $this->cdPais;
    }

    public function setCdPais(?int $cdPais): self
    {
        $this->cdPais = $cdPais;
        return $this;
    }

    public function getCdPaisNascimento(): ?int
    {
        return $this->cdPaisNascimento;
    }

    public function setCdPaisNascimento(?int $cdPaisNascimento): self
    {
        $this->cdPaisNascimento = $cdPaisNascimento;
        return $this;
    }

    public function getCdLogradouro(): ?int
    {
        return $this->cdLogradouro;
    }

    public function setCdLogradouro(?int $cdLogradouro): self
    {
        $this->cdLogradouro = $cdLogradouro;
        return $this;
    }

    public function getDsLogradouro(): ?string
    {
        return $this->dsLogradouro;
    }

    public function setDsLogradouro(?string $dsLogradouro): self
    {
        $this->dsLogradouro = $dsLogradouro;
        return $this;
    }

    public function getDsLogradouroNro(): ?string
    {
        return $this->dsLogradouroNro;
    }

    public function setDsLogradouroNro(?string $dsLogradouroNro): self
    {
        $this->dsLogradouroNro = $dsLogradouroNro;
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

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
        return $this;
    }

    public function getCdZonaResidencia(): ?int
    {
        return $this->cdZonaResidencia;
    }

    public function setCdZonaResidencia(?int $cdZonaResidencia): self
    {
        $this->cdZonaResidencia = $cdZonaResidencia;
        return $this;
    }

    public function getDsReligiao(): ?string
    {
        return $this->dsReligiao;
    }

    public function setDsReligiao(?string $dsReligiao): self
    {
        $this->dsReligiao = $dsReligiao;
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

    public function getDsPais(): ?string
    {
        return $this->dsPais;
    }

    public function setDsPais(?string $dsPais): self
    {
        $this->dsPais = $dsPais;
        return $this;
    }

    public function getDsSexo(): ?string
    {
        return $this->dsSexo;
    }

    public function setDsSexo(?string $dsSexo): self
    {
        $this->dsSexo = $dsSexo;
        return $this;
    }

    public function getDsNacionalidade(): ?string
    {
        return $this->dsNacionalidade;
    }

    public function setDsNacionalidade(?string $dsNacionalidade): self
    {
        $this->dsNacionalidade = $dsNacionalidade;
        return $this;
    }

    public function getDsIdentidade(): ?string
    {
        return $this->dsIdentidade;
    }

    public function setDsIdentidade(?string $dsIdentidade): self
    {
        $this->dsIdentidade = $dsIdentidade;
        return $this;
    }

    public function getCdOrgaoEmissor(): ?int
    {
        return $this->cdOrgaoEmissor;
    }

    public function setCdOrgaoEmissor(?int $cdOrgaoEmissor): self
    {
        $this->cdOrgaoEmissor = $cdOrgaoEmissor;
        return $this;
    }

    public function getDsIdentidadeOrgaoExp(): ?string
    {
        return $this->dsIdentidadeOrgaoExp;
    }

    public function setDsIdentidadeOrgaoExp(?string $dsIdentidadeOrgaoExp): self
    {
        $this->dsIdentidadeOrgaoExp = $dsIdentidadeOrgaoExp;
        return $this;
    }

    public function getDtIdentidadeExpedicao(): ?\DateTimeInterface
    {
        return $this->dtIdentidadeExpedicao;
    }

    public function setDtIdentidadeExpedicao(?\DateTimeInterface $dtIdentidadeExpedicao): self
    {
        $this->dtIdentidadeExpedicao = $dtIdentidadeExpedicao;
        return $this;
    }

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
        return $this;
    }

    public function getDsRmCorporacao(): ?string
    {
        return $this->dsRmCorporacao;
    }

    public function setDsRmCorporacao(?string $dsRmCorporacao): self
    {
        $this->dsRmCorporacao = $dsRmCorporacao;
        return $this;
    }

    public function getNrDiaVencimento(): ?int
    {
        return $this->nrDiaVencimento;
    }

    public function setNrDiaVencimento(?int $nrDiaVencimento): self
    {
        $this->nrDiaVencimento = $nrDiaVencimento;
        return $this;
    }

    public function getSnNaoBloquearFinanceiro(): ?int
    {
        return $this->snNaoBloquearFinanceiro;
    }

    public function setSnNaoBloquearFinanceiro(?int $snNaoBloquearFinanceiro): self
    {
        $this->snNaoBloquearFinanceiro = $snNaoBloquearFinanceiro;
        return $this;
    }

    public function getDsRmOrgNumero(): ?string
    {
        return $this->dsRmOrgNumero;
    }

    public function setDsRmOrgNumero(?string $dsRmOrgNumero): self
    {
        $this->dsRmOrgNumero = $dsRmOrgNumero;
        return $this;
    }

    public function getDtRmExp(): ?\DateTimeInterface
    {
        return $this->dtRmExp;
    }

    public function setDtRmExp(?\DateTimeInterface $dtRmExp): self
    {
        $this->dtRmExp = $dtRmExp;
        return $this;
    }

    public function getDsRmDocNumero(): ?string
    {
        return $this->dsRmDocNumero;
    }

    public function setDsRmDocNumero(?string $dsRmDocNumero): self
    {
        $this->dsRmDocNumero = $dsRmDocNumero;
        return $this;
    }

    public function getDsRmOrgao(): ?string
    {
        return $this->dsRmOrgao;
    }

    public function setDsRmOrgao(?string $dsRmOrgao): self
    {
        $this->dsRmOrgao = $dsRmOrgao;
        return $this;
    }

    public function getDsRmDocTipo(): ?string
    {
        return $this->dsRmDocTipo;
    }

    public function setDsRmDocTipo(?string $dsRmDocTipo): self
    {
        $this->dsRmDocTipo = $dsRmDocTipo;
        return $this;
    }

    public function getDsTituloNumero(): ?string
    {
        return $this->dsTituloNumero;
    }

    public function setDsTituloNumero(?string $dsTituloNumero): self
    {
        $this->dsTituloNumero = $dsTituloNumero;
        return $this;
    }

    public function getDsTituloSecao(): ?string
    {
        return $this->dsTituloSecao;
    }

    public function setDsTituloSecao(?string $dsTituloSecao): self
    {
        $this->dsTituloSecao = $dsTituloSecao;
        return $this;
    }

    public function getDsTituloZona(): ?string
    {
        return $this->dsTituloZona;
    }

    public function setDsTituloZona(?string $dsTituloZona): self
    {
        $this->dsTituloZona = $dsTituloZona;
        return $this;
    }

    public function getDtTituloEmissao(): ?\DateTimeInterface
    {
        return $this->dtTituloEmissao;
    }

    public function setDtTituloEmissao(?\DateTimeInterface $dtTituloEmissao): self
    {
        $this->dtTituloEmissao = $dtTituloEmissao;
        return $this;
    }

    public function getNmPai(): ?string
    {
        return $this->nmPai;
    }

    public function setNmPai(?string $nmPai): self
    {
        $this->nmPai = $nmPai;
        return $this;
    }

    public function getNmMae(): ?string
    {
        return $this->nmMae;
    }

    public function setNmMae(?string $nmMae): self
    {
        $this->nmMae = $nmMae;
        return $this;
    }

    public function getCdEstadoCivil(): ?int
    {
        return $this->cdEstadoCivil;
    }

    public function setCdEstadoCivil(?int $cdEstadoCivil): self
    {
        $this->cdEstadoCivil = $cdEstadoCivil;
        return $this;
    }

    public function getDsEstadoCivil(): ?string
    {
        return $this->dsEstadoCivil;
    }

    public function setDsEstadoCivil(?string $dsEstadoCivil): self
    {
        $this->dsEstadoCivil = $dsEstadoCivil;
        return $this;
    }

    public function getNmConjuge(): ?string
    {
        return $this->nmConjuge;
    }

    public function setNmConjuge(?string $nmConjuge): self
    {
        $this->nmConjuge = $nmConjuge;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
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

    public function getCdPessoaAlteracao(): ?int
    {
        return $this->cdPessoaAlteracao;
    }

    public function setCdPessoaAlteracao(?int $cdPessoaAlteracao): self
    {
        $this->cdPessoaAlteracao = $cdPessoaAlteracao;
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

    public function getNmSemAcento(): ?string
    {
        return $this->nmSemAcento;
    }

    public function setNmSemAcento(?string $nmSemAcento): self
    {
        $this->nmSemAcento = $nmSemAcento;
        return $this;
    }

    public function getDsArquivoDocumento(): ?string
    {
        return $this->dsArquivoDocumento;
    }

    public function setDsArquivoDocumento(?string $dsArquivoDocumento): self
    {
        $this->dsArquivoDocumento = $dsArquivoDocumento;
        return $this;
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

    public function getDsCargo(): ?string
    {
        return $this->dsCargo;
    }

    public function setDsCargo(?string $dsCargo): self
    {
        $this->dsCargo = $dsCargo;
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

    public function getDsLogin(): ?string
    {
        return $this->dsLogin;
    }

    public function setDsLogin(?string $dsLogin): self
    {
        $this->dsLogin = $dsLogin;
        return $this;
    }

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    public function getDsSenhaNova(): ?string
    {
        return $this->dsSenhaNova;
    }

    public function setDsSenhaNova(?string $dsSenhaNova): self
    {
        $this->dsSenhaNova = $dsSenhaNova;
        return $this;
    }

    public function getDsSenhaMd4(): ?string
    {
        return $this->dsSenhaMd4;
    }

    public function setDsSenhaMd4(?string $dsSenhaMd4): self
    {
        $this->dsSenhaMd4 = $dsSenhaMd4;
        return $this;
    }

    public function getSnSenhaProvisoria(): ?string
    {
        return $this->snSenhaProvisoria;
    }

    public function setSnSenhaProvisoria(?string $snSenhaProvisoria): self
    {
        $this->snSenhaProvisoria = $snSenhaProvisoria;
        return $this;
    }

    public function getDtSenhaExpira(): ?\DateTimeInterface
    {
        return $this->dtSenhaExpira;
    }

    public function setDtSenhaExpira(?\DateTimeInterface $dtSenhaExpira): self
    {
        $this->dtSenhaExpira = $dtSenhaExpira;
        return $this;
    }

    public function getSnBloquetoEmpresa(): ?string
    {
        return $this->snBloquetoEmpresa;
    }

    public function setSnBloquetoEmpresa(?string $snBloquetoEmpresa): self
    {
        $this->snBloquetoEmpresa = $snBloquetoEmpresa;
        return $this;
    }

    public function getImPessoa(): ?string
    {
        return $this->imPessoa;
    }

    public function setImPessoa(?string $imPessoa): self
    {
        $this->imPessoa = $imPessoa;
        return $this;
    }

    public function getSnFotoPublica(): ?string
    {
        return $this->snFotoPublica;
    }

    public function setSnFotoPublica(?string $snFotoPublica): self
    {
        $this->snFotoPublica = $snFotoPublica;
        return $this;
    }

    public function getSnPai(): ?string
    {
        return $this->snPai;
    }

    public function setSnPai(?string $snPai): self
    {
        $this->snPai = $snPai;
        return $this;
    }

    public function getSnMae(): ?string
    {
        return $this->snMae;
    }

    public function setSnMae(?string $snMae): self
    {
        $this->snMae = $snMae;
        return $this;
    }

    public function getTpPessoa(): ?string
    {
        return $this->tpPessoa;
    }

    public function setTpPessoa(?string $tpPessoa): self
    {
        $this->tpPessoa = $tpPessoa;
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

    public function getDsInscriEstadual(): ?string
    {
        return $this->dsInscriEstadual;
    }

    public function setDsInscriEstadual(?string $dsInscriEstadual): self
    {
        $this->dsInscriEstadual = $dsInscriEstadual;
        return $this;
    }

    public function getTpCert(): ?int
    {
        return $this->tpCert;
    }

    public function setTpCert(?int $tpCert): self
    {
        $this->tpCert = $tpCert;
        return $this;
    }

    public function getNrCertTermo(): ?string
    {
        return $this->nrCertTermo;
    }

    public function setNrCertTermo(?string $nrCertTermo): self
    {
        $this->nrCertTermo = $nrCertTermo;
        return $this;
    }

    public function getDsCertFolha(): ?string
    {
        return $this->dsCertFolha;
    }

    public function setDsCertFolha(?string $dsCertFolha): self
    {
        $this->dsCertFolha = $dsCertFolha;
        return $this;
    }

    public function getDsCertLivro(): ?string
    {
        return $this->dsCertLivro;
    }

    public function setDsCertLivro(?string $dsCertLivro): self
    {
        $this->dsCertLivro = $dsCertLivro;
        return $this;
    }

    public function getDtCert(): ?\DateTimeInterface
    {
        return $this->dtCert;
    }

    public function setDtCert(?\DateTimeInterface $dtCert): self
    {
        $this->dtCert = $dtCert;
        return $this;
    }

    public function getDsCertUf(): ?string
    {
        return $this->dsCertUf;
    }

    public function setDsCertUf(?string $dsCertUf): self
    {
        $this->dsCertUf = $dsCertUf;
        return $this;
    }

    public function getDsCertOrgao(): ?string
    {
        return $this->dsCertOrgao;
    }

    public function setDsCertOrgao(?string $dsCertOrgao): self
    {
        $this->dsCertOrgao = $dsCertOrgao;
        return $this;
    }

    public function getCdMunicipioNasc(): ?int
    {
        return $this->cdMunicipioNasc;
    }

    public function setCdMunicipioNasc(?int $cdMunicipioNasc): self
    {
        $this->cdMunicipioNasc = $cdMunicipioNasc;
        return $this;
    }

    public function getNrPraca(): ?int
    {
        return $this->nrPraca;
    }

    public function setNrPraca(?int $nrPraca): self
    {
        $this->nrPraca = $nrPraca;
        return $this;
    }

    public function getCdEstadoNascimento(): ?int
    {
        return $this->cdEstadoNascimento;
    }

    public function setCdEstadoNascimento(?int $cdEstadoNascimento): self
    {
        $this->cdEstadoNascimento = $cdEstadoNascimento;
        return $this;
    }

    public function getCdEstado(): ?int
    {
        return $this->cdEstado;
    }

    public function setCdEstado(?int $cdEstado): self
    {
        $this->cdEstado = $cdEstado;
        return $this;
    }

    public function getCdConvenio(): int
    {
        return $this->cdConvenio;
    }

    public function setCdConvenio(int $cdConvenio): self
    {
        $this->cdConvenio = $cdConvenio;
        return $this;
    }

    public function getSnPaiResp(): int
    {
        return $this->snPaiResp;
    }

    public function setSnPaiResp(int $snPaiResp): self
    {
        $this->snPaiResp = $snPaiResp;
        return $this;
    }

    public function getSnMaeResp(): int
    {
        return $this->snMaeResp;
    }

    public function setSnMaeResp(int $snMaeResp): self
    {
        $this->snMaeResp = $snMaeResp;
        return $this;
    }

    public function getCdCertUf(): ?int
    {
        return $this->cdCertUf;
    }

    public function setCdCertUf(?int $cdCertUf): self
    {
        $this->cdCertUf = $cdCertUf;
        return $this;
    }

    public function getCdLocalidade(): ?int
    {
        return $this->cdLocalidade;
    }

    public function setCdLocalidade(?int $cdLocalidade): self
    {
        $this->cdLocalidade = $cdLocalidade;
        return $this;
    }

    public function getCdLocalidadeNasc(): ?int
    {
        return $this->cdLocalidadeNasc;
    }

    public function setCdLocalidadeNasc(?int $cdLocalidadeNasc): self
    {
        $this->cdLocalidadeNasc = $cdLocalidadeNasc;
        return $this;
    }

    public function getSnPaisComoResp(): int
    {
        return $this->snPaisComoResp;
    }

    public function setSnPaisComoResp(int $snPaisComoResp): self
    {
        $this->snPaisComoResp = $snPaisComoResp;
        return $this;
    }

    public function getSnObito(): int
    {
        return $this->snObito;
    }

    public function setSnObito(int $snObito): self
    {
        $this->snObito = $snObito;
        return $this;
    }

    public function getSnRequerimentosEmail(): ?string
    {
        return $this->snRequerimentosEmail;
    }

    public function setSnRequerimentosEmail(?string $snRequerimentosEmail): self
    {
        $this->snRequerimentosEmail = $snRequerimentosEmail;
        return $this;
    }

    public function getCdInstituicaoEnsino(): ?int
    {
        return $this->cdInstituicaoEnsino;
    }

    public function setCdInstituicaoEnsino(?int $cdInstituicaoEnsino): self
    {
        $this->cdInstituicaoEnsino = $cdInstituicaoEnsino;
        return $this;
    }

    public function getCdRaca(): ?int
    {
        return $this->cdRaca;
    }

    public function setCdRaca(?int $cdRaca): self
    {
        $this->cdRaca = $cdRaca;
        return $this;
    }

    public function getCdMec(): ?string
    {
        return $this->cdMec;
    }

    public function setCdMec(?string $cdMec): self
    {
        $this->cdMec = $cdMec;
        return $this;
    }

    public function getSnFoto(): ?string
    {
        return $this->snFoto;
    }

    public function setSnFoto(?string $snFoto): self
    {
        $this->snFoto = $snFoto;
        return $this;
    }

    public function getDsTipoSubstituicaoRgAluno(): ?string
    {
        return $this->dsTipoSubstituicaoRgAluno;
    }

    public function setDsTipoSubstituicaoRgAluno(?string $dsTipoSubstituicaoRgAluno): self
    {
        $this->dsTipoSubstituicaoRgAluno = $dsTipoSubstituicaoRgAluno;
        return $this;
    }

    public function getDsSubstituicaoRgAluno(): ?string
    {
        return $this->dsSubstituicaoRgAluno;
    }

    public function setDsSubstituicaoRgAluno(?string $dsSubstituicaoRgAluno): self
    {
        $this->dsSubstituicaoRgAluno = $dsSubstituicaoRgAluno;
        return $this;
    }

    public function getSnBloqueado(): ?int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(?int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getCdUsuarioPessoa(): ?int
    {
        return $this->cdUsuarioPessoa;
    }

    public function setCdUsuarioPessoa(?int $cdUsuarioPessoa): self
    {
        $this->cdUsuarioPessoa = $cdUsuarioPessoa;
        return $this;
    }

    public function getDsInscriMunicipal(): ?string
    {
        return $this->dsInscriMunicipal;
    }

    public function setDsInscriMunicipal(?string $dsInscriMunicipal): self
    {
        $this->dsInscriMunicipal = $dsInscriMunicipal;
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

    public function isSnBloqCartas(): ?bool
    {
        return $this->snBloqCartas;
    }

    public function setSnBloqCartas(?bool $snBloqCartas): self
    {
        $this->snBloqCartas = $snBloqCartas;
        return $this;
    }

    public function isSnBloqEmails(): ?bool
    {
        return $this->snBloqEmails;
    }

    public function setSnBloqEmails(?bool $snBloqEmails): self
    {
        $this->snBloqEmails = $snBloqEmails;
        return $this;
    }

    public function isSnNaturalizado(): ?bool
    {
        return $this->snNaturalizado;
    }

    public function setSnNaturalizado(?bool $snNaturalizado): self
    {
        $this->snNaturalizado = $snNaturalizado;
        return $this;
    }

    public function getDtIdentidadeExpiracao(): ?\DateTimeInterface
    {
        return $this->dtIdentidadeExpiracao;
    }

    public function setDtIdentidadeExpiracao(?\DateTimeInterface $dtIdentidadeExpiracao): self
    {
        $this->dtIdentidadeExpiracao = $dtIdentidadeExpiracao;
        return $this;
    }

    public function getDsMatricula(): ?string
    {
        return $this->dsMatricula;
    }

    public function setDsMatricula(?string $dsMatricula): self
    {
        $this->dsMatricula = $dsMatricula;
        return $this;
    }

    public function isSnPodeRetirarMaterial(): ?bool
    {
        return $this->snPodeRetirarMaterial;
    }

    public function setSnPodeRetirarMaterial(?bool $snPodeRetirarMaterial): self
    {
        $this->snPodeRetirarMaterial = $snPodeRetirarMaterial;
        return $this;
    }

    public function getDsPassaporte(): ?string
    {
        return $this->dsPassaporte;
    }

    public function setDsPassaporte(?string $dsPassaporte): self
    {
        $this->dsPassaporte = $dsPassaporte;
        return $this;
    }

    public function getDsFormaConheceu(): ?string
    {
        return $this->dsFormaConheceu;
    }

    public function setDsFormaConheceu(?string $dsFormaConheceu): self
    {
        $this->dsFormaConheceu = $dsFormaConheceu;
        return $this;
    }

    public function getDsFormacaoAcademica(): ?string
    {
        return $this->dsFormacaoAcademica;
    }

    public function setDsFormacaoAcademica(?string $dsFormacaoAcademica): self
    {
        $this->dsFormacaoAcademica = $dsFormacaoAcademica;
        return $this;
    }

    public function getNmPessoaOficial(): ?string
    {
        return $this->nmPessoaOficial;
    }

    public function setNmPessoaOficial(?string $nmPessoaOficial): self
    {
        $this->nmPessoaOficial = $nmPessoaOficial;
        return $this;
    }

    public function getSnNomeSocial(): int
    {
        return $this->snNomeSocial;
    }

    public function setSnNomeSocial(int $snNomeSocial): self
    {
        $this->snNomeSocial = $snNomeSocial;
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

    public function getDsLocalTrabalho(): ?string
    {
        return $this->dsLocalTrabalho;
    }

    public function setDsLocalTrabalho(?string $dsLocalTrabalho): self
    {
        $this->dsLocalTrabalho = $dsLocalTrabalho;
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

    public function getSnFornecedor(): ?int
    {
        return $this->snFornecedor;
    }

    public function setSnFornecedor(?int $snFornecedor): self
    {
        $this->snFornecedor = $snFornecedor;
        return $this;
    }

    public function getCdPessoaAntigo(): ?int
    {
        return $this->cdPessoaAntigo;
    }

    public function setCdPessoaAntigo(?int $cdPessoaAntigo): self
    {
        $this->cdPessoaAntigo = $cdPessoaAntigo;
        return $this;
    }

    public function getCdGrauEscolaridade(): ?UnimGrauEscolaridade
    {
        return $this->cdGrauEscolaridade;
    }

    public function setCdGrauEscolaridade(?UnimGrauEscolaridade $cdGrauEscolaridade): self
    {
        $this->cdGrauEscolaridade = $cdGrauEscolaridade;
        return $this;
    }

    public function getDsIdentidadeUf(): ?string
    {
        return $this->dsIdentidadeUf;
    }

    public function setDsIdentidadeUf(?string $dsIdentidadeUf): self
    {
        $this->dsIdentidadeUf = $dsIdentidadeUf;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
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

    public function isSnEmancipado(): ?bool
    {
        return $this->snEmancipado;
    }

    public function setSnEmancipado(?bool $snEmancipado): self
    {
        $this->snEmancipado = $snEmancipado;
        return $this;
    }
}
