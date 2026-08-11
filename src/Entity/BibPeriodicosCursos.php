<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibPeriodicosCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibPeriodicosCursosRepository::class)]
#[ORM\Table(
    name: 'bib_periodicos_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PER_CUR_PER_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'FK_PER_CUR_CURSOS_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PER_CUR_CURSOS_CD_CURSO', 'colunas' => ['CD_CURSO'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PER_CUR_PER_CD_PERIODICO', 'colunas' => ['CD_PERIODICO'], 'tabelaAlvo' => 'bib_periodicos', 'colunasAlvo' => ['CD_PERIODICO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibPeriodicosCursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PERIODICO_CURSO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPeriodicoCurso = null;

    #[ORM\ManyToOne(targetEntity: BibPeriodicos::class)]
    #[ORM\JoinColumn(name: 'CD_PERIODICO', referencedColumnName: 'CD_PERIODICO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?BibPeriodicos $cdPeriodico = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'CD_CURSO', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    public function __construct(
        ?BibPeriodicos $cdPeriodico = null,
        ?CursosMestre $cdCurso = null
    ) {
        $this->cdPeriodico = $cdPeriodico;
        $this->cdCurso = $cdCurso;
    }

    public function getCdPeriodicoCurso(): ?int
    {
        return $this->cdPeriodicoCurso;
    }

    public function getCdPeriodico(): ?BibPeriodicos
    {
        return $this->cdPeriodico;
    }

    public function setCdPeriodico(?BibPeriodicos $cdPeriodico): self
    {
        $this->cdPeriodico = $cdPeriodico;
        return $this;
    }

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }
}
