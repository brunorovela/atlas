<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibTitulosAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosAreasRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'cd_area', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_areas_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_titulos_areas_ibfk_2', 'colunas' => ['cd_area'], 'tabelaAlvo' => 'mec_areas', 'colunasAlvo' => ['cd_area'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibTitulosAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_area', type: 'integer')]
    private ?int $cdTituloArea = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: MecAreas::class)]
    #[ORM\JoinColumn(name: 'cd_area', referencedColumnName: 'cd_area', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?MecAreas $cdArea = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?MecAreas $cdArea = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdArea = $cdArea;
    }

    public function getCdTituloArea(): ?int
    {
        return $this->cdTituloArea;
    }

    public function getCdTitulo(): ?BibTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?BibTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdArea(): ?MecAreas
    {
        return $this->cdArea;
    }

    public function setCdArea(?MecAreas $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }
}
