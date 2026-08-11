<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RemLayoutEspecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemLayoutEspecRepository::class)]
#[ORM\Table(
    name: 'rem_layout_espec',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_NR_INICIO', columns: ['nr_inicio'])]
class RemLayoutEspec
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_layout', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdLayout = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_inicio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrInicio = 0;

    #[ORM\Column(name: 'ds_detalhes', type: 'string', length: 255, nullable: true)]
    private ?string $dsDetalhes = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'smallint', nullable: true)]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'ds_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'chr_fill', type: 'string', length: 1, options: ['fixed' => true, 'default' => ''])]
    private string $chrFill = '';

    public function __construct(
        int $cdLayout = 0,
        int $cdTipo = 0,
        int $nrInicio = 0,
        ?string $dsDetalhes = null,
        ?int $nrTamanho = null,
        ?string $dsValor = null,
        string $chrFill = ''
    ) {
        $this->cdLayout = $cdLayout;
        $this->cdTipo = $cdTipo;
        $this->nrInicio = $nrInicio;
        $this->dsDetalhes = $dsDetalhes;
        $this->nrTamanho = $nrTamanho;
        $this->dsValor = $dsValor;
        $this->chrFill = $chrFill;
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

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getNrInicio(): int
    {
        return $this->nrInicio;
    }

    public function setNrInicio(int $nrInicio): self
    {
        $this->nrInicio = $nrInicio;
        return $this;
    }

    public function getDsDetalhes(): ?string
    {
        return $this->dsDetalhes;
    }

    public function setDsDetalhes(?string $dsDetalhes): self
    {
        $this->dsDetalhes = $dsDetalhes;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getChrFill(): string
    {
        return $this->chrFill;
    }

    public function setChrFill(string $chrFill): self
    {
        $this->chrFill = $chrFill;
        return $this;
    }
}
