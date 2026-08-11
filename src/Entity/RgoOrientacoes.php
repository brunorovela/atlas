<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoOrientacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoOrientacoesRepository::class)]
#[ORM\Table(
    name: 'rgo_orientacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_ORIENTACAO', columns: ['ds_orientacao'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RgoOrientacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orientacao', type: 'integer')]
    private ?int $cdOrientacao = null;

    #[ORM\Column(name: 'ds_orientacao', type: 'string', length: 255)]
    private ?string $dsOrientacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsOrientacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsOrientacao = $dsOrientacao;
        $this->dtBase = $dtBase;
    }

    public function getCdOrientacao(): ?int
    {
        return $this->cdOrientacao;
    }

    public function getDsOrientacao(): ?string
    {
        return $this->dsOrientacao;
    }

    public function setDsOrientacao(?string $dsOrientacao): self
    {
        $this->dsOrientacao = $dsOrientacao;
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
