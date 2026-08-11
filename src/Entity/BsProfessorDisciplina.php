<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsProfessorDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsProfessorDisciplinaRepository::class)]
#[ORM\Table(
    name: 'bs_professor_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_BS_PD_PROF', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'IDX_BS_PD_PES', columns: ['bs_id_pessoa'])]
#[ORM\Index(name: 'IDX_BS_PD_OFERTA', columns: ['bs_id_oferta'])]
#[ORM\Index(name: 'IDX_BS_PD_EXCL', columns: ['dt_excluido'])]
class BsProfessorDisciplina
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer', nullable: true)]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'bs_id_pessoa', type: 'integer')]
    private ?int $bsIdPessoa = null;

    #[ORM\Column(name: 'bs_id_oferta', type: 'integer')]
    private ?int $bsIdOferta = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdTurmaprofessor = null,
        ?int $bsIdPessoa = null,
        ?int $bsIdOferta = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->bsIdPessoa = $bsIdPessoa;
        $this->bsIdOferta = $bsIdOferta;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getBsIdPessoa(): ?int
    {
        return $this->bsIdPessoa;
    }

    public function setBsIdPessoa(?int $bsIdPessoa): self
    {
        $this->bsIdPessoa = $bsIdPessoa;
        return $this;
    }

    public function getBsIdOferta(): ?int
    {
        return $this->bsIdOferta;
    }

    public function setBsIdOferta(?int $bsIdOferta): self
    {
        $this->bsIdOferta = $bsIdOferta;
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
}
