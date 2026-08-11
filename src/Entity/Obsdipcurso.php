<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ObsdipcursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObsdipcursoRepository::class)]
#[ORM\Table(
    name: 'obsdipcurso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Index_6340BE21_E670_11D4', columns: ['curso', 'anosemestre'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
class Obsdipcurso
{
    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'obs', type: 'text', length: 16777215, nullable: true)]
    private ?string $obs = null;

    public function __construct(
        ?string $curso = null,
        ?int $anosemestre = null,
        ?string $obs = null
    ) {
        $this->curso = $curso;
        $this->anosemestre = $anosemestre;
        $this->obs = $obs;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;
        return $this;
    }
}
