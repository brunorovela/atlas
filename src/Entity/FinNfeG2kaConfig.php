<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaConfigRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_EMITENTE', columns: ['cd_emitente'])]
class FinNfeG2kaConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_g2ka_config', type: 'integer')]
    private ?int $cdNfeG2kaConfig = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_emitente', type: 'integer', nullable: true)]
    private ?int $cdEmitente = null;

    #[ORM\Column(name: 'sn_servico_ativo', type: 'boolean', nullable: true)]
    private ?bool $snServicoAtivo = null;

    #[ORM\Column(name: 'nr_limite_lote', type: 'integer', nullable: true)]
    private ?int $nrLimiteLote = null;

    #[ORM\Column(name: 'ds_emails_retorno', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmailsRetorno = null;

    #[ORM\Column(name: 'dt_ultimo_retorno', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtUltimoRetorno = null;

    public function __construct(
        ?int $cdColigada = null,
        ?int $cdEmitente = null,
        ?bool $snServicoAtivo = null,
        ?int $nrLimiteLote = null,
        ?string $dsEmailsRetorno = null,
        ?\DateTimeInterface $dtUltimoRetorno = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdEmitente = $cdEmitente;
        $this->snServicoAtivo = $snServicoAtivo;
        $this->nrLimiteLote = $nrLimiteLote;
        $this->dsEmailsRetorno = $dsEmailsRetorno;
        $this->dtUltimoRetorno = $dtUltimoRetorno;
    }

    public function getCdNfeG2kaConfig(): ?int
    {
        return $this->cdNfeG2kaConfig;
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

    public function getCdEmitente(): ?int
    {
        return $this->cdEmitente;
    }

    public function setCdEmitente(?int $cdEmitente): self
    {
        $this->cdEmitente = $cdEmitente;
        return $this;
    }

    public function isSnServicoAtivo(): ?bool
    {
        return $this->snServicoAtivo;
    }

    public function setSnServicoAtivo(?bool $snServicoAtivo): self
    {
        $this->snServicoAtivo = $snServicoAtivo;
        return $this;
    }

    public function getNrLimiteLote(): ?int
    {
        return $this->nrLimiteLote;
    }

    public function setNrLimiteLote(?int $nrLimiteLote): self
    {
        $this->nrLimiteLote = $nrLimiteLote;
        return $this;
    }

    public function getDsEmailsRetorno(): ?string
    {
        return $this->dsEmailsRetorno;
    }

    public function setDsEmailsRetorno(?string $dsEmailsRetorno): self
    {
        $this->dsEmailsRetorno = $dsEmailsRetorno;
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
}
