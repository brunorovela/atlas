<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanosPgtoParcelasDetalhesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoParcelasDetalhesRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_parcelas_detalhes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_plano_parcela', columns: ['cd_plano_parcela'])]
class FinPlanosPgtoParcelasDetalhes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_parcela_detalhe', type: 'integer')]
    private ?int $cdPlanoParcelaDetalhe = null;

    #[ORM\Column(name: 'vl_plano_parcela_detalhe', type: 'float')]
    private ?float $vlPlanoParcelaDetalhe = null;

    #[ORM\Column(name: 'ds_plano_parcela_detalhe', type: 'string', length: 255)]
    private ?string $dsPlanoParcelaDetalhe = null;

    #[ORM\Column(name: 'cd_plano_parcela', type: 'integer')]
    private ?int $cdPlanoParcela = null;

    public function __construct(
        ?float $vlPlanoParcelaDetalhe = null,
        ?string $dsPlanoParcelaDetalhe = null,
        ?int $cdPlanoParcela = null
    ) {
        $this->vlPlanoParcelaDetalhe = $vlPlanoParcelaDetalhe;
        $this->dsPlanoParcelaDetalhe = $dsPlanoParcelaDetalhe;
        $this->cdPlanoParcela = $cdPlanoParcela;
    }

    public function getCdPlanoParcelaDetalhe(): ?int
    {
        return $this->cdPlanoParcelaDetalhe;
    }

    public function getVlPlanoParcelaDetalhe(): ?float
    {
        return $this->vlPlanoParcelaDetalhe;
    }

    public function setVlPlanoParcelaDetalhe(?float $vlPlanoParcelaDetalhe): self
    {
        $this->vlPlanoParcelaDetalhe = $vlPlanoParcelaDetalhe;
        return $this;
    }

    public function getDsPlanoParcelaDetalhe(): ?string
    {
        return $this->dsPlanoParcelaDetalhe;
    }

    public function setDsPlanoParcelaDetalhe(?string $dsPlanoParcelaDetalhe): self
    {
        $this->dsPlanoParcelaDetalhe = $dsPlanoParcelaDetalhe;
        return $this;
    }

    public function getCdPlanoParcela(): ?int
    {
        return $this->cdPlanoParcela;
    }

    public function setCdPlanoParcela(?int $cdPlanoParcela): self
    {
        $this->cdPlanoParcela = $cdPlanoParcela;
        return $this;
    }
}
