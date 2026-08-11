<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNegociaParcAtualRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNegociaParcAtualRepository::class)]
#[ORM\Table(
    name: 'fin_negocia_parc_atual',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_NEGOCIA', columns: ['cd_negocia'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class FinNegociaParcAtual
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_negocia', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdNegocia = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMensalidade = 0;

    public function __construct(
        int $cdNegocia = 0,
        int $cdMensalidade = 0
    ) {
        $this->cdNegocia = $cdNegocia;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdNegocia(): int
    {
        return $this->cdNegocia;
    }

    public function setCdNegocia(int $cdNegocia): self
    {
        $this->cdNegocia = $cdNegocia;
        return $this;
    }

    public function getCdMensalidade(): int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
