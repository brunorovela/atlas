<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CompProdutosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompProdutosRepository::class)]
#[ORM\Table(
    name: 'comp_produtos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'comp_produtos_ibfk_1', columns: ['CD_CATEGORIA'])]
#[ORM\Index(name: 'IX_CD_CATEGORIA', columns: ['CD_CATEGORIA'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'comp_produtos_ibfk_1', 'colunas' => ['CD_CATEGORIA'], 'tabelaAlvo' => 'comp_categorias', 'colunasAlvo' => ['CD_CATEGORIA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompProdutos
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_PRODUTO', type: 'string', length: 30)]
    private ?string $cdProduto = null;

    #[ORM\ManyToOne(targetEntity: CompCategorias::class)]
    #[ORM\JoinColumn(name: 'CD_CATEGORIA', referencedColumnName: 'CD_CATEGORIA', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompCategorias $cdCategoria = null;

    #[ORM\Column(name: 'DS_PRODUTO', type: 'string', length: 255)]
    private ?string $dsProduto = null;

    #[ORM\Column(name: 'VL_PRODUTO', type: 'float', nullable: true)]
    private ?float $vlProduto = null;

    #[ORM\Column(name: 'SN_GERAR_TITULO', type: 'boolean', options: ['default' => '0'])]
    private bool $snGerarTitulo = false;

    #[ORM\Column(name: 'SN_ACUMULAR_VALORES', type: 'boolean', options: ['default' => '0'])]
    private bool $snAcumularValores = false;

    #[ORM\Column(name: 'SN_IMPRIMIR_CUPOM', type: 'boolean', options: ['default' => '0'])]
    private bool $snImprimirCupom = false;

    #[ORM\Column(name: 'TP_IMPRESSAO_CUPOM', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'I', 'comment' => 'I = Individual / A = Agrupado'])]
    private string $tpImpressaoCupom = 'I';

    #[ORM\Column(name: 'NR_LIMITE', type: 'integer', nullable: true)]
    private ?int $nrLimite = null;

    #[ORM\Column(name: 'SN_LIMIT_POR_ANO_SEM', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLimitPorAnoSem = false;

    #[ORM\Column(name: 'NR_PARCELAS', type: 'smallint', options: ['default' => '1'])]
    private int $nrParcelas = 1;

    #[ORM\Column(name: 'IM_PRODUTO', type: 'blob', length: 65535, nullable: true)]
    private ?string $imProduto = null;

    #[ORM\Column(name: 'DS_ADICIONAIS', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsAdicionais = null;

    #[ORM\Column(name: 'SN_PRODUTO_INCLUSO', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProdutoIncluso = false;

    #[ORM\Column(name: 'SN_CANTINA_ESTOQUE', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCantinaEstoque = false;

    #[ORM\Column(name: 'NR_ESTOQUE_MIN', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrEstoqueMin = null;

    #[ORM\Column(name: 'SN_BAIXAR_TITULO_AUTO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBaixarTituloAuto = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'SN_ESTOQUE_POR_COLIGADA', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snEstoquePorColigada = 0;

    public function __construct(
        ?string $cdProduto = null,
        ?CompCategorias $cdCategoria = null,
        ?string $dsProduto = null,
        ?float $vlProduto = null,
        bool $snGerarTitulo = false,
        bool $snAcumularValores = false,
        bool $snImprimirCupom = false,
        string $tpImpressaoCupom = 'I',
        ?int $nrLimite = null,
        ?bool $snLimitPorAnoSem = false,
        int $nrParcelas = 1,
        ?string $imProduto = null,
        ?string $dsAdicionais = null,
        ?bool $snProdutoIncluso = false,
        ?bool $snCantinaEstoque = false,
        ?int $nrEstoqueMin = null,
        int $snBaixarTituloAuto = 0,
        ?\DateTimeInterface $dtBase = null,
        ?int $snEstoquePorColigada = 0
    ) {
        $this->cdProduto = $cdProduto;
        $this->cdCategoria = $cdCategoria;
        $this->dsProduto = $dsProduto;
        $this->vlProduto = $vlProduto;
        $this->snGerarTitulo = $snGerarTitulo;
        $this->snAcumularValores = $snAcumularValores;
        $this->snImprimirCupom = $snImprimirCupom;
        $this->tpImpressaoCupom = $tpImpressaoCupom;
        $this->nrLimite = $nrLimite;
        $this->snLimitPorAnoSem = $snLimitPorAnoSem;
        $this->nrParcelas = $nrParcelas;
        $this->imProduto = $imProduto;
        $this->dsAdicionais = $dsAdicionais;
        $this->snProdutoIncluso = $snProdutoIncluso;
        $this->snCantinaEstoque = $snCantinaEstoque;
        $this->nrEstoqueMin = $nrEstoqueMin;
        $this->snBaixarTituloAuto = $snBaixarTituloAuto;
        $this->dtBase = $dtBase;
        $this->snEstoquePorColigada = $snEstoquePorColigada;
    }

    public function getCdProduto(): ?string
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?string $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
        return $this;
    }

    public function getCdCategoria(): ?CompCategorias
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?CompCategorias $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getDsProduto(): ?string
    {
        return $this->dsProduto;
    }

    public function setDsProduto(?string $dsProduto): self
    {
        $this->dsProduto = $dsProduto;
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

    public function isSnGerarTitulo(): bool
    {
        return $this->snGerarTitulo;
    }

    public function setSnGerarTitulo(bool $snGerarTitulo): self
    {
        $this->snGerarTitulo = $snGerarTitulo;
        return $this;
    }

    public function isSnAcumularValores(): bool
    {
        return $this->snAcumularValores;
    }

    public function setSnAcumularValores(bool $snAcumularValores): self
    {
        $this->snAcumularValores = $snAcumularValores;
        return $this;
    }

    public function isSnImprimirCupom(): bool
    {
        return $this->snImprimirCupom;
    }

    public function setSnImprimirCupom(bool $snImprimirCupom): self
    {
        $this->snImprimirCupom = $snImprimirCupom;
        return $this;
    }

    public function getTpImpressaoCupom(): string
    {
        return $this->tpImpressaoCupom;
    }

    public function setTpImpressaoCupom(string $tpImpressaoCupom): self
    {
        $this->tpImpressaoCupom = $tpImpressaoCupom;
        return $this;
    }

    public function getNrLimite(): ?int
    {
        return $this->nrLimite;
    }

    public function setNrLimite(?int $nrLimite): self
    {
        $this->nrLimite = $nrLimite;
        return $this;
    }

    public function isSnLimitPorAnoSem(): ?bool
    {
        return $this->snLimitPorAnoSem;
    }

    public function setSnLimitPorAnoSem(?bool $snLimitPorAnoSem): self
    {
        $this->snLimitPorAnoSem = $snLimitPorAnoSem;
        return $this;
    }

    public function getNrParcelas(): int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getImProduto(): ?string
    {
        return $this->imProduto;
    }

    public function setImProduto(?string $imProduto): self
    {
        $this->imProduto = $imProduto;
        return $this;
    }

    public function getDsAdicionais(): ?string
    {
        return $this->dsAdicionais;
    }

    public function setDsAdicionais(?string $dsAdicionais): self
    {
        $this->dsAdicionais = $dsAdicionais;
        return $this;
    }

    public function isSnProdutoIncluso(): ?bool
    {
        return $this->snProdutoIncluso;
    }

    public function setSnProdutoIncluso(?bool $snProdutoIncluso): self
    {
        $this->snProdutoIncluso = $snProdutoIncluso;
        return $this;
    }

    public function isSnCantinaEstoque(): ?bool
    {
        return $this->snCantinaEstoque;
    }

    public function setSnCantinaEstoque(?bool $snCantinaEstoque): self
    {
        $this->snCantinaEstoque = $snCantinaEstoque;
        return $this;
    }

    public function getNrEstoqueMin(): ?int
    {
        return $this->nrEstoqueMin;
    }

    public function setNrEstoqueMin(?int $nrEstoqueMin): self
    {
        $this->nrEstoqueMin = $nrEstoqueMin;
        return $this;
    }

    public function getSnBaixarTituloAuto(): int
    {
        return $this->snBaixarTituloAuto;
    }

    public function setSnBaixarTituloAuto(int $snBaixarTituloAuto): self
    {
        $this->snBaixarTituloAuto = $snBaixarTituloAuto;
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

    public function getSnEstoquePorColigada(): ?int
    {
        return $this->snEstoquePorColigada;
    }

    public function setSnEstoquePorColigada(?int $snEstoquePorColigada): self
    {
        $this->snEstoquePorColigada = $snEstoquePorColigada;
        return $this;
    }
}
