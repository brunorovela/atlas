<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CtnVendasProdutosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnVendasProdutosRepository::class)]
#[ORM\Table(
    name: 'ctn_vendas_produtos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_CD_VENDA', columns: ['cd_venda'])]
#[ORM\Index(name: 'IX_CD_VENDA_PRODUTO', columns: ['cd_venda_produto'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CANTINA_VENDA_CD_PRODUTO', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'comp_produtos', 'colunasAlvo' => ['CD_PRODUTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnVendasProdutos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_venda_produto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVendaProduto = null;

    #[ORM\Column(name: 'cd_venda', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVenda = null;

    #[ORM\ManyToOne(targetEntity: CompProdutos::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'CD_PRODUTO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompProdutos $cdProduto = null;

    #[ORM\Column(name: 'vl_unitario', type: 'float', nullable: true)]
    private ?float $vlUnitario = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $nrQuantidade = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdVenda = null,
        ?CompProdutos $cdProduto = null,
        ?float $vlUnitario = null,
        ?int $nrQuantidade = 1,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdVenda = $cdVenda;
        $this->cdProduto = $cdProduto;
        $this->vlUnitario = $vlUnitario;
        $this->nrQuantidade = $nrQuantidade;
        $this->dtBase = $dtBase;
    }

    public function getCdVendaProduto(): ?int
    {
        return $this->cdVendaProduto;
    }

    public function getCdVenda(): ?int
    {
        return $this->cdVenda;
    }

    public function setCdVenda(?int $cdVenda): self
    {
        $this->cdVenda = $cdVenda;
        return $this;
    }

    public function getCdProduto(): ?CompProdutos
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?CompProdutos $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
        return $this;
    }

    public function getVlUnitario(): ?float
    {
        return $this->vlUnitario;
    }

    public function setVlUnitario(?float $vlUnitario): self
    {
        $this->vlUnitario = $vlUnitario;
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
