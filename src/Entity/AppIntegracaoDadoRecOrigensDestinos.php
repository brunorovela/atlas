<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoRecOrigensDestinosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoRecOrigensDestinosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_rec_origens_destinos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_rec_origens_destinos_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_rec_origens_destinos_cd_categoria', columns: ['cd_origem', 'cd_destino', 'cd_categoria'])]
class AppIntegracaoDadoRecOrigensDestinos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_origem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrigem = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_destino', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDestino = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_categoria', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdOrigem = null,
        ?int $cdDestino = null,
        ?int $cdCategoria = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdOrigem = $cdOrigem;
        $this->cdDestino = $cdDestino;
        $this->cdCategoria = $cdCategoria;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getCdDestino(): ?int
    {
        return $this->cdDestino;
    }

    public function setCdDestino(?int $cdDestino): self
    {
        $this->cdDestino = $cdDestino;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
