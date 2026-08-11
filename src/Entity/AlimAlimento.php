<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AlimAlimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimAlimentoRepository::class)]
#[ORM\Table(
    name: 'alim_alimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AlimAlimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alimento', type: 'integer')]
    private ?int $cdAlimento = null;

    #[ORM\Column(name: 'ds_alimento', type: 'string', length: 255)]
    private ?string $dsAlimento = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsAlimento = null,
        bool $snAtivo = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsAlimento = $dsAlimento;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdAlimento(): ?int
    {
        return $this->cdAlimento;
    }

    public function getDsAlimento(): ?string
    {
        return $this->dsAlimento;
    }

    public function setDsAlimento(?string $dsAlimento): self
    {
        $this->dsAlimento = $dsAlimento;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
