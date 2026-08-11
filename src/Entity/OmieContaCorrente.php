<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieContaCorrenteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieContaCorrenteRepository::class)]
#[ORM\Table(
    name: 'omie_conta_corrente',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_OMIE_CONTA_CORRENTE_INTEGRACAO', columns: ['cd_integracao_omie', 'cd_caixa'])]
class OmieContaCorrente
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_conta_corrente', type: 'integer')]
    private ?int $cdOmieContaCorrente = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint')]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer')]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_caixa_omie', type: 'bigint')]
    private ?string $cdCaixaOmie = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $cdCaixa = null,
        ?string $cdCaixaOmie = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->cdCaixa = $cdCaixa;
        $this->cdCaixaOmie = $cdCaixaOmie;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieContaCorrente(): ?int
    {
        return $this->cdOmieContaCorrente;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getCdCaixaOmie(): ?string
    {
        return $this->cdCaixaOmie;
    }

    public function setCdCaixaOmie(?string $cdCaixaOmie): self
    {
        $this->cdCaixaOmie = $cdCaixaOmie;
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
