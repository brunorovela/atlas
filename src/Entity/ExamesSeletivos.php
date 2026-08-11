<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExamesSeletivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamesSeletivosRepository::class)]
#[ORM\Table(
    name: 'exames_seletivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PLANOPAGAMENTO', columns: ['cd_planopagamento'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
class ExamesSeletivos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['default' => '0'])]
    private int $cdExame = 0;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'ds_exame', type: 'string', length: 85, nullable: true)]
    private ?string $dsExame = null;

    #[ORM\Column(name: 'dt_exame', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExame = null;

    #[ORM\Column(name: 'sn_aberto', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAberto = null;

    #[ORM\Column(name: 'cd_planopagamento', type: 'smallint', nullable: true)]
    private ?int $cdPlanopagamento = null;

    #[ORM\Column(name: 'cd_depto', type: 'smallint', nullable: true)]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'dt_resultados', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtResultados = null;

    public function __construct(
        int $cdExame = 0,
        int $nrAnosemestre = 0,
        ?string $dsExame = null,
        ?\DateTimeInterface $dtExame = null,
        ?string $snAberto = null,
        ?int $cdPlanopagamento = null,
        ?int $cdDepto = null,
        ?\DateTimeInterface $dtResultados = null
    ) {
        $this->cdExame = $cdExame;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dsExame = $dsExame;
        $this->dtExame = $dtExame;
        $this->snAberto = $snAberto;
        $this->cdPlanopagamento = $cdPlanopagamento;
        $this->cdDepto = $cdDepto;
        $this->dtResultados = $dtResultados;
    }

    public function getCdExame(): int
    {
        return $this->cdExame;
    }

    public function setCdExame(int $cdExame): self
    {
        $this->cdExame = $cdExame;
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

    public function getDsExame(): ?string
    {
        return $this->dsExame;
    }

    public function setDsExame(?string $dsExame): self
    {
        $this->dsExame = $dsExame;
        return $this;
    }

    public function getDtExame(): ?\DateTimeInterface
    {
        return $this->dtExame;
    }

    public function setDtExame(?\DateTimeInterface $dtExame): self
    {
        $this->dtExame = $dtExame;
        return $this;
    }

    public function getSnAberto(): ?string
    {
        return $this->snAberto;
    }

    public function setSnAberto(?string $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }

    public function getCdPlanopagamento(): ?int
    {
        return $this->cdPlanopagamento;
    }

    public function setCdPlanopagamento(?int $cdPlanopagamento): self
    {
        $this->cdPlanopagamento = $cdPlanopagamento;
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

    public function getDtResultados(): ?\DateTimeInterface
    {
        return $this->dtResultados;
    }

    public function setDtResultados(?\DateTimeInterface $dtResultados): self
    {
        $this->dtResultados = $dtResultados;
        return $this;
    }
}
