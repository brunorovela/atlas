<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProdProcessoAnexosProfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdProcessoAnexosProfRepository::class)]
#[ORM\Table(
    name: 'prod_processo_anexos_prof',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ANEXO', columns: ['cd_anexo'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
class ProdProcessoAnexosProf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_anexo', type: 'integer')]
    private ?int $cdAnexo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    public function __construct(
        ?int $cdAnexo = null,
        ?int $cdProcesso = null
    ) {
        $this->cdAnexo = $cdAnexo;
        $this->cdProcesso = $cdProcesso;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function setCdAnexo(?int $cdAnexo): self
    {
        $this->cdAnexo = $cdAnexo;
        return $this;
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
}
