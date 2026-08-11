<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoPlataformaaAmbienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaAmbienteRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_ambiente',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoPlataformaaAmbiente
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_plataformaa_ambiente', type: 'string', length: 50, nullable: true)]
    private ?string $dsPlataformaaAmbiente = null;

    #[ORM\Column(name: 'ds_client_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsClientId = null;

    #[ORM\Column(name: 'ds_client_secret', type: 'string', length: 255, nullable: true)]
    private ?string $dsClientSecret = null;

    #[ORM\Column(name: 'ds_api_key', type: 'string', length: 255, nullable: true)]
    private ?string $dsApiKey = null;

    #[ORM\Column(name: 'ds_classe_validacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasseValidacao = null;

    #[ORM\Column(name: 'sn_producao', type: 'boolean', options: ['default' => '0'])]
    private bool $snProducao = false;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsPlataformaaAmbiente = null,
        ?string $dsClientId = null,
        ?string $dsClientSecret = null,
        ?string $dsApiKey = null,
        ?string $dsClasseValidacao = null,
        bool $snProducao = false,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsPlataformaaAmbiente = $dsPlataformaaAmbiente;
        $this->dsClientId = $dsClientId;
        $this->dsClientSecret = $dsClientSecret;
        $this->dsApiKey = $dsApiKey;
        $this->dsClasseValidacao = $dsClasseValidacao;
        $this->snProducao = $snProducao;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsPlataformaaAmbiente(): ?string
    {
        return $this->dsPlataformaaAmbiente;
    }

    public function setDsPlataformaaAmbiente(?string $dsPlataformaaAmbiente): self
    {
        $this->dsPlataformaaAmbiente = $dsPlataformaaAmbiente;
        return $this;
    }

    public function getDsClientId(): ?string
    {
        return $this->dsClientId;
    }

    public function setDsClientId(?string $dsClientId): self
    {
        $this->dsClientId = $dsClientId;
        return $this;
    }

    public function getDsClientSecret(): ?string
    {
        return $this->dsClientSecret;
    }

    public function setDsClientSecret(?string $dsClientSecret): self
    {
        $this->dsClientSecret = $dsClientSecret;
        return $this;
    }

    public function getDsApiKey(): ?string
    {
        return $this->dsApiKey;
    }

    public function setDsApiKey(?string $dsApiKey): self
    {
        $this->dsApiKey = $dsApiKey;
        return $this;
    }

    public function getDsClasseValidacao(): ?string
    {
        return $this->dsClasseValidacao;
    }

    public function setDsClasseValidacao(?string $dsClasseValidacao): self
    {
        $this->dsClasseValidacao = $dsClasseValidacao;
        return $this;
    }

    public function isSnProducao(): bool
    {
        return $this->snProducao;
    }

    public function setSnProducao(bool $snProducao): self
    {
        $this->snProducao = $snProducao;
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
