<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoLogsImpressoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoLogsImpressoesRepository::class)]
#[ORM\Table(
    name: 'rgo_logs_impressoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
class RgoLogsImpressoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_relatorio', type: 'integer')]
    private ?int $cdRelatorio = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime')]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'me_dados_impressao', type: 'text', length: 16777215)]
    private ?string $meDadosImpressao = null;

    #[ORM\Column(name: 'vl_tempo_impressao', type: 'float', options: ['default' => '0'])]
    private float $vlTempoImpressao = 0.0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdRelatorio = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?string $meDadosImpressao = null,
        float $vlTempoImpressao = 0.0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdRelatorio = $cdRelatorio;
        $this->dtImpressao = $dtImpressao;
        $this->meDadosImpressao = $meDadosImpressao;
        $this->vlTempoImpressao = $vlTempoImpressao;
        $this->dtBase = $dtBase;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?int $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
        return $this;
    }

    public function getMeDadosImpressao(): ?string
    {
        return $this->meDadosImpressao;
    }

    public function setMeDadosImpressao(?string $meDadosImpressao): self
    {
        $this->meDadosImpressao = $meDadosImpressao;
        return $this;
    }

    public function getVlTempoImpressao(): float
    {
        return $this->vlTempoImpressao;
    }

    public function setVlTempoImpressao(float $vlTempoImpressao): self
    {
        $this->vlTempoImpressao = $vlTempoImpressao;
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
