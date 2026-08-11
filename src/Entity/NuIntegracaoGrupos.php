<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuIntegracaoGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIntegracaoGruposRepository::class)]
#[ORM\Table(
    name: 'nu_integracao_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INTEGRACAO', columns: ['cd_integracao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class NuIntegracaoGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_grupo', type: 'integer')]
    private ?int $cdIntegracaoGrupo = null;

    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    public function __construct(
        ?int $cdIntegracao = null,
        ?int $cdGrupo = null
    ) {
        $this->cdIntegracao = $cdIntegracao;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdIntegracaoGrupo(): ?int
    {
        return $this->cdIntegracaoGrupo;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
    }

    public function setCdIntegracao(?int $cdIntegracao): self
    {
        $this->cdIntegracao = $cdIntegracao;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }
}
