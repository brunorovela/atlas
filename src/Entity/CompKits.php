<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CompKitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompKitsRepository::class)]
#[ORM\Table(
    name: 'comp_kits',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para cadastro dos kits.']
)]
#[ORM\Index(name: 'IX_CD_CATEGORIA', columns: ['cd_categoria'])]
class CompKits
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_kit', type: 'integer')]
    private ?int $cdKit = null;

    #[ORM\Column(name: 'nm_kit', type: 'string', length: 50, nullable: true)]
    private ?string $nmKit = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true)]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'NR_PARCELAS', type: 'smallint', options: ['default' => '1'])]
    private int $nrParcelas = 1;

    #[ORM\Column(name: 'SN_BAIXAR_TITULO_AUTO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBaixarTituloAuto = 0;

    public function __construct(
        ?string $nmKit = null,
        ?string $meObservacao = null,
        ?int $cdCategoria = null,
        int $nrParcelas = 1,
        int $snBaixarTituloAuto = 0
    ) {
        $this->nmKit = $nmKit;
        $this->meObservacao = $meObservacao;
        $this->cdCategoria = $cdCategoria;
        $this->nrParcelas = $nrParcelas;
        $this->snBaixarTituloAuto = $snBaixarTituloAuto;
    }

    public function getCdKit(): ?int
    {
        return $this->cdKit;
    }

    public function getNmKit(): ?string
    {
        return $this->nmKit;
    }

    public function setNmKit(?string $nmKit): self
    {
        $this->nmKit = $nmKit;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getNrParcelas(): int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getSnBaixarTituloAuto(): int
    {
        return $this->snBaixarTituloAuto;
    }

    public function setSnBaixarTituloAuto(int $snBaixarTituloAuto): self
    {
        $this->snBaixarTituloAuto = $snBaixarTituloAuto;
        return $this;
    }
}
