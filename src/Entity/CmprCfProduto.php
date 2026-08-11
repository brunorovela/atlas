<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCfProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCfProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cf_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cf_produto_cd_cf_historico', columns: ['cd_cf_historico'])]
#[ORM\Index(name: 'IX_cmpr_cf_produto_cd_cotacao', columns: ['cd_cotacao'])]
#[ORM\Index(name: 'IX_cmpr_cf_produto_cd_req_comprar', columns: ['cd_req_comprar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cf_produto_ibfk_1', 'colunas' => ['cd_cotacao'], 'tabelaAlvo' => 'cmpr_cotacao', 'colunasAlvo' => ['cd_cotacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cf_produto_ibfk_2', 'colunas' => ['cd_req_comprar'], 'tabelaAlvo' => 'cmpr_req_para_comprar', 'colunasAlvo' => ['cd_req_comprar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cf_produto_ibfk_3', 'colunas' => ['cd_cf_historico'], 'tabelaAlvo' => 'cmpr_cf_historico', 'colunasAlvo' => ['cd_cf_historico'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCfProduto
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_cf_historico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCfHistorico = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCotacao::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao', referencedColumnName: 'cd_cotacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacao $cdCotacao = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprReqParaComprar::class)]
    #[ORM\JoinColumn(name: 'cd_req_comprar', referencedColumnName: 'cd_req_comprar', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqParaComprar $cdReqComprar = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_nao_atender', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snNaoAtender = null;

    public function __construct(
        ?int $cdCfHistorico = null,
        ?CmprCotacao $cdCotacao = null,
        ?CmprReqParaComprar $cdReqComprar = null,
        ?float $vlValor = null,
        ?string $dsDescricao = null,
        ?int $snNaoAtender = null
    ) {
        $this->cdCfHistorico = $cdCfHistorico;
        $this->cdCotacao = $cdCotacao;
        $this->cdReqComprar = $cdReqComprar;
        $this->vlValor = $vlValor;
        $this->dsDescricao = $dsDescricao;
        $this->snNaoAtender = $snNaoAtender;
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

    public function getCdCotacao(): ?CmprCotacao
    {
        return $this->cdCotacao;
    }

    public function setCdCotacao(?CmprCotacao $cdCotacao): self
    {
        $this->cdCotacao = $cdCotacao;
        return $this;
    }

    public function getCdReqComprar(): ?CmprReqParaComprar
    {
        return $this->cdReqComprar;
    }

    public function setCdReqComprar(?CmprReqParaComprar $cdReqComprar): self
    {
        $this->cdReqComprar = $cdReqComprar;
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

    public function getSnNaoAtender(): ?int
    {
        return $this->snNaoAtender;
    }

    public function setSnNaoAtender(?int $snNaoAtender): self
    {
        $this->snNaoAtender = $snNaoAtender;
        return $this;
    }
}
