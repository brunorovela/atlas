<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoAgendamaisMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAgendamaisMatriculaRepository::class)]
#[ORM\Table(
    name: 'integracao_agendamais_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ID_MATRICULA_AGENDAMAIS', columns: ['id_matricula_unimestre'])]
#[ORM\Index(name: 'idx_integ_agenda', columns: ['id_matricula_unimestre'])]
#[ORM\Index(name: 'IDX_ID_TURMA', columns: ['id_turma_unimestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integ_agenda_matriculas', 'colunas' => ['id_matricula_unimestre'], 'tabelaAlvo' => 'matriculas', 'colunasAlvo' => ['id_matricula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_integ_agenda_turmas', 'colunas' => ['id_turma_unimestre'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoAgendamaisMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma_unimestre', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurmaUnimestre = null;

    #[ORM\Column(name: 'id_turma_agendamais', type: 'string', length: 255)]
    private ?string $idTurmaAgendamais = null;

    #[ORM\Column(name: 'id_matricula_unimestre', type: 'integer', nullable: true)]
    private ?int $idMatriculaUnimestre = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Turmas $idTurmaUnimestre = null,
        ?string $idTurmaAgendamais = null,
        ?int $idMatriculaUnimestre = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idTurmaUnimestre = $idTurmaUnimestre;
        $this->idTurmaAgendamais = $idTurmaAgendamais;
        $this->idMatriculaUnimestre = $idMatriculaUnimestre;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTurmaUnimestre(): ?Turmas
    {
        return $this->idTurmaUnimestre;
    }

    public function setIdTurmaUnimestre(?Turmas $idTurmaUnimestre): self
    {
        $this->idTurmaUnimestre = $idTurmaUnimestre;
        return $this;
    }

    public function getIdTurmaAgendamais(): ?string
    {
        return $this->idTurmaAgendamais;
    }

    public function setIdTurmaAgendamais(?string $idTurmaAgendamais): self
    {
        $this->idTurmaAgendamais = $idTurmaAgendamais;
        return $this;
    }

    public function getIdMatriculaUnimestre(): ?int
    {
        return $this->idMatriculaUnimestre;
    }

    public function setIdMatriculaUnimestre(?int $idMatriculaUnimestre): self
    {
        $this->idMatriculaUnimestre = $idMatriculaUnimestre;
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
