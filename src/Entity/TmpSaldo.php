<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\TmpSaldoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TmpSaldoRepository::class)]
#[ORM\Table(
    name: 'tmp_saldo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_caixa', columns: ['cd_caixa', 'cd_coligada', 'dt_saldo', 'sn_compensa'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_DT_SALDO', columns: ['dt_saldo'])]
#[ORM\Index(name: 'IX_SN_COMPENSA', columns: ['sn_compensa'])]
#[ORM\Index(name: 'IX_VL_SALDO', columns: ['vl_saldo'])]
class TmpSaldo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_caixa', type: 'integer', options: ['default' => '0'])]
    private int $cdCaixa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'dt_saldo', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtSaldo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'sn_compensa', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCompensa = 0;

    #[ORM\Column(name: 'vl_saldo', type: 'float', nullable: true)]
    private ?float $vlSaldo = null;

    #[ORM\Column(name: 'dt_timestamp', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtTimestamp = null;

    public function __construct(
        int $cdCaixa = 0,
        int $cdColigada = 0,
        ?\DateTimeInterface $dtSaldo = null,
        int $snCompensa = 0,
        ?float $vlSaldo = null,
        ?\DateTimeInterface $dtTimestamp = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->cdColigada = $cdColigada;
        $this->dtSaldo = $dtSaldo;
        $this->snCompensa = $snCompensa;
        $this->vlSaldo = $vlSaldo;
        $this->dtTimestamp = $dtTimestamp;
    }

    public function getCdCaixa(): int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getDtSaldo(): ?\DateTimeInterface
    {
        return $this->dtSaldo;
    }

    public function setDtSaldo(?\DateTimeInterface $dtSaldo): self
    {
        $this->dtSaldo = $dtSaldo;
        return $this;
    }

    public function getSnCompensa(): int
    {
        return $this->snCompensa;
    }

    public function setSnCompensa(int $snCompensa): self
    {
        $this->snCompensa = $snCompensa;
        return $this;
    }

    public function getVlSaldo(): ?float
    {
        return $this->vlSaldo;
    }

    public function setVlSaldo(?float $vlSaldo): self
    {
        $this->vlSaldo = $vlSaldo;
        return $this;
    }

    public function getDtTimestamp(): ?\DateTimeInterface
    {
        return $this->dtTimestamp;
    }

    public function setDtTimestamp(?\DateTimeInterface $dtTimestamp): self
    {
        $this->dtTimestamp = $dtTimestamp;
        return $this;
    }
}
