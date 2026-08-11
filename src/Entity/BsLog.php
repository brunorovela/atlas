<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsLogRepository::class)]
#[ORM\Table(
    name: 'bs_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class BsLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'me_log', type: 'text', length: 65535, nullable: true)]
    private ?string $meLog = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $meLog = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->meLog = $meLog;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeLog(): ?string
    {
        return $this->meLog;
    }

    public function setMeLog(?string $meLog): self
    {
        $this->meLog = $meLog;
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
