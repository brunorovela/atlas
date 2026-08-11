<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuIntegracaoTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIntegracaoTurmasRepository::class)]
#[ORM\Table(
    name: 'nu_integracao_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INTEGRACAO', columns: ['cd_integracao'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
class NuIntegracaoTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_turma', type: 'integer')]
    private ?int $cdIntegracaoTurma = null;

    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_departamento', type: 'integer', nullable: true)]
    private ?int $cdDepartamento = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'string', length: 5, nullable: true)]
    private ?string $nrAnosemestre = null;

    public function __construct(
        ?int $cdIntegracao = null,
        ?int $cdColigada = null,
        ?int $cdDepartamento = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?string $nrAnosemestre = null
    ) {
        $this->cdIntegracao = $cdIntegracao;
        $this->cdColigada = $cdColigada;
        $this->cdDepartamento = $cdDepartamento;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdIntegracaoTurma(): ?int
    {
        return $this->cdIntegracaoTurma;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
    }

    public function setCdIntegracao(?int $cdIntegracao): self
    {
        $this->cdIntegracao = $cdIntegracao;
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

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?int $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrAnosemestre(): ?string
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?string $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }
}
