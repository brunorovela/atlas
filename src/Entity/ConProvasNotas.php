<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasNotasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasNotasRepository::class)]
#[ORM\Table(
    name: 'con_provas_notas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_provas_notas', columns: ['cd_provas_notas'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class ConProvasNotas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_provas_notas', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvasNotas = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nr_nota', type: 'float', nullable: true)]
    private ?float $nrNota = null;

    public function __construct(
        ?int $cdInscricao = null,
        ?int $cdProva = null,
        ?float $nrNota = null
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->cdProva = $cdProva;
        $this->nrNota = $nrNota;
    }

    public function getCdProvasNotas(): ?int
    {
        return $this->cdProvasNotas;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?int $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getNrNota(): ?float
    {
        return $this->nrNota;
    }

    public function setNrNota(?float $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }
}
