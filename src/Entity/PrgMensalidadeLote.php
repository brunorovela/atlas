<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMensalidadeLoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMensalidadeLoteRepository::class)]
#[ORM\Table(
    name: 'prg_mensalidade_lote',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_LOTE_MENSALIDADE', columns: ['cd_mensalidade', 'ds_lote_uuid'])]
#[ORM\Index(name: 'IDX_PRL_DS_LOTE_UUID', columns: ['ds_lote_uuid'])]
#[ORM\Index(name: 'idx_prg_men_lote_dt_integracao', columns: ['dt_integracao'])]
#[ORM\Index(name: 'idx_prg_men_lote_id_situacao_lote', columns: ['id_situacao_lote'])]
#[ORM\Index(name: 'idx_lote_mensalidade', columns: ['id_situacao_lote', 'cd_mensalidade', 'id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_prg_mensalidade_id_situacao_lote', 'colunas' => ['id_situacao_lote'], 'tabelaAlvo' => 'prg_situacoes', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PrgMensalidadeLote
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'ds_lote_uuid', type: 'string', length: 255)]
    private ?string $dsLoteUuid = null;

    #[ORM\ManyToOne(targetEntity: PrgSituacoes::class)]
    #[ORM\JoinColumn(name: 'id_situacao_lote', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgSituacoes $idSituacaoLote = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_integracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIntegracao = null;

    #[ORM\Column(name: 'ds_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'cd_pessoa_logada_acao', type: 'integer', nullable: true)]
    private ?int $cdPessoaLogadaAcao = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $dsLoteUuid = null,
        ?PrgSituacoes $idSituacaoLote = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtIntegracao = null,
        ?string $dsErro = null,
        ?int $cdPessoaLogadaAcao = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->dsLoteUuid = $dsLoteUuid;
        $this->idSituacaoLote = $idSituacaoLote;
        $this->dtBase = $dtBase;
        $this->dtIntegracao = $dtIntegracao;
        $this->dsErro = $dsErro;
        $this->cdPessoaLogadaAcao = $cdPessoaLogadaAcao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDsLoteUuid(): ?string
    {
        return $this->dsLoteUuid;
    }

    public function setDsLoteUuid(?string $dsLoteUuid): self
    {
        $this->dsLoteUuid = $dsLoteUuid;
        return $this;
    }

    public function getIdSituacaoLote(): ?PrgSituacoes
    {
        return $this->idSituacaoLote;
    }

    public function setIdSituacaoLote(?PrgSituacoes $idSituacaoLote): self
    {
        $this->idSituacaoLote = $idSituacaoLote;
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

    public function getDtIntegracao(): ?\DateTimeInterface
    {
        return $this->dtIntegracao;
    }

    public function setDtIntegracao(?\DateTimeInterface $dtIntegracao): self
    {
        $this->dtIntegracao = $dtIntegracao;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }

    public function getCdPessoaLogadaAcao(): ?int
    {
        return $this->cdPessoaLogadaAcao;
    }

    public function setCdPessoaLogadaAcao(?int $cdPessoaLogadaAcao): self
    {
        $this->cdPessoaLogadaAcao = $cdPessoaLogadaAcao;
        return $this;
    }
}
