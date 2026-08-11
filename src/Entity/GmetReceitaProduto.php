<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\GmetReceitaProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GmetReceitaProdutoRepository::class)]
#[ORM\Table(
    name: 'gmet_receita_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CMPR_PRODUTO_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'FK_GMET_RECEITA_CD_RECEITA', columns: ['cd_receita'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CMPR_PRODUTO_CD_PRODUTO', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_GMET_RECEITA_CD_RECEITA', 'colunas' => ['cd_receita'], 'tabelaAlvo' => 'gmet_receita', 'colunasAlvo' => ['cd_receita'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GmetReceitaProduto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_receita_produto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReceitaProduto = null;

    #[ORM\ManyToOne(targetEntity: GmetReceita::class)]
    #[ORM\JoinColumn(name: 'cd_receita', referencedColumnName: 'cd_receita', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?GmetReceita $cdReceita = null;

    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\Column(name: 'nr_qtd', type: 'float', nullable: true)]
    private ?float $nrQtd = null;

    #[ORM\Column(name: 'sn_ingrediente', type: 'boolean', nullable: true)]
    private ?bool $snIngrediente = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?GmetReceita $cdReceita = null,
        ?CmprProduto $cdProduto = null,
        ?float $nrQtd = null,
        ?bool $snIngrediente = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReceita = $cdReceita;
        $this->cdProduto = $cdProduto;
        $this->nrQtd = $nrQtd;
        $this->snIngrediente = $snIngrediente;
        $this->dtBase = $dtBase;
    }

    public function getCdReceitaProduto(): ?int
    {
        return $this->cdReceitaProduto;
    }

    public function getCdReceita(): ?GmetReceita
    {
        return $this->cdReceita;
    }

    public function setCdReceita(?GmetReceita $cdReceita): self
    {
        $this->cdReceita = $cdReceita;
        return $this;
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

    public function getNrQtd(): ?float
    {
        return $this->nrQtd;
    }

    public function setNrQtd(?float $nrQtd): self
    {
        $this->nrQtd = $nrQtd;
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
