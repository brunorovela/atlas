<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniMigrationExecutadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniMigrationExecutadosRepository::class)]
#[ORM\Table(
    name: 'uni_migration_executados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniMigrationExecutados
{
    #[ORM\Id]
    #[ORM\Column(name: 'version', type: 'string', length: 255)]
    private ?string $version = null;

    #[ORM\Column(name: 'executed_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $executedAt = null;

    #[ORM\Column(name: 'execution_time', type: 'integer', nullable: true)]
    private ?int $executionTime = null;

    public function __construct(
        ?string $version = null,
        ?\DateTimeInterface $executedAt = null,
        ?int $executionTime = null
    ) {
        $this->version = $version;
        $this->executedAt = $executedAt;
        $this->executionTime = $executionTime;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getExecutedAt(): ?\DateTimeInterface
    {
        return $this->executedAt;
    }

    public function setExecutedAt(?\DateTimeInterface $executedAt): self
    {
        $this->executedAt = $executedAt;
        return $this;
    }

    public function getExecutionTime(): ?int
    {
        return $this->executionTime;
    }

    public function setExecutionTime(?int $executionTime): self
    {
        $this->executionTime = $executionTime;
        return $this;
    }
}
