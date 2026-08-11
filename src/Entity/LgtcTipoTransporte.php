<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LgtcTipoTransporteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcTipoTransporteRepository::class)]
#[ORM\Table(
    name: 'lgtc_tipo_transporte',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TIPO_TRANSPORTE_DS_TIPO_TRANSPORTE', columns: ['DS_TIPO_TRANSPORTE'])]
#[ORM\UniqueConstraint(name: 'UK_TIPO_TRANSPORTE_DS_CHAVE', columns: ['DS_CHAVE'])]
class LgtcTipoTransporte
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO_TRANSPORTE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipoTransporte = null;

    #[ORM\Column(name: 'DS_TIPO_TRANSPORTE', type: 'string', length: 64)]
    private ?string $dsTipoTransporte = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsTipoTransporte = null,
        ?string $dsChave = null
    ) {
        $this->dsTipoTransporte = $dsTipoTransporte;
        $this->dsChave = $dsChave;
    }

    public function getCdTipoTransporte(): ?int
    {
        return $this->cdTipoTransporte;
    }

    public function getDsTipoTransporte(): ?string
    {
        return $this->dsTipoTransporte;
    }

    public function setDsTipoTransporte(?string $dsTipoTransporte): self
    {
        $this->dsTipoTransporte = $dsTipoTransporte;
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
