<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PessoasInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasInfoRepository::class)]
#[ORM\Table(
    name: 'pessoas_info',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_pessoas_info_pessoas_info_etapas', columns: ['cd_pessoa_info_etapa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_pessoas_info_pessoas_info_etapas', 'colunas' => ['cd_pessoa_info_etapa'], 'tabelaAlvo' => 'pessoas_info_etapas', 'colunasAlvo' => ['cd_pessoa_info_etapa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PessoasInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_informacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInformacao = null;

    #[ORM\ManyToOne(targetEntity: PessoasInfoEtapas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_info_etapa', referencedColumnName: 'cd_pessoa_info_etapa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PessoasInfoEtapas $cdPessoaInfoEtapa = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_informacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsInformacao = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 150, nullable: true)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'ds_contatos', type: 'string', length: 150, nullable: true)]
    private ?string $dsContatos = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInformacao = null;

    #[ORM\Column(name: 'cd_origem', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdOrigem = 0;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'ds_obs1', type: 'string', length: 255, nullable: true)]
    private ?string $dsObs1 = null;

    #[ORM\Column(name: 'ds_obs2', type: 'string', length: 255, nullable: true)]
    private ?string $dsObs2 = null;

    #[ORM\Column(name: 'ds_obs3', type: 'string', length: 255, nullable: true)]
    private ?string $dsObs3 = null;

    #[ORM\Column(name: 'ds_telefone2', type: 'string', length: 150, nullable: true)]
    private ?string $dsTelefone2 = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nm_usuario', type: 'string', length: 40)]
    private ?string $nmUsuario = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_cidade', type: 'string', length: 255, nullable: true)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 255, nullable: true)]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'cd_conhecimento', type: 'integer', nullable: true)]
    private ?int $cdConhecimento = null;

    #[ORM\Column(name: 'ds_endereco', type: 'string', length: 255, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'ds_telefone3', type: 'string', length: 150, nullable: true)]
    private ?string $dsTelefone3 = null;

    #[ORM\Column(name: 'ds_telefone4', type: 'string', length: 150, nullable: true)]
    private ?string $dsTelefone4 = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 150, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'dt_retorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRetorno = null;

    #[ORM\Column(name: 'ds_area_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAreaAssunto = null;

    #[ORM\Column(name: 'ds_obs4', type: 'string', length: 255, nullable: true)]
    private ?string $dsObs4 = null;

    #[ORM\Column(name: 'cd_consultor', type: 'integer', nullable: true)]
    private ?int $cdConsultor = null;

    #[ORM\Column(name: 'ds_status', type: 'string', length: 255, nullable: true)]
    private ?string $dsStatus = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 50, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_endereco_nro', type: 'string', length: 10, nullable: true)]
    private ?string $dsEnderecoNro = null;

    #[ORM\Column(name: 'nm_dependente', type: 'string', length: 150, nullable: true)]
    private ?string $nmDependente = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 50, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'dt_nascimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNascimento = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_dependente', type: 'integer', nullable: true)]
    private ?int $cdDependente = null;

    #[ORM\Column(name: 'dt_ultima_movimentacao_etapa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaMovimentacaoEtapa = null;

    #[ORM\Column(name: 'sn_resolvido', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snResolvido = 0;

    #[ORM\Column(name: 'ds_link_inscricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsLinkInscricao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 41 propriedades. Use os setters encadeados.

    public function getCdInformacao(): ?int
    {
        return $this->cdInformacao;
    }

    public function getCdPessoaInfoEtapa(): ?PessoasInfoEtapas
    {
        return $this->cdPessoaInfoEtapa;
    }

    public function setCdPessoaInfoEtapa(?PessoasInfoEtapas $cdPessoaInfoEtapa): self
    {
        $this->cdPessoaInfoEtapa = $cdPessoaInfoEtapa;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsInformacao(): ?string
    {
        return $this->dsInformacao;
    }

    public function setDsInformacao(?string $dsInformacao): self
    {
        $this->dsInformacao = $dsInformacao;
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

    public function getDsContatos(): ?string
    {
        return $this->dsContatos;
    }

    public function setDsContatos(?string $dsContatos): self
    {
        $this->dsContatos = $dsContatos;
        return $this;
    }

    public function getDtInformacao(): ?\DateTimeInterface
    {
        return $this->dtInformacao;
    }

    public function setDtInformacao(?\DateTimeInterface $dtInformacao): self
    {
        $this->dtInformacao = $dtInformacao;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
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

    public function getDsObs1(): ?string
    {
        return $this->dsObs1;
    }

    public function setDsObs1(?string $dsObs1): self
    {
        $this->dsObs1 = $dsObs1;
        return $this;
    }

    public function getDsObs2(): ?string
    {
        return $this->dsObs2;
    }

    public function setDsObs2(?string $dsObs2): self
    {
        $this->dsObs2 = $dsObs2;
        return $this;
    }

    public function getDsObs3(): ?string
    {
        return $this->dsObs3;
    }

    public function setDsObs3(?string $dsObs3): self
    {
        $this->dsObs3 = $dsObs3;
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

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNmUsuario(): ?string
    {
        return $this->nmUsuario;
    }

    public function setNmUsuario(?string $nmUsuario): self
    {
        $this->nmUsuario = $nmUsuario;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }

    public function getCdConhecimento(): ?int
    {
        return $this->cdConhecimento;
    }

    public function setCdConhecimento(?int $cdConhecimento): self
    {
        $this->cdConhecimento = $cdConhecimento;
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

    public function getDsTelefone3(): ?string
    {
        return $this->dsTelefone3;
    }

    public function setDsTelefone3(?string $dsTelefone3): self
    {
        $this->dsTelefone3 = $dsTelefone3;
        return $this;
    }

    public function getDsTelefone4(): ?string
    {
        return $this->dsTelefone4;
    }

    public function setDsTelefone4(?string $dsTelefone4): self
    {
        $this->dsTelefone4 = $dsTelefone4;
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

    public function getDtRetorno(): ?\DateTimeInterface
    {
        return $this->dtRetorno;
    }

    public function setDtRetorno(?\DateTimeInterface $dtRetorno): self
    {
        $this->dtRetorno = $dtRetorno;
        return $this;
    }

    public function getDsAreaAssunto(): ?string
    {
        return $this->dsAreaAssunto;
    }

    public function setDsAreaAssunto(?string $dsAreaAssunto): self
    {
        $this->dsAreaAssunto = $dsAreaAssunto;
        return $this;
    }

    public function getDsObs4(): ?string
    {
        return $this->dsObs4;
    }

    public function setDsObs4(?string $dsObs4): self
    {
        $this->dsObs4 = $dsObs4;
        return $this;
    }

    public function getCdConsultor(): ?int
    {
        return $this->cdConsultor;
    }

    public function setCdConsultor(?int $cdConsultor): self
    {
        $this->cdConsultor = $cdConsultor;
        return $this;
    }

    public function getDsStatus(): ?string
    {
        return $this->dsStatus;
    }

    public function setDsStatus(?string $dsStatus): self
    {
        $this->dsStatus = $dsStatus;
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

    public function getDsBairro(): ?string
    {
        return $this->dsBairro;
    }

    public function setDsBairro(?string $dsBairro): self
    {
        $this->dsBairro = $dsBairro;
        return $this;
    }

    public function getDsEnderecoNro(): ?string
    {
        return $this->dsEnderecoNro;
    }

    public function setDsEnderecoNro(?string $dsEnderecoNro): self
    {
        $this->dsEnderecoNro = $dsEnderecoNro;
        return $this;
    }

    public function getNmDependente(): ?string
    {
        return $this->nmDependente;
    }

    public function setNmDependente(?string $nmDependente): self
    {
        $this->nmDependente = $nmDependente;
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

    public function getDtNascimento(): ?\DateTimeInterface
    {
        return $this->dtNascimento;
    }

    public function setDtNascimento(?\DateTimeInterface $dtNascimento): self
    {
        $this->dtNascimento = $dtNascimento;
        return $this;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getCdDependente(): ?int
    {
        return $this->cdDependente;
    }

    public function setCdDependente(?int $cdDependente): self
    {
        $this->cdDependente = $cdDependente;
        return $this;
    }

    public function getDtUltimaMovimentacaoEtapa(): ?\DateTimeInterface
    {
        return $this->dtUltimaMovimentacaoEtapa;
    }

    public function setDtUltimaMovimentacaoEtapa(?\DateTimeInterface $dtUltimaMovimentacaoEtapa): self
    {
        $this->dtUltimaMovimentacaoEtapa = $dtUltimaMovimentacaoEtapa;
        return $this;
    }

    public function getSnResolvido(): int
    {
        return $this->snResolvido;
    }

    public function setSnResolvido(int $snResolvido): self
    {
        $this->snResolvido = $snResolvido;
        return $this;
    }

    public function getDsLinkInscricao(): ?string
    {
        return $this->dsLinkInscricao;
    }

    public function setDsLinkInscricao(?string $dsLinkInscricao): self
    {
        $this->dsLinkInscricao = $dsLinkInscricao;
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
