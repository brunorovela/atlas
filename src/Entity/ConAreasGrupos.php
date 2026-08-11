<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConAreasGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConAreasGruposRepository::class)]
#[ORM\Table(
    name: 'con_areas_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_area_grupo', columns: ['cd_area_grupo'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
class ConAreasGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAreaGrupo = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 100, nullable: true)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'cd_pai', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPai = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdConcurso = null,
        ?string $dsGrupo = null,
        ?int $cdPai = null,
        ?int $cdColigada = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdConcurso = $cdConcurso;
        $this->dsGrupo = $dsGrupo;
        $this->cdPai = $cdPai;
        $this->cdColigada = $cdColigada;
    }

    public function getCdAreaGrupo(): ?int
    {
        return $this->cdAreaGrupo;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getCdPai(): ?int
    {
        return $this->cdPai;
    }

    public function setCdPai(?int $cdPai): self
    {
        $this->cdPai = $cdPai;
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
