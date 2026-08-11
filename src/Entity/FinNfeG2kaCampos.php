<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaCamposRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class FinNfeG2kaCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_g2ka_campos', type: 'integer')]
    private ?int $cdNfeG2kaCampos = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_grupo', type: 'string', length: 20)]
    private ?string $cdGrupo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 50, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    public function __construct(
        ?int $cdColigada = null,
        ?string $cdGrupo = null,
        ?string $dsCampo = null,
        ?string $dsValor = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdGrupo = $cdGrupo;
        $this->dsCampo = $dsCampo;
        $this->dsValor = $dsValor;
    }

    public function getCdNfeG2kaCampos(): ?int
    {
        return $this->cdNfeG2kaCampos;
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

    public function getCdGrupo(): ?string
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?string $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }
}
