<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FuncionariosTiposRegimesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuncionariosTiposRegimesRepository::class)]
#[ORM\Table(
    name: 'funcionarios_tipos_regimes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FuncionariosTiposRegimes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_regime', type: 'integer')]
    private ?int $cdRegime = null;

    #[ORM\Column(name: 'ds_regime', type: 'string', length: 50, nullable: true)]
    private ?string $dsRegime = null;

    public function __construct(
        ?int $cdRegime = null,
        ?string $dsRegime = null
    ) {
        $this->cdRegime = $cdRegime;
        $this->dsRegime = $dsRegime;
    }

    public function getCdRegime(): ?int
    {
        return $this->cdRegime;
    }

    public function setCdRegime(?int $cdRegime): self
    {
        $this->cdRegime = $cdRegime;
        return $this;
    }

    public function getDsRegime(): ?string
    {
        return $this->dsRegime;
    }

    public function setDsRegime(?string $dsRegime): self
    {
        $this->dsRegime = $dsRegime;
        return $this;
    }
}
