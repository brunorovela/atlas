<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\TaGerenciarPresencasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaGerenciarPresencasRepository::class)]
#[ORM\Table(
    name: 'ta_gerenciar_presencas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_GERENCIAR_PRESENCAS', columns: ['nr_anosemestre', 'cd_curso', 'cd_turma', 'cd_disciplina', 'dt_execucao_acao'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_DT_EXECUCAO_ACAO', columns: ['dt_execucao_acao'])]
class TaGerenciarPresencas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_gerenciar_presenca', type: 'integer')]
    private ?int $cdGerenciarPresenca = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 50)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'dt_execucao_acao', type: 'date')]
    private ?\DateTimeInterface $dtExecucaoAcao = null;

    #[ORM\Column(name: 'cd_acao', type: 'enum', options: ['comment' => 'P: Presença para todos da Turma; D: Dispensar Alunos; N: Não criar aula', 'values' => ['P', 'D', 'N']])]
    private ?string $cdAcao = null;

    #[ORM\Column(name: 'sn_acao_executada', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAcaoExecutada = 0;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?\DateTimeInterface $dtExecucaoAcao = null,
        ?string $cdAcao = null,
        int $snAcaoExecutada = 0
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->dtExecucaoAcao = $dtExecucaoAcao;
        $this->cdAcao = $cdAcao;
        $this->snAcaoExecutada = $snAcaoExecutada;
    }

    public function getCdGerenciarPresenca(): ?int
    {
        return $this->cdGerenciarPresenca;
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

    public function getDtExecucaoAcao(): ?\DateTimeInterface
    {
        return $this->dtExecucaoAcao;
    }

    public function setDtExecucaoAcao(?\DateTimeInterface $dtExecucaoAcao): self
    {
        $this->dtExecucaoAcao = $dtExecucaoAcao;
        return $this;
    }

    public function getCdAcao(): ?string
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?string $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getSnAcaoExecutada(): int
    {
        return $this->snAcaoExecutada;
    }

    public function setSnAcaoExecutada(int $snAcaoExecutada): self
    {
        $this->snAcaoExecutada = $snAcaoExecutada;
        return $this;
    }
}
