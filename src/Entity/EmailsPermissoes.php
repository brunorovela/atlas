<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EmailsPermissoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmailsPermissoesRepository::class)]
#[ORM\Table(
    name: 'emails_permissoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_permissao', columns: ['cd_permissao'])]
#[ORM\UniqueConstraint(name: 'Permissao', columns: ['ds_origem_tipo', 'ds_destino_tipo'])]
#[ORM\Index(name: 'IX_DS_ORIGEM_TIPO', columns: ['ds_origem_tipo'])]
#[ORM\Index(name: 'IX_DS_DESTINO_TIPO', columns: ['ds_destino_tipo'])]
class EmailsPermissoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_permissao', type: 'integer')]
    private ?int $cdPermissao = null;

    #[ORM\Column(name: 'ds_origem_tipo', type: 'string', length: 15, options: ['default' => ''])]
    private string $dsOrigemTipo = '';

    #[ORM\Column(name: 'ds_destino_tipo', type: 'string', length: 15, options: ['default' => ''])]
    private string $dsDestinoTipo = '';

    #[ORM\Column(name: 'sn_permissao', type: 'boolean', options: ['default' => '1'])]
    private bool $snPermissao = true;

    #[ORM\Column(name: 'ds_destino_nome', type: 'string', length: 100, nullable: true)]
    private ?string $dsDestinoNome = null;

    public function __construct(
        string $dsOrigemTipo = '',
        string $dsDestinoTipo = '',
        bool $snPermissao = true,
        ?string $dsDestinoNome = null
    ) {
        $this->dsOrigemTipo = $dsOrigemTipo;
        $this->dsDestinoTipo = $dsDestinoTipo;
        $this->snPermissao = $snPermissao;
        $this->dsDestinoNome = $dsDestinoNome;
    }

    public function getCdPermissao(): ?int
    {
        return $this->cdPermissao;
    }

    public function getDsOrigemTipo(): string
    {
        return $this->dsOrigemTipo;
    }

    public function setDsOrigemTipo(string $dsOrigemTipo): self
    {
        $this->dsOrigemTipo = $dsOrigemTipo;
        return $this;
    }

    public function getDsDestinoTipo(): string
    {
        return $this->dsDestinoTipo;
    }

    public function setDsDestinoTipo(string $dsDestinoTipo): self
    {
        $this->dsDestinoTipo = $dsDestinoTipo;
        return $this;
    }

    public function isSnPermissao(): bool
    {
        return $this->snPermissao;
    }

    public function setSnPermissao(bool $snPermissao): self
    {
        $this->snPermissao = $snPermissao;
        return $this;
    }

    public function getDsDestinoNome(): ?string
    {
        return $this->dsDestinoNome;
    }

    public function setDsDestinoNome(?string $dsDestinoNome): self
    {
        $this->dsDestinoNome = $dsDestinoNome;
        return $this;
    }
}
