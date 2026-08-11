<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TurmasVagasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasVagasRepository::class)]
#[ORM\Table(
    name: 'turmas_vagas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_turmas', columns: ['id_turma'])]
#[ORM\Index(name: 'FK_disciplinas', columns: ['id_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_disciplinas', 'colunas' => ['id_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['id_disciplina'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TurmasVagas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turma_vaga', type: 'integer')]
    private ?int $cdTurmaVaga = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\ManyToOne(targetEntity: Disciplinas::class)]
    #[ORM\JoinColumn(name: 'id_disciplina', referencedColumnName: 'id_disciplina', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Disciplinas $idDisciplina = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', options: ['default' => '0'])]
    private int $nrVagas = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Turmas $idTurma = null,
        ?Disciplinas $idDisciplina = null,
        int $nrVagas = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->nrVagas = $nrVagas;
        $this->dtBase = $dtBase;
    }

    public function getCdTurmaVaga(): ?int
    {
        return $this->cdTurmaVaga;
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

    public function getNrVagas(): int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
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
