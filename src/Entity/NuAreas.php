<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuAreasRepository::class)]
#[ORM\Table(
    name: 'nu_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class NuAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer')]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_nome_area', type: 'string', length: 100)]
    private ?string $dsNomeArea = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsNomeArea = null,
        ?string $dsChave = null
    ) {
        $this->dsNomeArea = $dsNomeArea;
        $this->dsChave = $dsChave;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function getDsNomeArea(): ?string
    {
        return $this->dsNomeArea;
    }

    public function setDsNomeArea(?string $dsNomeArea): self
    {
        $this->dsNomeArea = $dsNomeArea;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
