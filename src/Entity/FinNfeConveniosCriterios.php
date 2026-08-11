<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeConveniosCriteriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeConveniosCriteriosRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_convenios_criterios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONVENIO', columns: ['cd_convenio'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
class FinNfeConveniosCriterios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_convenio_criterio', type: 'integer')]
    private ?int $cdConvenioCriterio = null;

    #[ORM\Column(name: 'cd_convenio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConvenio = null;

    #[ORM\Column(name: 'cd_nfe_criterio_tipo', type: 'integer')]
    private ?int $cdNfeCriterioTipo = null;

    #[ORM\Column(name: 'ds_cargo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCargo = null;

    #[ORM\Column(name: 'cd_depto', type: 'integer', nullable: true)]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'vl_valor_limite', type: 'float', nullable: true)]
    private ?float $vlValorLimite = null;

    public function __construct(
        ?int $cdConvenio = null,
        ?int $cdNfeCriterioTipo = null,
        ?string $dsCargo = null,
        ?int $cdDepto = null,
        ?float $vlValor = null,
        ?float $vlValorLimite = null
    ) {
        $this->cdConvenio = $cdConvenio;
        $this->cdNfeCriterioTipo = $cdNfeCriterioTipo;
        $this->dsCargo = $dsCargo;
        $this->cdDepto = $cdDepto;
        $this->vlValor = $vlValor;
        $this->vlValorLimite = $vlValorLimite;
    }

    public function getCdConvenioCriterio(): ?int
    {
        return $this->cdConvenioCriterio;
    }

    public function getCdConvenio(): ?int
    {
        return $this->cdConvenio;
    }

    public function setCdConvenio(?int $cdConvenio): self
    {
        $this->cdConvenio = $cdConvenio;
        return $this;
    }

    public function getCdNfeCriterioTipo(): ?int
    {
        return $this->cdNfeCriterioTipo;
    }

    public function setCdNfeCriterioTipo(?int $cdNfeCriterioTipo): self
    {
        $this->cdNfeCriterioTipo = $cdNfeCriterioTipo;
        return $this;
    }

    public function getDsCargo(): ?string
    {
        return $this->dsCargo;
    }

    public function setDsCargo(?string $dsCargo): self
    {
        $this->dsCargo = $dsCargo;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }

    public function getVlValorLimite(): ?float
    {
        return $this->vlValorLimite;
    }

    public function setVlValorLimite(?float $vlValorLimite): self
    {
        $this->vlValorLimite = $vlValorLimite;
        return $this;
    }
}
