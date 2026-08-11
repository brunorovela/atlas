<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ReqGruposColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqGruposColigadasRepository::class)]
#[ORM\Table(
    name: 'req_grupos_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'id_chave_coligada_grupo', columns: ['cd_req_grupo', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_REQ_GRUPO', columns: ['cd_req_grupo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class ReqGruposColigadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_coligada', type: 'integer')]
    private ?int $cdGrupoColigada = null;

    #[ORM\Column(name: 'cd_req_grupo', type: 'integer')]
    private ?int $cdReqGrupo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdReqGrupo = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReqGrupo = $cdReqGrupo;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
    }

    public function getCdGrupoColigada(): ?int
    {
        return $this->cdGrupoColigada;
    }

    public function getCdReqGrupo(): ?int
    {
        return $this->cdReqGrupo;
    }

    public function setCdReqGrupo(?int $cdReqGrupo): self
    {
        $this->cdReqGrupo = $cdReqGrupo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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
