<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ReqTramiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqTramiteRepository::class)]
#[ORM\Table(
    name: 'req_tramite',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_tramite_cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_REQ', columns: ['cd_req'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_tramite_cd_req', 'colunas' => ['cd_req'], 'tabelaAlvo' => 'req_requerimentos', 'colunasAlvo' => ['cd_req'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_tramite_cd_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'req_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqTramite
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tramite', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTramite = null;

    #[ORM\ManyToOne(targetEntity: ReqSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqSituacoes $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: ReqRequerimentos::class)]
    #[ORM\JoinColumn(name: 'cd_req', referencedColumnName: 'cd_req', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRequerimentos $cdReq = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_rotina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdRotina = null;

    #[ORM\Column(name: 'sn_voltar', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snVoltar = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'nr_permissao', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $nrPermissao = null;

    #[ORM\Column(name: 'nr_dias', type: 'smallfloat')]
    private ?float $nrDias = null;

    #[ORM\Column(name: 'sn_desabilitado', type: TinyIntType::NAME)]
    private ?int $snDesabilitado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ReqSituacoes $cdSituacao = null,
        ?ReqRequerimentos $cdReq = null,
        ?int $cdGrupo = null,
        ?int $cdRotina = null,
        ?int $snVoltar = null,
        ?int $nrOrdem = null,
        ?int $nrPermissao = null,
        ?float $nrDias = null,
        ?int $snDesabilitado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->cdReq = $cdReq;
        $this->cdGrupo = $cdGrupo;
        $this->cdRotina = $cdRotina;
        $this->snVoltar = $snVoltar;
        $this->nrOrdem = $nrOrdem;
        $this->nrPermissao = $nrPermissao;
        $this->nrDias = $nrDias;
        $this->snDesabilitado = $snDesabilitado;
        $this->dtBase = $dtBase;
    }

    public function getCdTramite(): ?int
    {
        return $this->cdTramite;
    }

    public function getCdSituacao(): ?ReqSituacoes
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?ReqSituacoes $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
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

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
    }

    public function setCdRotina(?int $cdRotina): self
    {
        $this->cdRotina = $cdRotina;
        return $this;
    }

    public function getSnVoltar(): ?int
    {
        return $this->snVoltar;
    }

    public function setSnVoltar(?int $snVoltar): self
    {
        $this->snVoltar = $snVoltar;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getNrPermissao(): ?int
    {
        return $this->nrPermissao;
    }

    public function setNrPermissao(?int $nrPermissao): self
    {
        $this->nrPermissao = $nrPermissao;
        return $this;
    }

    public function getNrDias(): ?float
    {
        return $this->nrDias;
    }

    public function setNrDias(?float $nrDias): self
    {
        $this->nrDias = $nrDias;
        return $this;
    }

    public function getSnDesabilitado(): ?int
    {
        return $this->snDesabilitado;
    }

    public function setSnDesabilitado(?int $snDesabilitado): self
    {
        $this->snDesabilitado = $snDesabilitado;
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
