<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ReqRequerimentosMotivosIndeferimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRequerimentosMotivosIndeferimentoRepository::class)]
#[ORM\Table(
    name: 'req_requerimentos_motivos_indeferimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_req_requerimentos', columns: ['cd_req_requerimento'])]
#[ORM\Index(name: 'FK_req_motivos_indeferimento', columns: ['cd_req_motivo_indeferimento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_req_motivos_indeferimento', 'colunas' => ['cd_req_motivo_indeferimento'], 'tabelaAlvo' => 'req_motivos_indeferimento', 'colunasAlvo' => ['cd_req_motivo_indeferimento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_req_requerimentos', 'colunas' => ['cd_req_requerimento'], 'tabelaAlvo' => 'req_requerimentos', 'colunasAlvo' => ['cd_req'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqRequerimentosMotivosIndeferimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_requerimentos_motivos_indeferimento', type: 'integer')]
    private ?int $cdReqRequerimentosMotivosIndeferimento = null;

    #[ORM\ManyToOne(targetEntity: ReqRequerimentos::class)]
    #[ORM\JoinColumn(name: 'cd_req_requerimento', referencedColumnName: 'cd_req', nullable: false, options: ['default' => '0', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRequerimentos $cdReqRequerimento = null;

    #[ORM\ManyToOne(targetEntity: ReqMotivosIndeferimento::class)]
    #[ORM\JoinColumn(name: 'cd_req_motivo_indeferimento', referencedColumnName: 'cd_req_motivo_indeferimento', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ReqMotivosIndeferimento $cdReqMotivoIndeferimento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ReqRequerimentos $cdReqRequerimento = null,
        ?ReqMotivosIndeferimento $cdReqMotivoIndeferimento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReqRequerimento = $cdReqRequerimento;
        $this->cdReqMotivoIndeferimento = $cdReqMotivoIndeferimento;
        $this->dtBase = $dtBase;
    }

    public function getCdReqRequerimentosMotivosIndeferimento(): ?int
    {
        return $this->cdReqRequerimentosMotivosIndeferimento;
    }

    public function getCdReqRequerimento(): ?ReqRequerimentos
    {
        return $this->cdReqRequerimento;
    }

    public function setCdReqRequerimento(?ReqRequerimentos $cdReqRequerimento): self
    {
        $this->cdReqRequerimento = $cdReqRequerimento;
        return $this;
    }

    public function getCdReqMotivoIndeferimento(): ?ReqMotivosIndeferimento
    {
        return $this->cdReqMotivoIndeferimento;
    }

    public function setCdReqMotivoIndeferimento(?ReqMotivosIndeferimento $cdReqMotivoIndeferimento): self
    {
        $this->cdReqMotivoIndeferimento = $cdReqMotivoIndeferimento;
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
