<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LgtcTdValorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcTdValorRepository::class)]
#[ORM\Table(
    name: 'lgtc_td_valor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TD_VALOR_DS_VALOR', columns: ['DS_VALOR'])]
#[ORM\UniqueConstraint(name: 'UK_TD_VALOR_DS_CHAVE', columns: ['DS_CHAVE'])]
class LgtcTdValor
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_VALOR', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdValor = null;

    #[ORM\Column(name: 'DS_VALOR', type: 'string', length: 64)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 16)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsValor = null,
        ?string $dsChave = null
    ) {
        $this->dsValor = $dsValor;
        $this->dsChave = $dsChave;
    }

    public function getCdValor(): ?int
    {
        return $this->cdValor;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
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
}
