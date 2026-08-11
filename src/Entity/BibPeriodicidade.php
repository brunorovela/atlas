<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibPeriodicidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibPeriodicidadeRepository::class)]
#[ORM\Table(
    name: 'bib_periodicidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_periodicidade', columns: ['cd_periodicidade', 'ds_sigla'])]
#[ORM\Index(name: 'IX_DS_SIGLA', columns: ['ds_sigla'])]
class BibPeriodicidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_periodicidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPeriodicidade = null;

    #[ORM\Column(name: 'ds_periodicidade', type: 'string', length: 100)]
    private ?string $dsPeriodicidade = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 10, options: ['default' => ''])]
    private string $dsSigla = '';

    public function __construct(
        ?string $dsPeriodicidade = null,
        string $dsSigla = ''
    ) {
        $this->dsPeriodicidade = $dsPeriodicidade;
        $this->dsSigla = $dsSigla;
    }

    public function getCdPeriodicidade(): ?int
    {
        return $this->cdPeriodicidade;
    }

    public function getDsPeriodicidade(): ?string
    {
        return $this->dsPeriodicidade;
    }

    public function setDsPeriodicidade(?string $dsPeriodicidade): self
    {
        $this->dsPeriodicidade = $dsPeriodicidade;
        return $this;
    }

    public function getDsSigla(): string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }
}
