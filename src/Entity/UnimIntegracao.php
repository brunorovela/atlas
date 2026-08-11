<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimIntegracaoRepository::class)]
#[ORM\Table(
    name: 'unim_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_INTEGRACAO', columns: ['cd_integracao'])]
class UnimIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_integracao', type: 'string', length: 255)]
    private ?string $dsIntegracao = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsIntegracao = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsIntegracao = $dsIntegracao;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsIntegracao(): ?string
    {
        return $this->dsIntegracao;
    }

    public function setDsIntegracao(?string $dsIntegracao): self
    {
        $this->dsIntegracao = $dsIntegracao;
        return $this;
    }
}
