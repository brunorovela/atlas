<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PagseguroLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PagseguroLogRepository::class)]
#[ORM\Table(
    name: 'pagseguro_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_PAGSEGURO_LOG_DT_EXPIRACAO', columns: ['dt_expiracao'])]
class PagseguroLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pagseguro_log', type: 'integer')]
    private ?int $cdPagseguroLog = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'ds_operacao', type: 'string', length: 40, nullable: true)]
    private ?string $dsOperacao = null;

    #[ORM\Column(name: 'ds_endpoint', type: 'string', length: 255, nullable: true)]
    private ?string $dsEndpoint = null;

    #[ORM\Column(name: 'ds_metodo_http', type: 'string', length: 10, nullable: true)]
    private ?string $dsMetodoHttp = null;

    #[ORM\Column(name: 'nr_http_status', type: 'smallint', nullable: true)]
    private ?int $nrHttpStatus = null;

    #[ORM\Column(name: 'ds_requisicao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRequisicao = null;

    #[ORM\Column(name: 'ds_resposta', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsResposta = null;

    #[ORM\Column(name: 'ds_referencia', type: 'string', length: 100, nullable: true)]
    private ?string $dsReferencia = null;

    #[ORM\Column(name: 'sn_sucesso', type: 'boolean', nullable: true)]
    private ?bool $snSucesso = null;

    #[ORM\Column(name: 'dt_expiracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExpiracao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsRetorno = null,
        ?string $dsOperacao = null,
        ?string $dsEndpoint = null,
        ?string $dsMetodoHttp = null,
        ?int $nrHttpStatus = null,
        ?string $dsRequisicao = null,
        ?string $dsResposta = null,
        ?string $dsReferencia = null,
        ?bool $snSucesso = null,
        ?\DateTimeInterface $dtExpiracao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsRetorno = $dsRetorno;
        $this->dsOperacao = $dsOperacao;
        $this->dsEndpoint = $dsEndpoint;
        $this->dsMetodoHttp = $dsMetodoHttp;
        $this->nrHttpStatus = $nrHttpStatus;
        $this->dsRequisicao = $dsRequisicao;
        $this->dsResposta = $dsResposta;
        $this->dsReferencia = $dsReferencia;
        $this->snSucesso = $snSucesso;
        $this->dtExpiracao = $dtExpiracao;
        $this->dtBase = $dtBase;
    }

    public function getCdPagseguroLog(): ?int
    {
        return $this->cdPagseguroLog;
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

    public function getDsOperacao(): ?string
    {
        return $this->dsOperacao;
    }

    public function setDsOperacao(?string $dsOperacao): self
    {
        $this->dsOperacao = $dsOperacao;
        return $this;
    }

    public function getDsEndpoint(): ?string
    {
        return $this->dsEndpoint;
    }

    public function setDsEndpoint(?string $dsEndpoint): self
    {
        $this->dsEndpoint = $dsEndpoint;
        return $this;
    }

    public function getDsMetodoHttp(): ?string
    {
        return $this->dsMetodoHttp;
    }

    public function setDsMetodoHttp(?string $dsMetodoHttp): self
    {
        $this->dsMetodoHttp = $dsMetodoHttp;
        return $this;
    }

    public function getNrHttpStatus(): ?int
    {
        return $this->nrHttpStatus;
    }

    public function setNrHttpStatus(?int $nrHttpStatus): self
    {
        $this->nrHttpStatus = $nrHttpStatus;
        return $this;
    }

    public function getDsRequisicao(): ?string
    {
        return $this->dsRequisicao;
    }

    public function setDsRequisicao(?string $dsRequisicao): self
    {
        $this->dsRequisicao = $dsRequisicao;
        return $this;
    }

    public function getDsResposta(): ?string
    {
        return $this->dsResposta;
    }

    public function setDsResposta(?string $dsResposta): self
    {
        $this->dsResposta = $dsResposta;
        return $this;
    }

    public function getDsReferencia(): ?string
    {
        return $this->dsReferencia;
    }

    public function setDsReferencia(?string $dsReferencia): self
    {
        $this->dsReferencia = $dsReferencia;
        return $this;
    }

    public function isSnSucesso(): ?bool
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(?bool $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getDtExpiracao(): ?\DateTimeInterface
    {
        return $this->dtExpiracao;
    }

    public function setDtExpiracao(?\DateTimeInterface $dtExpiracao): self
    {
        $this->dtExpiracao = $dtExpiracao;
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
