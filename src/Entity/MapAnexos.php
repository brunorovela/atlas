<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MapAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapAnexosRepository::class)]
#[ORM\Table(
    name: 'map_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'idx_material', columns: ['cd_material'])]
class MapAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'bigint')]
    private ?string $cdAnexo = null;

    #[ORM\Column(name: 'me_conteudo', type: 'blob', nullable: true)]
    private ?string $meConteudo = null;

    #[ORM\Column(name: 'cd_material', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMaterial = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    public function __construct(
        ?string $meConteudo = null,
        ?int $cdMaterial = null,
        ?int $nrTamanho = null
    ) {
        $this->meConteudo = $meConteudo;
        $this->cdMaterial = $cdMaterial;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdAnexo(): ?string
    {
        return $this->cdAnexo;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
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

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}
