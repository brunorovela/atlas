<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\IesdeDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeDisciplinaRepository::class)]
#[ORM\Table(
    name: 'iesde_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Relação unimestre e iesde de disciplinas']
)]
#[ORM\UniqueConstraint(name: 'uk_iesded', columns: ['cd_disciplina_iesde'])]
#[ORM\Index(name: 'uk_iesdedp', columns: ['cd_disciplina_pai_unimestre'])]
class IesdeDisciplina
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_disciplina_pai_unimestre', type: 'string', length: 255, nullable: true)]
    private ?string $cdDisciplinaPaiUnimestre = null;

    #[ORM\Column(name: 'cd_disciplina_iesde', type: 'integer')]
    private ?int $cdDisciplinaIesde = null;

    #[ORM\Column(name: 'sn_usar_disciplina', type: TinyIntType::NAME, nullable: true)]
    private ?int $snUsarDisciplina = null;

    public function __construct(
        ?string $cdDisciplinaPaiUnimestre = null,
        ?int $cdDisciplinaIesde = null,
        ?int $snUsarDisciplina = null
    ) {
        $this->cdDisciplinaPaiUnimestre = $cdDisciplinaPaiUnimestre;
        $this->cdDisciplinaIesde = $cdDisciplinaIesde;
        $this->snUsarDisciplina = $snUsarDisciplina;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function getCdDisciplinaPaiUnimestre(): ?string
    {
        return $this->cdDisciplinaPaiUnimestre;
    }

    public function setCdDisciplinaPaiUnimestre(?string $cdDisciplinaPaiUnimestre): self
    {
        $this->cdDisciplinaPaiUnimestre = $cdDisciplinaPaiUnimestre;
        return $this;
    }

    public function getCdDisciplinaIesde(): ?int
    {
        return $this->cdDisciplinaIesde;
    }

    public function setCdDisciplinaIesde(?int $cdDisciplinaIesde): self
    {
        $this->cdDisciplinaIesde = $cdDisciplinaIesde;
        return $this;
    }

    public function getSnUsarDisciplina(): ?int
    {
        return $this->snUsarDisciplina;
    }

    public function setSnUsarDisciplina(?int $snUsarDisciplina): self
    {
        $this->snUsarDisciplina = $snUsarDisciplina;
        return $this;
    }
}
