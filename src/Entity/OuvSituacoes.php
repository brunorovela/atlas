<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OuvSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvSituacoesRepository::class)]
#[ORM\Table(
    name: 'ouv_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OuvSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'ds_situacao_itens', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacaoItens = null;

    #[ORM\Column(name: 'sn_situacao_final', type: 'boolean')]
    private ?bool $snSituacaoFinal = null;

    public function __construct(
        ?string $dsSituacao = null,
        ?string $dsSituacaoItens = null,
        ?bool $snSituacaoFinal = null
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->dsSituacaoItens = $dsSituacaoItens;
        $this->snSituacaoFinal = $snSituacaoFinal;
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

    public function getDsSituacaoItens(): ?string
    {
        return $this->dsSituacaoItens;
    }

    public function setDsSituacaoItens(?string $dsSituacaoItens): self
    {
        $this->dsSituacaoItens = $dsSituacaoItens;
        return $this;
    }

    public function isSnSituacaoFinal(): ?bool
    {
        return $this->snSituacaoFinal;
    }

    public function setSnSituacaoFinal(?bool $snSituacaoFinal): self
    {
        $this->snSituacaoFinal = $snSituacaoFinal;
        return $this;
    }
}
