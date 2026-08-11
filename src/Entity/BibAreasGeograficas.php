<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibAreasGeograficasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAreasGeograficasRepository::class)]
#[ORM\Table(
    name: 'bib_areas_geograficas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_sigla', columns: ['ds_sigla'])]
#[ORM\Index(name: 'IX_DS_SIGLA', columns: ['ds_sigla'])]
class BibAreasGeograficas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area_geografica', type: 'integer')]
    private ?int $cdAreaGeografica = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 5, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'ds_area_geografica', type: 'string', length: 100, nullable: true)]
    private ?string $dsAreaGeografica = null;

    public function __construct(
        ?string $dsSigla = null,
        ?string $dsAreaGeografica = null
    ) {
        $this->dsSigla = $dsSigla;
        $this->dsAreaGeografica = $dsAreaGeografica;
    }

    public function getCdAreaGeografica(): ?int
    {
        return $this->cdAreaGeografica;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getDsAreaGeografica(): ?string
    {
        return $this->dsAreaGeografica;
    }

    public function setDsAreaGeografica(?string $dsAreaGeografica): self
    {
        $this->dsAreaGeografica = $dsAreaGeografica;
        return $this;
    }
}
