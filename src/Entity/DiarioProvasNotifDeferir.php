<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioProvasNotifDeferirRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasNotifDeferirRepository::class)]
#[ORM\Table(
    name: 'diario_provas_notif_deferir',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DiarioProvasNotifDeferir
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_bimestre', type: 'smallint')]
    private ?int $cdBimestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_prova', type: 'integer')]
    private ?int $nrProva = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_notificacao', type: 'integer')]
    private ?int $cdNotificacao = null;

    public function __construct(
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?int $cdDisciplina = null,
        ?int $cdBimestre = null,
        ?int $nrProva = null,
        ?int $cdNotificacao = null
    ) {
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrProva = $nrProva;
        $this->cdNotificacao = $cdNotificacao;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdBimestre(): ?int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(?int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrProva(): ?int
    {
        return $this->nrProva;
    }

    public function setNrProva(?int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function setCdNotificacao(?int $cdNotificacao): self
    {
        $this->cdNotificacao = $cdNotificacao;
        return $this;
    }
}
