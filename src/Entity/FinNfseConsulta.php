<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfseConsultaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseConsultaRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_consulta',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_FIN_NFSE_CONSULTA', columns: ['NM_CONSULTA'])]
class FinNfseConsulta
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_CONSULTA', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdConsulta = null;

    #[ORM\Column(name: 'NM_CONSULTA', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $nmConsulta = null;

    #[ORM\Column(name: 'TX_CONSULTA', type: 'text', length: 65535)]
    private ?string $txConsulta = null;

    public function __construct(
        ?int $cdConsulta = null,
        ?string $nmConsulta = null,
        ?string $txConsulta = null
    ) {
        $this->cdConsulta = $cdConsulta;
        $this->nmConsulta = $nmConsulta;
        $this->txConsulta = $txConsulta;
    }

    public function getCdConsulta(): ?int
    {
        return $this->cdConsulta;
    }

    public function setCdConsulta(?int $cdConsulta): self
    {
        $this->cdConsulta = $cdConsulta;
        return $this;
    }

    public function getNmConsulta(): ?string
    {
        return $this->nmConsulta;
    }

    public function setNmConsulta(?string $nmConsulta): self
    {
        $this->nmConsulta = $nmConsulta;
        return $this;
    }

    public function getTxConsulta(): ?string
    {
        return $this->txConsulta;
    }

    public function setTxConsulta(?string $txConsulta): self
    {
        $this->txConsulta = $txConsulta;
        return $this;
    }
}
