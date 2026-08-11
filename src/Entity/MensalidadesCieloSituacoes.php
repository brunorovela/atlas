<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MensalidadesCieloSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesCieloSituacoesRepository::class)]
#[ORM\Table(
    name: 'mensalidades_cielo_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MensalidadesCieloSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_status', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'ds_status', type: 'string', length: 50, nullable: true)]
    private ?string $dsStatus = null;

    public function __construct(
        ?string $dsStatus = null
    ) {
        $this->dsStatus = $dsStatus;
    }

    public function getCdStatus(): ?int
    {
        return $this->cdStatus;
    }

    public function getDsStatus(): ?string
    {
        return $this->dsStatus;
    }

    public function setDsStatus(?string $dsStatus): self
    {
        $this->dsStatus = $dsStatus;
        return $this;
    }
}
