<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppTemaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppTemaRepository::class)]
#[ORM\Table(
    name: 'app_tema',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CHAVE', columns: ['ds_chave'])]
class AppTema
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tema', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTema = null;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 50, nullable: true)]
    private ?string $dsCor = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsCor = null,
        ?string $dsChave = null
    ) {
        $this->dsCor = $dsCor;
        $this->dsChave = $dsChave;
    }

    public function getCdTema(): ?int
    {
        return $this->cdTema;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
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
}
