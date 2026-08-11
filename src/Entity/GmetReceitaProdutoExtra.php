<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\GmetReceitaProdutoExtraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GmetReceitaProdutoExtraRepository::class)]
#[ORM\Table(
    name: 'gmet_receita_produto_extra',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_produto', columns: ['cd_produto'])]
#[ORM\Index(name: 'cd_receita', columns: ['cd_receita'])]
#[ORM\Index(name: 'cd_aula', columns: ['cd_aula'])]
#[ORM\Index(name: 'IX_ID_PRODUTO_EXTRA', columns: ['id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'gmet_receita_produto_extra_ibfk_1', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'gmet_receita_produto_extra_ibfk_2', 'colunas' => ['cd_receita'], 'tabelaAlvo' => 'gmet_receita', 'colunasAlvo' => ['cd_receita'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'gmet_receita_produto_extra_ibfk_3', 'colunas' => ['cd_aula'], 'tabelaAlvo' => 'gmet_aula', 'colunasAlvo' => ['cd_aula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GmetReceitaProdutoExtra
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: GmetReceita::class)]
    #[ORM\JoinColumn(name: 'cd_receita', referencedColumnName: 'cd_receita', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?GmetReceita $cdReceita = null;

    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\Column(name: 'nr_qtd', type: 'float', nullable: true, options: ['default' => '0.00'])]
    private ?float $nrQtd = 0.0;

    #[ORM\Column(name: 'sn_ingrediente', type: 'boolean', nullable: true)]
    private ?bool $snIngrediente = null;

    #[ORM\ManyToOne(targetEntity: GmetAula::class)]
    #[ORM\JoinColumn(name: 'cd_aula', referencedColumnName: 'cd_aula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?GmetAula $cdAula = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?GmetReceita $cdReceita = null,
        ?CmprProduto $cdProduto = null,
        ?float $nrQtd = 0.0,
        ?bool $snIngrediente = null,
        ?GmetAula $cdAula = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReceita = $cdReceita;
        $this->cdProduto = $cdProduto;
        $this->nrQtd = $nrQtd;
        $this->snIngrediente = $snIngrediente;
        $this->cdAula = $cdAula;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCdAula(): ?GmetAula
    {
        return $this->cdAula;
    }

    public function setCdAula(?GmetAula $cdAula): self
    {
        $this->cdAula = $cdAula;
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
