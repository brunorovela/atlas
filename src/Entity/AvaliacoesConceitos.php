<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvaliacoesConceitosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesConceitosRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_conceitos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
class AvaliacoesConceitos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_avaliacao', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdAvaliacao = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_final', type: 'float', options: ['default' => '0'])]
    private float $nrFinal = 0.0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_inicial', type: 'float', options: ['default' => '0'])]
    private float $nrInicial = 0.0;

    #[ORM\Column(name: 'ds_conceito', type: 'string', length: 45, options: ['default' => ''])]
    private string $dsConceito = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdAvaliacao = 0,
        float $nrFinal = 0.0,
        float $nrInicial = 0.0,
        string $dsConceito = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->nrFinal = $nrFinal;
        $this->nrInicial = $nrInicial;
        $this->dsConceito = $dsConceito;
        $this->dtBase = $dtBase;
    }

    public function getCdAvaliacao(): int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getNrFinal(): float
    {
        return $this->nrFinal;
    }

    public function setNrFinal(float $nrFinal): self
    {
        $this->nrFinal = $nrFinal;
        return $this;
    }

    public function getNrInicial(): float
    {
        return $this->nrInicial;
    }

    public function setNrInicial(float $nrInicial): self
    {
        $this->nrInicial = $nrInicial;
        return $this;
    }

    public function getDsConceito(): string
    {
        return $this->dsConceito;
    }

    public function setDsConceito(string $dsConceito): self
    {
        $this->dsConceito = $dsConceito;
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
