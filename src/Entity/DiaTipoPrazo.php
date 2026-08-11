<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiaTipoPrazoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiaTipoPrazoRepository::class)]
#[ORM\Table(
    name: 'dia_tipo_prazo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DiaTipoPrazo
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_TIPO_PRAZO', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoPrazo = 0;

    #[ORM\Column(name: 'DS_TIPO_PRAZO', type: 'string', length: 255)]
    private ?string $dsTipoPrazo = null;

    #[ORM\Column(name: 'NR_ORDEM', type: 'integer')]
    private ?int $nrOrdem = null;

    public function __construct(
        int $cdTipoPrazo = 0,
        ?string $dsTipoPrazo = null,
        ?int $nrOrdem = null
    ) {
        $this->cdTipoPrazo = $cdTipoPrazo;
        $this->dsTipoPrazo = $dsTipoPrazo;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdTipoPrazo(): int
    {
        return $this->cdTipoPrazo;
    }

    public function setCdTipoPrazo(int $cdTipoPrazo): self
    {
        $this->cdTipoPrazo = $cdTipoPrazo;
        return $this;
    }

    public function getDsTipoPrazo(): ?string
    {
        return $this->dsTipoPrazo;
    }

    public function setDsTipoPrazo(?string $dsTipoPrazo): self
    {
        $this->dsTipoPrazo = $dsTipoPrazo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
