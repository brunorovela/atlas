<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TurmasConveniosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasConveniosRepository::class)]
#[ORM\Table(
    name: 'turmas_convenios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TURMAS_CONVENIOS', columns: ['turma', 'anosemestre', 'curso', 'cd_instituicao'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
class TurmasConvenios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turmas_convenios', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTurmasConvenios = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15, nullable: true)]
    private ?string $curso = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    public function __construct(
        ?string $turma = null,
        ?int $anosemestre = null,
        ?string $curso = null,
        ?int $cdInstituicao = null
    ) {
        $this->turma = $turma;
        $this->anosemestre = $anosemestre;
        $this->curso = $curso;
        $this->cdInstituicao = $cdInstituicao;
    }

    public function getCdTurmasConvenios(): ?int
    {
        return $this->cdTurmasConvenios;
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

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
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

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }
}
