<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinMoedasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMoedasRepository::class)]
#[ORM\Table(
    name: 'fin_moedas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_moeda', columns: ['cd_moeda'])]
class FinMoedas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_moeda', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMoeda = 0;

    #[ORM\Column(name: 'ds_moeda', type: 'string', length: 50, nullable: true)]
    private ?string $dsMoeda = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 30, nullable: true)]
    private ?string $dsSigla = null;

    public function __construct(
        int $cdMoeda = 0,
        ?string $dsMoeda = null,
        ?string $dsSigla = null
    ) {
        $this->cdMoeda = $cdMoeda;
        $this->dsMoeda = $dsMoeda;
        $this->dsSigla = $dsSigla;
    }

    public function getCdMoeda(): int
    {
        return $this->cdMoeda;
    }

    public function setCdMoeda(int $cdMoeda): self
    {
        $this->cdMoeda = $cdMoeda;
        return $this;
    }

    public function getDsMoeda(): ?string
    {
        return $this->dsMoeda;
    }

    public function setDsMoeda(?string $dsMoeda): self
    {
        $this->dsMoeda = $dsMoeda;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }
}
