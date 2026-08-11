<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedGrupoIndicadoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedGrupoIndicadoresRepository::class)]
#[ORM\Table(
    name: 'ped_grupo_indicadores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO_CONCEITO', columns: ['cd_grupo_conceito'])]
#[ORM\Index(name: 'FK_ped_grupo_indicadores_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ped_grupo_indicadores_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedGrupoIndicadores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_indicador', type: 'integer')]
    private ?int $cdGrupoIndicador = null;

    #[ORM\Column(name: 'ds_grupo_indicador', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrupoIndicador = null;

    #[ORM\Column(name: 'cd_grupo_conceito', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupoConceito = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsGrupoIndicador = null,
        ?int $cdGrupoConceito = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsGrupoIndicador = $dsGrupoIndicador;
        $this->cdGrupoConceito = $cdGrupoConceito;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdGrupoIndicador(): ?int
    {
        return $this->cdGrupoIndicador;
    }

    public function getDsGrupoIndicador(): ?string
    {
        return $this->dsGrupoIndicador;
    }

    public function setDsGrupoIndicador(?string $dsGrupoIndicador): self
    {
        $this->dsGrupoIndicador = $dsGrupoIndicador;
        return $this;
    }

    public function getCdGrupoConceito(): ?int
    {
        return $this->cdGrupoConceito;
    }

    public function setCdGrupoConceito(?int $cdGrupoConceito): self
    {
        $this->cdGrupoConceito = $cdGrupoConceito;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
