<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConConcursoSalasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConConcursoSalasRepository::class)]
#[ORM\Table(
    name: 'con_concurso_salas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_concurso_sala', columns: ['cd_concurso_sala'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_SALA', columns: ['cd_sala'])]
class ConConcursoSalas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_concurso_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcursoSala = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSala = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrVagas = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?int $cdSala = null,
        ?int $nrVagas = null,
        ?int $nrOrdem = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->cdSala = $cdSala;
        $this->nrVagas = $nrVagas;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdConcursoSala(): ?int
    {
        return $this->cdConcursoSala;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getCdSala(): ?int
    {
        return $this->cdSala;
    }

    public function setCdSala(?int $cdSala): self
    {
        $this->cdSala = $cdSala;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
