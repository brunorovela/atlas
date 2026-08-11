<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfceColigadasNnfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfceColigadasNnfRepository::class)]
#[ORM\Table(
    name: 'fin_nfce_coligadas_nnf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfceColigadasNnf
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_COLIGADA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'NR_NNF', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrNnf = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $nrNnf = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->nrNnf = $nrNnf;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrNnf(): ?int
    {
        return $this->nrNnf;
    }

    public function setNrNnf(?int $nrNnf): self
    {
        $this->nrNnf = $nrNnf;
        return $this;
    }
}
