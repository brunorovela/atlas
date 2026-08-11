<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasSituacaoRepository::class)]
#[ORM\Table(
    name: 'monografias_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_situacao', columns: ['ds_situacao'])]
class MonografiasSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255)]
    private ?string $dsSituacao = null;

    public function __construct(
        ?string $dsSituacao = null
    ) {
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }
}
