<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\TaCatracaEventoTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaEventoTipoRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_evento_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_EVENTO_TIPO_NM_EVENTO', columns: ['NM_EVENTO'])]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_EVENTO_TIPO_DS_CHAVE', columns: ['DS_CHAVE'])]
class TaCatracaEventoTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_EVENTO_TIPO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdCatracaEventoTipo = null;

    #[ORM\Column(name: 'NM_EVENTO', type: 'string', length: 255)]
    private ?string $nmEvento = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $nmEvento = null,
        ?string $dsChave = null
    ) {
        $this->nmEvento = $nmEvento;
        $this->dsChave = $dsChave;
    }

    public function getCdCatracaEventoTipo(): ?int
    {
        return $this->cdCatracaEventoTipo;
    }

    public function getNmEvento(): ?string
    {
        return $this->nmEvento;
    }

    public function setNmEvento(?string $nmEvento): self
    {
        $this->nmEvento = $nmEvento;
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
