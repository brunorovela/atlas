<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinFacturasItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinFacturasItensRepository::class)]
#[ORM\Table(
    name: 'fin_facturas_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_FACTURA', columns: ['cd_factura'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class FinFacturasItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_factura_item', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdFacturaItem = null;

    #[ORM\Column(name: 'cd_factura', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdFactura = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'vl_item', type: 'float', options: ['default' => '0'])]
    private float $vlItem = 0.0;

    public function __construct(
        ?string $cdFactura = null,
        ?int $cdMensalidade = null,
        float $vlItem = 0.0
    ) {
        $this->cdFactura = $cdFactura;
        $this->cdMensalidade = $cdMensalidade;
        $this->vlItem = $vlItem;
    }

    public function getCdFacturaItem(): ?string
    {
        return $this->cdFacturaItem;
    }

    public function getCdFactura(): ?string
    {
        return $this->cdFactura;
    }

    public function setCdFactura(?string $cdFactura): self
    {
        $this->cdFactura = $cdFactura;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getVlItem(): float
    {
        return $this->vlItem;
    }

    public function setVlItem(float $vlItem): self
    {
        $this->vlItem = $vlItem;
        return $this;
    }
}
