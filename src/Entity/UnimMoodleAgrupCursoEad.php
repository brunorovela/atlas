<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimMoodleAgrupCursoEadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleAgrupCursoEadRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_agrup_curso_ead',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_unim_moodle_agrup_curso_ead_pessoas', columns: ['cd_professor'])]
#[ORM\Index(name: 'FK_unim_moodle_agrup_curso_ead_unim_moodle_agrupamento', columns: ['cd_moodle_agrupamento'])]
#[ORM\Index(name: 'FK_unim_moodle_agrup_curso_ead_unim_moodle_cursos', columns: ['cd_moodle_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_moodle_agrup_curso_ead_pessoas', 'colunas' => ['cd_professor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_moodle_agrup_curso_ead_unim_moodle_agrupamento', 'colunas' => ['cd_moodle_agrupamento'], 'tabelaAlvo' => 'unim_moodle_agrupamento', 'colunasAlvo' => ['cd_moodle_agrupamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_moodle_agrup_curso_ead_unim_moodle_cursos', 'colunas' => ['cd_moodle_curso'], 'tabelaAlvo' => 'unim_moodle_cursos', 'colunasAlvo' => ['cd_moodle_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimMoodleAgrupCursoEad
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_agrup_curso_ead', type: 'integer')]
    private ?int $cdMoodleAgrupCursoEad = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleCursos::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_curso', referencedColumnName: 'cd_moodle_curso', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleCursos $cdMoodleCurso = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleAgrupamento::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_agrupamento', referencedColumnName: 'cd_moodle_agrupamento', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleAgrupamento $cdMoodleAgrupamento = null;

    #[ORM\Column(name: 'nr_periodo', type: 'smallint', nullable: true)]
    private ?int $nrPeriodo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_professor', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdProfessor = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimMoodleCursos $cdMoodleCurso = null,
        ?UnimMoodleAgrupamento $cdMoodleAgrupamento = null,
        ?int $nrPeriodo = null,
        ?Pessoas $cdProfessor = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->cdMoodleAgrupamento = $cdMoodleAgrupamento;
        $this->nrPeriodo = $nrPeriodo;
        $this->cdProfessor = $cdProfessor;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dtBase = $dtBase;
    }

    public function getCdMoodleAgrupCursoEad(): ?int
    {
        return $this->cdMoodleAgrupCursoEad;
    }

    public function getCdMoodleCurso(): ?UnimMoodleCursos
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?UnimMoodleCursos $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
        return $this;
    }

    public function getCdMoodleAgrupamento(): ?UnimMoodleAgrupamento
    {
        return $this->cdMoodleAgrupamento;
    }

    public function setCdMoodleAgrupamento(?UnimMoodleAgrupamento $cdMoodleAgrupamento): self
    {
        $this->cdMoodleAgrupamento = $cdMoodleAgrupamento;
        return $this;
    }

    public function getNrPeriodo(): ?int
    {
        return $this->nrPeriodo;
    }

    public function setNrPeriodo(?int $nrPeriodo): self
    {
        $this->nrPeriodo = $nrPeriodo;
        return $this;
    }

    public function getCdProfessor(): ?Pessoas
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?Pessoas $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
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
