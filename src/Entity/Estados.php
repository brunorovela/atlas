<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstadosRepository::class)]
#[ORM\Table(
    name: 'estados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Index_36F60F95_5618_4C33', columns: ['ds_uf', 'cd_pais'])]
#[ORM\Index(name: 'IX_CD_MEC', columns: ['cd_mec'])]
#[ORM\Index(name: 'IX_CD_PAIS', columns: ['cd_pais'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['ds_uf'])]
class Estados
{
    #[ORM\Id]
    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsUf = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pais', type: 'integer')]
    private ?int $cdPais = null;

    #[ORM\Column(name: 'cd_mec', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMec = null;

    #[ORM\Column(name: 'ds_estado', type: 'string', length: 50, nullable: true)]
    private ?string $dsEstado = null;

    #[ORM\Column(name: 'ds_naturalidade', type: 'string', length: 50, nullable: true)]
    private ?string $dsNaturalidade = null;

    public function __construct(
        string $dsUf = '',
        ?int $cdPais = null,
        ?int $cdMec = null,
        ?string $dsEstado = null,
        ?string $dsNaturalidade = null
    ) {
        $this->dsUf = $dsUf;
        $this->cdPais = $cdPais;
        $this->cdMec = $cdMec;
        $this->dsEstado = $dsEstado;
        $this->dsNaturalidade = $dsNaturalidade;
    }

    public function getDsUf(): string
    {
        return $this->dsUf;
    }

    public function setDsUf(string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }

    public function getCdPais(): ?int
    {
        return $this->cdPais;
    }

    public function setCdPais(?int $cdPais): self
    {
        $this->cdPais = $cdPais;
        return $this;
    }

    public function getCdMec(): ?int
    {
        return $this->cdMec;
    }

    public function setCdMec(?int $cdMec): self
    {
        $this->cdMec = $cdMec;
        return $this;
    }

    public function getDsEstado(): ?string
    {
        return $this->dsEstado;
    }

    public function setDsEstado(?string $dsEstado): self
    {
        $this->dsEstado = $dsEstado;
        return $this;
    }

    public function getDsNaturalidade(): ?string
    {
        return $this->dsNaturalidade;
    }

    public function setDsNaturalidade(?string $dsNaturalidade): self
    {
        $this->dsNaturalidade = $dsNaturalidade;
        return $this;
    }
}
