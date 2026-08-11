<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeIntegracoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeIntegracoesRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_integracoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeIntegracoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'nm_integracao', type: 'string', length: 255)]
    private ?string $nmIntegracao = null;

    public function __construct(
        ?int $cdIntegracao = null,
        ?string $nmIntegracao = null
    ) {
        $this->cdIntegracao = $cdIntegracao;
        $this->nmIntegracao = $nmIntegracao;
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

    public function getNmIntegracao(): ?string
    {
        return $this->nmIntegracao;
    }

    public function setNmIntegracao(?string $nmIntegracao): self
    {
        $this->nmIntegracao = $nmIntegracao;
        return $this;
    }
}
