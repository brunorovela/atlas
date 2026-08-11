<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinOrcamentosColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentosColigadasRepository::class)]
#[ORM\Table(
    name: 'fin_orcamentos_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_FINORCAMENTOCOLIGADA', columns: ['cd_orcamento', 'cd_coligada'])]
class FinOrcamentosColigadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orcamento_coligada', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrcamentoColigada = null;

    #[ORM\Column(name: 'cd_orcamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrcamento = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    public function __construct(
        ?int $cdOrcamento = null,
        ?int $cdColigada = null
    ) {
        $this->cdOrcamento = $cdOrcamento;
        $this->cdColigada = $cdColigada;
    }

    public function getCdOrcamentoColigada(): ?int
    {
        return $this->cdOrcamentoColigada;
    }

    public function getCdOrcamento(): ?int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(?int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
