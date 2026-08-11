<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoQbMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoQbMensalidadeRepository::class)]
#[ORM\Table(
    name: 'integracao_qb_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_qb_bill_id', columns: ['bill_id'])]
class IntegracaoQbMensalidade
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'bill_id', type: 'bigint', nullable: true)]
    private ?string $billId = null;

    #[ORM\Column(name: 'ds_status', type: 'string', length: 255, nullable: true)]
    private ?string $dsStatus = null;

    #[ORM\Column(name: 'dt_cobranca', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCobranca = null;

    #[ORM\Column(name: 'vl_valor_final', type: 'float', nullable: true)]
    private ?float $vlValorFinal = null;

    #[ORM\Column(name: 'vl_valor_bruto', type: 'float', nullable: true)]
    private ?float $vlValorBruto = null;

    #[ORM\Column(name: 'vl_valor_pago', type: 'float', nullable: true)]
    private ?float $vlValorPago = null;

    #[ORM\Column(name: 'ds_json', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsJson = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $billId = null,
        ?string $dsStatus = null,
        ?\DateTimeInterface $dtCobranca = null,
        ?float $vlValorFinal = null,
        ?float $vlValorBruto = null,
        ?float $vlValorPago = null,
        ?string $dsJson = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->billId = $billId;
        $this->dsStatus = $dsStatus;
        $this->dtCobranca = $dtCobranca;
        $this->vlValorFinal = $vlValorFinal;
        $this->vlValorBruto = $vlValorBruto;
        $this->vlValorPago = $vlValorPago;
        $this->dsJson = $dsJson;
        $this->dtBase = $dtBase;
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

    public function getBillId(): ?string
    {
        return $this->billId;
    }

    public function setBillId(?string $billId): self
    {
        $this->billId = $billId;
        return $this;
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

    public function getDtCobranca(): ?\DateTimeInterface
    {
        return $this->dtCobranca;
    }

    public function setDtCobranca(?\DateTimeInterface $dtCobranca): self
    {
        $this->dtCobranca = $dtCobranca;
        return $this;
    }

    public function getVlValorFinal(): ?float
    {
        return $this->vlValorFinal;
    }

    public function setVlValorFinal(?float $vlValorFinal): self
    {
        $this->vlValorFinal = $vlValorFinal;
        return $this;
    }

    public function getVlValorBruto(): ?float
    {
        return $this->vlValorBruto;
    }

    public function setVlValorBruto(?float $vlValorBruto): self
    {
        $this->vlValorBruto = $vlValorBruto;
        return $this;
    }

    public function getVlValorPago(): ?float
    {
        return $this->vlValorPago;
    }

    public function setVlValorPago(?float $vlValorPago): self
    {
        $this->vlValorPago = $vlValorPago;
        return $this;
    }

    public function getDsJson(): ?string
    {
        return $this->dsJson;
    }

    public function setDsJson(?string $dsJson): self
    {
        $this->dsJson = $dsJson;
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
