<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasParentescoTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasParentescoTiposRepository::class)]
#[ORM\Table(
    name: 'pessoas_parentesco_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_parentesco_tipo', columns: ['cd_parentesco_tipo'])]
class PessoasParentescoTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parentesco_tipo', type: 'integer')]
    private ?int $cdParentescoTipo = null;

    #[ORM\Column(name: 'ds_pessoa_desc', type: 'string', length: 60, nullable: true)]
    private ?string $dsPessoaDesc = null;

    #[ORM\Column(name: 'ds_parente_desc', type: 'string', length: 60, nullable: true)]
    private ?string $dsParenteDesc = null;

    #[ORM\Column(name: 'cd_parentesco_relac', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdParentescoRelac = null;

    public function __construct(
        ?string $dsPessoaDesc = null,
        ?string $dsParenteDesc = null,
        ?int $cdParentescoRelac = null
    ) {
        $this->dsPessoaDesc = $dsPessoaDesc;
        $this->dsParenteDesc = $dsParenteDesc;
        $this->cdParentescoRelac = $cdParentescoRelac;
    }

    public function getCdParentescoTipo(): ?int
    {
        return $this->cdParentescoTipo;
    }

    public function getDsPessoaDesc(): ?string
    {
        return $this->dsPessoaDesc;
    }

    public function setDsPessoaDesc(?string $dsPessoaDesc): self
    {
        $this->dsPessoaDesc = $dsPessoaDesc;
        return $this;
    }

    public function getDsParenteDesc(): ?string
    {
        return $this->dsParenteDesc;
    }

    public function setDsParenteDesc(?string $dsParenteDesc): self
    {
        $this->dsParenteDesc = $dsParenteDesc;
        return $this;
    }

    public function getCdParentescoRelac(): ?int
    {
        return $this->cdParentescoRelac;
    }

    public function setCdParentescoRelac(?int $cdParentescoRelac): self
    {
        $this->cdParentescoRelac = $cdParentescoRelac;
        return $this;
    }
}
