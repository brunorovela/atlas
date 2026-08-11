<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\GmetAulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GmetAulaRepository::class)]
#[ORM\Table(
    name: 'gmet_aula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_requisicao', columns: ['cd_requisicao'])]
#[ORM\Index(name: 'IX_ID_AULA', columns: ['cd_aula'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'gmet_aula_ibfk_1', 'colunas' => ['cd_requisicao'], 'tabelaAlvo' => 'cmpr_requisicao', 'colunasAlvo' => ['cd_requisicao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GmetAula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAula = null;

    #[ORM\ManyToOne(targetEntity: CmprRequisicao::class)]
    #[ORM\JoinColumn(name: 'cd_requisicao', referencedColumnName: 'cd_requisicao', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprRequisicao $cdRequisicao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 50)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_receita', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReceita = null;

    #[ORM\Column(name: 'nr_qtd_alunos', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrQtdAlunos = 0;

    #[ORM\Column(name: 'nr_qtd_alunos_adicionais', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrQtdAlunosAdicionais = 0;

    #[ORM\Column(name: 'cd_diario_aula', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDiarioAula = 0;

    #[ORM\Column(name: 'dt_aula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAula = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CmprRequisicao $cdRequisicao = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdReceita = null,
        int $nrQtdAlunos = 0,
        int $nrQtdAlunosAdicionais = 0,
        ?int $cdDiarioAula = 0,
        ?\DateTimeInterface $dtAula = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdRequisicao = $cdRequisicao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdReceita = $cdReceita;
        $this->nrQtdAlunos = $nrQtdAlunos;
        $this->nrQtdAlunosAdicionais = $nrQtdAlunosAdicionais;
        $this->cdDiarioAula = $cdDiarioAula;
        $this->dtAula = $dtAula;
        $this->dtBase = $dtBase;
    }

    public function getCdAula(): ?int
    {
        return $this->cdAula;
    }

    public function getCdRequisicao(): ?CmprRequisicao
    {
        return $this->cdRequisicao;
    }

    public function setCdRequisicao(?CmprRequisicao $cdRequisicao): self
    {
        $this->cdRequisicao = $cdRequisicao;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
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

    public function getCdReceita(): ?int
    {
        return $this->cdReceita;
    }

    public function setCdReceita(?int $cdReceita): self
    {
        $this->cdReceita = $cdReceita;
        return $this;
    }

    public function getNrQtdAlunos(): int
    {
        return $this->nrQtdAlunos;
    }

    public function setNrQtdAlunos(int $nrQtdAlunos): self
    {
        $this->nrQtdAlunos = $nrQtdAlunos;
        return $this;
    }

    public function getNrQtdAlunosAdicionais(): int
    {
        return $this->nrQtdAlunosAdicionais;
    }

    public function setNrQtdAlunosAdicionais(int $nrQtdAlunosAdicionais): self
    {
        $this->nrQtdAlunosAdicionais = $nrQtdAlunosAdicionais;
        return $this;
    }

    public function getCdDiarioAula(): ?int
    {
        return $this->cdDiarioAula;
    }

    public function setCdDiarioAula(?int $cdDiarioAula): self
    {
        $this->cdDiarioAula = $cdDiarioAula;
        return $this;
    }

    public function getDtAula(): ?\DateTimeInterface
    {
        return $this->dtAula;
    }

    public function setDtAula(?\DateTimeInterface $dtAula): self
    {
        $this->dtAula = $dtAula;
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
