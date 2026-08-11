<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ResReservasSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResReservasSituacaoRepository::class)]
#[ORM\Table(
    name: 'res_reservas_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_situacao', columns: ['cd_situacao'])]
class ResReservasSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 75)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'sn_situacao_ativa', type: 'boolean', options: ['default' => '1'])]
    private bool $snSituacaoAtiva = true;

    public function __construct(
        ?string $dsSituacao = null,
        bool $snSituacaoAtiva = true
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->snSituacaoAtiva = $snSituacaoAtiva;
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

    public function isSnSituacaoAtiva(): bool
    {
        return $this->snSituacaoAtiva;
    }

    public function setSnSituacaoAtiva(bool $snSituacaoAtiva): self
    {
        $this->snSituacaoAtiva = $snSituacaoAtiva;
        return $this;
    }
}
