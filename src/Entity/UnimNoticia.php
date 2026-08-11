<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimNoticiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimNoticiaRepository::class)]
#[ORM\Table(
    name: 'unim_noticia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class UnimNoticia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_noticia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNoticia = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'dt_noticia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNoticia = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_mostrar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snMostrar = 0;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_resumo', type: 'text', length: 65535, nullable: true)]
    private ?string $meResumo = null;

    #[ORM\Column(name: 'me_descricao_banner', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricaoBanner = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsTitulo = null,
        ?\DateTimeInterface $dtNoticia = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?int $snMostrar = 0,
        ?string $meDescricao = null,
        ?string $meResumo = null,
        ?string $meDescricaoBanner = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->dtNoticia = $dtNoticia;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snMostrar = $snMostrar;
        $this->meDescricao = $meDescricao;
        $this->meResumo = $meResumo;
        $this->meDescricaoBanner = $meDescricaoBanner;
        $this->dtBase = $dtBase;
    }

    public function getCdNoticia(): ?int
    {
        return $this->cdNoticia;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDtNoticia(): ?\DateTimeInterface
    {
        return $this->dtNoticia;
    }

    public function setDtNoticia(?\DateTimeInterface $dtNoticia): self
    {
        $this->dtNoticia = $dtNoticia;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getSnMostrar(): ?int
    {
        return $this->snMostrar;
    }

    public function setSnMostrar(?int $snMostrar): self
    {
        $this->snMostrar = $snMostrar;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getMeResumo(): ?string
    {
        return $this->meResumo;
    }

    public function setMeResumo(?string $meResumo): self
    {
        $this->meResumo = $meResumo;
        return $this;
    }

    public function getMeDescricaoBanner(): ?string
    {
        return $this->meDescricaoBanner;
    }

    public function setMeDescricaoBanner(?string $meDescricaoBanner): self
    {
        $this->meDescricaoBanner = $meDescricaoBanner;
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
