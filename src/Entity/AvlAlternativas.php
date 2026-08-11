<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlAlternativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlAlternativasRepository::class)]
#[ORM\Table(
    name: 'avl_alternativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Alternativas pr?-definidas']
)]
#[ORM\UniqueConstraint(name: 'cd_alternativa_pre', columns: ['cd_alternativa_pre'])]
#[ORM\UniqueConstraint(name: 'cd_alternativa_pre_2', columns: ['cd_grupo', 'nr_ordem'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class AvlAlternativas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa_pre', type: 'integer')]
    private ?int $cdAlternativaPre = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', options: ['default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'ds_alternativa', type: 'text', length: 16777215)]
    private ?string $dsAlternativa = null;

    #[ORM\Column(name: 'sn_estatisticas', type: 'boolean', options: ['default' => '0'])]
    private bool $snEstatisticas = false;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 7, nullable: true)]
    private ?string $dsCor = null;

    public function __construct(
        int $cdGrupo = 0,
        int $nrOrdem = 0,
        ?string $dsAlternativa = null,
        bool $snEstatisticas = false,
        ?string $dsCor = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->nrOrdem = $nrOrdem;
        $this->dsAlternativa = $dsAlternativa;
        $this->snEstatisticas = $snEstatisticas;
        $this->dsCor = $dsCor;
    }

    public function getCdAlternativaPre(): ?int
    {
        return $this->cdAlternativaPre;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsAlternativa(): ?string
    {
        return $this->dsAlternativa;
    }

    public function setDsAlternativa(?string $dsAlternativa): self
    {
        $this->dsAlternativa = $dsAlternativa;
        return $this;
    }

    public function isSnEstatisticas(): bool
    {
        return $this->snEstatisticas;
    }

    public function setSnEstatisticas(bool $snEstatisticas): self
    {
        $this->snEstatisticas = $snEstatisticas;
        return $this;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }
}
