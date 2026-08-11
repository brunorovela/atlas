<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasAtendimentosMotivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAtendimentosMotivosRepository::class)]
#[ORM\Table(
    name: 'pessoas_atendimentos_motivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MOTIVO', columns: ['cd_motivo'])]
class PessoasAtendimentosMotivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_motivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMotivo = null;

    #[ORM\Column(name: 'nm_motivo', type: 'string', length: 100, nullable: true, options: ['default' => ''])]
    private ?string $nmMotivo = '';

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        ?string $nmMotivo = '',
        ?string $dsObservacoes = null,
        ?bool $snAtivo = true
    ) {
        $this->nmMotivo = $nmMotivo;
        $this->dsObservacoes = $dsObservacoes;
        $this->snAtivo = $snAtivo;
    }

    public function getCdMotivo(): ?int
    {
        return $this->cdMotivo;
    }

    public function getNmMotivo(): ?string
    {
        return $this->nmMotivo;
    }

    public function setNmMotivo(?string $nmMotivo): self
    {
        $this->nmMotivo = $nmMotivo;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
