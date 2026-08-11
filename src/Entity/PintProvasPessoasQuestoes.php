<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintProvasPessoasQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasPessoasQuestoesRepository::class)]
#[ORM\Table(
    name: 'pint_provas_pessoas_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_PROVA_PESSOA', columns: ['cd_prova_pessoa'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA_RESPOSTA', columns: ['cd_alternativa_resposta'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PintProvasPessoasQuestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaPessoaQuestao = null;

    #[ORM\Column(name: 'cd_prova_pessoa', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdProvaPessoa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'nr_ordem_questao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdemQuestao = null;

    #[ORM\Column(name: 'cd_alternativa_resposta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAlternativaResposta = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true, options: ['fixed' => true])]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    public function __construct(
        ?string $cdProvaPessoa = null,
        ?int $cdQuestao = null,
        ?int $nrOrdemQuestao = null,
        ?int $cdAlternativaResposta = null,
        ?int $cdDisciplina = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null
    ) {
        $this->cdProvaPessoa = $cdProvaPessoa;
        $this->cdQuestao = $cdQuestao;
        $this->nrOrdemQuestao = $nrOrdemQuestao;
        $this->cdAlternativaResposta = $cdAlternativaResposta;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdProvaPessoaQuestao(): ?int
    {
        return $this->cdProvaPessoaQuestao;
    }

    public function getCdProvaPessoa(): ?string
    {
        return $this->cdProvaPessoa;
    }

    public function setCdProvaPessoa(?string $cdProvaPessoa): self
    {
        $this->cdProvaPessoa = $cdProvaPessoa;
        return $this;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getNrOrdemQuestao(): ?int
    {
        return $this->nrOrdemQuestao;
    }

    public function setNrOrdemQuestao(?int $nrOrdemQuestao): self
    {
        $this->nrOrdemQuestao = $nrOrdemQuestao;
        return $this;
    }

    public function getCdAlternativaResposta(): ?int
    {
        return $this->cdAlternativaResposta;
    }

    public function setCdAlternativaResposta(?int $cdAlternativaResposta): self
    {
        $this->cdAlternativaResposta = $cdAlternativaResposta;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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
