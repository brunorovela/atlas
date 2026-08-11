<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OnlineIngressosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OnlineIngressosRepository::class)]
#[ORM\Table(
    name: 'online_ingressos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INGRESSO_GRUPO', columns: ['cd_ingresso_grupo'])]
class OnlineIngressos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ingresso_online', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIngressoOnline = null;

    #[ORM\Column(name: 'ds_ingresso_online', type: 'string', length: 255, nullable: true)]
    private ?string $dsIngressoOnline = null;

    #[ORM\Column(name: 'ds_obs_ingresso', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObsIngresso = null;

    #[ORM\Column(name: 'cd_ingresso_grupo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdIngressoGrupo = 0;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'smallint', options: ['default' => '1'])]
    private int $snDisponivel = 1;

    public function __construct(
        ?string $dsIngressoOnline = null,
        ?string $dsObsIngresso = null,
        int $cdIngressoGrupo = 0,
        ?string $dsUrl = null,
        int $snDisponivel = 1
    ) {
        $this->dsIngressoOnline = $dsIngressoOnline;
        $this->dsObsIngresso = $dsObsIngresso;
        $this->cdIngressoGrupo = $cdIngressoGrupo;
        $this->dsUrl = $dsUrl;
        $this->snDisponivel = $snDisponivel;
    }

    public function getCdIngressoOnline(): ?int
    {
        return $this->cdIngressoOnline;
    }

    public function getDsIngressoOnline(): ?string
    {
        return $this->dsIngressoOnline;
    }

    public function setDsIngressoOnline(?string $dsIngressoOnline): self
    {
        $this->dsIngressoOnline = $dsIngressoOnline;
        return $this;
    }

    public function getDsObsIngresso(): ?string
    {
        return $this->dsObsIngresso;
    }

    public function setDsObsIngresso(?string $dsObsIngresso): self
    {
        $this->dsObsIngresso = $dsObsIngresso;
        return $this;
    }

    public function getCdIngressoGrupo(): int
    {
        return $this->cdIngressoGrupo;
    }

    public function setCdIngressoGrupo(int $cdIngressoGrupo): self
    {
        $this->cdIngressoGrupo = $cdIngressoGrupo;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getSnDisponivel(): int
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(int $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }
}
