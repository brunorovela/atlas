<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_GRUPO', columns: ['CD_TIPO_GRUPO'])]
#[ORM\Index(name: 'IX_CD_TIPO_OPERADOR', columns: ['CD_TIPO_OPERADOR'])]
class EstncGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'NM_GRUPO', type: 'string', length: 255, nullable: true)]
    private ?string $nmGrupo = null;

    #[ORM\Column(name: 'CD_TIPO_GRUPO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoGrupo = null;

    #[ORM\Column(name: 'CD_TIPO_OPERADOR', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoOperador = null;

    public function __construct(
        ?string $nmGrupo = null,
        ?int $cdTipoGrupo = null,
        ?int $cdTipoOperador = null
    ) {
        $this->nmGrupo = $nmGrupo;
        $this->cdTipoGrupo = $cdTipoGrupo;
        $this->cdTipoOperador = $cdTipoOperador;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getNmGrupo(): ?string
    {
        return $this->nmGrupo;
    }

    public function setNmGrupo(?string $nmGrupo): self
    {
        $this->nmGrupo = $nmGrupo;
        return $this;
    }

    public function getCdTipoGrupo(): ?int
    {
        return $this->cdTipoGrupo;
    }

    public function setCdTipoGrupo(?int $cdTipoGrupo): self
    {
        $this->cdTipoGrupo = $cdTipoGrupo;
        return $this;
    }

    public function getCdTipoOperador(): ?int
    {
        return $this->cdTipoOperador;
    }

    public function setCdTipoOperador(?int $cdTipoOperador): self
    {
        $this->cdTipoOperador = $cdTipoOperador;
        return $this;
    }
}
