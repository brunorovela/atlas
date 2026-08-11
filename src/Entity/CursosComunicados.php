<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CursosComunicadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosComunicadosRepository::class)]
#[ORM\Table(
    name: 'cursos_comunicados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DOC', columns: ['cd_doc'])]
class CursosComunicados
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_doc', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $cdDoc = 0;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $nrOrdem = 0;

    public function __construct(
        int $nrAnosemestre = 0,
        string $cdCurso = '',
        ?string $cdTurma = null,
        int $cdDoc = 0,
        int $nrOrdem = 0
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDoc = $cdDoc;
        $this->nrOrdem = $nrOrdem;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdDoc(): int
    {
        return $this->cdDoc;
    }

    public function setCdDoc(int $cdDoc): self
    {
        $this->cdDoc = $cdDoc;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
