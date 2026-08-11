<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\KonvivaTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KonvivaTurmasRepository::class)]
#[ORM\Table(
    name: 'konviva_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_KONVIVA_TURMA', columns: ['cd_konviva_turma'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'fk_konviva_cursos_konviva_turmas_cd_konviva_curso', columns: ['cd_konviva_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_konviva_cursos_konviva_turmas_cd_konviva_curso', 'colunas' => ['cd_konviva_curso'], 'tabelaAlvo' => 'konviva_cursos', 'colunasAlvo' => ['cd_konviva_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class KonvivaTurmas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_konviva_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdKonvivaTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\ManyToOne(targetEntity: KonvivaCursos::class)]
    #[ORM\JoinColumn(name: 'cd_konviva_curso', referencedColumnName: 'cd_konviva_curso', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?KonvivaCursos $cdKonvivaCurso = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?int $cdKonvivaTurma = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?KonvivaCursos $cdKonvivaCurso = null,
        ?int $idDisciplina = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdKonvivaTurma = $cdKonvivaTurma;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdKonvivaCurso = $cdKonvivaCurso;
        $this->idDisciplina = $idDisciplina;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdKonvivaTurma(): ?int
    {
        return $this->cdKonvivaTurma;
    }

    public function setCdKonvivaTurma(?int $cdKonvivaTurma): self
    {
        $this->cdKonvivaTurma = $cdKonvivaTurma;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdKonvivaCurso(): ?KonvivaCursos
    {
        return $this->cdKonvivaCurso;
    }

    public function setCdKonvivaCurso(?KonvivaCursos $cdKonvivaCurso): self
    {
        $this->cdKonvivaCurso = $cdKonvivaCurso;
        return $this;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}
