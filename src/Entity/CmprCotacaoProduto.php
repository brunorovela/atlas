<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCotacaoProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCotacaoProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cotacao_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cotacao_produto_cd_cotacao', columns: ['cd_cotacao'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_produto_cd_req_comprar', columns: ['cd_req_comprar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cotacao_produto_ibfk_2', 'colunas' => ['cd_cotacao'], 'tabelaAlvo' => 'cmpr_cotacao', 'colunasAlvo' => ['cd_cotacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cotacao_produto_ibfk_3', 'colunas' => ['cd_req_comprar'], 'tabelaAlvo' => 'cmpr_req_para_comprar', 'colunasAlvo' => ['cd_req_comprar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_cotacao']
)]
class CmprCotacaoProduto
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCotacao::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao', referencedColumnName: 'cd_cotacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacao $cdCotacao = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprReqParaComprar::class)]
    #[ORM\JoinColumn(name: 'cd_req_comprar', referencedColumnName: 'cd_req_comprar', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqParaComprar $cdReqComprar = null;

    #[ORM\Column(name: 'sn_comprado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snComprado = null;

    public function __construct(
        ?CmprCotacao $cdCotacao = null,
        ?CmprReqParaComprar $cdReqComprar = null,
        ?int $snComprado = null
    ) {
        $this->cdCotacao = $cdCotacao;
        $this->cdReqComprar = $cdReqComprar;
        $this->snComprado = $snComprado;
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

    public function getSnComprado(): ?int
    {
        return $this->snComprado;
    }

    public function setSnComprado(?int $snComprado): self
    {
        $this->snComprado = $snComprado;
        return $this;
    }
}
