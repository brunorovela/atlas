<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompCodigoBarrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompCodigoBarrasRepository::class)]
#[ORM\Table(
    name: 'comp_codigo_barras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para diferenciar por código de barras os produtos e os kits.']
)]
#[ORM\Index(name: 'IX_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_CD_KIT', columns: ['cd_kit'])]
class CompCodigoBarras
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_codigo_barras', type: 'string', length: 30)]
    private ?string $cdCodigoBarras = null;

    #[ORM\Id]
    #[ORM\Column(name: 'sn_cantina', type: 'boolean', options: ['default' => '0'])]
    private bool $snCantina = false;

    #[ORM\Column(name: 'cd_produto', type: 'string', length: 30, nullable: true)]
    private ?string $cdProduto = null;

    #[ORM\Column(name: 'cd_kit', type: 'integer', nullable: true)]
    private ?int $cdKit = null;

    public function __construct(
        ?string $cdCodigoBarras = null,
        bool $snCantina = false,
        ?string $cdProduto = null,
        ?int $cdKit = null
    ) {
        $this->cdCodigoBarras = $cdCodigoBarras;
        $this->snCantina = $snCantina;
        $this->cdProduto = $cdProduto;
        $this->cdKit = $cdKit;
    }

    public function getCdCodigoBarras(): ?string
    {
        return $this->cdCodigoBarras;
    }

    public function setCdCodigoBarras(?string $cdCodigoBarras): self
    {
        $this->cdCodigoBarras = $cdCodigoBarras;
        return $this;
    }

    public function isSnCantina(): bool
    {
        return $this->snCantina;
    }

    public function setSnCantina(bool $snCantina): self
    {
        $this->snCantina = $snCantina;
        return $this;
    }

    public function getCdProduto(): ?string
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?string $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
        return $this;
    }

    public function getCdKit(): ?int
    {
        return $this->cdKit;
    }

    public function setCdKit(?int $cdKit): self
    {
        $this->cdKit = $cdKit;
        return $this;
    }
}
