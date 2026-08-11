<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasAtendimentosLocaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAtendimentosLocaisRepository::class)]
#[ORM\Table(
    name: 'pessoas_atendimentos_locais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_MOTIVO_LOCAL', columns: ['cd_local', 'cd_motivo'])]
#[ORM\Index(name: 'IX_CD_LOCAL', columns: ['cd_local'])]
#[ORM\Index(name: 'IX_CD_MOTIVO', columns: ['cd_motivo'])]
class PessoasAtendimentosLocais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_local', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLocal = null;

    #[ORM\Column(name: 'cd_motivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMotivo = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 100, nullable: true, options: ['default' => ''])]
    private ?string $dsLocal = '';

    public function __construct(
        ?int $cdMotivo = null,
        ?string $dsLocal = ''
    ) {
        $this->cdMotivo = $cdMotivo;
        $this->dsLocal = $dsLocal;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function getCdMotivo(): ?int
    {
        return $this->cdMotivo;
    }

    public function setCdMotivo(?int $cdMotivo): self
    {
        $this->cdMotivo = $cdMotivo;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }
}
