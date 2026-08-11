<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinApropriaTeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinApropriaTeRepository::class)]
#[ORM\Table(
    name: 'fin_apropria_te',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_TE', columns: ['cd_movimento_te'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
#[ORM\Index(name: 'IX_NR_SEQUENCIA', columns: ['nr_sequencia'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['nr_sequencia']
)]
class FinApropriaTe
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', options: ['default' => '0'])]
    private int $cdMovimentoTe = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['default' => '0'])]
    private int $cdCentro = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['default' => '0'])]
    private int $cdConta = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'vl_movimento', type: 'float', nullable: true)]
    private ?float $vlMovimento = null;

    #[ORM\Column(name: 'nr_sequencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrSequencia = null;

    public function __construct(
        int $cdMovimentoTe = 0,
        int $cdCentro = 0,
        int $cdConta = 0,
        int $cdColigada = 1,
        ?float $vlMovimento = null,
        ?int $nrSequencia = null
    ) {
        $this->cdMovimentoTe = $cdMovimentoTe;
        $this->cdCentro = $cdCentro;
        $this->cdConta = $cdConta;
        $this->cdColigada = $cdColigada;
        $this->vlMovimento = $vlMovimento;
        $this->nrSequencia = $nrSequencia;
    }

    public function getCdMovimentoTe(): int
    {
        return $this->cdMovimentoTe;
    }

    public function setCdMovimentoTe(int $cdMovimentoTe): self
    {
        $this->cdMovimentoTe = $cdMovimentoTe;
        return $this;
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

    public function getCdConta(): int
    {
        return $this->cdConta;
    }

    public function setCdConta(int $cdConta): self
    {
        $this->cdConta = $cdConta;
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

    public function getVlMovimento(): ?float
    {
        return $this->vlMovimento;
    }

    public function setVlMovimento(?float $vlMovimento): self
    {
        $this->vlMovimento = $vlMovimento;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }
}
