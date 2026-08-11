<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_PRODUTO_CD_CATEGORIA', columns: ['cd_categoria'])]
#[ORM\Index(name: 'IX_CMPR_PRODUTO_CD_UNIDADE', columns: ['cd_unidade'])]
#[ORM\Index(name: 'IX_CMPR_PRODUTO_CD_CONTA', columns: ['cd_conta'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_produto_ibfk_1', 'colunas' => ['cd_categoria'], 'tabelaAlvo' => 'cmpr_categoria', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_produto_ibfk_2', 'colunas' => ['cd_unidade'], 'tabelaAlvo' => 'cmpr_unidade_medida', 'colunasAlvo' => ['cd_unidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_produto_ibfk_3', 'colunas' => ['cd_conta'], 'tabelaAlvo' => 'fin_config_plano_contas', 'colunasAlvo' => ['cd_conta'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprProduto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_produto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProduto = null;

    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\ManyToOne(targetEntity: CmprUnidadeMedida::class)]
    #[ORM\JoinColumn(name: 'cd_unidade', referencedColumnName: 'cd_unidade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprUnidadeMedida $cdUnidade = null;

    #[ORM\ManyToOne(targetEntity: CmprCategoria::class)]
    #[ORM\JoinColumn(name: 'cd_categoria', referencedColumnName: 'cd_categoria', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCategoria $cdCategoria = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'nr_estoque_minimo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrEstoqueMinimo = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'nr_minimo_fornecedor', type: 'string', length: 255, nullable: true)]
    private ?string $nrMinimoFornecedor = null;

    #[ORM\Column(name: 'nr_estoque_ideal', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrEstoqueIdeal = null;

    #[ORM\Column(name: 'sn_uso_temporario', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snUsoTemporario = false;

    #[ORM\Column(name: 'sn_ingrediente', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snIngrediente = false;

    public function __construct(
        ?int $cdConta = null,
        ?CmprUnidadeMedida $cdUnidade = null,
        ?CmprCategoria $cdCategoria = null,
        ?string $dsNome = null,
        ?int $nrEstoqueMinimo = null,
        ?string $dsDescricao = null,
        ?int $snAtivo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?string $nrMinimoFornecedor = null,
        ?int $nrEstoqueIdeal = null,
        ?bool $snUsoTemporario = false,
        ?bool $snIngrediente = false
    ) {
        $this->cdConta = $cdConta;
        $this->cdUnidade = $cdUnidade;
        $this->cdCategoria = $cdCategoria;
        $this->dsNome = $dsNome;
        $this->nrEstoqueMinimo = $nrEstoqueMinimo;
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->nrMinimoFornecedor = $nrMinimoFornecedor;
        $this->nrEstoqueIdeal = $nrEstoqueIdeal;
        $this->snUsoTemporario = $snUsoTemporario;
        $this->snIngrediente = $snIngrediente;
    }

    public function getCdProduto(): ?int
    {
        return $this->cdProduto;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdUnidade(): ?CmprUnidadeMedida
    {
        return $this->cdUnidade;
    }

    public function setCdUnidade(?CmprUnidadeMedida $cdUnidade): self
    {
        $this->cdUnidade = $cdUnidade;
        return $this;
    }

    public function getCdCategoria(): ?CmprCategoria
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?CmprCategoria $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
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

    public function getNrEstoqueMinimo(): ?int
    {
        return $this->nrEstoqueMinimo;
    }

    public function setNrEstoqueMinimo(?int $nrEstoqueMinimo): self
    {
        $this->nrEstoqueMinimo = $nrEstoqueMinimo;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getNrMinimoFornecedor(): ?string
    {
        return $this->nrMinimoFornecedor;
    }

    public function setNrMinimoFornecedor(?string $nrMinimoFornecedor): self
    {
        $this->nrMinimoFornecedor = $nrMinimoFornecedor;
        return $this;
    }

    public function getNrEstoqueIdeal(): ?int
    {
        return $this->nrEstoqueIdeal;
    }

    public function setNrEstoqueIdeal(?int $nrEstoqueIdeal): self
    {
        $this->nrEstoqueIdeal = $nrEstoqueIdeal;
        return $this;
    }

    public function isSnUsoTemporario(): ?bool
    {
        return $this->snUsoTemporario;
    }

    public function setSnUsoTemporario(?bool $snUsoTemporario): self
    {
        $this->snUsoTemporario = $snUsoTemporario;
        return $this;
    }

    public function isSnIngrediente(): ?bool
    {
        return $this->snIngrediente;
    }

    public function setSnIngrediente(?bool $snIngrediente): self
    {
        $this->snIngrediente = $snIngrediente;
        return $this;
    }
}
