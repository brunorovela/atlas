<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMensalidadeRepository::class)]
#[ORM\Table(
    name: 'prg_mensalidade',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'FK_PRGM_SITUACAO', columns: ['cd_situacao_mensalidade'])]
#[ORM\Index(name: 'idx_prg_mensalidade_dt_integracao', columns: ['dt_integracao'])]
#[ORM\Index(name: 'idx_prg_mensalidade_id_situacao_integracao', columns: ['id_situacao_integracao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_prg_mensalidade_situacao_integracao', 'colunas' => ['id_situacao_integracao'], 'tabelaAlvo' => 'prg_situacoes', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PrgMensalidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'id_integracao_ambiente', type: 'integer', options: ['default' => '1'])]
    private int $idIntegracaoAmbiente = 1;

    #[ORM\ManyToOne(targetEntity: PrgSituacoes::class)]
    #[ORM\JoinColumn(name: 'id_situacao_integracao', referencedColumnName: 'id', nullable: false, options: ['default' => '1', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgSituacoes $idSituacaoIntegracao = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'vl_bruto', type: 'float', options: ['default' => '0.00'])]
    private float $vlBruto = 0.0;

    #[ORM\Column(name: 'cd_situacao_mensalidade', type: 'integer')]
    private ?int $cdSituacaoMensalidade = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_integracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIntegracao = null;

    #[ORM\Column(name: 'ds_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'nr_ultimo_status_sincronizacao', type: 'integer', nullable: true, options: ['default' => '0', 'comment' => 'Último status de sincronização sendo 0 - Não sincronizado, 1 - Processada, 2 - Cancelada'])]
    private ?int $nrUltimoStatusSincronizacao = 0;

    public function __construct(
        int $idIntegracaoAmbiente = 1,
        ?PrgSituacoes $idSituacaoIntegracao = null,
        ?int $cdMensalidade = null,
        float $vlBruto = 0.0,
        ?int $cdSituacaoMensalidade = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtIntegracao = null,
        ?string $dsErro = null,
        ?int $nrUltimoStatusSincronizacao = 0
    ) {
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        $this->idSituacaoIntegracao = $idSituacaoIntegracao;
        $this->cdMensalidade = $cdMensalidade;
        $this->vlBruto = $vlBruto;
        $this->cdSituacaoMensalidade = $cdSituacaoMensalidade;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
        $this->dtIntegracao = $dtIntegracao;
        $this->dsErro = $dsErro;
        $this->nrUltimoStatusSincronizacao = $nrUltimoStatusSincronizacao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIntegracaoAmbiente(): int
    {
        return $this->idIntegracaoAmbiente;
    }

    public function setIdIntegracaoAmbiente(int $idIntegracaoAmbiente): self
    {
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        return $this;
    }

    public function getIdSituacaoIntegracao(): ?PrgSituacoes
    {
        return $this->idSituacaoIntegracao;
    }

    public function setIdSituacaoIntegracao(?PrgSituacoes $idSituacaoIntegracao): self
    {
        $this->idSituacaoIntegracao = $idSituacaoIntegracao;
        return $this;
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

    public function getVlBruto(): float
    {
        return $this->vlBruto;
    }

    public function setVlBruto(float $vlBruto): self
    {
        $this->vlBruto = $vlBruto;
        return $this;
    }

    public function getCdSituacaoMensalidade(): ?int
    {
        return $this->cdSituacaoMensalidade;
    }

    public function setCdSituacaoMensalidade(?int $cdSituacaoMensalidade): self
    {
        $this->cdSituacaoMensalidade = $cdSituacaoMensalidade;
        return $this;
    }

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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

    public function getNrUltimoStatusSincronizacao(): ?int
    {
        return $this->nrUltimoStatusSincronizacao;
    }

    public function setNrUltimoStatusSincronizacao(?int $nrUltimoStatusSincronizacao): self
    {
        $this->nrUltimoStatusSincronizacao = $nrUltimoStatusSincronizacao;
        return $this;
    }
}
