<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PedIndicadoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedIndicadoresRepository::class)]
#[ORM\Table(
    name: 'ped_indicadores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_indicadores', columns: ['ds_indicador'])]
#[ORM\Index(name: 'IX_CD_GRUPO_INDICADOR', columns: ['cd_grupo_indicador'])]
#[ORM\Index(name: 'FK_ped_indicadores_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ped_indicadores_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_indicadores_ibfk_1', 'colunas' => ['cd_grupo_indicador'], 'tabelaAlvo' => 'ped_grupo_indicadores', 'colunasAlvo' => ['cd_grupo_indicador'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedIndicadores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicador', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIndicador = null;

    #[ORM\Column(name: 'ds_indicador', type: 'string', length: 500)]
    private ?string $dsIndicador = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 50)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer')]
    private ?int $nrOrdem = null;

    #[ORM\ManyToOne(targetEntity: PedGrupoIndicadores::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_indicador', referencedColumnName: 'cd_grupo_indicador', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PedGrupoIndicadores $cdGrupoIndicador = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'sn_observacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snObservacao = 0;

    #[ORM\Column(name: 'nr_peso', type: 'float', nullable: true)]
    private ?float $nrPeso = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsIndicador = null,
        ?string $dsSigla = null,
        ?int $nrOrdem = null,
        ?PedGrupoIndicadores $cdGrupoIndicador = null,
        ?string $meDescricao = null,
        ?int $snObservacao = 0,
        ?float $nrPeso = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsIndicador = $dsIndicador;
        $this->dsSigla = $dsSigla;
        $this->nrOrdem = $nrOrdem;
        $this->cdGrupoIndicador = $cdGrupoIndicador;
        $this->meDescricao = $meDescricao;
        $this->snObservacao = $snObservacao;
        $this->nrPeso = $nrPeso;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdIndicador(): ?int
    {
        return $this->cdIndicador;
    }

    public function getDsIndicador(): ?string
    {
        return $this->dsIndicador;
    }

    public function setDsIndicador(?string $dsIndicador): self
    {
        $this->dsIndicador = $dsIndicador;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
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

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getSnObservacao(): ?int
    {
        return $this->snObservacao;
    }

    public function setSnObservacao(?int $snObservacao): self
    {
        $this->snObservacao = $snObservacao;
        return $this;
    }

    public function getNrPeso(): ?float
    {
        return $this->nrPeso;
    }

    public function setNrPeso(?float $nrPeso): self
    {
        $this->nrPeso = $nrPeso;
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
