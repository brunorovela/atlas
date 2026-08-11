<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposPessoasRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
class EstncGruposPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdGrupo = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }
}
