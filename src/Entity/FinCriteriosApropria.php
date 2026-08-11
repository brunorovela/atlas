<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCriteriosApropriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCriteriosApropriaRepository::class)]
#[ORM\Table(
    name: 'fin_criterios_apropria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_APROPRIACAO', columns: ['cd_apropriacao'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinCriteriosApropria
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_apropriacao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdApropriacao = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'ds_apropriacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsApropriacao = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'vl_total', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'sn_rateio_matriculas', type: 'boolean', nullable: true, options: ['default' => '0', 'comment' => 'Quando ligado, define o rateio pelo número de matrículas pelo centro de custo.'])]
    private ?bool $snRateioMatriculas = false;

    #[ORM\Column(name: 'ds_sigla_lancamento', type: 'string', length: 5, nullable: true)]
    private ?string $dsSiglaLancamento = null;

    public function __construct(
        int $cdApropriacao = 0,
        int $cdColigada = 1,
        ?string $dsApropriacao = null,
        ?string $dsObservacao = null,
        ?float $vlTotal = null,
        ?bool $snRateioMatriculas = false,
        ?string $dsSiglaLancamento = null
    ) {
        $this->cdApropriacao = $cdApropriacao;
        $this->cdColigada = $cdColigada;
        $this->dsApropriacao = $dsApropriacao;
        $this->dsObservacao = $dsObservacao;
        $this->vlTotal = $vlTotal;
        $this->snRateioMatriculas = $snRateioMatriculas;
        $this->dsSiglaLancamento = $dsSiglaLancamento;
    }

    public function getCdApropriacao(): int
    {
        return $this->cdApropriacao;
    }

    public function setCdApropriacao(int $cdApropriacao): self
    {
        $this->cdApropriacao = $cdApropriacao;
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

    public function getDsApropriacao(): ?string
    {
        return $this->dsApropriacao;
    }

    public function setDsApropriacao(?string $dsApropriacao): self
    {
        $this->dsApropriacao = $dsApropriacao;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function isSnRateioMatriculas(): ?bool
    {
        return $this->snRateioMatriculas;
    }

    public function setSnRateioMatriculas(?bool $snRateioMatriculas): self
    {
        $this->snRateioMatriculas = $snRateioMatriculas;
        return $this;
    }

    public function getDsSiglaLancamento(): ?string
    {
        return $this->dsSiglaLancamento;
    }

    public function setDsSiglaLancamento(?string $dsSiglaLancamento): self
    {
        $this->dsSiglaLancamento = $dsSiglaLancamento;
        return $this;
    }
}
