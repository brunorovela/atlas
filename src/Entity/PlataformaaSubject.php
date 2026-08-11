<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlataformaaSubjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlataformaaSubjectRepository::class)]
#[ORM\Table(
    name: 'plataformaa_subject',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'id', columns: ['id'])]
#[ORM\Index(name: 'ds_tipo', columns: ['ds_tipo'])]
#[ORM\Index(name: 'cd_disciplina_pai', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'cd_curso_disciplina', columns: ['cd_curso_disciplina'])]
#[ORM\Index(name: 'id_origem', columns: ['id_origem'])]
class PlataformaaSubject
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'id_origem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $idOrigem = 0;

    #[ORM\Column(name: 'ds_tipo', type: 'enum', options: ['values' => ['PAI', 'FILHO']])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDisciplinaPai = 0;

    #[ORM\Column(name: 'cd_curso_disciplina', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCursoDisciplina = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $idOrigem = 0,
        ?string $dsTipo = null,
        int $cdDisciplinaPai = 0,
        int $cdCursoDisciplina = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idOrigem = $idOrigem;
        $this->dsTipo = $dsTipo;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->cdCursoDisciplina = $cdCursoDisciplina;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOrigem(): int
    {
        return $this->idOrigem;
    }

    public function setIdOrigem(int $idOrigem): self
    {
        $this->idOrigem = $idOrigem;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getCdDisciplinaPai(): int
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(int $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCdCursoDisciplina(): int
    {
        return $this->cdCursoDisciplina;
    }

    public function setCdCursoDisciplina(int $cdCursoDisciplina): self
    {
        $this->cdCursoDisciplina = $cdCursoDisciplina;
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
