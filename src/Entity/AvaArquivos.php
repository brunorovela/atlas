<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvaArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaArquivosRepository::class)]
#[ORM\Table(
    name: 'ava_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ava_arquivos_unique', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_PASTA', columns: ['cd_pasta'])]
class AvaArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_arquivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'cd_pasta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPasta = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'ds_html', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsHtml = null;

    #[ORM\Column(name: 'ds_link', type: 'string', length: 255, nullable: true)]
    private ?string $dsLink = null;

    #[ORM\Column(name: 'tp_arquivo', type: 'smallint')]
    private ?int $tpArquivo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer')]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?int $cdPasta = null,
        ?string $nmArquivo = null,
        ?int $snAtivo = null,
        ?string $dsArquivo = null,
        ?string $dsHtml = null,
        ?string $dsLink = null,
        ?int $tpArquivo = null,
        ?int $nrOrdem = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdPasta = $cdPasta;
        $this->nmArquivo = $nmArquivo;
        $this->snAtivo = $snAtivo;
        $this->dsArquivo = $dsArquivo;
        $this->dsHtml = $dsHtml;
        $this->dsLink = $dsLink;
        $this->tpArquivo = $tpArquivo;
        $this->nrOrdem = $nrOrdem;
        $this->dsChave = $dsChave;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function getCdPasta(): ?int
    {
        return $this->cdPasta;
    }

    public function setCdPasta(?int $cdPasta): self
    {
        $this->cdPasta = $cdPasta;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }

    public function getDsHtml(): ?string
    {
        return $this->dsHtml;
    }

    public function setDsHtml(?string $dsHtml): self
    {
        $this->dsHtml = $dsHtml;
        return $this;
    }

    public function getDsLink(): ?string
    {
        return $this->dsLink;
    }

    public function setDsLink(?string $dsLink): self
    {
        $this->dsLink = $dsLink;
        return $this;
    }

    public function getTpArquivo(): ?int
    {
        return $this->tpArquivo;
    }

    public function setTpArquivo(?int $tpArquivo): self
    {
        $this->tpArquivo = $tpArquivo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
}
