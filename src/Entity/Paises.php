<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PaisesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaisesRepository::class)]
#[ORM\Table(
    name: 'paises',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_pais', columns: ['cd_pais'])]
#[ORM\UniqueConstraint(name: 'idxPais', columns: ['ds_sigla'])]
class Paises
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pais', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPais = null;

    #[ORM\Column(name: 'ds_pais', type: 'string', length: 50, nullable: true, options: ['default' => '0'])]
    private ?string $dsPais = '0';

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 5, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'ds_nacionalidade', type: 'string', length: 100, nullable: true)]
    private ?string $dsNacionalidade = null;

    #[ORM\Column(name: 'cd_inep', type: 'integer', nullable: true)]
    private ?int $cdInep = null;

    public function __construct(
        ?string $dsPais = '0',
        ?string $dsSigla = null,
        ?string $dsNacionalidade = null,
        ?int $cdInep = null
    ) {
        $this->dsPais = $dsPais;
        $this->dsSigla = $dsSigla;
        $this->dsNacionalidade = $dsNacionalidade;
        $this->cdInep = $cdInep;
    }

    public function getCdPais(): ?int
    {
        return $this->cdPais;
    }

    public function getDsPais(): ?string
    {
        return $this->dsPais;
    }

    public function setDsPais(?string $dsPais): self
    {
        $this->dsPais = $dsPais;
        return $this;
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

    public function getDsNacionalidade(): ?string
    {
        return $this->dsNacionalidade;
    }

    public function setDsNacionalidade(?string $dsNacionalidade): self
    {
        $this->dsNacionalidade = $dsNacionalidade;
        return $this;
    }

    public function getCdInep(): ?int
    {
        return $this->cdInep;
    }

    public function setCdInep(?int $cdInep): self
    {
        $this->cdInep = $cdInep;
        return $this;
    }
}
