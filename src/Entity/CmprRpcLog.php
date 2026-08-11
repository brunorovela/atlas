<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprRpcLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprRpcLogRepository::class)]
#[ORM\Table(
    name: 'cmpr_rpc_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_rpc_log_cd_req_comprar', columns: ['cd_req_comprar'])]
#[ORM\Index(name: 'IX_cmpr_rpc_log_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_rpc_log_ibfk_1', 'colunas' => ['cd_req_comprar'], 'tabelaAlvo' => 'cmpr_req_para_comprar', 'colunasAlvo' => ['cd_req_comprar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_rpc_log_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprRpcLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rpc_log', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRpcLog = null;

    #[ORM\ManyToOne(targetEntity: CmprReqParaComprar::class)]
    #[ORM\JoinColumn(name: 'cd_req_comprar', referencedColumnName: 'cd_req_comprar', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprReqParaComprar $cdReqComprar = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    public function __construct(
        ?CmprReqParaComprar $cdReqComprar = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $meDescricao = null
    ) {
        $this->cdReqComprar = $cdReqComprar;
        $this->cdPessoa = $cdPessoa;
        $this->dtCadastro = $dtCadastro;
        $this->meDescricao = $meDescricao;
    }

    public function getCdRpcLog(): ?int
    {
        return $this->cdRpcLog;
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

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }
}
