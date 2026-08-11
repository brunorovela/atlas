<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaCatracaMarcaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaMarcaRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_marca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_MARCA_NM_MARCA', columns: ['NM_MARCA'])]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_MARCA_DS_CHAVE', columns: ['DS_CHAVE'])]
class TaCatracaMarca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_MARCA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCatracaMarca = null;

    #[ORM\Column(name: 'NM_MARCA', type: 'string', length: 255)]
    private ?string $nmMarca = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $nmMarca = null,
        ?string $dsChave = null
    ) {
        $this->nmMarca = $nmMarca;
        $this->dsChave = $dsChave;
    }

    public function getCdCatracaMarca(): ?int
    {
        return $this->cdCatracaMarca;
    }

    public function getNmMarca(): ?string
    {
        return $this->nmMarca;
    }

    public function setNmMarca(?string $nmMarca): self
    {
        $this->nmMarca = $nmMarca;
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
