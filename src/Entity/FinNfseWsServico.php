<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfseWsServicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseWsServicoRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_ws_servico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseWsServico
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_SERVICO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdServico = null;

    #[ORM\Column(name: 'NM_SERVICO', type: 'string', length: 35, options: ['fixed' => true])]
    private ?string $nmServico = null;

    #[ORM\Column(name: 'DS_REQUEST_URL', type: 'string', length: 255, nullable: true)]
    private ?string $dsRequestUrl = null;

    public function __construct(
        ?int $cdServico = null,
        ?string $nmServico = null,
        ?string $dsRequestUrl = null
    ) {
        $this->cdServico = $cdServico;
        $this->nmServico = $nmServico;
        $this->dsRequestUrl = $dsRequestUrl;
    }

    public function getCdServico(): ?int
    {
        return $this->cdServico;
    }

    public function setCdServico(?int $cdServico): self
    {
        $this->cdServico = $cdServico;
        return $this;
    }

    public function getNmServico(): ?string
    {
        return $this->nmServico;
    }

    public function setNmServico(?string $nmServico): self
    {
        $this->nmServico = $nmServico;
        return $this;
    }

    public function getDsRequestUrl(): ?string
    {
        return $this->dsRequestUrl;
    }

    public function setDsRequestUrl(?string $dsRequestUrl): self
    {
        $this->dsRequestUrl = $dsRequestUrl;
        return $this;
    }
}
