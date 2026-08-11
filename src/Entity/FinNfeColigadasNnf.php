<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeColigadasNnfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeColigadasNnfRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_coligadas_nnf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeColigadasNnf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Column(name: 'nr_nf', type: 'bigint', nullable: true, options: ['default' => '0'])]
    private ?string $nrNf = '0';

    public function __construct(
        int $cdColigada = 0,
        ?string $nrNf = '0'
    ) {
        $this->cdColigada = $cdColigada;
        $this->nrNf = $nrNf;
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

    public function getNrNf(): ?string
    {
        return $this->nrNf;
    }

    public function setNrNf(?string $nrNf): self
    {
        $this->nrNf = $nrNf;
        return $this;
    }
}
