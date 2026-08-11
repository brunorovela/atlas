<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCpHistoricosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCpHistoricosRepository::class)]
#[ORM\Table(
    name: 'fin_cp_historicos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinCpHistoricos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_historico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHistorico = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 255, nullable: true)]
    private ?string $dsHistorico = null;

    public function __construct(
        ?string $dsHistorico = null
    ) {
        $this->dsHistorico = $dsHistorico;
    }

    public function getCdHistorico(): ?int
    {
        return $this->cdHistorico;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }
}
