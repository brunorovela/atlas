<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CusteioConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CusteioConfigRepository::class)]
#[ORM\Table(
    name: 'custeio_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO_PAI', columns: ['cd_grupo_pai'])]
class CusteioConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'nm_grupo', type: 'string', length: 100, nullable: true)]
    private ?string $nmGrupo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_grupo_pai', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupoPai = null;

    #[ORM\Column(name: 'ds_formula_calculo', type: 'string', length: 200, nullable: true)]
    private ?string $dsFormulaCalculo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_visivel', type: 'boolean', nullable: true)]
    private ?bool $snVisivel = null;

    public function __construct(
        ?string $nmGrupo = null,
        ?string $dsChave = null,
        ?int $cdGrupoPai = null,
        ?string $dsFormulaCalculo = null,
        ?int $nrOrdem = null,
        ?bool $snVisivel = null
    ) {
        $this->nmGrupo = $nmGrupo;
        $this->dsChave = $dsChave;
        $this->cdGrupoPai = $cdGrupoPai;
        $this->dsFormulaCalculo = $dsFormulaCalculo;
        $this->nrOrdem = $nrOrdem;
        $this->snVisivel = $snVisivel;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getNmGrupo(): ?string
    {
        return $this->nmGrupo;
    }

    public function setNmGrupo(?string $nmGrupo): self
    {
        $this->nmGrupo = $nmGrupo;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getCdGrupoPai(): ?int
    {
        return $this->cdGrupoPai;
    }

    public function setCdGrupoPai(?int $cdGrupoPai): self
    {
        $this->cdGrupoPai = $cdGrupoPai;
        return $this;
    }

    public function getDsFormulaCalculo(): ?string
    {
        return $this->dsFormulaCalculo;
    }

    public function setDsFormulaCalculo(?string $dsFormulaCalculo): self
    {
        $this->dsFormulaCalculo = $dsFormulaCalculo;
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

    public function isSnVisivel(): ?bool
    {
        return $this->snVisivel;
    }

    public function setSnVisivel(?bool $snVisivel): self
    {
        $this->snVisivel = $snVisivel;
        return $this;
    }
}
