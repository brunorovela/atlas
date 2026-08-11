<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\OuvTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvTiposRepository::class)]
#[ORM\Table(
    name: 'ouv_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OuvTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'NM_TIPO', type: 'string', length: 255, nullable: true)]
    private ?string $nmTipo = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $nmTipo = null,
        ?int $snAtivo = null
    ) {
        $this->nmTipo = $nmTipo;
        $this->snAtivo = $snAtivo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getNmTipo(): ?string
    {
        return $this->nmTipo;
    }

    public function setNmTipo(?string $nmTipo): self
    {
        $this->nmTipo = $nmTipo;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
