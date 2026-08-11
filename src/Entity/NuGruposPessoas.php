<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuGruposPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposPessoasRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo_pessoa', columns: ['cd_grupo_pessoa'])]
#[ORM\UniqueConstraint(name: 'UK_USUARIO_COLIGADA', columns: ['cd_pessoa', 'cd_grupo', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_SN_VINCULO_TODOS_POLOS', columns: ['sn_vinculo_todos_polos'])]
class NuGruposPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_pessoa', type: 'integer')]
    private ?int $cdGrupoPessoa = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Column(name: 'sn_vinculo_todos_polos', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $snVinculoTodosPolos = 0;

    public function __construct(
        int $cdGrupo = 0,
        int $cdPessoa = 0,
        int $cdColigada = 0,
        int $snVinculoTodosPolos = 0
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->cdColigada = $cdColigada;
        $this->snVinculoTodosPolos = $snVinculoTodosPolos;
    }

    public function getCdGrupoPessoa(): ?int
    {
        return $this->cdGrupoPessoa;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getSnVinculoTodosPolos(): int
    {
        return $this->snVinculoTodosPolos;
    }

    public function setSnVinculoTodosPolos(int $snVinculoTodosPolos): self
    {
        $this->snVinculoTodosPolos = $snVinculoTodosPolos;
        return $this;
    }
}
