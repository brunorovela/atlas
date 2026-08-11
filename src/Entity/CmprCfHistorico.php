<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCfHistoricoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCfHistoricoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cf_historico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cf_historico_cd_cotacao_fornecedor', columns: ['cd_cotacao_fornecedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cf_historico_ibfk_1', 'colunas' => ['cd_cotacao_fornecedor'], 'tabelaAlvo' => 'cmpr_cotacao_fornecedor', 'colunasAlvo' => ['cd_cotacao_fornecedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_cf_historico']
)]
class CmprCfHistorico
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_cf_historico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCfHistorico = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCotacaoFornecedor::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao_fornecedor', referencedColumnName: 'cd_cotacao_fornecedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null;

    #[ORM\Column(name: 'dt_cotacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCotacao = null;

    #[ORM\Column(name: 'vl_produtos', type: 'float', nullable: true)]
    private ?float $vlProdutos = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'vl_frete', type: 'float', nullable: true)]
    private ?float $vlFrete = null;

    #[ORM\Column(name: 'vl_total', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'sn_finalizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snFinalizado = null;

    #[ORM\Column(name: 'nr_entrega', type: 'integer', nullable: true)]
    private ?int $nrEntrega = null;

    public function __construct(
        ?int $cdCfHistorico = null,
        ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null,
        ?\DateTimeInterface $dtCotacao = null,
        ?float $vlProdutos = null,
        ?float $vlDesconto = null,
        ?float $vlFrete = null,
        ?float $vlTotal = null,
        ?string $meObservacao = null,
        ?int $snFinalizado = null,
        ?int $nrEntrega = null
    ) {
        $this->cdCfHistorico = $cdCfHistorico;
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        $this->dtCotacao = $dtCotacao;
        $this->vlProdutos = $vlProdutos;
        $this->vlDesconto = $vlDesconto;
        $this->vlFrete = $vlFrete;
        $this->vlTotal = $vlTotal;
        $this->meObservacao = $meObservacao;
        $this->snFinalizado = $snFinalizado;
        $this->nrEntrega = $nrEntrega;
    }

    public function getCdCfHistorico(): ?int
    {
        return $this->cdCfHistorico;
    }

    public function setCdCfHistorico(?int $cdCfHistorico): self
    {
        $this->cdCfHistorico = $cdCfHistorico;
        return $this;
    }

    public function getCdCotacaoFornecedor(): ?CmprCotacaoFornecedor
    {
        return $this->cdCotacaoFornecedor;
    }

    public function setCdCotacaoFornecedor(?CmprCotacaoFornecedor $cdCotacaoFornecedor): self
    {
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        return $this;
    }

    public function getDtCotacao(): ?\DateTimeInterface
    {
        return $this->dtCotacao;
    }

    public function setDtCotacao(?\DateTimeInterface $dtCotacao): self
    {
        $this->dtCotacao = $dtCotacao;
        return $this;
    }

    public function getVlProdutos(): ?float
    {
        return $this->vlProdutos;
    }

    public function setVlProdutos(?float $vlProdutos): self
    {
        $this->vlProdutos = $vlProdutos;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlFrete(): ?float
    {
        return $this->vlFrete;
    }

    public function setVlFrete(?float $vlFrete): self
    {
        $this->vlFrete = $vlFrete;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getSnFinalizado(): ?int
    {
        return $this->snFinalizado;
    }

    public function setSnFinalizado(?int $snFinalizado): self
    {
        $this->snFinalizado = $snFinalizado;
        return $this;
    }

    public function getNrEntrega(): ?int
    {
        return $this->nrEntrega;
    }

    public function setNrEntrega(?int $nrEntrega): self
    {
        $this->nrEntrega = $nrEntrega;
        return $this;
    }
}
