<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasNotificacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasNotificacoesRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_notificacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
class OcorrenciasNotificacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_notificacao', type: 'integer')]
    private ?int $cdNotificacao = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'disciplina', type: 'integer')]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'nr_notificacoes', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrNotificacoes = 0;

    #[ORM\Column(name: 'vl_notificacoes', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlNotificacoes = 0.0;

    public function __construct(
        ?string $curso = null,
        ?string $turma = null,
        ?int $disciplina = null,
        ?int $nrNotificacoes = 0,
        ?float $vlNotificacoes = 0.0
    ) {
        $this->curso = $curso;
        $this->turma = $turma;
        $this->disciplina = $disciplina;
        $this->nrNotificacoes = $nrNotificacoes;
        $this->vlNotificacoes = $vlNotificacoes;
    }

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
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

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
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

    public function getNrNotificacoes(): ?int
    {
        return $this->nrNotificacoes;
    }

    public function setNrNotificacoes(?int $nrNotificacoes): self
    {
        $this->nrNotificacoes = $nrNotificacoes;
        return $this;
    }

    public function getVlNotificacoes(): ?float
    {
        return $this->vlNotificacoes;
    }

    public function setVlNotificacoes(?float $vlNotificacoes): self
    {
        $this->vlNotificacoes = $vlNotificacoes;
        return $this;
    }
}
