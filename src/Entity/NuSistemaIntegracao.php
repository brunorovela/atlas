<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuSistemaIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuSistemaIntegracaoRepository::class)]
#[ORM\Table(
    name: 'nu_sistema_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuSistemaIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sistema_integracao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSistemaIntegracao = null;

    #[ORM\Column(name: 'ds_sistema_integracao', type: 'string', length: 255, nullable: true)]
    private ?string $dsSistemaIntegracao = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasse = null;

    public function __construct(
        ?string $dsSistemaIntegracao = null,
        ?string $dsClasse = null
    ) {
        $this->dsSistemaIntegracao = $dsSistemaIntegracao;
        $this->dsClasse = $dsClasse;
    }

    public function getCdSistemaIntegracao(): ?int
    {
        return $this->cdSistemaIntegracao;
    }

    public function getDsSistemaIntegracao(): ?string
    {
        return $this->dsSistemaIntegracao;
    }

    public function setDsSistemaIntegracao(?string $dsSistemaIntegracao): self
    {
        $this->dsSistemaIntegracao = $dsSistemaIntegracao;
        return $this;
    }

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }
}
