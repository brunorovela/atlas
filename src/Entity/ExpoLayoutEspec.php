<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoLayoutEspecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoLayoutEspecRepository::class)]
#[ORM\Table(
    name: 'expo_layout_espec',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
class ExpoLayoutEspec
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout_espec', type: 'integer')]
    private ?int $cdLayoutEspec = null;

    #[ORM\Column(name: 'cd_item', type: 'integer', nullable: true)]
    private ?int $cdItem = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'ds_valor', type: 'text', length: 65535, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'chr_preenche', type: 'string', length: 10, nullable: true, options: ['default' => ''])]
    private ?string $chrPreenche = '';

    #[ORM\Column(name: 'chr_posicao', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $chrPosicao = 1;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdTipo = 0;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    public function __construct(
        ?int $cdItem = null,
        ?string $dsDescricao = null,
        ?int $nrTamanho = null,
        ?string $dsValor = null,
        ?string $chrPreenche = '',
        ?int $chrPosicao = 1,
        ?int $cdTipo = 0,
        ?int $nrOrdem = null
    ) {
        $this->cdItem = $cdItem;
        $this->dsDescricao = $dsDescricao;
        $this->nrTamanho = $nrTamanho;
        $this->dsValor = $dsValor;
        $this->chrPreenche = $chrPreenche;
        $this->chrPosicao = $chrPosicao;
        $this->cdTipo = $cdTipo;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdLayoutEspec(): ?int
    {
        return $this->cdLayoutEspec;
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

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getChrPreenche(): ?string
    {
        return $this->chrPreenche;
    }

    public function setChrPreenche(?string $chrPreenche): self
    {
        $this->chrPreenche = $chrPreenche;
        return $this;
    }

    public function getChrPosicao(): ?int
    {
        return $this->chrPosicao;
    }

    public function setChrPosicao(?int $chrPosicao): self
    {
        $this->chrPosicao = $chrPosicao;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
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
}
