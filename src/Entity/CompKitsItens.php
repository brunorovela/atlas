<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CompKitsItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompKitsItensRepository::class)]
#[ORM\Table(
    name: 'comp_kits_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para cadastro dos itens de cada kit.']
)]
#[ORM\Index(name: 'IX_CD_KIT', columns: ['cd_kit'])]
#[ORM\Index(name: 'IX_CD_PRODUTO', columns: ['cd_produto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ITENS_KITS', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'comp_produtos', 'colunasAlvo' => ['CD_PRODUTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_KITS_ITENS', 'colunas' => ['cd_kit'], 'tabelaAlvo' => 'comp_kits', 'colunasAlvo' => ['cd_kit'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompKitsItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_kit_itens', type: 'integer')]
    private ?int $cdKitItens = null;

    #[ORM\ManyToOne(targetEntity: CompKits::class)]
    #[ORM\JoinColumn(name: 'cd_kit', referencedColumnName: 'cd_kit', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompKits $cdKit = null;

    #[ORM\ManyToOne(targetEntity: CompProdutos::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'CD_PRODUTO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompProdutos $cdProduto = null;

    #[ORM\Column(name: 'nr_quantidade', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrQuantidade = null;

    public function __construct(
        ?CompKits $cdKit = null,
        ?CompProdutos $cdProduto = null,
        ?int $nrQuantidade = null
    ) {
        $this->cdKit = $cdKit;
        $this->cdProduto = $cdProduto;
        $this->nrQuantidade = $nrQuantidade;
    }

    public function getCdKitItens(): ?int
    {
        return $this->cdKitItens;
    }

    public function getCdKit(): ?CompKits
    {
        return $this->cdKit;
    }

    public function setCdKit(?CompKits $cdKit): self
    {
        $this->cdKit = $cdKit;
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

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }
}
