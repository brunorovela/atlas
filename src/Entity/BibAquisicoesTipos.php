<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibAquisicoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAquisicoesTiposRepository::class)]
#[ORM\Table(
    name: 'bib_aquisicoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BibAquisicoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aquisicao_tipo', type: 'integer')]
    private ?int $cdAquisicaoTipo = null;

    #[ORM\Column(name: 'ds_aquisicao_tipo', type: 'string', length: 50)]
    private ?string $dsAquisicaoTipo = null;

    public function __construct(
        ?string $dsAquisicaoTipo = null
    ) {
        $this->dsAquisicaoTipo = $dsAquisicaoTipo;
    }

    public function getCdAquisicaoTipo(): ?int
    {
        return $this->cdAquisicaoTipo;
    }

    public function getDsAquisicaoTipo(): ?string
    {
        return $this->dsAquisicaoTipo;
    }

    public function setDsAquisicaoTipo(?string $dsAquisicaoTipo): self
    {
        $this->dsAquisicaoTipo = $dsAquisicaoTipo;
        return $this;
    }
}
