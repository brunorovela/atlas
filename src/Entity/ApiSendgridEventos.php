<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ApiSendgridEventosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiSendgridEventosRepository::class)]
#[ORM\Table(
    name: 'api_sendgrid_eventos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ApiSendgridEventos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_evento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEvento = null;

    #[ORM\Column(name: 'ds_evento', type: 'string', length: 100)]
    private ?string $dsEvento = null;

    public function __construct(
        ?string $dsEvento = null
    ) {
        $this->dsEvento = $dsEvento;
    }

    public function getCdEvento(): ?int
    {
        return $this->cdEvento;
    }

    public function getDsEvento(): ?string
    {
        return $this->dsEvento;
    }

    public function setDsEvento(?string $dsEvento): self
    {
        $this->dsEvento = $dsEvento;
        return $this;
    }
}
