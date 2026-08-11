<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinOrcamentosCentrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentosCentrosRepository::class)]
#[ORM\Table(
    name: 'fin_orcamentos_centros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_FINORCAMENTOCENTRO', columns: ['cd_orcamento', 'cd_centro'])]
#[ORM\Index(name: 'IX_CD_ORCAMENTO', columns: ['cd_orcamento'])]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
class FinOrcamentosCentros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orcamento_centro', type: 'integer')]
    private ?int $cdOrcamentoCentro = null;

    #[ORM\Column(name: 'cd_orcamento', type: 'integer', nullable: true)]
    private ?int $cdOrcamento = null;

    #[ORM\Column(name: 'cd_centro', type: 'integer', nullable: true)]
    private ?int $cdCentro = null;

    public function __construct(
        ?int $cdOrcamento = null,
        ?int $cdCentro = null
    ) {
        $this->cdOrcamento = $cdOrcamento;
        $this->cdCentro = $cdCentro;
    }

    public function getCdOrcamentoCentro(): ?int
    {
        return $this->cdOrcamentoCentro;
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

    public function getCdCentro(): ?int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(?int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }
}
