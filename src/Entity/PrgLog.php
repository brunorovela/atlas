<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PrgLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgLogRepository::class)]
#[ORM\Table(
    name: 'prg_log',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\Index(name: 'IDX_PRGL_ENUM_TIPO', columns: ['enum_tipo'])]
class PrgLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'id_integracao_ambiente', type: 'integer', options: ['default' => '1'])]
    private int $idIntegracaoAmbiente = 1;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'ds_metodo', type: 'string', length: 10, nullable: true)]
    private ?string $dsMetodo = null;

    #[ORM\Column(name: 'enum_integracao', type: 'string', length: 255, nullable: true, options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci'])]
    private ?string $enumIntegracao = null;

    #[ORM\Column(name: 'ds_uri', type: 'string', length: 255, nullable: true)]
    private ?string $dsUri = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 65535, nullable: true)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'enum_tipo', type: 'enum', options: ['default' => 'INFO', 'values' => ['INFO', 'DEBUG', 'ERROR']])]
    private string $enumTipo = 'INFO';

    #[ORM\Column(name: 'ds_request_body', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRequestBody = null;

    #[ORM\Column(name: 'ds_request_headers', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRequestHeaders = null;

    #[ORM\Column(name: 'ds_response_body', type: 'text', nullable: true)]
    private ?string $dsResponseBody = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $idIntegracaoAmbiente = 1,
        ?int $cdStatus = null,
        ?string $dsMetodo = null,
        ?string $enumIntegracao = null,
        ?string $dsUri = null,
        ?string $dsMensagem = null,
        string $enumTipo = 'INFO',
        ?string $dsRequestBody = null,
        ?string $dsRequestHeaders = null,
        ?string $dsResponseBody = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        $this->cdStatus = $cdStatus;
        $this->dsMetodo = $dsMetodo;
        $this->enumIntegracao = $enumIntegracao;
        $this->dsUri = $dsUri;
        $this->dsMensagem = $dsMensagem;
        $this->enumTipo = $enumTipo;
        $this->dsRequestBody = $dsRequestBody;
        $this->dsRequestHeaders = $dsRequestHeaders;
        $this->dsResponseBody = $dsResponseBody;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIntegracaoAmbiente(): int
    {
        return $this->idIntegracaoAmbiente;
    }

    public function setIdIntegracaoAmbiente(int $idIntegracaoAmbiente): self
    {
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        return $this;
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

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }

    public function getEnumTipo(): string
    {
        return $this->enumTipo;
    }

    public function setEnumTipo(string $enumTipo): self
    {
        $this->enumTipo = $enumTipo;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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
