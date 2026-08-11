<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinIndicadoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinIndicadoresRepository::class)]
#[ORM\Table(
    name: 'fin_indicadores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinIndicadores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicador', type: 'integer')]
    private ?int $cdIndicador = null;

    #[ORM\Column(name: 'ds_indicador', type: 'string', length: 100, nullable: true)]
    private ?string $dsIndicador = null;

    #[ORM\Column(name: 'ds_formula', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFormula = null;

    #[ORM\Column(name: 'nr_verde_min', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVerdeMin = 0;

    #[ORM\Column(name: 'nr_verde_max', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVerdeMax = 0;

    #[ORM\Column(name: 'nr_amarelo_min', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrAmareloMin = 0;

    #[ORM\Column(name: 'nr_amarelo_max', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrAmareloMax = 0;

    #[ORM\Column(name: 'nr_vermelho_min', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVermelhoMin = 0;

    #[ORM\Column(name: 'nr_vermelho_max', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVermelhoMax = 0;

    #[ORM\Column(name: 'nr_escala_min', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrEscalaMin = 0;

    #[ORM\Column(name: 'nr_escala_max', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrEscalaMax = 0;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_ajuda', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsAjuda = null;

    #[ORM\Column(name: 'sn_expandir_curso', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExpandirCurso = false;

    #[ORM\Column(name: 'cd_vinculo', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdVinculo = 0;

    #[ORM\Column(name: 'nr_verde_min_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVerdeMinCurso = 0;

    #[ORM\Column(name: 'nr_verde_max_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVerdeMaxCurso = 0;

    #[ORM\Column(name: 'nr_amarelo_min_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrAmareloMinCurso = 0;

    #[ORM\Column(name: 'nr_amarelo_max_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrAmareloMaxCurso = 0;

    #[ORM\Column(name: 'nr_vermelho_min_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVermelhoMinCurso = 0;

    #[ORM\Column(name: 'nr_vermelho_max_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrVermelhoMaxCurso = 0;

    #[ORM\Column(name: 'nr_escala_min_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrEscalaMinCurso = 0;

    #[ORM\Column(name: 'nr_escala_max_curso', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrEscalaMaxCurso = 0;

    // Sem construtor: 22 propriedades. Use os setters encadeados.

    public function getCdIndicador(): ?int
    {
        return $this->cdIndicador;
    }

    public function getDsIndicador(): ?string
    {
        return $this->dsIndicador;
    }

    public function setDsIndicador(?string $dsIndicador): self
    {
        $this->dsIndicador = $dsIndicador;
        return $this;
    }

    public function getDsFormula(): ?string
    {
        return $this->dsFormula;
    }

    public function setDsFormula(?string $dsFormula): self
    {
        $this->dsFormula = $dsFormula;
        return $this;
    }

    public function getNrVerdeMin(): ?int
    {
        return $this->nrVerdeMin;
    }

    public function setNrVerdeMin(?int $nrVerdeMin): self
    {
        $this->nrVerdeMin = $nrVerdeMin;
        return $this;
    }

    public function getNrVerdeMax(): ?int
    {
        return $this->nrVerdeMax;
    }

    public function setNrVerdeMax(?int $nrVerdeMax): self
    {
        $this->nrVerdeMax = $nrVerdeMax;
        return $this;
    }

    public function getNrAmareloMin(): ?int
    {
        return $this->nrAmareloMin;
    }

    public function setNrAmareloMin(?int $nrAmareloMin): self
    {
        $this->nrAmareloMin = $nrAmareloMin;
        return $this;
    }

    public function getNrAmareloMax(): ?int
    {
        return $this->nrAmareloMax;
    }

    public function setNrAmareloMax(?int $nrAmareloMax): self
    {
        $this->nrAmareloMax = $nrAmareloMax;
        return $this;
    }

    public function getNrVermelhoMin(): ?int
    {
        return $this->nrVermelhoMin;
    }

    public function setNrVermelhoMin(?int $nrVermelhoMin): self
    {
        $this->nrVermelhoMin = $nrVermelhoMin;
        return $this;
    }

    public function getNrVermelhoMax(): ?int
    {
        return $this->nrVermelhoMax;
    }

    public function setNrVermelhoMax(?int $nrVermelhoMax): self
    {
        $this->nrVermelhoMax = $nrVermelhoMax;
        return $this;
    }

    public function getNrEscalaMin(): ?int
    {
        return $this->nrEscalaMin;
    }

    public function setNrEscalaMin(?int $nrEscalaMin): self
    {
        $this->nrEscalaMin = $nrEscalaMin;
        return $this;
    }

    public function getNrEscalaMax(): ?int
    {
        return $this->nrEscalaMax;
    }

    public function setNrEscalaMax(?int $nrEscalaMax): self
    {
        $this->nrEscalaMax = $nrEscalaMax;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsAjuda(): ?string
    {
        return $this->dsAjuda;
    }

    public function setDsAjuda(?string $dsAjuda): self
    {
        $this->dsAjuda = $dsAjuda;
        return $this;
    }

    public function isSnExpandirCurso(): ?bool
    {
        return $this->snExpandirCurso;
    }

    public function setSnExpandirCurso(?bool $snExpandirCurso): self
    {
        $this->snExpandirCurso = $snExpandirCurso;
        return $this;
    }

    public function getCdVinculo(): ?int
    {
        return $this->cdVinculo;
    }

    public function setCdVinculo(?int $cdVinculo): self
    {
        $this->cdVinculo = $cdVinculo;
        return $this;
    }

    public function getNrVerdeMinCurso(): ?int
    {
        return $this->nrVerdeMinCurso;
    }

    public function setNrVerdeMinCurso(?int $nrVerdeMinCurso): self
    {
        $this->nrVerdeMinCurso = $nrVerdeMinCurso;
        return $this;
    }

    public function getNrVerdeMaxCurso(): ?int
    {
        return $this->nrVerdeMaxCurso;
    }

    public function setNrVerdeMaxCurso(?int $nrVerdeMaxCurso): self
    {
        $this->nrVerdeMaxCurso = $nrVerdeMaxCurso;
        return $this;
    }

    public function getNrAmareloMinCurso(): ?int
    {
        return $this->nrAmareloMinCurso;
    }

    public function setNrAmareloMinCurso(?int $nrAmareloMinCurso): self
    {
        $this->nrAmareloMinCurso = $nrAmareloMinCurso;
        return $this;
    }

    public function getNrAmareloMaxCurso(): ?int
    {
        return $this->nrAmareloMaxCurso;
    }

    public function setNrAmareloMaxCurso(?int $nrAmareloMaxCurso): self
    {
        $this->nrAmareloMaxCurso = $nrAmareloMaxCurso;
        return $this;
    }

    public function getNrVermelhoMinCurso(): ?int
    {
        return $this->nrVermelhoMinCurso;
    }

    public function setNrVermelhoMinCurso(?int $nrVermelhoMinCurso): self
    {
        $this->nrVermelhoMinCurso = $nrVermelhoMinCurso;
        return $this;
    }

    public function getNrVermelhoMaxCurso(): ?int
    {
        return $this->nrVermelhoMaxCurso;
    }

    public function setNrVermelhoMaxCurso(?int $nrVermelhoMaxCurso): self
    {
        $this->nrVermelhoMaxCurso = $nrVermelhoMaxCurso;
        return $this;
    }

    public function getNrEscalaMinCurso(): ?int
    {
        return $this->nrEscalaMinCurso;
    }

    public function setNrEscalaMinCurso(?int $nrEscalaMinCurso): self
    {
        $this->nrEscalaMinCurso = $nrEscalaMinCurso;
        return $this;
    }

    public function getNrEscalaMaxCurso(): ?int
    {
        return $this->nrEscalaMaxCurso;
    }

    public function setNrEscalaMaxCurso(?int $nrEscalaMaxCurso): self
    {
        $this->nrEscalaMaxCurso = $nrEscalaMaxCurso;
        return $this;
    }
}
