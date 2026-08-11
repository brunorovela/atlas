<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfeProdutoEnviadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeProdutoEnviadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_produto_enviadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_NOTA_COLIGADA', columns: ['nr_nota', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_STATUS_PREFEITURA', columns: ['cd_status_prefeitura'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinNfeProdutoEnviadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_produto_enviada', type: 'integer')]
    private ?int $cdNfeProdutoEnviada = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nr_nota', type: 'bigint')]
    private ?string $nrNota = null;

    #[ORM\Column(name: 'nr_aleatorio_gerado', type: 'integer', nullable: true)]
    private ?int $nrAleatorioGerado = null;

    #[ORM\Column(name: 'nr_cdv', type: 'boolean', nullable: true)]
    private ?bool $nrCdv = null;

    #[ORM\Column(name: 'nr_chave_nota', type: 'string', length: 200, nullable: true)]
    private ?string $nrChaveNota = null;

    #[ORM\Column(name: 'nr_protocolo', type: 'string', length: 200, nullable: true, options: ['collation' => 'latin1_german1_ci'])]
    private ?string $nrProtocolo = null;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true)]
    private ?float $vlNota = null;

    #[ORM\Column(name: 'cd_status_prefeitura', type: TinyIntType::NAME)]
    private ?int $cdStatusPrefeitura = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime')]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'ds_xml', type: 'text')]
    private ?string $dsXml = null;

    #[ORM\Column(name: 'sn_processado', type: 'boolean', options: ['default' => '1'])]
    private bool $snProcessado = true;

    public function __construct(
        ?int $cdColigada = null,
        ?string $nrNota = null,
        ?int $nrAleatorioGerado = null,
        ?bool $nrCdv = null,
        ?string $nrChaveNota = null,
        ?string $nrProtocolo = null,
        ?float $vlNota = null,
        ?int $cdStatusPrefeitura = null,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?string $dsXml = null,
        bool $snProcessado = true
    ) {
        $this->cdColigada = $cdColigada;
        $this->nrNota = $nrNota;
        $this->nrAleatorioGerado = $nrAleatorioGerado;
        $this->nrCdv = $nrCdv;
        $this->nrChaveNota = $nrChaveNota;
        $this->nrProtocolo = $nrProtocolo;
        $this->vlNota = $vlNota;
        $this->cdStatusPrefeitura = $cdStatusPrefeitura;
        $this->dsRetorno = $dsRetorno;
        $this->dtEnvio = $dtEnvio;
        $this->dsXml = $dsXml;
        $this->snProcessado = $snProcessado;
    }

    public function getCdNfeProdutoEnviada(): ?int
    {
        return $this->cdNfeProdutoEnviada;
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

    public function getNrNota(): ?string
    {
        return $this->nrNota;
    }

    public function setNrNota(?string $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }

    public function getNrAleatorioGerado(): ?int
    {
        return $this->nrAleatorioGerado;
    }

    public function setNrAleatorioGerado(?int $nrAleatorioGerado): self
    {
        $this->nrAleatorioGerado = $nrAleatorioGerado;
        return $this;
    }

    public function isNrCdv(): ?bool
    {
        return $this->nrCdv;
    }

    public function setNrCdv(?bool $nrCdv): self
    {
        $this->nrCdv = $nrCdv;
        return $this;
    }

    public function getNrChaveNota(): ?string
    {
        return $this->nrChaveNota;
    }

    public function setNrChaveNota(?string $nrChaveNota): self
    {
        $this->nrChaveNota = $nrChaveNota;
        return $this;
    }

    public function getNrProtocolo(): ?string
    {
        return $this->nrProtocolo;
    }

    public function setNrProtocolo(?string $nrProtocolo): self
    {
        $this->nrProtocolo = $nrProtocolo;
        return $this;
    }

    public function getVlNota(): ?float
    {
        return $this->vlNota;
    }

    public function setVlNota(?float $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }

    public function getCdStatusPrefeitura(): ?int
    {
        return $this->cdStatusPrefeitura;
    }

    public function setCdStatusPrefeitura(?int $cdStatusPrefeitura): self
    {
        $this->cdStatusPrefeitura = $cdStatusPrefeitura;
        return $this;
    }

    public function getDsRetorno(): ?string
    {
        return $this->dsRetorno;
    }

    public function setDsRetorno(?string $dsRetorno): self
    {
        $this->dsRetorno = $dsRetorno;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getDsXml(): ?string
    {
        return $this->dsXml;
    }

    public function setDsXml(?string $dsXml): self
    {
        $this->dsXml = $dsXml;
        return $this;
    }

    public function isSnProcessado(): bool
    {
        return $this->snProcessado;
    }

    public function setSnProcessado(bool $snProcessado): self
    {
        $this->snProcessado = $snProcessado;
        return $this;
    }
}
