<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\OuvSetorGruposPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvSetorGruposPessoasRepository::class)]
#[ORM\Table(
    name: 'ouv_setor_grupos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_uk_ouv_sgp_grupo', columns: ['CD_GRUPO', 'CD_SETOR'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['CD_SETOR'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OSGP_GRUPSET_OS_GRUPSET', 'colunas' => ['CD_GRUPO', 'CD_SETOR'], 'tabelaAlvo' => 'ouv_setores_grupos', 'colunasAlvo' => ['CD_GRUPO', 'CD_SETOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvSetorGruposPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_SETOR', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSetor = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_ativo', type: 'smallint', nullable: true, options: ['default' => '1'])]
    private ?int $snAtivo = 1;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdSetor = null,
        ?int $cdPessoa = null,
        ?int $snAtivo = 1
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdSetor = $cdSetor;
        $this->cdPessoa = $cdPessoa;
        $this->snAtivo = $snAtivo;
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

    public function getCdSetor(): ?int
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?int $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
        return $this;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
