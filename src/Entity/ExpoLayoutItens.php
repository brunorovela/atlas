<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoLayoutItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoLayoutItensRepository::class)]
#[ORM\Table(
    name: 'expo_layout_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['nr_ordem', 'cd_layout'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_NM_CONSULTA', columns: ['nm_consulta'], options: ['lengths' => [20]])]
class ExpoLayoutItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout_item', type: 'integer')]
    private ?int $cdLayoutItem = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', nullable: true)]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'nm_consulta', type: 'string', length: 50, nullable: true)]
    private ?string $nmConsulta = null;

    #[ORM\Column(name: 'ds_item', type: 'string', length: 100, nullable: true)]
    private ?string $dsItem = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'cd_layout_item_pai', type: 'integer', nullable: true, options: ['default' => '-1'])]
    private ?int $cdLayoutItemPai = -1;

    #[ORM\Column(name: 'chr_separador', type: 'string', length: 20, nullable: true)]
    private ?string $chrSeparador = null;

    #[ORM\Column(name: 'me_sqls_depois', type: 'text', length: 65535, nullable: true)]
    private ?string $meSqlsDepois = null;

    #[ORM\Column(name: 'me_sqls_antes', type: 'text', length: 65535, nullable: true)]
    private ?string $meSqlsAntes = null;

    public function __construct(
        ?int $cdLayout = null,
        ?string $nmConsulta = null,
        ?string $dsItem = null,
        ?int $nrOrdem = null,
        ?bool $snAtivo = true,
        ?int $cdLayoutItemPai = -1,
        ?string $chrSeparador = null,
        ?string $meSqlsDepois = null,
        ?string $meSqlsAntes = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->nmConsulta = $nmConsulta;
        $this->dsItem = $dsItem;
        $this->nrOrdem = $nrOrdem;
        $this->snAtivo = $snAtivo;
        $this->cdLayoutItemPai = $cdLayoutItemPai;
        $this->chrSeparador = $chrSeparador;
        $this->meSqlsDepois = $meSqlsDepois;
        $this->meSqlsAntes = $meSqlsAntes;
    }

    public function getCdLayoutItem(): ?int
    {
        return $this->cdLayoutItem;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getNmConsulta(): ?string
    {
        return $this->nmConsulta;
    }

    public function setNmConsulta(?string $nmConsulta): self
    {
        $this->nmConsulta = $nmConsulta;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
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

    public function getCdLayoutItemPai(): ?int
    {
        return $this->cdLayoutItemPai;
    }

    public function setCdLayoutItemPai(?int $cdLayoutItemPai): self
    {
        $this->cdLayoutItemPai = $cdLayoutItemPai;
        return $this;
    }

    public function getChrSeparador(): ?string
    {
        return $this->chrSeparador;
    }

    public function setChrSeparador(?string $chrSeparador): self
    {
        $this->chrSeparador = $chrSeparador;
        return $this;
    }

    public function getMeSqlsDepois(): ?string
    {
        return $this->meSqlsDepois;
    }

    public function setMeSqlsDepois(?string $meSqlsDepois): self
    {
        $this->meSqlsDepois = $meSqlsDepois;
        return $this;
    }

    public function getMeSqlsAntes(): ?string
    {
        return $this->meSqlsAntes;
    }

    public function setMeSqlsAntes(?string $meSqlsAntes): self
    {
        $this->meSqlsAntes = $meSqlsAntes;
        return $this;
    }
}
