<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MextMatriculaDiasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextMatriculaDiasRepository::class)]
#[ORM\Table(
    name: 'mext_matricula_dias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FILTRO', columns: ['cd_categoria_filtro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FILTRO', 'colunas' => ['cd_categoria_filtro'], 'tabelaAlvo' => 'mext_categoria_filtro', 'colunasAlvo' => ['cd_categoria_filtro'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_MATRICULA', 'colunas' => ['cd_matricula'], 'tabelaAlvo' => 'mext_matricula', 'colunasAlvo' => ['cd_matricula'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextMatriculaDias
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: MextMatricula::class)]
    #[ORM\JoinColumn(name: 'cd_matricula', referencedColumnName: 'cd_matricula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextMatricula $cdMatricula = null;

    #[ORM\Column(name: 'nr_dia', type: 'string', length: 50, nullable: true)]
    private ?string $nrDia = null;

    #[ORM\ManyToOne(targetEntity: MextCategoriaFiltro::class)]
    #[ORM\JoinColumn(name: 'cd_categoria_filtro', referencedColumnName: 'cd_categoria_filtro', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextCategoriaFiltro $cdCategoriaFiltro = null;

    public function __construct(
        ?MextMatricula $cdMatricula = null,
        ?string $nrDia = null,
        ?MextCategoriaFiltro $cdCategoriaFiltro = null
    ) {
        $this->cdMatricula = $cdMatricula;
        $this->nrDia = $nrDia;
        $this->cdCategoriaFiltro = $cdCategoriaFiltro;
    }

    public function getCdMatricula(): ?MextMatricula
    {
        return $this->cdMatricula;
    }

    public function setCdMatricula(?MextMatricula $cdMatricula): self
    {
        $this->cdMatricula = $cdMatricula;
        return $this;
    }

    public function getNrDia(): ?string
    {
        return $this->nrDia;
    }

    public function setNrDia(?string $nrDia): self
    {
        $this->nrDia = $nrDia;
        return $this;
    }

    public function getCdCategoriaFiltro(): ?MextCategoriaFiltro
    {
        return $this->cdCategoriaFiltro;
    }

    public function setCdCategoriaFiltro(?MextCategoriaFiltro $cdCategoriaFiltro): self
    {
        $this->cdCategoriaFiltro = $cdCategoriaFiltro;
        return $this;
    }
}
