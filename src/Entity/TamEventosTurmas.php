<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEventosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosTurmasRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_EVENTOS_TURMAS', columns: ['CD_TURMA', 'CD_DISCIPLINA', 'CD_CURSO', 'NR_ANOSEMESTRE', 'CD_EVENTO'])]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['CD_EVENTO'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['CD_TURMA'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['CD_DISCIPLINA'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['NR_ANOSEMESTRE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_eventos_turmas_ibfk_1', 'colunas' => ['CD_EVENTO'], 'tabelaAlvo' => 'tam_eventos', 'colunasAlvo' => ['CD_EVENTO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class TamEventosTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_EVENTO_TURMA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEventoTurma = null;

    #[ORM\ManyToOne(targetEntity: TamEventos::class)]
    #[ORM\JoinColumn(name: 'CD_EVENTO', referencedColumnName: 'CD_EVENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventos $cdEvento = null;

    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?TamEventos $cdEvento = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?string $cdCurso = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdEvento = $cdEvento;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdEventoTurma(): ?int
    {
        return $this->cdEventoTurma;
    }

    public function getCdEvento(): ?TamEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?TamEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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
}
