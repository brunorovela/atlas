<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiarioAulasAlunosOcorrenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAulasAlunosOcorrenciaRepository::class)]
#[ORM\Table(
    name: 'diario_aulas_alunos_ocorrencia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_OCORRENCIA', columns: ['cd_ocorrencia'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_BIMESTRE', columns: ['cd_bimestre'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_diario_aulas_alunos_ocorrencia$ocorrencias$cd_ocorrencia', 'colunas' => ['cd_ocorrencia'], 'tabelaAlvo' => 'ocorrencias', 'colunasAlvo' => ['cd_ocorrencia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioAulasAlunosOcorrencia
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Ocorrencias::class)]
    #[ORM\JoinColumn(name: 'cd_ocorrencia', referencedColumnName: 'cd_ocorrencia', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Ocorrencias $cdOcorrencia = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_bimestre', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdBimestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_aula', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAula = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    public function __construct(
        ?Ocorrencias $cdOcorrencia = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdBimestre = null,
        ?int $nrAula = null,
        ?int $cdPessoa = null
    ) {
        $this->cdOcorrencia = $cdOcorrencia;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrAula = $nrAula;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdOcorrencia(): ?Ocorrencias
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?Ocorrencias $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
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

    public function getCdBimestre(): ?int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(?int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrAula(): ?int
    {
        return $this->nrAula;
    }

    public function setNrAula(?int $nrAula): self
    {
        $this->nrAula = $nrAula;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }
}
