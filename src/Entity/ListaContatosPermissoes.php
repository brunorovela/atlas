<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ListaContatosPermissoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListaContatosPermissoesRepository::class)]
#[ORM\Table(
    name: 'lista_contatos_permissoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_permissao_lista', columns: ['cd_permissao_lista'])]
#[ORM\Index(name: 'IX_CD_CONTATO', columns: ['cd_contato'])]
class ListaContatosPermissoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_permissao_lista', type: 'integer')]
    private ?int $cdPermissaoLista = null;

    #[ORM\Column(name: 'ds_origem_tipo', type: 'string', length: 15, options: ['default' => ''])]
    private string $dsOrigemTipo = '';

    #[ORM\Column(name: 'cd_contato', type: 'integer', options: ['default' => '0'])]
    private int $cdContato = 0;

    #[ORM\Column(name: 'sn_permissao', type: 'boolean', options: ['default' => '1'])]
    private bool $snPermissao = true;

    public function __construct(
        string $dsOrigemTipo = '',
        int $cdContato = 0,
        bool $snPermissao = true
    ) {
        $this->dsOrigemTipo = $dsOrigemTipo;
        $this->cdContato = $cdContato;
        $this->snPermissao = $snPermissao;
    }

    public function getCdPermissaoLista(): ?int
    {
        return $this->cdPermissaoLista;
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

    public function getCdContato(): int
    {
        return $this->cdContato;
    }

    public function setCdContato(int $cdContato): self
    {
        $this->cdContato = $cdContato;
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
}
