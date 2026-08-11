<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprReqNovoProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprReqNovoProdutoRepository::class)]
#[ORM\Table(
    name: 'cmpr_req_novo_produto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_REQ_NOVO_PRODUTO_CD_PESSOA_ATENDEU', columns: ['cd_pessoa_atendeu'])]
#[ORM\Index(name: 'IX_CMPR_REQ_NOVO_PRODUTO_CD_PESSOA_SOLICITOU', columns: ['cd_pessoa_solicitou'])]
#[ORM\Index(name: 'IX_CMPR_REQ_NOVO_PRODUTO_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_req_novo_produto_ibfk_1', 'colunas' => ['cd_pessoa_atendeu'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_novo_produto_ibfk_2', 'colunas' => ['cd_pessoa_solicitou'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_req_novo_produto_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'cmpr_req_novo_produto_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprReqNovoProduto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_solicitacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSolicitacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_solicitou', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaSolicitou = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_atendeu', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaAtendeu = null;

    #[ORM\ManyToOne(targetEntity: CmprReqNovoProdutoSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => '1', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqNovoProdutoSituacao $cdSituacao = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_descricao_atendimento', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricaoAtendimento = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_atendimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAtendimento = null;

    public function __construct(
        ?Pessoas $cdPessoaSolicitou = null,
        ?Pessoas $cdPessoaAtendeu = null,
        ?CmprReqNovoProdutoSituacao $cdSituacao = null,
        ?string $dsNome = null,
        ?string $meDescricao = null,
        ?string $meDescricaoAtendimento = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAtendimento = null
    ) {
        $this->cdPessoaSolicitou = $cdPessoaSolicitou;
        $this->cdPessoaAtendeu = $cdPessoaAtendeu;
        $this->cdSituacao = $cdSituacao;
        $this->dsNome = $dsNome;
        $this->meDescricao = $meDescricao;
        $this->meDescricaoAtendimento = $meDescricaoAtendimento;
        $this->dtCadastro = $dtCadastro;
        $this->dtAtendimento = $dtAtendimento;
    }

    public function getCdSolicitacao(): ?int
    {
        return $this->cdSolicitacao;
    }

    public function getCdPessoaSolicitou(): ?Pessoas
    {
        return $this->cdPessoaSolicitou;
    }

    public function setCdPessoaSolicitou(?Pessoas $cdPessoaSolicitou): self
    {
        $this->cdPessoaSolicitou = $cdPessoaSolicitou;
        return $this;
    }

    public function getCdPessoaAtendeu(): ?Pessoas
    {
        return $this->cdPessoaAtendeu;
    }

    public function setCdPessoaAtendeu(?Pessoas $cdPessoaAtendeu): self
    {
        $this->cdPessoaAtendeu = $cdPessoaAtendeu;
        return $this;
    }

    public function getCdSituacao(): ?CmprReqNovoProdutoSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?CmprReqNovoProdutoSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
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

    public function getMeDescricaoAtendimento(): ?string
    {
        return $this->meDescricaoAtendimento;
    }

    public function setMeDescricaoAtendimento(?string $meDescricaoAtendimento): self
    {
        $this->meDescricaoAtendimento = $meDescricaoAtendimento;
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

    public function getDtAtendimento(): ?\DateTimeInterface
    {
        return $this->dtAtendimento;
    }

    public function setDtAtendimento(?\DateTimeInterface $dtAtendimento): self
    {
        $this->dtAtendimento = $dtAtendimento;
        return $this;
    }
}
