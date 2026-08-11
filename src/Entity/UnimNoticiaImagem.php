<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimNoticiaImagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimNoticiaImagemRepository::class)]
#[ORM\Table(
    name: 'unim_noticia_imagem',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_UNIM_NOTICIA_IMAGEM_CD_NOTICIA', columns: ['cd_noticia'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_noticia_imagem_ibfk_2', 'colunas' => ['cd_noticia'], 'tabelaAlvo' => 'unim_noticia', 'colunasAlvo' => ['cd_noticia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimNoticiaImagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_noticia_imagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNoticiaImagem = null;

    #[ORM\ManyToOne(targetEntity: UnimNoticia::class)]
    #[ORM\JoinColumn(name: 'cd_noticia', referencedColumnName: 'cd_noticia', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimNoticia $cdNoticia = null;

    #[ORM\Column(name: 'ds_imagem', type: 'string', length: 255, nullable: true)]
    private ?string $dsImagem = null;

    #[ORM\Column(name: 'me_imagem', type: 'blob', nullable: true)]
    private ?string $meImagem = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer', nullable: true)]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'me_imagem_home', type: 'blob', nullable: true)]
    private ?string $meImagemHome = null;

    #[ORM\Column(name: 'me_imagem_banner', type: 'blob', nullable: true)]
    private ?string $meImagemBanner = null;

    public function __construct(
        ?UnimNoticia $cdNoticia = null,
        ?string $dsImagem = null,
        ?string $meImagem = null,
        ?int $nrTamanho = null,
        ?string $meImagemHome = null,
        ?string $meImagemBanner = null
    ) {
        $this->cdNoticia = $cdNoticia;
        $this->dsImagem = $dsImagem;
        $this->meImagem = $meImagem;
        $this->nrTamanho = $nrTamanho;
        $this->meImagemHome = $meImagemHome;
        $this->meImagemBanner = $meImagemBanner;
    }

    public function getCdNoticiaImagem(): ?int
    {
        return $this->cdNoticiaImagem;
    }

    public function getCdNoticia(): ?UnimNoticia
    {
        return $this->cdNoticia;
    }

    public function setCdNoticia(?UnimNoticia $cdNoticia): self
    {
        $this->cdNoticia = $cdNoticia;
        return $this;
    }

    public function getDsImagem(): ?string
    {
        return $this->dsImagem;
    }

    public function setDsImagem(?string $dsImagem): self
    {
        $this->dsImagem = $dsImagem;
        return $this;
    }

    public function getMeImagem(): ?string
    {
        return $this->meImagem;
    }

    public function setMeImagem(?string $meImagem): self
    {
        $this->meImagem = $meImagem;
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

    public function getMeImagemHome(): ?string
    {
        return $this->meImagemHome;
    }

    public function setMeImagemHome(?string $meImagemHome): self
    {
        $this->meImagemHome = $meImagemHome;
        return $this;
    }

    public function getMeImagemBanner(): ?string
    {
        return $this->meImagemBanner;
    }

    public function setMeImagemBanner(?string $meImagemBanner): self
    {
        $this->meImagemBanner = $meImagemBanner;
        return $this;
    }
}
