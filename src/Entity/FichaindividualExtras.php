<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FichaindividualExtrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaindividualExtrasRepository::class)]
#[ORM\Table(
    name: 'fichaindividual_extras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_SERIE', columns: ['serie'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
class FichaindividualExtras
{
    #[ORM\Id]
    #[ORM\Column(name: 'serie', type: 'smallint', options: ['unsigned' => true])]
    private ?int $serie = null;

    #[ORM\Id]
    #[ORM\Column(name: 'disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $disciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $codigoaluno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $anosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 255)]
    private ?string $turma = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?int $serie = null,
        ?int $disciplina = null,
        ?int $codigoaluno = null,
        ?int $anosemestre = null,
        ?string $turma = null,
        ?string $dsObservacao = null
    ) {
        $this->serie = $serie;
        $this->disciplina = $disciplina;
        $this->codigoaluno = $codigoaluno;
        $this->anosemestre = $anosemestre;
        $this->turma = $turma;
        $this->dsObservacao = $dsObservacao;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(?int $serie): self
    {
        $this->serie = $serie;
        return $this;
    }

    public function getDisciplina(): ?int
    {
        return $this->disciplina;
    }

    public function setDisciplina(?int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getCodigoaluno(): ?int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(?int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
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

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}
