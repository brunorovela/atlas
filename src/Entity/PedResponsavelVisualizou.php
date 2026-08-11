<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PedResponsavelVisualizouRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedResponsavelVisualizouRepository::class)]
#[ORM\Table(
    name: 'ped_responsavel_visualizou',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PedResponsavelVisualizou
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resp_visualizou', type: 'integer')]
    private ?int $cdRespVisualizou = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer')]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer')]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'dt_visualizado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVisualizado = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $cdResponsavel = null,
        ?int $cdAluno = null,
        ?\DateTimeInterface $dtVisualizado = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdResponsavel = $cdResponsavel;
        $this->cdAluno = $cdAluno;
        $this->dtVisualizado = $dtVisualizado;
    }

    public function getCdRespVisualizou(): ?int
    {
        return $this->cdRespVisualizou;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getDtVisualizado(): ?\DateTimeInterface
    {
        return $this->dtVisualizado;
    }

    public function setDtVisualizado(?\DateTimeInterface $dtVisualizado): self
    {
        $this->dtVisualizado = $dtVisualizado;
        return $this;
    }
}
