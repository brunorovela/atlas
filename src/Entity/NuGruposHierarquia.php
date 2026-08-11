<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuGruposHierarquiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposHierarquiaRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_hierarquia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo', 'cd_grupo_liberado'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_LIBERADO', columns: ['cd_grupo_liberado'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_nu_grupos_cd_grupo', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_nu_grupos_cd_grupo_liberado', 'colunas' => ['cd_grupo_liberado'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuGruposHierarquia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_alternar', type: 'integer')]
    private ?int $cdGrupoAlternar = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_liberado', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupoLiberado = null;

    public function __construct(
        ?NuGrupos $cdGrupo = null,
        ?NuGrupos $cdGrupoLiberado = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdGrupoLiberado = $cdGrupoLiberado;
    }

    public function getCdGrupoAlternar(): ?int
    {
        return $this->cdGrupoAlternar;
    }

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdGrupoLiberado(): ?NuGrupos
    {
        return $this->cdGrupoLiberado;
    }

    public function setCdGrupoLiberado(?NuGrupos $cdGrupoLiberado): self
    {
        $this->cdGrupoLiberado = $cdGrupoLiberado;
        return $this;
    }
}
