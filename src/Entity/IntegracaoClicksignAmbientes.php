<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoClicksignAmbientesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoClicksignAmbientesRepository::class)]
#[ORM\Table(
    name: 'integracao_clicksign_ambientes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoClicksignAmbientes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_clicksign_ambiente', type: 'integer')]
    private ?int $cdClicksignAmbiente = null;

    #[ORM\Column(name: 'ds_clicksign_ambiente', type: 'string', length: 50, nullable: true)]
    private ?string $dsClicksignAmbiente = null;

    #[ORM\Column(name: 'ds_token', type: 'string', length: 50, nullable: true)]
    private ?string $dsToken = null;

    #[ORM\Column(name: 'ds_json_tipos_autenticacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsJsonTiposAutenticacao = null;

    #[ORM\Column(name: 'ds_secret_webhook', type: 'string', length: 50, nullable: true)]
    private ?string $dsSecretWebhook = null;

    #[ORM\Column(name: 'ds_account_key', type: 'string', length: 50, nullable: true)]
    private ?string $dsAccountKey = null;

    #[ORM\Column(name: 'sn_sandbox', type: 'boolean', options: ['default' => '0'])]
    private bool $snSandbox = false;

    #[ORM\Column(name: 'deadline_at', type: 'integer', options: ['default' => '30'])]
    private int $deadlineAt = 30;

    public function __construct(
        ?string $dsClicksignAmbiente = null,
        ?string $dsToken = null,
        ?string $dsJsonTiposAutenticacao = null,
        ?string $dsSecretWebhook = null,
        ?string $dsAccountKey = null,
        bool $snSandbox = false,
        int $deadlineAt = 30
    ) {
        $this->dsClicksignAmbiente = $dsClicksignAmbiente;
        $this->dsToken = $dsToken;
        $this->dsJsonTiposAutenticacao = $dsJsonTiposAutenticacao;
        $this->dsSecretWebhook = $dsSecretWebhook;
        $this->dsAccountKey = $dsAccountKey;
        $this->snSandbox = $snSandbox;
        $this->deadlineAt = $deadlineAt;
    }

    public function getCdClicksignAmbiente(): ?int
    {
        return $this->cdClicksignAmbiente;
    }

    public function getDsClicksignAmbiente(): ?string
    {
        return $this->dsClicksignAmbiente;
    }

    public function setDsClicksignAmbiente(?string $dsClicksignAmbiente): self
    {
        $this->dsClicksignAmbiente = $dsClicksignAmbiente;
        return $this;
    }

    public function getDsToken(): ?string
    {
        return $this->dsToken;
    }

    public function setDsToken(?string $dsToken): self
    {
        $this->dsToken = $dsToken;
        return $this;
    }

    public function getDsJsonTiposAutenticacao(): ?string
    {
        return $this->dsJsonTiposAutenticacao;
    }

    public function setDsJsonTiposAutenticacao(?string $dsJsonTiposAutenticacao): self
    {
        $this->dsJsonTiposAutenticacao = $dsJsonTiposAutenticacao;
        return $this;
    }

    public function getDsSecretWebhook(): ?string
    {
        return $this->dsSecretWebhook;
    }

    public function setDsSecretWebhook(?string $dsSecretWebhook): self
    {
        $this->dsSecretWebhook = $dsSecretWebhook;
        return $this;
    }

    public function getDsAccountKey(): ?string
    {
        return $this->dsAccountKey;
    }

    public function setDsAccountKey(?string $dsAccountKey): self
    {
        $this->dsAccountKey = $dsAccountKey;
        return $this;
    }

    public function isSnSandbox(): bool
    {
        return $this->snSandbox;
    }

    public function setSnSandbox(bool $snSandbox): self
    {
        $this->snSandbox = $snSandbox;
        return $this;
    }

    public function getDeadlineAt(): int
    {
        return $this->deadlineAt;
    }

    public function setDeadlineAt(int $deadlineAt): self
    {
        $this->deadlineAt = $deadlineAt;
        return $this;
    }
}
