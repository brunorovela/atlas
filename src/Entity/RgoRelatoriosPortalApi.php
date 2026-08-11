<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoRelatoriosPortalApiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosPortalApiRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios_portal_api',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_DS_API', columns: ['ds_api'])]
class RgoRelatoriosPortalApi
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rgo_relatorios_portal_api', type: 'integer')]
    private ?int $cdRgoRelatoriosPortalApi = null;

    #[ORM\Column(name: 'ds_api', type: 'string', length: 255, nullable: true)]
    private ?string $dsApi = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsApi = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsApi = $dsApi;
        $this->dtBase = $dtBase;
    }

    public function getCdRgoRelatoriosPortalApi(): ?int
    {
        return $this->cdRgoRelatoriosPortalApi;
    }

    public function getDsApi(): ?string
    {
        return $this->dsApi;
    }

    public function setDsApi(?string $dsApi): self
    {
        $this->dsApi = $dsApi;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
