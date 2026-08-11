<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ResTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResTiposRepository::class)]
#[ORM\Table(
    name: 'res_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo', columns: ['cd_tipo'])]
class ResTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 75)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'sn_escolhe', type: 'boolean', options: ['default' => '1'])]
    private bool $snEscolhe = true;

    #[ORM\Column(name: 'sn_conferir', type: 'boolean')]
    private ?bool $snConferir = null;

    public function __construct(
        ?string $dsTipo = null,
        bool $snEscolhe = true,
        ?bool $snConferir = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->snEscolhe = $snEscolhe;
        $this->snConferir = $snConferir;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function isSnEscolhe(): bool
    {
        return $this->snEscolhe;
    }

    public function setSnEscolhe(bool $snEscolhe): self
    {
        $this->snEscolhe = $snEscolhe;
        return $this;
    }

    public function isSnConferir(): ?bool
    {
        return $this->snConferir;
    }

    public function setSnConferir(?bool $snConferir): self
    {
        $this->snConferir = $snConferir;
        return $this;
    }
}
