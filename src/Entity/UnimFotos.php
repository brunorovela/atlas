<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimFotosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimFotosRepository::class)]
#[ORM\Table(
    name: 'unim_fotos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimFotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_foto', type: 'integer')]
    private ?int $cdFoto = null;

    #[ORM\Column(name: 'cd_galeria', type: 'integer')]
    private ?int $cdGaleria = null;

    #[ORM\Column(name: 'sn_apresentar_capa_portal', type: TinyIntType::NAME, nullable: true)]
    private ?int $snApresentarCapaPortal = null;

    #[ORM\Column(name: 'ds_caminho', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaminho = null;

    #[ORM\Column(name: 'ds_caminho_s3', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaminhoS3 = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', nullable: true, options: ['default' => 'b\'0\''])]
    private ?bool $snExcluido = false;

    public function __construct(
        ?int $cdGaleria = null,
        ?int $snApresentarCapaPortal = null,
        ?string $dsCaminho = null,
        ?string $dsCaminhoS3 = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?bool $snExcluido = false
    ) {
        $this->cdGaleria = $cdGaleria;
        $this->snApresentarCapaPortal = $snApresentarCapaPortal;
        $this->dsCaminho = $dsCaminho;
        $this->dsCaminhoS3 = $dsCaminhoS3;
        $this->dtInclusao = $dtInclusao;
        $this->snExcluido = $snExcluido;
    }

    public function getCdFoto(): ?int
    {
        return $this->cdFoto;
    }

    public function getCdGaleria(): ?int
    {
        return $this->cdGaleria;
    }

    public function setCdGaleria(?int $cdGaleria): self
    {
        $this->cdGaleria = $cdGaleria;
        return $this;
    }

    public function getSnApresentarCapaPortal(): ?int
    {
        return $this->snApresentarCapaPortal;
    }

    public function setSnApresentarCapaPortal(?int $snApresentarCapaPortal): self
    {
        $this->snApresentarCapaPortal = $snApresentarCapaPortal;
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

    public function getDsCaminhoS3(): ?string
    {
        return $this->dsCaminhoS3;
    }

    public function setDsCaminhoS3(?string $dsCaminhoS3): self
    {
        $this->dsCaminhoS3 = $dsCaminhoS3;
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

    public function isSnExcluido(): ?bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
