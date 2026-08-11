<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\Bs2BoletoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Bs2BoletoRepository::class)]
#[ORM\Table(
    name: 'bs2_boleto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_BS2_ID_BOLETO', columns: ['ds_bs2_id_boleto'])]
#[ORM\Index(name: 'IX_DS_BS2_SEU_NUMERO', columns: ['ds_bs2_seu_numero'])]
#[ORM\Index(name: 'IX_DS_BS2_NOSSONUMERO', columns: ['ds_bs2_nossonumero'])]
#[ORM\Index(name: 'IX_NR_STATUS', columns: ['nr_status'])]
class Bs2Boleto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bs2_boleto', type: 'integer')]
    private ?int $cdBs2Boleto = null;

    #[ORM\Column(name: 'ds_bs2_id_boleto', type: 'string', length: 255, nullable: true)]
    private ?string $dsBs2IdBoleto = null;

    #[ORM\Column(name: 'ds_bs2_seu_numero', type: 'string', length: 255, nullable: true)]
    private ?string $dsBs2SeuNumero = null;

    #[ORM\Column(name: 'ds_bs2_nossonumero', type: 'string', length: 255, nullable: true)]
    private ?string $dsBs2Nossonumero = null;

    #[ORM\Column(name: 'nr_status', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrStatus = null;

    #[ORM\Column(name: 'me_json_boleto', type: 'text', length: 16777215, nullable: true)]
    private ?string $meJsonBoleto = null;

    #[ORM\Column(name: 'me_json_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meJsonErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsBs2IdBoleto = null,
        ?string $dsBs2SeuNumero = null,
        ?string $dsBs2Nossonumero = null,
        ?int $nrStatus = null,
        ?string $meJsonBoleto = null,
        ?string $meJsonErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsBs2IdBoleto = $dsBs2IdBoleto;
        $this->dsBs2SeuNumero = $dsBs2SeuNumero;
        $this->dsBs2Nossonumero = $dsBs2Nossonumero;
        $this->nrStatus = $nrStatus;
        $this->meJsonBoleto = $meJsonBoleto;
        $this->meJsonErro = $meJsonErro;
        $this->dtBase = $dtBase;
    }

    public function getCdBs2Boleto(): ?int
    {
        return $this->cdBs2Boleto;
    }

    public function getDsBs2IdBoleto(): ?string
    {
        return $this->dsBs2IdBoleto;
    }

    public function setDsBs2IdBoleto(?string $dsBs2IdBoleto): self
    {
        $this->dsBs2IdBoleto = $dsBs2IdBoleto;
        return $this;
    }

    public function getDsBs2SeuNumero(): ?string
    {
        return $this->dsBs2SeuNumero;
    }

    public function setDsBs2SeuNumero(?string $dsBs2SeuNumero): self
    {
        $this->dsBs2SeuNumero = $dsBs2SeuNumero;
        return $this;
    }

    public function getDsBs2Nossonumero(): ?string
    {
        return $this->dsBs2Nossonumero;
    }

    public function setDsBs2Nossonumero(?string $dsBs2Nossonumero): self
    {
        $this->dsBs2Nossonumero = $dsBs2Nossonumero;
        return $this;
    }

    public function getNrStatus(): ?int
    {
        return $this->nrStatus;
    }

    public function setNrStatus(?int $nrStatus): self
    {
        $this->nrStatus = $nrStatus;
        return $this;
    }

    public function getMeJsonBoleto(): ?string
    {
        return $this->meJsonBoleto;
    }

    public function setMeJsonBoleto(?string $meJsonBoleto): self
    {
        $this->meJsonBoleto = $meJsonBoleto;
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
