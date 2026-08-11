<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuGruposRegrasSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposRegrasSituacoesRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_regras_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO_REGRA', columns: ['cd_grupo_regra'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class NuGruposRegrasSituacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo_regra', type: 'integer')]
    private ?int $cdGrupoRegra = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    public function __construct(
        ?int $cdGrupoRegra = null,
        ?int $cdSituacao = null
    ) {
        $this->cdGrupoRegra = $cdGrupoRegra;
        $this->cdSituacao = $cdSituacao;
    }

    public function getCdGrupoRegra(): ?int
    {
        return $this->cdGrupoRegra;
    }

    public function setCdGrupoRegra(?int $cdGrupoRegra): self
    {
        $this->cdGrupoRegra = $cdGrupoRegra;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }
}
