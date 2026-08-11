<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ApiLogEscolaMovimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiLogEscolaMovimentoRepository::class)]
#[ORM\Table(
    name: 'api_log_escola_movimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IDX_SN_ERRO', columns: ['cd_http_retorno'])]
#[ORM\Index(name: 'IDX_DS_CHAVE_API', columns: ['ds_url_api'])]
class ApiLogEscolaMovimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'ds_url_api', type: 'string', length: 255)]
    private ?string $dsUrlApi = null;

    #[ORM\Column(name: 'ds_json', type: 'text', length: 65535)]
    private ?string $dsJson = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'cd_http_retorno', type: 'integer')]
    private ?int $cdHttpRetorno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsUrlApi = null,
        ?string $dsJson = null,
        ?string $dsRetorno = null,
        ?int $cdHttpRetorno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsUrlApi = $dsUrlApi;
        $this->dsJson = $dsJson;
        $this->dsRetorno = $dsRetorno;
        $this->cdHttpRetorno = $cdHttpRetorno;
        $this->dtBase = $dtBase;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
    }

    public function getDsUrlApi(): ?string
    {
        return $this->dsUrlApi;
    }

    public function setDsUrlApi(?string $dsUrlApi): self
    {
        $this->dsUrlApi = $dsUrlApi;
        return $this;
    }

    public function getDsJson(): ?string
    {
        return $this->dsJson;
    }

    public function setDsJson(?string $dsJson): self
    {
        $this->dsJson = $dsJson;
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

    public function getCdHttpRetorno(): ?int
    {
        return $this->cdHttpRetorno;
    }

    public function setCdHttpRetorno(?int $cdHttpRetorno): self
    {
        $this->cdHttpRetorno = $cdHttpRetorno;
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
