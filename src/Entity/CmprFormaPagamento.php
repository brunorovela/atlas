<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CmprFormaPagamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprFormaPagamentoRepository::class)]
#[ORM\Table(
    name: 'cmpr_forma_pagamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CmprFormaPagamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_forma_pagamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFormaPagamento = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'nr_vencimento_1', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $nrVencimento1 = 1;

    #[ORM\Column(name: 'nr_vencimento_demais', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '30'])]
    private ?int $nrVencimentoDemais = 30;

    #[ORM\Column(name: 'qtd_parcela', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $qtdParcela = 1;

    public function __construct(
        ?string $dsDescricao = null,
        ?int $nrVencimento1 = 1,
        ?int $nrVencimentoDemais = 30,
        ?int $qtdParcela = 1
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->nrVencimento1 = $nrVencimento1;
        $this->nrVencimentoDemais = $nrVencimentoDemais;
        $this->qtdParcela = $qtdParcela;
    }

    public function getCdFormaPagamento(): ?int
    {
        return $this->cdFormaPagamento;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getNrVencimento1(): ?int
    {
        return $this->nrVencimento1;
    }

    public function setNrVencimento1(?int $nrVencimento1): self
    {
        $this->nrVencimento1 = $nrVencimento1;
        return $this;
    }

    public function getNrVencimentoDemais(): ?int
    {
        return $this->nrVencimentoDemais;
    }

    public function setNrVencimentoDemais(?int $nrVencimentoDemais): self
    {
        $this->nrVencimentoDemais = $nrVencimentoDemais;
        return $this;
    }

    public function getQtdParcela(): ?int
    {
        return $this->qtdParcela;
    }

    public function setQtdParcela(?int $qtdParcela): self
    {
        $this->qtdParcela = $qtdParcela;
        return $this;
    }
}
