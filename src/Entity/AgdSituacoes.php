<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgdSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdSituacoesRepository::class)]
#[ORM\Table(
    name: 'agd_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AgdSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 50)]
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
