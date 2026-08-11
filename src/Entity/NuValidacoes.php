<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuValidacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuValidacoesRepository::class)]
#[ORM\Table(
    name: 'nu_validacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuValidacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_validacao', type: 'integer')]
    private ?int $cdValidacao = null;

    #[ORM\Column(name: 'ds_validacao', type: 'string', length: 50)]
    private ?string $dsValidacao = null;

    #[ORM\Column(name: 'ds_ereg_validacao', type: 'string', length: 255)]
    private ?string $dsEregValidacao = null;

    public function __construct(
        ?string $dsValidacao = null,
        ?string $dsEregValidacao = null
    ) {
        $this->dsValidacao = $dsValidacao;
        $this->dsEregValidacao = $dsEregValidacao;
    }

    public function getCdValidacao(): ?int
    {
        return $this->cdValidacao;
    }

    public function getDsValidacao(): ?string
    {
        return $this->dsValidacao;
    }

    public function setDsValidacao(?string $dsValidacao): self
    {
        $this->dsValidacao = $dsValidacao;
        return $this;
    }

    public function getDsEregValidacao(): ?string
    {
        return $this->dsEregValidacao;
    }

    public function setDsEregValidacao(?string $dsEregValidacao): self
    {
        $this->dsEregValidacao = $dsEregValidacao;
        return $this;
    }
}
