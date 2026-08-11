<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ReqRegistroEncaminhamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRegistroEncaminhamentoRepository::class)]
#[ORM\Table(
    name: 'req_registro_encaminhamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_encaminhamento_item', columns: ['cd_item'])]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_encaminhamento_item', 'colunas' => ['cd_item'], 'tabelaAlvo' => 'req_registro_itens', 'colunasAlvo' => ['cd_item'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqRegistroEncaminhamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_encaminhamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqEncaminhamento = null;

    #[ORM\ManyToOne(targetEntity: ReqRegistroItens::class)]
    #[ORM\JoinColumn(name: 'cd_item', referencedColumnName: 'cd_item', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRegistroItens $cdItem = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_pessoa_pedido', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaPedido = null;

    #[ORM\Column(name: 'me_pedido', type: 'text', length: 65535, nullable: true)]
    private ?string $mePedido = null;

    #[ORM\Column(name: 'cd_pessoa_resposta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaResposta = null;

    #[ORM\Column(name: 'me_resposta', type: 'text', length: 65535, nullable: true)]
    private ?string $meResposta = null;

    #[ORM\Column(name: 'dt_pedido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPedido = null;

    #[ORM\Column(name: 'dt_resposta', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtResposta = null;

    #[ORM\Column(name: 'cd_grupo_pedido', type: 'integer', nullable: true)]
    private ?int $cdGrupoPedido = null;

    #[ORM\Column(name: 'cd_pessoa_recebeu_mensagem', type: 'integer', nullable: true)]
    private ?int $cdPessoaRecebeuMensagem = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ReqRegistroItens $cdItem = null,
        ?int $cdGrupo = null,
        ?int $cdPessoaPedido = null,
        ?string $mePedido = null,
        ?int $cdPessoaResposta = null,
        ?string $meResposta = null,
        ?\DateTimeInterface $dtPedido = null,
        ?\DateTimeInterface $dtResposta = null,
        ?int $cdGrupoPedido = null,
        ?int $cdPessoaRecebeuMensagem = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdItem = $cdItem;
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoaPedido = $cdPessoaPedido;
        $this->mePedido = $mePedido;
        $this->cdPessoaResposta = $cdPessoaResposta;
        $this->meResposta = $meResposta;
        $this->dtPedido = $dtPedido;
        $this->dtResposta = $dtResposta;
        $this->cdGrupoPedido = $cdGrupoPedido;
        $this->cdPessoaRecebeuMensagem = $cdPessoaRecebeuMensagem;
        $this->dtBase = $dtBase;
    }

    public function getCdReqEncaminhamento(): ?int
    {
        return $this->cdReqEncaminhamento;
    }

    public function getCdItem(): ?ReqRegistroItens
    {
        return $this->cdItem;
    }

    public function setCdItem(?ReqRegistroItens $cdItem): self
    {
        $this->cdItem = $cdItem;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdPessoaPedido(): ?int
    {
        return $this->cdPessoaPedido;
    }

    public function setCdPessoaPedido(?int $cdPessoaPedido): self
    {
        $this->cdPessoaPedido = $cdPessoaPedido;
        return $this;
    }

    public function getMePedido(): ?string
    {
        return $this->mePedido;
    }

    public function setMePedido(?string $mePedido): self
    {
        $this->mePedido = $mePedido;
        return $this;
    }

    public function getCdPessoaResposta(): ?int
    {
        return $this->cdPessoaResposta;
    }

    public function setCdPessoaResposta(?int $cdPessoaResposta): self
    {
        $this->cdPessoaResposta = $cdPessoaResposta;
        return $this;
    }

    public function getMeResposta(): ?string
    {
        return $this->meResposta;
    }

    public function setMeResposta(?string $meResposta): self
    {
        $this->meResposta = $meResposta;
        return $this;
    }

    public function getDtPedido(): ?\DateTimeInterface
    {
        return $this->dtPedido;
    }

    public function setDtPedido(?\DateTimeInterface $dtPedido): self
    {
        $this->dtPedido = $dtPedido;
        return $this;
    }

    public function getDtResposta(): ?\DateTimeInterface
    {
        return $this->dtResposta;
    }

    public function setDtResposta(?\DateTimeInterface $dtResposta): self
    {
        $this->dtResposta = $dtResposta;
        return $this;
    }

    public function getCdGrupoPedido(): ?int
    {
        return $this->cdGrupoPedido;
    }

    public function setCdGrupoPedido(?int $cdGrupoPedido): self
    {
        $this->cdGrupoPedido = $cdGrupoPedido;
        return $this;
    }

    public function getCdPessoaRecebeuMensagem(): ?int
    {
        return $this->cdPessoaRecebeuMensagem;
    }

    public function setCdPessoaRecebeuMensagem(?int $cdPessoaRecebeuMensagem): self
    {
        $this->cdPessoaRecebeuMensagem = $cdPessoaRecebeuMensagem;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
