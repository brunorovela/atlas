<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PrgAcordoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgAcordoRepository::class)]
#[ORM\Table(
    name: 'prg_acordo',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uq_acordo_id', columns: ['acordo_id'])]
class PrgAcordo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'acordo_id', type: 'string', length: 255)]
    private ?string $acordoId = null;

    #[ORM\Column(name: 'status', type: 'string', length: 255)]
    private ?string $status = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $acordoId = null,
        ?string $status = null,
        ?bool $snAtivo = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->acordoId = $acordoId;
        $this->status = $status;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcordoId(): ?string
    {
        return $this->acordoId;
    }

    public function setAcordoId(?string $acordoId): self
    {
        $this->acordoId = $acordoId;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
