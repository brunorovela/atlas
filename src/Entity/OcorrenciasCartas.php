<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasCartasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasCartasRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_cartas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_carta', columns: ['cd_carta'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DT_ENVIO', columns: ['dt_envio'])]
class OcorrenciasCartas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_carta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCarta = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtEnvio = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtEnvio = $dtEnvio;
    }

    public function getCdCarta(): ?int
    {
        return $this->cdCarta;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }
}
