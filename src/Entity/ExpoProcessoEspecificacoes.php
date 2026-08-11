<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoProcessoEspecificacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoProcessoEspecificacoesRepository::class)]
#[ORM\Table(
    name: 'expo_processo_especificacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_NR_EXPORTACAO', columns: ['nr_exportacao'])]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
#[ORM\Index(name: 'IX_CD_ESPECIFICACAO', columns: ['cd_especificacao'])]
class ExpoProcessoEspecificacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_exportacao', type: 'integer')]
    private ?int $nrExportacao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_item', type: 'integer')]
    private ?int $cdItem = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_especificacao', type: 'integer')]
    private ?int $cdEspecificacao = null;

    #[ORM\Column(name: 'ds_especificacao', type: 'string', length: 255)]
    private ?string $dsEspecificacao = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $nrExportacao = null,
        ?int $cdItem = null,
        ?int $cdEspecificacao = null,
        ?string $dsEspecificacao = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->nrExportacao = $nrExportacao;
        $this->cdItem = $cdItem;
        $this->cdEspecificacao = $cdEspecificacao;
        $this->dsEspecificacao = $dsEspecificacao;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getNrExportacao(): ?int
    {
        return $this->nrExportacao;
    }

    public function setNrExportacao(?int $nrExportacao): self
    {
        $this->nrExportacao = $nrExportacao;
        return $this;
    }

    public function getCdItem(): ?int
    {
        return $this->cdItem;
    }

    public function setCdItem(?int $cdItem): self
    {
        $this->cdItem = $cdItem;
        return $this;
    }

    public function getCdEspecificacao(): ?int
    {
        return $this->cdEspecificacao;
    }

    public function setCdEspecificacao(?int $cdEspecificacao): self
    {
        $this->cdEspecificacao = $cdEspecificacao;
        return $this;
    }

    public function getDsEspecificacao(): ?string
    {
        return $this->dsEspecificacao;
    }

    public function setDsEspecificacao(?string $dsEspecificacao): self
    {
        $this->dsEspecificacao = $dsEspecificacao;
        return $this;
    }
}
