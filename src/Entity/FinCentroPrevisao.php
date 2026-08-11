<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCentroPrevisaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCentroPrevisaoRepository::class)]
#[ORM\Table(
    name: 'fin_centro_previsao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
class FinCentroPrevisao
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCentro = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdConta = 0;

    #[ORM\Column(name: 'vl_previsao', type: 'float', nullable: true)]
    private ?float $vlPrevisao = null;

    public function __construct(
        int $cdCentro = 0,
        int $cdColigada = 1,
        int $nrAnosemestre = 0,
        int $cdConta = 0,
        ?float $vlPrevisao = null
    ) {
        $this->cdCentro = $cdCentro;
        $this->cdColigada = $cdColigada;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdConta = $cdConta;
        $this->vlPrevisao = $vlPrevisao;
    }

    public function getCdCentro(): int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
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

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdConta(): int
    {
        return $this->cdConta;
    }

    public function setCdConta(int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getVlPrevisao(): ?float
    {
        return $this->vlPrevisao;
    }

    public function setVlPrevisao(?float $vlPrevisao): self
    {
        $this->vlPrevisao = $vlPrevisao;
        return $this;
    }
}
