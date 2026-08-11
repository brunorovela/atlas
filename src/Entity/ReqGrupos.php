<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ReqGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqGruposRepository::class)]
#[ORM\Table(
    name: 'req_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REQ', columns: ['cd_req'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_requerimentos_cd_req', 'colunas' => ['cd_req'], 'tabelaAlvo' => 'req_requerimentos', 'colunasAlvo' => ['cd_req'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqGrupo = null;

    #[ORM\ManyToOne(targetEntity: ReqRequerimentos::class)]
    #[ORM\JoinColumn(name: 'cd_req', referencedColumnName: 'cd_req', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRequerimentos $cdReq = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'vl_req', type: 'float')]
    private ?float $vlReq = null;

    #[ORM\Column(name: 'nr_qtd_isento', type: 'decimal', precision: 10, scale: 0)]
    private ?string $nrQtdIsento = null;

    #[ORM\Column(name: 'sn_ano_sem', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAnoSem = null;

    #[ORM\Column(name: 'nr_max_req', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMaxReq = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_exclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExclusao = null;

    public function __construct(
        ?ReqRequerimentos $cdReq = null,
        ?int $cdGrupo = null,
        ?float $vlReq = null,
        ?string $nrQtdIsento = null,
        ?int $snAnoSem = null,
        ?int $nrMaxReq = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtExclusao = null
    ) {
        $this->cdReq = $cdReq;
        $this->cdGrupo = $cdGrupo;
        $this->vlReq = $vlReq;
        $this->nrQtdIsento = $nrQtdIsento;
        $this->snAnoSem = $snAnoSem;
        $this->nrMaxReq = $nrMaxReq;
        $this->dtBase = $dtBase;
        $this->dtExclusao = $dtExclusao;
    }

    public function getCdReqGrupo(): ?int
    {
        return $this->cdReqGrupo;
    }

    public function getCdReq(): ?ReqRequerimentos
    {
        return $this->cdReq;
    }

    public function setCdReq(?ReqRequerimentos $cdReq): self
    {
        $this->cdReq = $cdReq;
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

    public function getVlReq(): ?float
    {
        return $this->vlReq;
    }

    public function setVlReq(?float $vlReq): self
    {
        $this->vlReq = $vlReq;
        return $this;
    }

    public function getNrQtdIsento(): ?string
    {
        return $this->nrQtdIsento;
    }

    public function setNrQtdIsento(?string $nrQtdIsento): self
    {
        $this->nrQtdIsento = $nrQtdIsento;
        return $this;
    }

    public function getSnAnoSem(): ?int
    {
        return $this->snAnoSem;
    }

    public function setSnAnoSem(?int $snAnoSem): self
    {
        $this->snAnoSem = $snAnoSem;
        return $this;
    }

    public function getNrMaxReq(): ?int
    {
        return $this->nrMaxReq;
    }

    public function setNrMaxReq(?int $nrMaxReq): self
    {
        $this->nrMaxReq = $nrMaxReq;
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

    public function getDtExclusao(): ?\DateTimeInterface
    {
        return $this->dtExclusao;
    }

    public function setDtExclusao(?\DateTimeInterface $dtExclusao): self
    {
        $this->dtExclusao = $dtExclusao;
        return $this;
    }
}
