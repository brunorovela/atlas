<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinBolsasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinBolsasTiposRepository::class)]
#[ORM\Table(
    name: 'fin_bolsas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_bolsa', columns: ['cd_bolsa'])]
class FinBolsasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bolsa', type: 'integer')]
    private ?int $cdBolsa = null;

    #[ORM\Column(name: 'ds_bolsa', type: 'string', length: 100, nullable: true)]
    private ?string $dsBolsa = null;

    #[ORM\Column(name: 'sn_gratuidade', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snGratuidade = false;

    #[ORM\Column(name: 'vl_fixo_sugerido', type: 'float', nullable: true)]
    private ?float $vlFixoSugerido = null;

    #[ORM\Column(name: 'vl_perc_sugerido', type: 'float', nullable: true)]
    private ?float $vlPercSugerido = null;

    public function __construct(
        ?string $dsBolsa = null,
        ?bool $snGratuidade = false,
        ?float $vlFixoSugerido = null,
        ?float $vlPercSugerido = null
    ) {
        $this->dsBolsa = $dsBolsa;
        $this->snGratuidade = $snGratuidade;
        $this->vlFixoSugerido = $vlFixoSugerido;
        $this->vlPercSugerido = $vlPercSugerido;
    }

    public function getCdBolsa(): ?int
    {
        return $this->cdBolsa;
    }

    public function getDsBolsa(): ?string
    {
        return $this->dsBolsa;
    }

    public function setDsBolsa(?string $dsBolsa): self
    {
        $this->dsBolsa = $dsBolsa;
        return $this;
    }

    public function isSnGratuidade(): ?bool
    {
        return $this->snGratuidade;
    }

    public function setSnGratuidade(?bool $snGratuidade): self
    {
        $this->snGratuidade = $snGratuidade;
        return $this;
    }

    public function getVlFixoSugerido(): ?float
    {
        return $this->vlFixoSugerido;
    }

    public function setVlFixoSugerido(?float $vlFixoSugerido): self
    {
        $this->vlFixoSugerido = $vlFixoSugerido;
        return $this;
    }

    public function getVlPercSugerido(): ?float
    {
        return $this->vlPercSugerido;
    }

    public function setVlPercSugerido(?float $vlPercSugerido): self
    {
        $this->vlPercSugerido = $vlPercSugerido;
        return $this;
    }
}
