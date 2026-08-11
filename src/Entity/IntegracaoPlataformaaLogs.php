<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoPlataformaaLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaLogsRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'UK_integracao_plataformaa_logs', columns: ['plataformaa_ambiente_id', 'enum_integracao', 'cd_chave'])]
class IntegracaoPlataformaaLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'plataformaa_ambiente_id', type: 'integer', nullable: true)]
    private ?int $plataformaaAmbienteId = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'ds_metodo', type: 'string', length: 10, nullable: true)]
    private ?string $dsMetodo = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 255, nullable: true)]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'enum_integracao', type: 'enum', nullable: true, options: ['values' => ['INCLUIR_PESSOA', 'INCLUIR_ALUNO', 'INCLUIR_CURSO', 'INCLUIR_CURSO_COORDENADOR', 'INCLUIR_PERIODO', 'INCLUIR_CURRICULO', 'INCLUIR_DISCIPLINA', 'INCLUIR_TURMA', 'INCLUIR_DISCIPLINA_CURRICULO', 'INCLUIR_MATRICULA', 'INCLUIR_PERIODO_MATRICULA', 'INCLUIR_TURMA_DISCIPLINA', 'INCLUIR_PESSOA_TURMA_DISCIPLINA', 'INCLUIR_ENTURMACAO', 'INCLUIR_SITUACAO_MATRICULA', 'INCLUIR_SITUACAO_ENTURMACAO', 'INCLUIR_NIVEL_EDUCACIONAL', 'INCLUIR_ACESSIBILIDADE', 'INCLUIR_CATEGORIA_DISCIPLINA', 'INCLUIR_MODALIDADE_ENSINO', 'INCLUIR_PROFESSOR_CATEGORIA', 'INCLUIR_TIPO_MATRICULA', 'INCLUIR_TURNO', 'INCLUIR_CAMPUS', 'INCLUIR_POLOS', 'ALTERAR_PESSOA', 'ALTERAR_MATRICULA', 'ALTERAR_ENTURMACAO', 'EXCLUIR_TURMA', 'EXCLUIR_TURMA_DISCIPLINA', 'EXCLUIR_ENTURMACAO', 'EXCLUIR_MATRICULA_PERIODO', 'EXCLUIR_MATRICULA']])]
    private ?string $enumIntegracao = null;

    #[ORM\Column(name: 'ds_uri', type: 'string', length: 255, nullable: true)]
    private ?string $dsUri = null;

    #[ORM\Column(name: 'ds_request_body', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRequestBody = null;

    #[ORM\Column(name: 'ds_request_headers', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRequestHeaders = null;

    #[ORM\Column(name: 'ds_response_body', type: 'text', length: 65535, nullable: true)]
    private ?string $dsResponseBody = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $plataformaaAmbienteId = null,
        ?int $cdStatus = null,
        ?string $dsMetodo = null,
        ?string $cdChave = null,
        ?string $enumIntegracao = null,
        ?string $dsUri = null,
        ?string $dsRequestBody = null,
        ?string $dsRequestHeaders = null,
        ?string $dsResponseBody = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
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

    public function getPlataformaaAmbienteId(): ?int
    {
        return $this->plataformaaAmbienteId;
    }

    public function setPlataformaaAmbienteId(?int $plataformaaAmbienteId): self
    {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
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

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
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
