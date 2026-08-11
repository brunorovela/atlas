<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeMotivoObsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeMotivoObsRepository::class)]
#[ORM\Table(
    name: 'ge_motivo_obs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GE_ALUNOS', columns: ['cd_ge_alunos'])]
class GeMotivoObs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_motivo', type: 'integer')]
    private ?int $cdMotivo = null;

    #[ORM\Column(name: 'ds_obs', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObs = null;

    #[ORM\Column(name: 'cd_ge_alunos', type: 'integer', nullable: true)]
    private ?int $cdGeAlunos = null;

    public function __construct(
        ?string $dsObs = null,
        ?int $cdGeAlunos = null
    ) {
        $this->dsObs = $dsObs;
        $this->cdGeAlunos = $cdGeAlunos;
    }

    public function getCdMotivo(): ?int
    {
        return $this->cdMotivo;
    }

    public function getDsObs(): ?string
    {
        return $this->dsObs;
    }

    public function setDsObs(?string $dsObs): self
    {
        $this->dsObs = $dsObs;
        return $this;
    }

    public function getCdGeAlunos(): ?int
    {
        return $this->cdGeAlunos;
    }

    public function setCdGeAlunos(?int $cdGeAlunos): self
    {
        $this->cdGeAlunos = $cdGeAlunos;
        return $this;
    }
}
