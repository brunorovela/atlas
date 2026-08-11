<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProvasGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasGruposRepository::class)]
#[ORM\Table(
    name: 'provas_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class ProvasGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 200, nullable: true, options: ['default' => '0'])]
    private ?string $dsGrupo = '0';

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDisciplina = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdProfessor = 0;

    public function __construct(
        ?string $dsGrupo = '0',
        ?int $cdDisciplina = 0,
        ?int $cdProfessor = 0
    ) {
        $this->dsGrupo = $dsGrupo;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProfessor = $cdProfessor;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
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

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }
}
