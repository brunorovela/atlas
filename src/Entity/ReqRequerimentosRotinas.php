<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ReqRequerimentosRotinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRequerimentosRotinasRepository::class)]
#[ORM\Table(
    name: 'req_requerimentos_rotinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REQ', columns: ['cd_req'])]
#[ORM\Index(name: 'IX_CD_ROTINA', columns: ['cd_rotina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'req_requerimentos_rotinas_ibfk_1', 'colunas' => ['cd_req'], 'tabelaAlvo' => 'req_requerimentos', 'colunasAlvo' => ['cd_req'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'req_requerimentos_rotinas_ibfk_2', 'colunas' => ['cd_rotina'], 'tabelaAlvo' => 'req_rotinas', 'colunasAlvo' => ['cd_rotina'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqRequerimentosRotinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_rotina', type: 'integer')]
    private ?int $cdReqRotina = null;

    #[ORM\ManyToOne(targetEntity: ReqRequerimentos::class)]
    #[ORM\JoinColumn(name: 'cd_req', referencedColumnName: 'cd_req', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRequerimentos $cdReq = null;

    #[ORM\ManyToOne(targetEntity: ReqRotinas::class)]
    #[ORM\JoinColumn(name: 'cd_rotina', referencedColumnName: 'cd_rotina', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRotinas $cdRotina = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ReqRequerimentos $cdReq = null,
        ?ReqRotinas $cdRotina = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReq = $cdReq;
        $this->cdRotina = $cdRotina;
        $this->dtBase = $dtBase;
    }

    public function getCdReqRotina(): ?int
    {
        return $this->cdReqRotina;
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

    public function getCdRotina(): ?ReqRotinas
    {
        return $this->cdRotina;
    }

    public function setCdRotina(?ReqRotinas $cdRotina): self
    {
        $this->cdRotina = $cdRotina;
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
