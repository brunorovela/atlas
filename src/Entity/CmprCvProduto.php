<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprCvProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCvProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cv_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cv_produto_cd_produto', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_cmpr_cv_produto_cd_vendedor', columns: ['cd_vencedor'])]
#[ORM\Index(name: 'IX_cmpr_cv_produto_cd_vencedor', columns: ['cd_vencedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cv_produto_ibfk_1', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cv_produto_ibfk_2', 'colunas' => ['cd_vencedor'], 'tabelaAlvo' => 'cmpr_cotacao_vencedor', 'colunasAlvo' => ['cd_vencedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCvProduto
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCotacaoVencedor::class)]
    #[ORM\JoinColumn(name: 'cd_vencedor', referencedColumnName: 'cd_vencedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoVencedor $cdVencedor = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_almoxarifado', type: 'integer', options: ['default' => '0'])]
    private int $cdAlmoxarifado = 0;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrQuantidade = null;

    #[ORM\Column(name: 'nr_baixado', type: 'integer', nullable: true)]
    private ?int $nrBaixado = null;

    #[ORM\Column(name: 'nr_devolvido', type: 'integer', nullable: true)]
    private ?int $nrDevolvido = null;

    public function __construct(
        ?CmprProduto $cdProduto = null,
        ?CmprCotacaoVencedor $cdVencedor = null,
        int $cdAlmoxarifado = 0,
        ?float $vlValor = null,
        ?string $dsDescricao = null,
        ?int $nrQuantidade = null,
        ?int $nrBaixado = null,
        ?int $nrDevolvido = null
    ) {
        $this->cdProduto = $cdProduto;
        $this->cdVencedor = $cdVencedor;
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        $this->vlValor = $vlValor;
        $this->dsDescricao = $dsDescricao;
        $this->nrQuantidade = $nrQuantidade;
        $this->nrBaixado = $nrBaixado;
        $this->nrDevolvido = $nrDevolvido;
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

    public function getCdVencedor(): ?CmprCotacaoVencedor
    {
        return $this->cdVencedor;
    }

    public function setCdVencedor(?CmprCotacaoVencedor $cdVencedor): self
    {
        $this->cdVencedor = $cdVencedor;
        return $this;
    }

    public function getCdAlmoxarifado(): int
    {
        return $this->cdAlmoxarifado;
    }

    public function setCdAlmoxarifado(int $cdAlmoxarifado): self
    {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
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

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getNrBaixado(): ?int
    {
        return $this->nrBaixado;
    }

    public function setNrBaixado(?int $nrBaixado): self
    {
        $this->nrBaixado = $nrBaixado;
        return $this;
    }

    public function getNrDevolvido(): ?int
    {
        return $this->nrDevolvido;
    }

    public function setNrDevolvido(?int $nrDevolvido): self
    {
        $this->nrDevolvido = $nrDevolvido;
        return $this;
    }
}
