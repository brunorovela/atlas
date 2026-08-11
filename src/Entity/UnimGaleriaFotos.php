<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimGaleriaFotosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimGaleriaFotosRepository::class)]
#[ORM\Table(
    name: 'unim_galeria_fotos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class UnimGaleriaFotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_galeria', type: 'integer')]
    private ?int $cdGaleria = null;

    #[ORM\Column(name: 'nm_galeria', type: 'string', length: 125, nullable: true)]
    private ?string $nmGaleria = null;

    #[ORM\Column(name: 'ds_caminho', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaminho = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'nm_galeria_servidor', type: 'string', length: 125, nullable: true)]
    private ?string $nmGaleriaServidor = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $nmGaleria = null,
        ?string $dsCaminho = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?string $nmGaleriaServidor = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nmGaleria = $nmGaleria;
        $this->dsCaminho = $dsCaminho;
        $this->dtInclusao = $dtInclusao;
        $this->nmGaleriaServidor = $nmGaleriaServidor;
        $this->dtBase = $dtBase;
    }

    public function getCdGaleria(): ?int
    {
        return $this->cdGaleria;
    }

    public function getNmGaleria(): ?string
    {
        return $this->nmGaleria;
    }

    public function setNmGaleria(?string $nmGaleria): self
    {
        $this->nmGaleria = $nmGaleria;
        return $this;
    }

    public function getDsCaminho(): ?string
    {
        return $this->dsCaminho;
    }

    public function setDsCaminho(?string $dsCaminho): self
    {
        $this->dsCaminho = $dsCaminho;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getNmGaleriaServidor(): ?string
    {
        return $this->nmGaleriaServidor;
    }

    public function setNmGaleriaServidor(?string $nmGaleriaServidor): self
    {
        $this->nmGaleriaServidor = $nmGaleriaServidor;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
