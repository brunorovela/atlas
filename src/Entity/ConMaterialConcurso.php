<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConMaterialConcursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConMaterialConcursoRepository::class)]
#[ORM\Table(
    name: 'con_material_concurso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MATERIAL', columns: ['cd_material'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class ConMaterialConcurso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_material_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMaterialConcurso = null;

    #[ORM\Column(name: 'cd_material', type: 'integer')]
    private ?int $cdMaterial = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', nullable: true)]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'cd_situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $cdSituacao = null;

    public function __construct(
        ?int $cdMaterial = null,
        ?int $cdConcurso = null,
        ?int $cdArea = null,
        ?string $cdSituacao = null
    ) {
        $this->cdMaterial = $cdMaterial;
        $this->cdConcurso = $cdConcurso;
        $this->cdArea = $cdArea;
        $this->cdSituacao = $cdSituacao;
    }

    public function getCdMaterialConcurso(): ?int
    {
        return $this->cdMaterialConcurso;
    }

    public function getCdMaterial(): ?int
    {
        return $this->cdMaterial;
    }

    public function setCdMaterial(?int $cdMaterial): self
    {
        $this->cdMaterial = $cdMaterial;
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

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getCdSituacao(): ?string
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?string $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }
}
