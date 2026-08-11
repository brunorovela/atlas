<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniDiplomaConfiguracaoAmbienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaConfiguracaoAmbienteRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_configuracao_ambiente',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniDiplomaConfiguracaoAmbiente
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_configuracao_ambiente', type: 'integer')]
    private ?int $cdDiplomaConfiguracaoAmbiente = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_usuario', type: 'string', length: 50, nullable: true)]
    private ?string $dsUsuario = null;

    #[ORM\Column(name: 'ds_senha', type: 'string', length: 50, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_producao', type: 'boolean', options: ['default' => '0'])]
    private bool $snProducao = false;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsUsuario = null,
        ?string $dsSenha = null,
        ?string $dsChave = null,
        bool $snProducao = false
    ) {
        $this->dsNome = $dsNome;
        $this->dsUsuario = $dsUsuario;
        $this->dsSenha = $dsSenha;
        $this->dsChave = $dsChave;
        $this->snProducao = $snProducao;
    }

    public function getCdDiplomaConfiguracaoAmbiente(): ?int
    {
        return $this->cdDiplomaConfiguracaoAmbiente;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsUsuario(): ?string
    {
        return $this->dsUsuario;
    }

    public function setDsUsuario(?string $dsUsuario): self
    {
        $this->dsUsuario = $dsUsuario;
        return $this;
    }

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
}
