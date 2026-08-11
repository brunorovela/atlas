<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CtnFormasPagamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnFormasPagamentoRepository::class)]
#[ORM\Table(
    name: 'ctn_formas_pagamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class CtnFormasPagamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_forma_pagamento', type: 'integer')]
    private ?int $cdFormaPagamento = null;

    #[ORM\Column(name: 'ds_forma_pagamento', type: 'string', length: 255)]
    private ?string $dsFormaPagamento = null;

    #[ORM\Column(name: 'cd_caixa', type: 'string', length: 255)]
    private ?string $cdCaixa = null;

    #[ORM\Column(name: 'sn_tela_credito', type: 'boolean', nullable: true)]
    private ?bool $snTelaCredito = null;

    #[ORM\Column(name: 'sn_tela_venda', type: 'boolean', nullable: true)]
    private ?bool $snTelaVenda = null;

    public function __construct(
        ?string $dsFormaPagamento = null,
        ?string $cdCaixa = null,
        ?bool $snTelaCredito = null,
        ?bool $snTelaVenda = null
    ) {
        $this->dsFormaPagamento = $dsFormaPagamento;
        $this->cdCaixa = $cdCaixa;
        $this->snTelaCredito = $snTelaCredito;
        $this->snTelaVenda = $snTelaVenda;
    }

    public function getCdFormaPagamento(): ?int
    {
        return $this->cdFormaPagamento;
    }

    public function getDsFormaPagamento(): ?string
    {
        return $this->dsFormaPagamento;
    }

    public function setDsFormaPagamento(?string $dsFormaPagamento): self
    {
        $this->dsFormaPagamento = $dsFormaPagamento;
        return $this;
    }

    public function getCdCaixa(): ?string
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?string $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function isSnTelaCredito(): ?bool
    {
        return $this->snTelaCredito;
    }

    public function setSnTelaCredito(?bool $snTelaCredito): self
    {
        $this->snTelaCredito = $snTelaCredito;
        return $this;
    }

    public function isSnTelaVenda(): ?bool
    {
        return $this->snTelaVenda;
    }

    public function setSnTelaVenda(?bool $snTelaVenda): self
    {
        $this->snTelaVenda = $snTelaVenda;
        return $this;
    }
}
