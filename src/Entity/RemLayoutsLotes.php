<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RemLayoutsLotesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemLayoutsLotesRepository::class)]
#[ORM\Table(
    name: 'rem_layouts_lotes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class RemLayoutsLotes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdLayout = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'cd_tipo_detalhes', type: 'integer', nullable: true, options: ['comment' => 'define o tipo que deve ser carregado a cada registro deste tipo'])]
    private ?int $cdTipoDetalhes = null;

    #[ORM\Column(name: 'cd_tipo_trailer', type: 'integer', nullable: true, options: ['comment' => 'define o tipo que deverá ser utilizado como rodapé deste tipo'])]
    private ?int $cdTipoTrailer = null;

    public function __construct(
        int $cdTipo = 0,
        int $cdLayout = 0,
        int $nrOrdem = 0,
        ?string $dsTipo = null,
        ?string $meSql = null,
        ?int $cdTipoDetalhes = null,
        ?int $cdTipoTrailer = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdLayout = $cdLayout;
        $this->nrOrdem = $nrOrdem;
        $this->dsTipo = $dsTipo;
        $this->meSql = $meSql;
        $this->cdTipoDetalhes = $cdTipoDetalhes;
        $this->cdTipoTrailer = $cdTipoTrailer;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdLayout(): int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
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

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getCdTipoDetalhes(): ?int
    {
        return $this->cdTipoDetalhes;
    }

    public function setCdTipoDetalhes(?int $cdTipoDetalhes): self
    {
        $this->cdTipoDetalhes = $cdTipoDetalhes;
        return $this;
    }

    public function getCdTipoTrailer(): ?int
    {
        return $this->cdTipoTrailer;
    }

    public function setCdTipoTrailer(?int $cdTipoTrailer): self
    {
        $this->cdTipoTrailer = $cdTipoTrailer;
        return $this;
    }
}
