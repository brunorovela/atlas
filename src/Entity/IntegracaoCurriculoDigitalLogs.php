<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoCurriculoDigitalLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoCurriculoDigitalLogsRepository::class)]
#[ORM\Table(
    name: 'integracao_curriculo_digital_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'UK_ENUM_CHAVE', columns: ['enum_integracao', 'cd_chave'])]
class IntegracaoCurriculoDigitalLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'ds_metodo', type: 'string', length: 10, nullable: true)]
    private ?string $dsMetodo = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', nullable: true)]
    private ?int $cdChave = null;

    #[ORM\Column(name: 'enum_integracao', type: 'enum', nullable: true, options: ['values' => ['ENVIAR', 'CONSULTAR']])]
    private ?string $enumIntegracao = null;

    #[ORM\Column(name: 'ds_uri', type: 'string', length: 255, nullable: true)]
    private ?string $dsUri = null;

    #[ORM\Column(name: 'ds_request_body', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRequestBody = null;

    #[ORM\Column(name: 'ds_request_headers', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRequestHeaders = null;

    #[ORM\Column(name: 'ds_response_body', type: 'text', length: 65535, nullable: true)]
    private ?string $dsResponseBody = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdStatus = null,
        ?string $dsMetodo = null,
        ?int $cdChave = null,
        ?string $enumIntegracao = null,
        ?string $dsUri = null,
        ?string $dsRequestBody = null,
        ?string $dsRequestHeaders = null,
        ?string $dsResponseBody = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdStatus = $cdStatus;
        $this->dsMetodo = $dsMetodo;
        $this->cdChave = $cdChave;
        $this->enumIntegracao = $enumIntegracao;
        $this->dsUri = $dsUri;
        $this->dsRequestBody = $dsRequestBody;
        $this->dsRequestHeaders = $dsRequestHeaders;
        $this->dsResponseBody = $dsResponseBody;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdStatus(): ?int
    {
        return $this->cdStatus;
    }

    public function setCdStatus(?int $cdStatus): self
    {
        $this->cdStatus = $cdStatus;
        return $this;
    }

    public function getDsMetodo(): ?string
    {
        return $this->dsMetodo;
    }

    public function setDsMetodo(?string $dsMetodo): self
    {
        $this->dsMetodo = $dsMetodo;
        return $this;
    }

    public function getCdChave(): ?int
    {
        return $this->cdChave;
    }

    public function setCdChave(?int $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getEnumIntegracao(): ?string
    {
        return $this->enumIntegracao;
    }

    public function setEnumIntegracao(?string $enumIntegracao): self
    {
        $this->enumIntegracao = $enumIntegracao;
        return $this;
    }

    public function getDsUri(): ?string
    {
        return $this->dsUri;
    }

    public function setDsUri(?string $dsUri): self
    {
        $this->dsUri = $dsUri;
        return $this;
    }

    public function getDsRequestBody(): ?string
    {
        return $this->dsRequestBody;
    }

    public function setDsRequestBody(?string $dsRequestBody): self
    {
        $this->dsRequestBody = $dsRequestBody;
        return $this;
    }

    public function getDsRequestHeaders(): ?string
    {
        return $this->dsRequestHeaders;
    }

    public function setDsRequestHeaders(?string $dsRequestHeaders): self
    {
        $this->dsRequestHeaders = $dsRequestHeaders;
        return $this;
    }

    public function getDsResponseBody(): ?string
    {
        return $this->dsResponseBody;
    }

    public function setDsResponseBody(?string $dsResponseBody): self
    {
        $this->dsResponseBody = $dsResponseBody;
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
