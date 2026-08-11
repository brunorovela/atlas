<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprRpcProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprRpcProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_rpc_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cmpr_rpc_produto_produto', columns: ['cd_req_produto'])]
#[ORM\Index(name: 'IDX_44055E308705BA25', columns: ['cd_req_comprar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_rpc_produto_comprar', 'colunas' => ['cd_req_comprar'], 'tabelaAlvo' => 'cmpr_req_para_comprar', 'colunasAlvo' => ['cd_req_comprar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_rpc_produto_produto', 'colunas' => ['cd_req_produto'], 'tabelaAlvo' => 'cmpr_req_produto', 'colunasAlvo' => ['cd_req_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprRpcProduto
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprReqParaComprar::class)]
    #[ORM\JoinColumn(name: 'cd_req_comprar', referencedColumnName: 'cd_req_comprar', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqParaComprar $cdReqComprar = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprReqProduto::class)]
    #[ORM\JoinColumn(name: 'cd_req_produto', referencedColumnName: 'cd_req_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqProduto $cdReqProduto = null;

    public function __construct(
        ?CmprReqParaComprar $cdReqComprar = null,
        ?CmprReqProduto $cdReqProduto = null
    ) {
        $this->cdReqComprar = $cdReqComprar;
        $this->cdReqProduto = $cdReqProduto;
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

    public function getCdReqProduto(): ?CmprReqProduto
    {
        return $this->cdReqProduto;
    }

    public function setCdReqProduto(?CmprReqProduto $cdReqProduto): self
    {
        $this->cdReqProduto = $cdReqProduto;
        return $this;
    }
}
