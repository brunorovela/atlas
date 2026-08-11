<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TurmaProfessorUnificadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmaProfessorUnificadoRepository::class)]
#[ORM\Table(
    name: 'turma_professor_unificado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave_unificacao', columns: ['ds_chave_unificacao'])]
#[ORM\Index(name: 'IX_SN_UNIFICADO_MANUAL', columns: ['sn_unificado_manual'])]
#[ORM\Index(name: 'FK_PESSOAS_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'FK_DISCIPLINAS_MESTRE_ID_DISCIPLINA_MESTRE', columns: ['id_disciplina_mestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DISCIPLINAS_MESTRE_ID_DISCIPLINA_MESTRE', 'colunas' => ['id_disciplina_mestre'], 'tabelaAlvo' => 'disciplinas_mestre', 'colunasAlvo' => ['id_disciplina_mestre'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOAS_CD_PROFESSOR', 'colunas' => ['cd_professor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TurmaProfessorUnificado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turma_professor_unificado', type: 'integer')]
    private ?int $cdTurmaProfessorUnificado = null;

    #[ORM\Column(name: 'ds_chave_unificacao', type: 'string', length: 255)]
    private ?string $dsChaveUnificacao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'id_disciplina_mestre', type: 'integer')]
    private ?int $idDisciplinaMestre = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_professor', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdProfessor = null;

    #[ORM\Column(name: 'sn_unificado_manual', type: 'boolean')]
    private ?bool $snUnificadoManual = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsChaveUnificacao = null,
        ?int $nrAnosemestre = null,
        ?int $idDisciplinaMestre = null,
        ?Pessoas $cdProfessor = null,
        ?bool $snUnificadoManual = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsChaveUnificacao = $dsChaveUnificacao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->idDisciplinaMestre = $idDisciplinaMestre;
        $this->cdProfessor = $cdProfessor;
        $this->snUnificadoManual = $snUnificadoManual;
        $this->dtBase = $dtBase;
    }

    public function getCdTurmaProfessorUnificado(): ?int
    {
        return $this->cdTurmaProfessorUnificado;
    }

    public function getDsChaveUnificacao(): ?string
    {
        return $this->dsChaveUnificacao;
    }

    public function setDsChaveUnificacao(?string $dsChaveUnificacao): self
    {
        $this->dsChaveUnificacao = $dsChaveUnificacao;
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

    public function getIdDisciplinaMestre(): ?int
    {
        return $this->idDisciplinaMestre;
    }

    public function setIdDisciplinaMestre(?int $idDisciplinaMestre): self
    {
        $this->idDisciplinaMestre = $idDisciplinaMestre;
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

    public function isSnUnificadoManual(): ?bool
    {
        return $this->snUnificadoManual;
    }

    public function setSnUnificadoManual(?bool $snUnificadoManual): self
    {
        $this->snUnificadoManual = $snUnificadoManual;
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
