<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BrightspaceLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrightspaceLogRepository::class)]
#[ORM\Table(
    name: 'brightspace_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BrightspaceLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_brightspace_log', type: 'integer')]
    private ?int $cdBrightspaceLog = null;

    #[ORM\Column(name: 'ds_log', type: 'text', length: 65535, nullable: true)]
    private ?string $dsLog = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsLog = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsLog = $dsLog;
        $this->dtBase = $dtBase;
    }

    public function getCdBrightspaceLog(): ?int
    {
        return $this->cdBrightspaceLog;
    }

    public function getDsLog(): ?string
    {
        return $this->dsLog;
    }

    public function setDsLog(?string $dsLog): self
    {
        $this->dsLog = $dsLog;
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
