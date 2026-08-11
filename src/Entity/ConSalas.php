<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConSalasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConSalasRepository::class)]
#[ORM\Table(
    name: 'con_salas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_sala', columns: ['cd_sala'])]
class ConSalas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSala = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 100, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'ds_localizacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocalizacao = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrVagas = null;

    public function __construct(
        ?string $dsSala = null,
        ?string $dsLocalizacao = null,
        ?int $nrVagas = null
    ) {
        $this->dsSala = $dsSala;
        $this->dsLocalizacao = $dsLocalizacao;
        $this->nrVagas = $nrVagas;
    }

    public function getCdSala(): ?int
    {
        return $this->cdSala;
    }

    public function getDsSala(): ?string
    {
        return $this->dsSala;
    }

    public function setDsSala(?string $dsSala): self
    {
        $this->dsSala = $dsSala;
        return $this;
    }

    public function getDsLocalizacao(): ?string
    {
        return $this->dsLocalizacao;
    }

    public function setDsLocalizacao(?string $dsLocalizacao): self
    {
        $this->dsLocalizacao = $dsLocalizacao;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }
}
