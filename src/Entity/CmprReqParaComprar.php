<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprReqParaComprarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprReqParaComprarRepository::class)]
#[ORM\Table(
    name: 'cmpr_req_para_comprar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_req_para_comprar_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_cmpr_req_para_comprar_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_cmpr_req_para_comprar_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_req_para_comprar_ibfk_1', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_para_comprar_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_para_comprar_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'cmpr_rpc_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprReqParaComprar
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_comprar', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqComprar = null;

    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\ManyToOne(targetEntity: CmprRpcSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprRpcSituacao $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'nr_qtd_requisicao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrQtdRequisicao = null;

    public function __construct(
        ?CmprProduto $cdProduto = null,
        ?CmprRpcSituacao $cdSituacao = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $nrQtdRequisicao = null
    ) {
        $this->cdProduto = $cdProduto;
        $this->cdSituacao = $cdSituacao;
        $this->cdPessoa = $cdPessoa;
        $this->dtCadastro = $dtCadastro;
        $this->nrQtdRequisicao = $nrQtdRequisicao;
    }

    public function getCdReqComprar(): ?int
    {
        return $this->cdReqComprar;
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

    public function getCdSituacao(): ?CmprRpcSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?CmprRpcSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getNrQtdRequisicao(): ?int
    {
        return $this->nrQtdRequisicao;
    }

    public function setNrQtdRequisicao(?int $nrQtdRequisicao): self
    {
        $this->nrQtdRequisicao = $nrQtdRequisicao;
        return $this;
    }
}
