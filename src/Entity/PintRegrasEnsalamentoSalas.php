<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintRegrasEnsalamentoSalasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintRegrasEnsalamentoSalasRepository::class)]
#[ORM\Table(
    name: 'pint_regras_ensalamento_salas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REGRA_ENSALAMENTO', columns: ['cd_regra_ensalamento'])]
#[ORM\Index(name: 'IX_CD_SALA', columns: ['cd_sala'])]
class PintRegrasEnsalamentoSalas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraSala = null;

    #[ORM\Column(name: 'cd_regra_ensalamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraEnsalamento = null;

    #[ORM\Column(name: 'cd_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSala = null;

    public function __construct(
        ?int $cdRegraEnsalamento = null,
        ?int $cdSala = null
    ) {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
        $this->cdSala = $cdSala;
    }

    public function getCdRegraSala(): ?int
    {
        return $this->cdRegraSala;
    }

    public function getCdRegraEnsalamento(): ?int
    {
        return $this->cdRegraEnsalamento;
    }

    public function setCdRegraEnsalamento(?int $cdRegraEnsalamento): self
    {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
        return $this;
    }

    public function getCdSala(): ?int
    {
        return $this->cdSala;
    }

    public function setCdSala(?int $cdSala): self
    {
        $this->cdSala = $cdSala;
        return $this;
    }
}
