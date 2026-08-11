<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprReqProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprReqProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_req_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_REQ_PRODUTO_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_CMPR_REQ_PRODUTO_CD_REQUISICAO', columns: ['cd_requisicao'])]
#[ORM\Index(name: 'IX_CMPR_REQ_PRODUTO_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_req_produto_ibfk_1', 'colunas' => ['cd_produto'], 'tabelaAlvo' => 'cmpr_produto', 'colunasAlvo' => ['cd_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_produto_ibfk_2', 'colunas' => ['cd_requisicao'], 'tabelaAlvo' => 'cmpr_requisicao', 'colunasAlvo' => ['cd_requisicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_produto_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'cmpr_req_prod_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprReqProduto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_produto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqProduto = null;

    #[ORM\ManyToOne(targetEntity: CmprRequisicao::class)]
    #[ORM\JoinColumn(name: 'cd_requisicao', referencedColumnName: 'cd_requisicao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprRequisicao $cdRequisicao = null;

    #[ORM\ManyToOne(targetEntity: CmprProduto::class)]
    #[ORM\JoinColumn(name: 'cd_produto', referencedColumnName: 'cd_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprProduto $cdProduto = null;

    #[ORM\ManyToOne(targetEntity: CmprReqProdSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqProdSituacao $cdSituacao = null;

    #[ORM\Column(name: 'nr_qtd_requisicao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrQtdRequisicao = null;

    #[ORM\Column(name: 'nr_qtd_atendimento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrQtdAtendimento = null;

    #[ORM\Column(name: 'sn_confirmado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snConfirmado = null;

    #[ORM\Column(name: 'me_obs_recebimento', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObsRecebimento = null;

    #[ORM\Column(name: 'me_obs_requisicao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObsRequisicao = null;

    #[ORM\Column(name: 'me_obs_atendimento', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObsAtendimento = null;

    #[ORM\Column(name: 'dt_atendimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAtendimento = null;

    #[ORM\Column(name: 'cd_almox_origem', type: 'integer', nullable: true)]
    private ?int $cdAlmoxOrigem = null;

    public function __construct(
        ?CmprRequisicao $cdRequisicao = null,
        ?CmprProduto $cdProduto = null,
        ?CmprReqProdSituacao $cdSituacao = null,
        ?int $nrQtdRequisicao = null,
        ?int $nrQtdAtendimento = null,
        ?int $snConfirmado = null,
        ?string $meObsRecebimento = null,
        ?string $meObsRequisicao = null,
        ?string $meObsAtendimento = null,
        ?\DateTimeInterface $dtAtendimento = null,
        ?int $cdAlmoxOrigem = null
    ) {
        $this->cdRequisicao = $cdRequisicao;
        $this->cdProduto = $cdProduto;
        $this->cdSituacao = $cdSituacao;
        $this->nrQtdRequisicao = $nrQtdRequisicao;
        $this->nrQtdAtendimento = $nrQtdAtendimento;
        $this->snConfirmado = $snConfirmado;
        $this->meObsRecebimento = $meObsRecebimento;
        $this->meObsRequisicao = $meObsRequisicao;
        $this->meObsAtendimento = $meObsAtendimento;
        $this->dtAtendimento = $dtAtendimento;
        $this->cdAlmoxOrigem = $cdAlmoxOrigem;
    }

    public function getCdReqProduto(): ?int
    {
        return $this->cdReqProduto;
    }

    public function getCdRequisicao(): ?CmprRequisicao
    {
        return $this->cdRequisicao;
    }

    public function setCdRequisicao(?CmprRequisicao $cdRequisicao): self
    {
        $this->cdRequisicao = $cdRequisicao;
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

    public function getCdSituacao(): ?CmprReqProdSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?CmprReqProdSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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

    public function getNrQtdAtendimento(): ?int
    {
        return $this->nrQtdAtendimento;
    }

    public function setNrQtdAtendimento(?int $nrQtdAtendimento): self
    {
        $this->nrQtdAtendimento = $nrQtdAtendimento;
        return $this;
    }

    public function getSnConfirmado(): ?int
    {
        return $this->snConfirmado;
    }

    public function setSnConfirmado(?int $snConfirmado): self
    {
        $this->snConfirmado = $snConfirmado;
        return $this;
    }

    public function getMeObsRecebimento(): ?string
    {
        return $this->meObsRecebimento;
    }

    public function setMeObsRecebimento(?string $meObsRecebimento): self
    {
        $this->meObsRecebimento = $meObsRecebimento;
        return $this;
    }

    public function getMeObsRequisicao(): ?string
    {
        return $this->meObsRequisicao;
    }

    public function setMeObsRequisicao(?string $meObsRequisicao): self
    {
        $this->meObsRequisicao = $meObsRequisicao;
        return $this;
    }

    public function getMeObsAtendimento(): ?string
    {
        return $this->meObsAtendimento;
    }

    public function setMeObsAtendimento(?string $meObsAtendimento): self
    {
        $this->meObsAtendimento = $meObsAtendimento;
        return $this;
    }

    public function getDtAtendimento(): ?\DateTimeInterface
    {
        return $this->dtAtendimento;
    }

    public function setDtAtendimento(?\DateTimeInterface $dtAtendimento): self
    {
        $this->dtAtendimento = $dtAtendimento;
        return $this;
    }

    public function getCdAlmoxOrigem(): ?int
    {
        return $this->cdAlmoxOrigem;
    }

    public function setCdAlmoxOrigem(?int $cdAlmoxOrigem): self
    {
        $this->cdAlmoxOrigem = $cdAlmoxOrigem;
        return $this;
    }
}
