<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiaPrazosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiaPrazosTurmasRepository::class)]
#[ORM\Table(
    name: 'dia_prazos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'CD_TIPO_PRAZO', columns: ['CD_TIPO_PRAZO'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['NR_ANOSEMESTRE'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['CD_TURMA'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['CD_DISCIPLINA'])]
#[ORM\Index(name: 'IX_CD_TIPO_PRAZO', columns: ['CD_TIPO_PRAZO'])]
#[ORM\Index(name: 'IX_CD_PRAZO', columns: ['CD_PRAZO'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_TIPO_PRAZO', 'colunas' => ['CD_TIPO_PRAZO'], 'tabelaAlvo' => 'dia_tipo_prazo', 'colunasAlvo' => ['CD_TIPO_PRAZO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiaPrazosTurmas
{
    #[ORM\Id]
    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: DiaTipoPrazo::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO_PRAZO', referencedColumnName: 'CD_TIPO_PRAZO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?DiaTipoPrazo $cdTipoPrazo = null;

    #[ORM\Column(name: 'CD_PRAZO', type: 'integer', options: ['default' => '0'])]
    private int $cdPrazo = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $nrAnosemestre = 0,
        string $cdCurso = '',
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?DiaTipoPrazo $cdTipoPrazo = null,
        int $cdPrazo = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdTipoPrazo = $cdTipoPrazo;
        $this->cdPrazo = $cdPrazo;
        $this->dtBase = $dtBase;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdTipoPrazo(): ?DiaTipoPrazo
    {
        return $this->cdTipoPrazo;
    }

    public function setCdTipoPrazo(?DiaTipoPrazo $cdTipoPrazo): self
    {
        $this->cdTipoPrazo = $cdTipoPrazo;
        return $this;
    }

    public function getCdPrazo(): int
    {
        return $this->cdPrazo;
    }

    public function setCdPrazo(int $cdPrazo): self
    {
        $this->cdPrazo = $cdPrazo;
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
