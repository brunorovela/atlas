<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfeEnviadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeEnviadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_enviadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_RPS', columns: ['nr_rps', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_STATUS_PREFEITURA', columns: ['cd_status_prefeitura'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_FNE_STATUS_DATA_NFSE_PED', columns: ['cd_status_prefeitura', 'dt_envio', 'nr_nfse', 'cd_nfe_enviada'])]
class FinNfeEnviadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_enviada', type: 'integer')]
    private ?int $cdNfeEnviada = null;

    #[ORM\Column(name: 'nr_rps', type: 'integer')]
    private ?int $nrRps = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nr_nfse', type: 'bigint', nullable: true)]
    private ?string $nrNfse = null;

    #[ORM\Column(name: 'ds_codigo_verificacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsCodigoVerificacao = null;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true)]
    private ?float $vlNota = null;

    #[ORM\Column(name: 'cd_status_prefeitura', type: TinyIntType::NAME, nullable: true)]
    private ?int $cdStatusPrefeitura = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime')]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'dt_ultimo_retorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimoRetorno = null;

    #[ORM\Column(name: 'ds_xml', type: 'text')]
    private ?string $dsXml = null;

    #[ORM\Column(name: 'sn_processado', type: 'boolean', options: ['default' => '1'])]
    private bool $snProcessado = true;

    public function __construct(
        ?int $nrRps = null,
        ?int $cdColigada = null,
        ?string $nrNfse = null,
        ?string $dsCodigoVerificacao = null,
        ?float $vlNota = null,
        ?int $cdStatusPrefeitura = null,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?\DateTimeInterface $dtUltimoRetorno = null,
        ?string $dsXml = null,
        bool $snProcessado = true
    ) {
        $this->nrRps = $nrRps;
        $this->cdColigada = $cdColigada;
        $this->nrNfse = $nrNfse;
        $this->dsCodigoVerificacao = $dsCodigoVerificacao;
        $this->vlNota = $vlNota;
        $this->cdStatusPrefeitura = $cdStatusPrefeitura;
        $this->dsRetorno = $dsRetorno;
        $this->dtEnvio = $dtEnvio;
        $this->dtUltimoRetorno = $dtUltimoRetorno;
        $this->dsXml = $dsXml;
        $this->snProcessado = $snProcessado;
    }

    public function getCdNfeEnviada(): ?int
    {
        return $this->cdNfeEnviada;
    }

    public function getNrRps(): ?int
    {
        return $this->nrRps;
    }

    public function setNrRps(?int $nrRps): self
    {
        $this->nrRps = $nrRps;
        return $this;
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

    public function getNrNfse(): ?string
    {
        return $this->nrNfse;
    }

    public function setNrNfse(?string $nrNfse): self
    {
        $this->nrNfse = $nrNfse;
        return $this;
    }

    public function getDsCodigoVerificacao(): ?string
    {
        return $this->dsCodigoVerificacao;
    }

    public function setDsCodigoVerificacao(?string $dsCodigoVerificacao): self
    {
        $this->dsCodigoVerificacao = $dsCodigoVerificacao;
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

    public function getDtUltimoRetorno(): ?\DateTimeInterface
    {
        return $this->dtUltimoRetorno;
    }

    public function setDtUltimoRetorno(?\DateTimeInterface $dtUltimoRetorno): self
    {
        $this->dtUltimoRetorno = $dtUltimoRetorno;
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
