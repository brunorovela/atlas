<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaColigadasRpsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaColigadasRpsRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_coligadas_rps',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeG2kaColigadasRps
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Column(name: 'nr_sequencia_rps', type: 'bigint', nullable: true, options: ['default' => '0'])]
    private ?string $nrSequenciaRps = '0';

    public function __construct(
        int $cdColigada = 0,
        ?string $nrSequenciaRps = '0'
    ) {
        $this->cdColigada = $cdColigada;
        $this->nrSequenciaRps = $nrSequenciaRps;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrSequenciaRps(): ?string
    {
        return $this->nrSequenciaRps;
    }

    public function setNrSequenciaRps(?string $nrSequenciaRps): self
    {
        $this->nrSequenciaRps = $nrSequenciaRps;
        return $this;
    }
}
