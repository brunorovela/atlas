<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\OuvSetoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvSetoresRepository::class)]
#[ORM\Table(
    name: 'ouv_setores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OuvSetores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_SETOR', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSetor = null;

    #[ORM\Column(name: 'NM_SETOR', type: 'string', length: 255, nullable: true)]
    private ?string $nmSetor = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $nmSetor = null,
        ?int $snAtivo = null
    ) {
        $this->nmSetor = $nmSetor;
        $this->snAtivo = $snAtivo;
    }

    public function getCdSetor(): ?int
    {
        return $this->cdSetor;
    }

    public function getNmSetor(): ?string
    {
        return $this->nmSetor;
    }

    public function setNmSetor(?string $nmSetor): self
    {
        $this->nmSetor = $nmSetor;
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
