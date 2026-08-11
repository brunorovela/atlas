<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposFilhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposFilhosRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_filhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO_PAI', columns: ['CD_GRUPO_PAI'])]
#[ORM\Index(name: 'IX_CD_GRUPO_FILHO', columns: ['CD_GRUPO_FILHO'])]
class EstncGruposFilhos
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO_PAI', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoPai = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO_FILHO', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdGrupoFilho = 0;

    public function __construct(
        ?int $cdGrupoPai = null,
        int $cdGrupoFilho = 0
    ) {
        $this->cdGrupoPai = $cdGrupoPai;
        $this->cdGrupoFilho = $cdGrupoFilho;
    }

    public function getCdGrupoPai(): ?int
    {
        return $this->cdGrupoPai;
    }

    public function setCdGrupoPai(?int $cdGrupoPai): self
    {
        $this->cdGrupoPai = $cdGrupoPai;
        return $this;
    }

    public function getCdGrupoFilho(): int
    {
        return $this->cdGrupoFilho;
    }

    public function setCdGrupoFilho(int $cdGrupoFilho): self
    {
        $this->cdGrupoFilho = $cdGrupoFilho;
        return $this;
    }
}
