<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinBolsasTiposTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinBolsasTiposTitulosRepository::class)]
#[ORM\Table(
    name: 'fin_bolsas_tipos_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_bolsas_tipo_titulos', columns: ['cd_bolsas_tipo_titulos'])]
#[ORM\Index(name: 'IX_CD_BOLSA', columns: ['cd_bolsa'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinBolsasTiposTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bolsas_tipo_titulos', type: 'integer')]
    private ?int $cdBolsasTipoTitulos = null;

    #[ORM\Column(name: 'cd_bolsa', type: 'integer', nullable: true)]
    private ?int $cdBolsa = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'integer', nullable: true)]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?int $cdBolsa = null,
        ?int $cdTipoTitulo = null,
        ?int $cdColigada = null
    ) {
        $this->cdBolsa = $cdBolsa;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigada = $cdColigada;
    }

    public function getCdBolsasTipoTitulos(): ?int
    {
        return $this->cdBolsasTipoTitulos;
    }

    public function getCdBolsa(): ?int
    {
        return $this->cdBolsa;
    }

    public function setCdBolsa(?int $cdBolsa): self
    {
        $this->cdBolsa = $cdBolsa;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
