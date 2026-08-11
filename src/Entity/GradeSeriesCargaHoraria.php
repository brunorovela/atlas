<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\GradeSeriesCargaHorariaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradeSeriesCargaHorariaRepository::class)]
#[ORM\Table(
    name: 'grade_series_carga_horaria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'grade_series_carga_horaria_unique', columns: ['id_grade', 'nr_serie'])]
#[ORM\Index(name: 'IDX_5F4B806CB7DFEF04', columns: ['id_grade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'grade_series_carga_horaria_grades_FK', 'colunas' => ['id_grade'], 'tabelaAlvo' => 'grades', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GradeSeriesCargaHoraria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Grades::class)]
    #[ORM\JoinColumn(name: 'id_grade', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Grades $idGrade = null;

    #[ORM\Column(name: 'nr_serie', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrSerie = null;

    #[ORM\Column(name: 'nr_ch_maxima', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrChMaxima = null;

    public function __construct(
        ?Grades $idGrade = null,
        ?int $nrSerie = null,
        ?int $nrChMaxima = null
    ) {
        $this->idGrade = $idGrade;
        $this->nrSerie = $nrSerie;
        $this->nrChMaxima = $nrChMaxima;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGrade(): ?Grades
    {
        return $this->idGrade;
    }

    public function setIdGrade(?Grades $idGrade): self
    {
        $this->idGrade = $idGrade;
        return $this;
    }

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
        return $this;
    }

    public function getNrChMaxima(): ?int
    {
        return $this->nrChMaxima;
    }

    public function setNrChMaxima(?int $nrChMaxima): self
    {
        $this->nrChMaxima = $nrChMaxima;
        return $this;
    }
}
