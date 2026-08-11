<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoTiposRepository::class)]
#[ORM\Table(
    name: 'rgo_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_TIPO', columns: ['ds_tipo'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RgoTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_icone_padrao', type: 'string', length: 255, nullable: true)]
    private ?string $dsIconePadrao = null;

    #[ORM\Column(name: 'ds_icone_customizado', type: 'string', length: 255, nullable: true)]
    private ?string $dsIconeCustomizado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsTipo = null,
        ?string $dsIconePadrao = null,
        ?string $dsIconeCustomizado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->dsIconePadrao = $dsIconePadrao;
        $this->dsIconeCustomizado = $dsIconeCustomizado;
        $this->dtBase = $dtBase;
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

    public function getDsIconePadrao(): ?string
    {
        return $this->dsIconePadrao;
    }

    public function setDsIconePadrao(?string $dsIconePadrao): self
    {
        $this->dsIconePadrao = $dsIconePadrao;
        return $this;
    }

    public function getDsIconeCustomizado(): ?string
    {
        return $this->dsIconeCustomizado;
    }

    public function setDsIconeCustomizado(?string $dsIconeCustomizado): self
    {
        $this->dsIconeCustomizado = $dsIconeCustomizado;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
