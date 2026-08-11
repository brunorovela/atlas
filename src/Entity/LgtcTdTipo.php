<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LgtcTdTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcTdTipoRepository::class)]
#[ORM\Table(
    name: 'lgtc_td_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TD_TIPO_DS_TIPO', columns: ['DS_TIPO'])]
#[ORM\UniqueConstraint(name: 'UK_TD_TIPO_DS_CHAVE', columns: ['DS_CHAVE'])]
class LgtcTdTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'DS_TIPO', type: 'string', length: 32)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 16)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsTipo = null,
        ?string $dsChave = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->dsChave = $dsChave;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
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
