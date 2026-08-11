<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BlsaProcessoPessoaFamiliaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlsaProcessoPessoaFamiliaRepository::class)]
#[ORM\Table(
    name: 'blsa_processo_pessoa_familia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PROCESSO_PESSOA', columns: ['cd_pessoa', 'cd_processo_pessoa'])]
#[ORM\Index(name: 'FK_blsa_processo_pessoa_familia_pessoas_parentesco_tipos', columns: ['cd_parentesco'])]
#[ORM\Index(name: 'FK_cd_pessoa_candidato_pessoas', columns: ['cd_processo_pessoa'])]
#[ORM\Index(name: 'IDX_CBE4F53CAFC694F1', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_blsa_processo_pessoa_familia_blsa_processo_pessoa', 'colunas' => ['cd_processo_pessoa'], 'tabelaAlvo' => 'blsa_processo_pessoa', 'colunasAlvo' => ['cd_processo_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_blsa_processo_pessoa_familia_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_blsa_processo_pessoa_familia_pessoas_parentesco_tipos', 'colunas' => ['cd_parentesco'], 'tabelaAlvo' => 'pessoas_parentesco_tipos', 'colunasAlvo' => ['cd_parentesco_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BlsaProcessoPessoaFamilia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_pessoa_familia', type: 'integer')]
    private ?int $cdProcessoPessoaFamilia = null;

    #[ORM\ManyToOne(targetEntity: BlsaProcessoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_processo_pessoa', referencedColumnName: 'cd_processo_pessoa', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BlsaProcessoPessoa $cdProcessoPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: PessoasParentescoTipos::class)]
    #[ORM\JoinColumn(name: 'cd_parentesco', referencedColumnName: 'cd_parentesco_tipo', nullable: true, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PessoasParentescoTipos $cdParentesco = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'dt_nascimento', type: 'date')]
    private ?\DateTimeInterface $dtNascimento = null;

    #[ORM\Column(name: 'ds_parentesco_outro', type: 'string', length: 255, nullable: true)]
    private ?string $dsParentescoOutro = null;

    #[ORM\Column(name: 'vl_renda_bruta', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlRendaBruta = 0.0;

    #[ORM\Column(name: 'vl_renda_liquida', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlRendaLiquida = 0.0;

    #[ORM\Column(name: 'ds_empresa', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsEmpresa = '';

    #[ORM\Column(name: 'ds_profissao', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsProfissao = '';

    #[ORM\Column(name: 'ds_telefone_trabalho', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsTelefoneTrabalho = '';

    #[ORM\Column(name: 'ds_endereco_trabalho', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsEnderecoTrabalho = '';

    #[ORM\Column(name: 'cd_situacao_profissional', type: 'integer', nullable: true, options: ['comment' => '0 - Não possui renda
1 - Empregado
3 - Aposentado
4 - Autônomo
5 - Profissional liberal
6 - Microempreendedor individual
7 - Servidor público'])]
    private ?int $cdSituacaoProfissional = null;

    #[ORM\Column(name: 'cd_situacao_familiar', type: 'integer', nullable: true)]
    private ?int $cdSituacaoFamiliar = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?BlsaProcessoPessoa $cdProcessoPessoa = null,
        ?Pessoas $cdPessoa = null,
        ?PessoasParentescoTipos $cdParentesco = null,
        ?string $dsNome = null,
        ?\DateTimeInterface $dtNascimento = null,
        ?string $dsParentescoOutro = null,
        ?float $vlRendaBruta = 0.0,
        ?float $vlRendaLiquida = 0.0,
        ?string $dsEmpresa = '',
        ?string $dsProfissao = '',
        ?string $dsTelefoneTrabalho = '',
        ?string $dsEnderecoTrabalho = '',
        ?int $cdSituacaoProfissional = null,
        ?int $cdSituacaoFamiliar = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        $this->cdPessoa = $cdPessoa;
        $this->cdParentesco = $cdParentesco;
        $this->dsNome = $dsNome;
        $this->dtNascimento = $dtNascimento;
        $this->dsParentescoOutro = $dsParentescoOutro;
        $this->vlRendaBruta = $vlRendaBruta;
        $this->vlRendaLiquida = $vlRendaLiquida;
        $this->dsEmpresa = $dsEmpresa;
        $this->dsProfissao = $dsProfissao;
        $this->dsTelefoneTrabalho = $dsTelefoneTrabalho;
        $this->dsEnderecoTrabalho = $dsEnderecoTrabalho;
        $this->cdSituacaoProfissional = $cdSituacaoProfissional;
        $this->cdSituacaoFamiliar = $cdSituacaoFamiliar;
        $this->dtBase = $dtBase;
    }

    public function getCdProcessoPessoaFamilia(): ?int
    {
        return $this->cdProcessoPessoaFamilia;
    }

    public function getCdProcessoPessoa(): ?BlsaProcessoPessoa
    {
        return $this->cdProcessoPessoa;
    }

    public function setCdProcessoPessoa(?BlsaProcessoPessoa $cdProcessoPessoa): self
    {
        $this->cdProcessoPessoa = $cdProcessoPessoa;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdParentesco(): ?PessoasParentescoTipos
    {
        return $this->cdParentesco;
    }

    public function setCdParentesco(?PessoasParentescoTipos $cdParentesco): self
    {
        $this->cdParentesco = $cdParentesco;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
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

    public function getDsParentescoOutro(): ?string
    {
        return $this->dsParentescoOutro;
    }

    public function setDsParentescoOutro(?string $dsParentescoOutro): self
    {
        $this->dsParentescoOutro = $dsParentescoOutro;
        return $this;
    }

    public function getVlRendaBruta(): ?float
    {
        return $this->vlRendaBruta;
    }

    public function setVlRendaBruta(?float $vlRendaBruta): self
    {
        $this->vlRendaBruta = $vlRendaBruta;
        return $this;
    }

    public function getVlRendaLiquida(): ?float
    {
        return $this->vlRendaLiquida;
    }

    public function setVlRendaLiquida(?float $vlRendaLiquida): self
    {
        $this->vlRendaLiquida = $vlRendaLiquida;
        return $this;
    }

    public function getDsEmpresa(): ?string
    {
        return $this->dsEmpresa;
    }

    public function setDsEmpresa(?string $dsEmpresa): self
    {
        $this->dsEmpresa = $dsEmpresa;
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

    public function getDsTelefoneTrabalho(): ?string
    {
        return $this->dsTelefoneTrabalho;
    }

    public function setDsTelefoneTrabalho(?string $dsTelefoneTrabalho): self
    {
        $this->dsTelefoneTrabalho = $dsTelefoneTrabalho;
        return $this;
    }

    public function getDsEnderecoTrabalho(): ?string
    {
        return $this->dsEnderecoTrabalho;
    }

    public function setDsEnderecoTrabalho(?string $dsEnderecoTrabalho): self
    {
        $this->dsEnderecoTrabalho = $dsEnderecoTrabalho;
        return $this;
    }

    public function getCdSituacaoProfissional(): ?int
    {
        return $this->cdSituacaoProfissional;
    }

    public function setCdSituacaoProfissional(?int $cdSituacaoProfissional): self
    {
        $this->cdSituacaoProfissional = $cdSituacaoProfissional;
        return $this;
    }

    public function getCdSituacaoFamiliar(): ?int
    {
        return $this->cdSituacaoFamiliar;
    }

    public function setCdSituacaoFamiliar(?int $cdSituacaoFamiliar): self
    {
        $this->cdSituacaoFamiliar = $cdSituacaoFamiliar;
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
