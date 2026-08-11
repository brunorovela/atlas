<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedIndicadoresGruposRelacionarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedIndicadoresGruposRelacionarRepository::class)]
#[ORM\Table(
    name: 'ped_indicadores_grupos_relacionar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO_INDICADOR', columns: ['cd_grupo_indicador'])]
#[ORM\Index(name: 'IX_CD_INDICADOR', columns: ['cd_indicador'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ped_indicadores_grupos_relacionar_ibfk_1', 'colunas' => ['cd_grupo_indicador'], 'tabelaAlvo' => 'ped_grupo_indicadores', 'colunasAlvo' => ['cd_grupo_indicador'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_indicadores_grupos_relacionar_ibfk_2', 'colunas' => ['cd_indicador'], 'tabelaAlvo' => 'ped_indicadores', 'colunasAlvo' => ['cd_indicador'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedIndicadoresGruposRelacionar
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedIndicadores::class)]
    #[ORM\JoinColumn(name: 'cd_indicador', referencedColumnName: 'cd_indicador', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedIndicadores $cdIndicador = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedGrupoIndicadores::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_indicador', referencedColumnName: 'cd_grupo_indicador', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PedGrupoIndicadores $cdGrupoIndicador = null;

    public function __construct(
        ?PedIndicadores $cdIndicador = null,
        ?PedGrupoIndicadores $cdGrupoIndicador = null
    ) {
        $this->cdIndicador = $cdIndicador;
        $this->cdGrupoIndicador = $cdGrupoIndicador;
    }

    public function getCdIndicador(): ?PedIndicadores
    {
        return $this->cdIndicador;
    }

    public function setCdIndicador(?PedIndicadores $cdIndicador): self
    {
        $this->cdIndicador = $cdIndicador;
        return $this;
    }

    public function getCdGrupoIndicador(): ?PedGrupoIndicadores
    {
        return $this->cdGrupoIndicador;
    }

    public function setCdGrupoIndicador(?PedGrupoIndicadores $cdGrupoIndicador): self
    {
        $this->cdGrupoIndicador = $cdGrupoIndicador;
        return $this;
    }
}
