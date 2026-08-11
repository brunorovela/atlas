<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleLayoutsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleLayoutsRepository::class)]
#[ORM\Table(
    name: 'ple_layouts',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PleLayouts
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout', type: 'integer')]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'ds_layout', type: 'string', length: 100, nullable: true)]
    private ?string $dsLayout = null;

    #[ORM\Column(name: 'me_layout', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLayout = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'sn_baixado', type: 'boolean', nullable: true)]
    private ?bool $snBaixado = null;

    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer', nullable: true)]
    private ?int $cdTipoDocumento = null;

    #[ORM\Column(name: 'me_css', type: 'text', length: 16777215, nullable: true)]
    private ?string $meCss = null;

    public function __construct(
        ?string $dsLayout = null,
        ?string $meLayout = null,
        ?bool $snAtivo = null,
        ?bool $snBaixado = null,
        ?int $cdTipoDocumento = null,
        ?string $meCss = null
    ) {
        $this->dsLayout = $dsLayout;
        $this->meLayout = $meLayout;
        $this->snAtivo = $snAtivo;
        $this->snBaixado = $snBaixado;
        $this->cdTipoDocumento = $cdTipoDocumento;
        $this->meCss = $meCss;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function getDsLayout(): ?string
    {
        return $this->dsLayout;
    }

    public function setDsLayout(?string $dsLayout): self
    {
        $this->dsLayout = $dsLayout;
        return $this;
    }

    public function getMeLayout(): ?string
    {
        return $this->meLayout;
    }

    public function setMeLayout(?string $meLayout): self
    {
        $this->meLayout = $meLayout;
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

    public function isSnBaixado(): ?bool
    {
        return $this->snBaixado;
    }

    public function setSnBaixado(?bool $snBaixado): self
    {
        $this->snBaixado = $snBaixado;
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

    public function getMeCss(): ?string
    {
        return $this->meCss;
    }

    public function setMeCss(?string $meCss): self
    {
        $this->meCss = $meCss;
        return $this;
    }
}
