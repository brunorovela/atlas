<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoUnimCalendarioEventosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoUnimCalendarioEventosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_unim_calendario_eventos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_unim_calendario_eventos_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_unim_calendario_eventos_pk', columns: ['cd_evento', 'cd_coligada'])]
class AppIntegracaoDadoUnimCalendarioEventos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_evento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEvento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdEvento = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdEvento = $cdEvento;
        $this->cdColigada = $cdColigada;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdEvento(): ?int
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?int $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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
