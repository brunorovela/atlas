<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprMovEstoqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprMovEstoqueRepository::class)]
#[ORM\Table(
    name: 'cmpr_mov_estoque',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_MOV_TIPO', columns: ['cd_mov_tipo'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_PESSOA_FORNECEDOR', columns: ['cd_pessoa_fornecedor'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_PRODUTO_CD_PESSOA_FORNECEDOR', columns: ['cd_produto', 'cd_pessoa_fornecedor'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_REQ_PRODUTO', columns: ['cd_req_produto'])]
#[ORM\Index(name: 'cd_pessoa_fornecedor', columns: ['cd_pessoa_fornecedor', 'cd_produto'])]
#[ORM\Index(name: 'IX_CMPR_MOV_ESTOQUE_CD_PESSOA_FORNECEDOR_CD_PRODUTO', columns: ['cd_pessoa_fornecedor', 'cd_produto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_mov_estoque_ibfk_1', 'colunas' => ['cd_mov_tipo'], 'tabelaAlvo' => 'cmpr_mov_estoque_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_mov_estoque_ibfk_2', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_mov_estoque_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_mov_estoque_ibfk_4', 'colunas' => ['cd_req_produto'], 'tabelaAlvo' => 'cmpr_req_produto', 'colunasAlvo' => ['cd_req_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_mov_estoque_ibfk_5', 'colunas' => ['cd_pessoa_fornecedor', 'cd_produto'], 'tabelaAlvo' => 'cmpr_fornecedor_produto', 'colunasAlvo' => ['cd_pessoa', 'cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprMovEstoque
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_movimento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMovimento = null;

    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'cd_pessoa_fornecedor', type: 'integer', nullable: true)]
    private ?int $cdPessoaFornecedor = null;

    #[ORM\ManyToOne(targetEntity: CmprMovEstoqueTipos::class)]
    #[ORM\JoinColumn(name: 'cd_mov_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprMovEstoqueTipos $cdMovTipo = null;

    #[ORM\ManyToOne(targetEntity: CmprReqProduto::class)]
    #[ORM\JoinColumn(name: 'cd_req_produto', referencedColumnName: 'cd_req_produto', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqProduto $cdReqProduto = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQuantidade = 0;

    #[ORM\Column(name: 'vl_produto', type: 'float', nullable: true)]
    private ?float $vlProduto = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_aquisicao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAquisicao = null;

    #[ORM\Column(name: 'cd_almoxarifado', type: 'integer')]
    private ?int $cdAlmoxarifado = null;

    public function __construct(
        ?CmprProduto $cdProduto = null,
        ?Pessoas $cdPessoa = null,
        ?int $cdPessoaFornecedor = null,
        ?CmprMovEstoqueTipos $cdMovTipo = null,
        ?CmprReqProduto $cdReqProduto = null,
        ?string $meDescricao = null,
        ?int $nrQuantidade = 0,
        ?float $vlProduto = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAquisicao = null,
        ?int $cdAlmoxarifado = null
    ) {
        $this->cdProduto = $cdProduto;
        $this->cdPessoa = $cdPessoa;
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
        $this->cdMovTipo = $cdMovTipo;
        $this->cdReqProduto = $cdReqProduto;
        $this->meDescricao = $meDescricao;
        $this->nrQuantidade = $nrQuantidade;
        $this->vlProduto = $vlProduto;
        $this->dtCadastro = $dtCadastro;
        $this->dtAquisicao = $dtAquisicao;
        $this->cdAlmoxarifado = $cdAlmoxarifado;
    }

    public function getCdMovimento(): ?int
    {
        return $this->cdMovimento;
    }

    public function getCdProduto(): ?CmprProduto
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?CmprProduto $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
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

    public function getCdPessoaFornecedor(): ?int
    {
        return $this->cdPessoaFornecedor;
    }

    public function setCdPessoaFornecedor(?int $cdPessoaFornecedor): self
    {
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
        return $this;
    }

    public function getCdMovTipo(): ?CmprMovEstoqueTipos
    {
        return $this->cdMovTipo;
    }

    public function setCdMovTipo(?CmprMovEstoqueTipos $cdMovTipo): self
    {
        $this->cdMovTipo = $cdMovTipo;
        return $this;
    }

    public function getCdReqProduto(): ?CmprReqProduto
    {
        return $this->cdReqProduto;
    }

    public function setCdReqProduto(?CmprReqProduto $cdReqProduto): self
    {
        $this->cdReqProduto = $cdReqProduto;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getVlProduto(): ?float
    {
        return $this->vlProduto;
    }

    public function setVlProduto(?float $vlProduto): self
    {
        $this->vlProduto = $vlProduto;
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

    public function getDtAquisicao(): ?\DateTimeInterface
    {
        return $this->dtAquisicao;
    }

    public function setDtAquisicao(?\DateTimeInterface $dtAquisicao): self
    {
        $this->dtAquisicao = $dtAquisicao;
        return $this;
    }

    public function getCdAlmoxarifado(): ?int
    {
        return $this->cdAlmoxarifado;
    }

    public function setCdAlmoxarifado(?int $cdAlmoxarifado): self
    {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        return $this;
    }
}
