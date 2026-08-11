<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniRelatorioTemplateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniRelatorioTemplateRepository::class)]
#[ORM\Table(
    name: 'uni_relatorio_template',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CD_TIPO_CONSULTA_RELATORIO_TEMPLATE', columns: ['cd_tipo_consulta'])]
class UniRelatorioTemplate
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio_template', type: 'integer')]
    private ?int $cdRelatorioTemplate = null;

    #[ORM\Column(name: 'cd_tipo_consulta', type: 'integer')]
    private ?int $cdTipoConsulta = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer')]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'ds_chave_tipo', type: 'string', length: 255)]
    private ?string $dsChaveTipo = null;

    #[ORM\Column(name: 'ds_nome_relatorio', type: 'string', length: 255)]
    private ?string $dsNomeRelatorio = null;

    #[ORM\Column(name: 'ds_arquivo_original', type: 'string', length: 255)]
    private ?string $dsArquivoOriginal = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'ds_url', type: 'text', length: 65535, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdTipoConsulta = null,
        ?int $cdColigadaMatriz = null,
        ?string $dsChaveTipo = null,
        ?string $dsNomeRelatorio = null,
        ?string $dsArquivoOriginal = null,
        ?string $dsArquivo = null,
        ?string $dsUrl = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTipoConsulta = $cdTipoConsulta;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsChaveTipo = $dsChaveTipo;
        $this->dsNomeRelatorio = $dsNomeRelatorio;
        $this->dsArquivoOriginal = $dsArquivoOriginal;
        $this->dsArquivo = $dsArquivo;
        $this->dsUrl = $dsUrl;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdRelatorioTemplate(): ?int
    {
        return $this->cdRelatorioTemplate;
    }

    public function getCdTipoConsulta(): ?int
    {
        return $this->cdTipoConsulta;
    }

    public function setCdTipoConsulta(?int $cdTipoConsulta): self
    {
        $this->cdTipoConsulta = $cdTipoConsulta;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsChaveTipo(): ?string
    {
        return $this->dsChaveTipo;
    }

    public function setDsChaveTipo(?string $dsChaveTipo): self
    {
        $this->dsChaveTipo = $dsChaveTipo;
        return $this;
    }

    public function getDsNomeRelatorio(): ?string
    {
        return $this->dsNomeRelatorio;
    }

    public function setDsNomeRelatorio(?string $dsNomeRelatorio): self
    {
        $this->dsNomeRelatorio = $dsNomeRelatorio;
        return $this;
    }

    public function getDsArquivoOriginal(): ?string
    {
        return $this->dsArquivoOriginal;
    }

    public function setDsArquivoOriginal(?string $dsArquivoOriginal): self
    {
        $this->dsArquivoOriginal = $dsArquivoOriginal;
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

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
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
