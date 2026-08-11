<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprRequisicaoLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprRequisicaoLogRepository::class)]
#[ORM\Table(
    name: 'cmpr_requisicao_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CMPR_REQUISICAO_CD_REQ_PRODUTO', columns: ['cd_req_produto'])]
#[ORM\Index(name: 'IX_CMPR_REQUISICAO_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CMPR_REQUISICAO_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_CMPR_REQUISICAO_CD_REQ_PRODUTO', 'colunas' => ['cd_req_produto'], 'tabelaAlvo' => 'cmpr_req_produto', 'colunasAlvo' => ['cd_req_produto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprRequisicaoLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log_requisicao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLogRequisicao = null;

    #[ORM\ManyToOne(targetEntity: CmprReqProduto::class)]
    #[ORM\JoinColumn(name: 'cd_req_produto', referencedColumnName: 'cd_req_produto', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqProduto $cdReqProduto = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?CmprReqProduto $cdReqProduto = null,
        ?Pessoas $cdPessoa = null,
        ?string $meDescricao = null,
        ?string $meObservacao = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdReqProduto = $cdReqProduto;
        $this->cdPessoa = $cdPessoa;
        $this->meDescricao = $meDescricao;
        $this->meObservacao = $meObservacao;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdLogRequisicao(): ?int
    {
        return $this->cdLogRequisicao;
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

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
