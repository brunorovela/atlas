<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlauFeedbPrioridadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauFeedbPrioridadeRepository::class)]
#[ORM\Table(
    name: 'plau_feedb_prioridade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PlauFeedbPrioridade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prioridade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPrioridade = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 255, nullable: true)]
    private ?string $dsCor = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?int $snAtivo = null,
        ?string $dsCor = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
        $this->dsCor = $dsCor;
    }

    public function getCdPrioridade(): ?int
    {
        return $this->cdPrioridade;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }
}
