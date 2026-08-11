<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasCamposOpcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasCamposOpcoesRepository::class)]
#[ORM\Table(
    name: 'pessoas_campos_opcoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PessoasCamposOpcoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_OPCAO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'DS_OPCAO', type: 'string', length: 40, nullable: true)]
    private ?string $dsOpcao = null;

    #[ORM\Column(name: 'ME_SQL', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'ME_OPCOES', type: 'text', length: 16777215, nullable: true)]
    private ?string $meOpcoes = null;

    public function __construct(
        ?string $dsOpcao = null,
        ?string $meSql = null,
        ?string $meOpcoes = null
    ) {
        $this->dsOpcao = $dsOpcao;
        $this->meSql = $meSql;
        $this->meOpcoes = $meOpcoes;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function getDsOpcao(): ?string
    {
        return $this->dsOpcao;
    }

    public function setDsOpcao(?string $dsOpcao): self
    {
        $this->dsOpcao = $dsOpcao;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getMeOpcoes(): ?string
    {
        return $this->meOpcoes;
    }

    public function setMeOpcoes(?string $meOpcoes): self
    {
        $this->meOpcoes = $meOpcoes;
        return $this;
    }
}
