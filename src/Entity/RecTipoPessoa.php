<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RecTipoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecTipoPessoaRepository::class)]
#[ORM\Table(
    name: 'rec_tipo_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo_pessoa', columns: ['cd_tipo_pessoa'])]
class RecTipoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer')]
    private ?int $cdTipoPessoa = null;

    #[ORM\Column(name: 'ds_tipo_pessoa', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsTipoPessoa = '';

    #[ORM\Column(name: 'ds_tipo_pessoa_completo', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipoPessoaCompleto = null;

    public function __construct(
        string $dsTipoPessoa = '',
        ?string $dsTipoPessoaCompleto = null
    ) {
        $this->dsTipoPessoa = $dsTipoPessoa;
        $this->dsTipoPessoaCompleto = $dsTipoPessoaCompleto;
    }

    public function getCdTipoPessoa(): ?int
    {
        return $this->cdTipoPessoa;
    }

    public function getDsTipoPessoa(): string
    {
        return $this->dsTipoPessoa;
    }

    public function setDsTipoPessoa(string $dsTipoPessoa): self
    {
        $this->dsTipoPessoa = $dsTipoPessoa;
        return $this;
    }

    public function getDsTipoPessoaCompleto(): ?string
    {
        return $this->dsTipoPessoaCompleto;
    }

    public function setDsTipoPessoaCompleto(?string $dsTipoPessoaCompleto): self
    {
        $this->dsTipoPessoaCompleto = $dsTipoPessoaCompleto;
        return $this;
    }
}
