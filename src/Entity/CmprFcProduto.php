<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprFcProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprFcProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_fc_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_FC_PRODUTO_CD_CONTRATO', columns: ['cd_contrato'])]
#[ORM\Index(name: 'IX_CMPR_FC_PRODUTO_CD_PRODUTO', columns: ['cd_produto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_fc_produto_ibfk_1', 'colunas' => ['cd_contrato'], 'tabelaAlvo' => 'cmpr_fornecedor_contrato', 'colunasAlvo' => ['cd_contrato'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_fc_produto_ibfk_2', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprFcProduto
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprFornecedorContrato::class)]
    #[ORM\JoinColumn(name: 'cd_contrato', referencedColumnName: 'cd_contrato', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprFornecedorContrato $cdContrato = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    public function __construct(
        ?CmprFornecedorContrato $cdContrato = null,
        ?CmprProduto $cdProduto = null
    ) {
        $this->cdContrato = $cdContrato;
        $this->cdProduto = $cdProduto;
    }

    public function getCdContrato(): ?CmprFornecedorContrato
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?CmprFornecedorContrato $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
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
}
