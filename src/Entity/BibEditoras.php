<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibEditorasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibEditorasRepository::class)]
#[ORM\Table(
    name: 'bib_editoras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibEditoras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_editora', type: 'integer')]
    private ?int $cdEditora = null;

    #[ORM\Column(name: 'ds_nome_editora', type: 'string', length: 100, nullable: true)]
    private ?string $dsNomeEditora = null;

    #[ORM\Column(name: 'ds_prefixo_isbn', type: 'string', length: 50, nullable: true)]
    private ?string $dsPrefixoIsbn = null;

    #[ORM\Column(name: 'ds_nome_abreviado', type: 'string', length: 30, nullable: true)]
    private ?string $dsNomeAbreviado = null;

    public function __construct(
        ?string $dsNomeEditora = null,
        ?string $dsPrefixoIsbn = null,
        ?string $dsNomeAbreviado = null
    ) {
        $this->dsNomeEditora = $dsNomeEditora;
        $this->dsPrefixoIsbn = $dsPrefixoIsbn;
        $this->dsNomeAbreviado = $dsNomeAbreviado;
    }

    public function getCdEditora(): ?int
    {
        return $this->cdEditora;
    }

    public function getDsNomeEditora(): ?string
    {
        return $this->dsNomeEditora;
    }

    public function setDsNomeEditora(?string $dsNomeEditora): self
    {
        $this->dsNomeEditora = $dsNomeEditora;
        return $this;
    }

    public function getDsPrefixoIsbn(): ?string
    {
        return $this->dsPrefixoIsbn;
    }

    public function setDsPrefixoIsbn(?string $dsPrefixoIsbn): self
    {
        $this->dsPrefixoIsbn = $dsPrefixoIsbn;
        return $this;
    }

    public function getDsNomeAbreviado(): ?string
    {
        return $this->dsNomeAbreviado;
    }

    public function setDsNomeAbreviado(?string $dsNomeAbreviado): self
    {
        $this->dsNomeAbreviado = $dsNomeAbreviado;
        return $this;
    }
}
