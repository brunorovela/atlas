<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ReqRegistrosDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRegistrosDisciplinasRepository::class)]
#[ORM\Table(
    name: 'req_registros_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_req_registros', columns: ['cd_req_registros', 'cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_REQ_REGISTROS', columns: ['cd_req_registros'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
class ReqRegistrosDisciplinas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_req_registros', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqRegistros = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdReqRegistros = null,
        ?int $cdDisciplina = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReqRegistros = $cdReqRegistros;
        $this->cdDisciplina = $cdDisciplina;
        $this->dtBase = $dtBase;
    }

    public function getCdReqRegistros(): ?int
    {
        return $this->cdReqRegistros;
    }

    public function setCdReqRegistros(?int $cdReqRegistros): self
    {
        $this->cdReqRegistros = $cdReqRegistros;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
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
