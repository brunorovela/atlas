<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TempFluxoCaixaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TempFluxoCaixaRepository::class)]
#[ORM\Table(
    name: 'temp_fluxo_caixa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'dt_data', columns: ['dt_data'])]
class TempFluxoCaixa
{
    #[ORM\Id]
    #[ORM\Column(name: 'dt_data', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtData = null;

    #[ORM\Column(name: 'vl_cp_previsto', type: 'float', nullable: true)]
    private ?float $vlCpPrevisto = null;

    #[ORM\Column(name: 'vl_cp_realizado', type: 'float', nullable: true)]
    private ?float $vlCpRealizado = null;

    #[ORM\Column(name: 'vl_cr_previsto', type: 'float', nullable: true)]
    private ?float $vlCrPrevisto = null;

    #[ORM\Column(name: 'vl_cr_realizado', type: 'float', nullable: true)]
    private ?float $vlCrRealizado = null;

    #[ORM\Column(name: 'vl_saldo', type: 'float', nullable: true)]
    private ?float $vlSaldo = null;

    public function __construct(
        ?\DateTimeInterface $dtData = null,
        ?float $vlCpPrevisto = null,
        ?float $vlCpRealizado = null,
        ?float $vlCrPrevisto = null,
        ?float $vlCrRealizado = null,
        ?float $vlSaldo = null
    ) {
        $this->dtData = $dtData;
        $this->vlCpPrevisto = $vlCpPrevisto;
        $this->vlCpRealizado = $vlCpRealizado;
        $this->vlCrPrevisto = $vlCrPrevisto;
        $this->vlCrRealizado = $vlCrRealizado;
        $this->vlSaldo = $vlSaldo;
    }

    public function getDtData(): ?\DateTimeInterface
    {
        return $this->dtData;
    }

    public function setDtData(?\DateTimeInterface $dtData): self
    {
        $this->dtData = $dtData;
        return $this;
    }

    public function getVlCpPrevisto(): ?float
    {
        return $this->vlCpPrevisto;
    }

    public function setVlCpPrevisto(?float $vlCpPrevisto): self
    {
        $this->vlCpPrevisto = $vlCpPrevisto;
        return $this;
    }

    public function getVlCpRealizado(): ?float
    {
        return $this->vlCpRealizado;
    }

    public function setVlCpRealizado(?float $vlCpRealizado): self
    {
        $this->vlCpRealizado = $vlCpRealizado;
        return $this;
    }

    public function getVlCrPrevisto(): ?float
    {
        return $this->vlCrPrevisto;
    }

    public function setVlCrPrevisto(?float $vlCrPrevisto): self
    {
        $this->vlCrPrevisto = $vlCrPrevisto;
        return $this;
    }

    public function getVlCrRealizado(): ?float
    {
        return $this->vlCrRealizado;
    }

    public function setVlCrRealizado(?float $vlCrRealizado): self
    {
        $this->vlCrRealizado = $vlCrRealizado;
        return $this;
    }

    public function getVlSaldo(): ?float
    {
        return $this->vlSaldo;
    }

    public function setVlSaldo(?float $vlSaldo): self
    {
        $this->vlSaldo = $vlSaldo;
        return $this;
    }
}
