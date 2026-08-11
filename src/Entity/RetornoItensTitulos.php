<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RetornoItensTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetornoItensTitulosRepository::class)]
#[ORM\Table(
    name: 'retorno_itens_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RETORNO', columns: ['cd_retorno'])]
#[ORM\Index(name: 'IX_NR_SEQUENCIA', columns: ['nr_sequencia'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class RetornoItensTitulos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_retorno', type: 'integer')]
    private ?int $cdRetorno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_sequencia', type: 'integer')]
    private ?int $nrSequencia = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?int $cdRetorno = null,
        ?int $nrSequencia = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdRetorno = $cdRetorno;
        $this->nrSequencia = $nrSequencia;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdRetorno(): ?int
    {
        return $this->cdRetorno;
    }

    public function setCdRetorno(?int $cdRetorno): self
    {
        $this->cdRetorno = $cdRetorno;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
