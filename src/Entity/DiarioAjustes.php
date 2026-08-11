<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioAjustesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAjustesRepository::class)]
#[ORM\Table(
    name: 'diario_ajustes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DiarioAjustes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ajuste', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAjuste = null;

    #[ORM\Column(name: 'ds_ajuste', type: 'string', length: 100, nullable: true)]
    private ?string $dsAjuste = null;

    public function __construct(
        ?string $dsAjuste = null
    ) {
        $this->dsAjuste = $dsAjuste;
    }

    public function getCdAjuste(): ?int
    {
        return $this->cdAjuste;
    }

    public function getDsAjuste(): ?string
    {
        return $this->dsAjuste;
    }

    public function setDsAjuste(?string $dsAjuste): self
    {
        $this->dsAjuste = $dsAjuste;
        return $this;
    }
}
