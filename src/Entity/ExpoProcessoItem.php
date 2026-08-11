<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoProcessoItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoProcessoItemRepository::class)]
#[ORM\Table(
    name: 'expo_processo_item',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_NR_EXPORTACAO', columns: ['nr_exportacao'])]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
class ExpoProcessoItem
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

    #[ORM\Column(name: 'ds_item', type: 'string', length: 255)]
    private ?string $dsItem = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $nrExportacao = null,
        ?int $cdItem = null,
        ?string $dsItem = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->nrExportacao = $nrExportacao;
        $this->cdItem = $cdItem;
        $this->dsItem = $dsItem;
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

    public function getDsItem(): ?string
    {
        return $this->dsItem;
    }

    public function setDsItem(?string $dsItem): self
    {
        $this->dsItem = $dsItem;
        return $this;
    }
}
