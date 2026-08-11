<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleCabecalhosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleCabecalhosRepository::class)]
#[ORM\Table(
    name: 'ple_cabecalhos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PleCabecalhos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cabecalho', type: 'integer')]
    private ?int $cdCabecalho = null;

    #[ORM\Column(name: 'ds_cabecalho', type: 'string', length: 100, nullable: true)]
    private ?string $dsCabecalho = null;

    #[ORM\Column(name: 'me_cabecalho', type: 'text', length: 16777215, nullable: true)]
    private ?string $meCabecalho = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer', nullable: true)]
    private ?int $cdTipoDocumento = null;

    public function __construct(
        ?string $dsCabecalho = null,
        ?string $meCabecalho = null,
        ?bool $snAtivo = null,
        ?int $cdTipoDocumento = null
    ) {
        $this->dsCabecalho = $dsCabecalho;
        $this->meCabecalho = $meCabecalho;
        $this->snAtivo = $snAtivo;
        $this->cdTipoDocumento = $cdTipoDocumento;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function getDsCabecalho(): ?string
    {
        return $this->dsCabecalho;
    }

    public function setDsCabecalho(?string $dsCabecalho): self
    {
        $this->dsCabecalho = $dsCabecalho;
        return $this;
    }

    public function getMeCabecalho(): ?string
    {
        return $this->meCabecalho;
    }

    public function setMeCabecalho(?string $meCabecalho): self
    {
        $this->meCabecalho = $meCabecalho;
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

    public function getCdTipoDocumento(): ?int
    {
        return $this->cdTipoDocumento;
    }

    public function setCdTipoDocumento(?int $cdTipoDocumento): self
    {
        $this->cdTipoDocumento = $cdTipoDocumento;
        return $this;
    }
}
