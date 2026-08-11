<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNegociaCompetenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNegociaCompetenciaRepository::class)]
#[ORM\Table(
    name: 'fin_negocia_competencia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE_NOVA', columns: ['cd_mensalidade_nova'])]
class FinNegociaCompetencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_negocia_competencia', type: 'integer')]
    private ?int $cdNegociaCompetencia = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_mensalidade_nova', type: 'integer', nullable: true)]
    private ?int $cdMensalidadeNova = null;

    #[ORM\Column(name: 'vl_competencia', type: 'float', nullable: true)]
    private ?float $vlCompetencia = null;

    #[ORM\Column(name: 'vl_baixado', type: 'float', nullable: true, options: ['default' => '0.000'])]
    private ?float $vlBaixado = 0.0;

    #[ORM\Column(name: 'sn_renegociada', type: 'boolean', options: ['default' => '0'])]
    private bool $snRenegociada = false;

    public function __construct(
        ?int $cdMensalidade = null,
        ?int $cdMensalidadeNova = null,
        ?float $vlCompetencia = null,
        ?float $vlBaixado = 0.0,
        bool $snRenegociada = false
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdMensalidadeNova = $cdMensalidadeNova;
        $this->vlCompetencia = $vlCompetencia;
        $this->vlBaixado = $vlBaixado;
        $this->snRenegociada = $snRenegociada;
    }

    public function getCdNegociaCompetencia(): ?int
    {
        return $this->cdNegociaCompetencia;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdMensalidadeNova(): ?int
    {
        return $this->cdMensalidadeNova;
    }

    public function setCdMensalidadeNova(?int $cdMensalidadeNova): self
    {
        $this->cdMensalidadeNova = $cdMensalidadeNova;
        return $this;
    }

    public function getVlCompetencia(): ?float
    {
        return $this->vlCompetencia;
    }

    public function setVlCompetencia(?float $vlCompetencia): self
    {
        $this->vlCompetencia = $vlCompetencia;
        return $this;
    }

    public function getVlBaixado(): ?float
    {
        return $this->vlBaixado;
    }

    public function setVlBaixado(?float $vlBaixado): self
    {
        $this->vlBaixado = $vlBaixado;
        return $this;
    }

    public function isSnRenegociada(): bool
    {
        return $this->snRenegociada;
    }

    public function setSnRenegociada(bool $snRenegociada): self
    {
        $this->snRenegociada = $snRenegociada;
        return $this;
    }
}
