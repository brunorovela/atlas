<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolEtapasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolEtapasTiposRepository::class)]
#[ORM\Table(
    name: 'mol_etapas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class MolEtapasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_etapa_tipo', type: 'integer')]
    private ?int $cdEtapaTipo = null;

    #[ORM\Column(name: 'ds_etapa_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsEtapaTipo = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasse = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 30, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsEtapaTipo = null,
        ?string $dsClasse = null,
        ?string $dsChave = null
    ) {
        $this->dsEtapaTipo = $dsEtapaTipo;
        $this->dsClasse = $dsClasse;
        $this->dsChave = $dsChave;
    }

    public function getCdEtapaTipo(): ?int
    {
        return $this->cdEtapaTipo;
    }

    public function getDsEtapaTipo(): ?string
    {
        return $this->dsEtapaTipo;
    }

    public function setDsEtapaTipo(?string $dsEtapaTipo): self
    {
        $this->dsEtapaTipo = $dsEtapaTipo;
        return $this;
    }

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
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
