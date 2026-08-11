<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\Bs2PixRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Bs2PixRepository::class)]
#[ORM\Table(
    name: 'bs2_pix',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GATEWAY_PIX', columns: ['cd_gateway_pix'])]
class Bs2Pix
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bs2_pix', type: 'integer')]
    private ?int $cdBs2Pix = null;

    #[ORM\Column(name: 'cd_gateway_pix', type: 'integer', nullable: true)]
    private ?int $cdGatewayPix = null;

    #[ORM\Column(name: 'ds_valor_chave_evp', type: 'string', length: 255)]
    private ?string $dsValorChaveEvp = null;

    #[ORM\Column(name: 'vl_cobrado', type: 'float')]
    private ?float $vlCobrado = null;

    #[ORM\Column(name: 'vl_pago', type: 'float', nullable: true)]
    private ?float $vlPago = null;

    #[ORM\Column(name: 'ds_end_to_end_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsEndToEndId = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'ds_info_pagador', type: 'text', length: 65535, nullable: true)]
    private ?string $dsInfoPagador = null;

    #[ORM\Column(name: 'ds_cpf_cnpj_pagador', type: 'string', length: 14, nullable: true)]
    private ?string $dsCpfCnpjPagador = null;

    #[ORM\Column(name: 'ds_nome_pagador', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomePagador = null;

    #[ORM\Column(name: 'me_qr_code', type: 'text', length: 65535, nullable: true)]
    private ?string $meQrCode = null;

    #[ORM\Column(name: 'me_json_pix', type: 'text', length: 16777215, nullable: true)]
    private ?string $meJsonPix = null;

    #[ORM\Column(name: 'me_json_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meJsonErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdGatewayPix = null,
        ?string $dsValorChaveEvp = null,
        ?float $vlCobrado = null,
        ?float $vlPago = null,
        ?string $dsEndToEndId = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?string $dsInfoPagador = null,
        ?string $dsCpfCnpjPagador = null,
        ?string $dsNomePagador = null,
        ?string $meQrCode = null,
        ?string $meJsonPix = null,
        ?string $meJsonErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdGatewayPix = $cdGatewayPix;
        $this->dsValorChaveEvp = $dsValorChaveEvp;
        $this->vlCobrado = $vlCobrado;
        $this->vlPago = $vlPago;
        $this->dsEndToEndId = $dsEndToEndId;
        $this->dtPagamento = $dtPagamento;
        $this->dsInfoPagador = $dsInfoPagador;
        $this->dsCpfCnpjPagador = $dsCpfCnpjPagador;
        $this->dsNomePagador = $dsNomePagador;
        $this->meQrCode = $meQrCode;
        $this->meJsonPix = $meJsonPix;
        $this->meJsonErro = $meJsonErro;
        $this->dtBase = $dtBase;
    }

    public function getCdBs2Pix(): ?int
    {
        return $this->cdBs2Pix;
    }

    public function getCdGatewayPix(): ?int
    {
        return $this->cdGatewayPix;
    }

    public function setCdGatewayPix(?int $cdGatewayPix): self
    {
        $this->cdGatewayPix = $cdGatewayPix;
        return $this;
    }

    public function getDsValorChaveEvp(): ?string
    {
        return $this->dsValorChaveEvp;
    }

    public function setDsValorChaveEvp(?string $dsValorChaveEvp): self
    {
        $this->dsValorChaveEvp = $dsValorChaveEvp;
        return $this;
    }

    public function getVlCobrado(): ?float
    {
        return $this->vlCobrado;
    }

    public function setVlCobrado(?float $vlCobrado): self
    {
        $this->vlCobrado = $vlCobrado;
        return $this;
    }

    public function getVlPago(): ?float
    {
        return $this->vlPago;
    }

    public function setVlPago(?float $vlPago): self
    {
        $this->vlPago = $vlPago;
        return $this;
    }

    public function getDsEndToEndId(): ?string
    {
        return $this->dsEndToEndId;
    }

    public function setDsEndToEndId(?string $dsEndToEndId): self
    {
        $this->dsEndToEndId = $dsEndToEndId;
        return $this;
    }

    public function getDtPagamento(): ?\DateTimeInterface
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(?\DateTimeInterface $dtPagamento): self
    {
        $this->dtPagamento = $dtPagamento;
        return $this;
    }

    public function getDsInfoPagador(): ?string
    {
        return $this->dsInfoPagador;
    }

    public function setDsInfoPagador(?string $dsInfoPagador): self
    {
        $this->dsInfoPagador = $dsInfoPagador;
        return $this;
    }

    public function getDsCpfCnpjPagador(): ?string
    {
        return $this->dsCpfCnpjPagador;
    }

    public function setDsCpfCnpjPagador(?string $dsCpfCnpjPagador): self
    {
        $this->dsCpfCnpjPagador = $dsCpfCnpjPagador;
        return $this;
    }

    public function getDsNomePagador(): ?string
    {
        return $this->dsNomePagador;
    }

    public function setDsNomePagador(?string $dsNomePagador): self
    {
        $this->dsNomePagador = $dsNomePagador;
        return $this;
    }

    public function getMeQrCode(): ?string
    {
        return $this->meQrCode;
    }

    public function setMeQrCode(?string $meQrCode): self
    {
        $this->meQrCode = $meQrCode;
        return $this;
    }

    public function getMeJsonPix(): ?string
    {
        return $this->meJsonPix;
    }

    public function setMeJsonPix(?string $meJsonPix): self
    {
        $this->meJsonPix = $meJsonPix;
        return $this;
    }

    public function getMeJsonErro(): ?string
    {
        return $this->meJsonErro;
    }

    public function setMeJsonErro(?string $meJsonErro): self
    {
        $this->meJsonErro = $meJsonErro;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
