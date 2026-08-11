<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibCutterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibCutterRepository::class)]
#[ORM\Table(
    name: 'bib_cutter',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_VALOR', columns: ['ds_valor'])]
class BibCutter
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cutter', type: 'integer')]
    private ?int $cdCutter = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 20, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'ds_cutter', type: 'string', length: 255, nullable: true)]
    private ?string $dsCutter = null;

    #[ORM\Column(name: 'ds_iniciais', type: 'string', length: 255)]
    private ?string $dsIniciais = null;

    public function __construct(
        ?string $dsValor = null,
        ?string $dsCutter = null,
        ?string $dsIniciais = null
    ) {
        $this->dsValor = $dsValor;
        $this->dsCutter = $dsCutter;
        $this->dsIniciais = $dsIniciais;
    }

    public function getCdCutter(): ?int
    {
        return $this->cdCutter;
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

    public function getDsCutter(): ?string
    {
        return $this->dsCutter;
    }

    public function setDsCutter(?string $dsCutter): self
    {
        $this->dsCutter = $dsCutter;
        return $this;
    }

    public function getDsIniciais(): ?string
    {
        return $this->dsIniciais;
    }

    public function setDsIniciais(?string $dsIniciais): self
    {
        $this->dsIniciais = $dsIniciais;
        return $this;
    }
}
