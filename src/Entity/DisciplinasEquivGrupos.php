<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasEquivGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasEquivGruposRepository::class)]
#[ORM\Table(
    name: 'disciplinas_equiv_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_equivalencia_grupo', columns: ['cd_equivalencia_grupo'])]
#[ORM\Index(name: 'IX_CD_GRUPO1', columns: ['cd_grupo1'])]
#[ORM\Index(name: 'IX_CD_GRUPO2', columns: ['cd_grupo2'])]
class DisciplinasEquivGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_equivalencia_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEquivalenciaGrupo = null;

    #[ORM\Column(name: 'cd_grupo1', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupo1 = null;

    #[ORM\Column(name: 'cd_grupo2', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupo2 = null;

    public function __construct(
        ?int $cdGrupo1 = null,
        ?int $cdGrupo2 = null
    ) {
        $this->cdGrupo1 = $cdGrupo1;
        $this->cdGrupo2 = $cdGrupo2;
    }

    public function getCdEquivalenciaGrupo(): ?int
    {
        return $this->cdEquivalenciaGrupo;
    }

    public function getCdGrupo1(): ?int
    {
        return $this->cdGrupo1;
    }

    public function setCdGrupo1(?int $cdGrupo1): self
    {
        $this->cdGrupo1 = $cdGrupo1;
        return $this;
    }

    public function getCdGrupo2(): ?int
    {
        return $this->cdGrupo2;
    }

    public function setCdGrupo2(?int $cdGrupo2): self
    {
        $this->cdGrupo2 = $cdGrupo2;
        return $this;
    }
}
