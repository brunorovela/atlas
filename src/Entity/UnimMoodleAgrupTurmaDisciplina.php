<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimMoodleAgrupTurmaDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleAgrupTurmaDisciplinaRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_agrup_turma_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_unim_moodle_agrup_turma_disciplina_turmas', columns: ['id_turma'])]
#[ORM\Index(name: 'FK_unim_moodle_agrup_turma_disciplina_disciplinas', columns: ['id_disciplina'])]
#[ORM\Index(name: 'unim_moodle_agrup_curso_ead', columns: ['cd_moodle_agrup_curso_ead'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_moodle_agrup_turma_disciplina_disciplinas', 'colunas' => ['id_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['id_disciplina'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_moodle_agrup_turma_disciplina_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_moodle_agrup_curso_ead', 'colunas' => ['cd_moodle_agrup_curso_ead'], 'tabelaAlvo' => 'unim_moodle_agrup_curso_ead', 'colunasAlvo' => ['cd_moodle_agrup_curso_ead'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimMoodleAgrupTurmaDisciplina
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_agrup_turma_disciplina', type: 'integer')]
    private ?int $cdMoodleAgrupTurmaDisciplina = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleAgrupCursoEad::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_agrup_curso_ead', referencedColumnName: 'cd_moodle_agrup_curso_ead', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleAgrupCursoEad $cdMoodleAgrupCursoEad = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\ManyToOne(targetEntity: Disciplinas::class)]
    #[ORM\JoinColumn(name: 'id_disciplina', referencedColumnName: 'id_disciplina', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Disciplinas $idDisciplina = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimMoodleAgrupCursoEad $cdMoodleAgrupCursoEad = null,
        ?Turmas $idTurma = null,
        ?Disciplinas $idDisciplina = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMoodleAgrupCursoEad = $cdMoodleAgrupCursoEad;
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->dtBase = $dtBase;
    }

    public function getCdMoodleAgrupTurmaDisciplina(): ?int
    {
        return $this->cdMoodleAgrupTurmaDisciplina;
    }

    public function getCdMoodleAgrupCursoEad(): ?UnimMoodleAgrupCursoEad
    {
        return $this->cdMoodleAgrupCursoEad;
    }

    public function setCdMoodleAgrupCursoEad(?UnimMoodleAgrupCursoEad $cdMoodleAgrupCursoEad): self
    {
        $this->cdMoodleAgrupCursoEad = $cdMoodleAgrupCursoEad;
        return $this;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getIdDisciplina(): ?Disciplinas
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?Disciplinas $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
