<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AulasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulasTiposRepository::class)]
#[ORM\Table(
    name: 'aulas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AulasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aula_tipo', type: 'integer')]
    private ?int $cdAulaTipo = null;

    #[ORM\Column(name: 'ds_aula_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsAulaTipo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsAulaTipo = null,
        ?string $dsChave = null
    ) {
        $this->dsAulaTipo = $dsAulaTipo;
        $this->dsChave = $dsChave;
    }

    public function getCdAulaTipo(): ?int
    {
        return $this->cdAulaTipo;
    }

    public function getDsAulaTipo(): ?string
    {
        return $this->dsAulaTipo;
    }

    public function setDsAulaTipo(?string $dsAulaTipo): self
    {
        $this->dsAulaTipo = $dsAulaTipo;
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
