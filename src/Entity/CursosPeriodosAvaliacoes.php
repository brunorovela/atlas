<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosPeriodosAvaliacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosPeriodosAvaliacoesRepository::class)]
#[ORM\Table(
    name: 'cursos_periodos_avaliacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PERIODO_AVALIACAO', columns: ['cd_periodo_avaliacao'])]
class CursosPeriodosAvaliacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_periodo_avaliacao', type: 'smallint')]
    private ?int $cdPeriodoAvaliacao = null;

    #[ORM\Column(name: 'ds_periodicidade', type: 'string', length: 20, nullable: true)]
    private ?string $dsPeriodicidade = null;

    #[ORM\Column(name: 'ds_periodo_avaliacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsPeriodoAvaliacao = null;

    #[ORM\Column(name: 'ds_periodo_abreviado', type: 'string', length: 10, nullable: true)]
    private ?string $dsPeriodoAbreviado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPeriodoAvaliacao = null,
        ?string $dsPeriodicidade = null,
        ?string $dsPeriodoAvaliacao = null,
        ?string $dsPeriodoAbreviado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPeriodoAvaliacao = $cdPeriodoAvaliacao;
        $this->dsPeriodicidade = $dsPeriodicidade;
        $this->dsPeriodoAvaliacao = $dsPeriodoAvaliacao;
        $this->dsPeriodoAbreviado = $dsPeriodoAbreviado;
        $this->dtBase = $dtBase;
    }

    public function getCdPeriodoAvaliacao(): ?int
    {
        return $this->cdPeriodoAvaliacao;
    }

    public function setCdPeriodoAvaliacao(?int $cdPeriodoAvaliacao): self
    {
        $this->cdPeriodoAvaliacao = $cdPeriodoAvaliacao;
        return $this;
    }

    public function getDsPeriodicidade(): ?string
    {
        return $this->dsPeriodicidade;
    }

    public function setDsPeriodicidade(?string $dsPeriodicidade): self
    {
        $this->dsPeriodicidade = $dsPeriodicidade;
        return $this;
    }

    public function getDsPeriodoAvaliacao(): ?string
    {
        return $this->dsPeriodoAvaliacao;
    }

    public function setDsPeriodoAvaliacao(?string $dsPeriodoAvaliacao): self
    {
        $this->dsPeriodoAvaliacao = $dsPeriodoAvaliacao;
        return $this;
    }

    public function getDsPeriodoAbreviado(): ?string
    {
        return $this->dsPeriodoAbreviado;
    }

    public function setDsPeriodoAbreviado(?string $dsPeriodoAbreviado): self
    {
        $this->dsPeriodoAbreviado = $dsPeriodoAbreviado;
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
