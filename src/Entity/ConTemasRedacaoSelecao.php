<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConTemasRedacaoSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConTemasRedacaoSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_temas_redacao_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ConTemasRedacaoSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tema', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTema = null;

    #[ORM\Column(name: 'ds_termo_chave', type: 'string', length: 255)]
    private ?string $dsTermoChave = null;

    #[ORM\Column(name: 'ds_tema', type: 'text', length: 16777215)]
    private ?string $dsTema = null;

    #[ORM\Column(name: 'im_redacao', type: 'blob', length: 16777215, nullable: true)]
    private ?string $imRedacao = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100, nullable: true)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'string', length: 30, nullable: true)]
    private ?string $nrTamanho = null;

    #[ORM\Column(name: 'nr_minutos_redacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrMinutosRedacao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?string $dsTermoChave = null,
        ?string $dsTema = null,
        ?string $imRedacao = null,
        ?string $nmOriginal = null,
        ?string $nrTamanho = null,
        ?int $nrMinutosRedacao = null,
        ?string $dsDescricao = null
    ) {
        $this->dsTermoChave = $dsTermoChave;
        $this->dsTema = $dsTema;
        $this->imRedacao = $imRedacao;
        $this->nmOriginal = $nmOriginal;
        $this->nrTamanho = $nrTamanho;
        $this->nrMinutosRedacao = $nrMinutosRedacao;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdTema(): ?int
    {
        return $this->cdTema;
    }

    public function getDsTermoChave(): ?string
    {
        return $this->dsTermoChave;
    }

    public function setDsTermoChave(?string $dsTermoChave): self
    {
        $this->dsTermoChave = $dsTermoChave;
        return $this;
    }

    public function getDsTema(): ?string
    {
        return $this->dsTema;
    }

    public function setDsTema(?string $dsTema): self
    {
        $this->dsTema = $dsTema;
        return $this;
    }

    public function getImRedacao(): ?string
    {
        return $this->imRedacao;
    }

    public function setImRedacao(?string $imRedacao): self
    {
        $this->imRedacao = $imRedacao;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getNrTamanho(): ?string
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?string $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getNrMinutosRedacao(): ?int
    {
        return $this->nrMinutosRedacao;
    }

    public function setNrMinutosRedacao(?int $nrMinutosRedacao): self
    {
        $this->nrMinutosRedacao = $nrMinutosRedacao;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
