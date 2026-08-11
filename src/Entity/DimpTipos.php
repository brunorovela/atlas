<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DimpTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpTiposRepository::class)]
#[ORM\Table(
    name: 'dimp_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela que identifica os tipos de documentos que são impressos no módulo de "Documento para impressão."']
)]
class DimpTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'nm_tipo', type: 'string', length: 50)]
    private ?string $nmTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'nr_limite_doc', type: 'integer')]
    private ?int $nrLimiteDoc = null;

    #[ORM\Column(name: 'sn_aprovacao_coord', type: 'boolean')]
    private ?bool $snAprovacaoCoord = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean')]
    private ?bool $snAtivo = null;

    public function __construct(
        ?string $nmTipo = null,
        ?string $dsTipo = null,
        ?int $nrLimiteDoc = null,
        ?bool $snAprovacaoCoord = null,
        ?bool $snAtivo = null
    ) {
        $this->nmTipo = $nmTipo;
        $this->dsTipo = $dsTipo;
        $this->nrLimiteDoc = $nrLimiteDoc;
        $this->snAprovacaoCoord = $snAprovacaoCoord;
        $this->snAtivo = $snAtivo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getNmTipo(): ?string
    {
        return $this->nmTipo;
    }

    public function setNmTipo(?string $nmTipo): self
    {
        $this->nmTipo = $nmTipo;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getNrLimiteDoc(): ?int
    {
        return $this->nrLimiteDoc;
    }

    public function setNrLimiteDoc(?int $nrLimiteDoc): self
    {
        $this->nrLimiteDoc = $nrLimiteDoc;
        return $this;
    }

    public function isSnAprovacaoCoord(): ?bool
    {
        return $this->snAprovacaoCoord;
    }

    public function setSnAprovacaoCoord(?bool $snAprovacaoCoord): self
    {
        $this->snAprovacaoCoord = $snAprovacaoCoord;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
