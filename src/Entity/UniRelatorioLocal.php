<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniRelatorioLocalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniRelatorioLocalRepository::class)]
#[ORM\Table(
    name: 'uni_relatorio_local',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class UniRelatorioLocal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_local', type: 'integer')]
    private ?int $cdRelatorioLocal = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 255)]
    private ?string $dsLocal = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsLocal = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsLocal = $dsLocal;
    }

    public function getCdRelatorioLocal(): ?int
    {
        return $this->cdRelatorioLocal;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }
}
