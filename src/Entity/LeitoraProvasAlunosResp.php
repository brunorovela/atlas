<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LeitoraProvasAlunosRespRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasAlunosRespRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_alunos_resp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['cd_prova_aluno', 'nr_questao', 'nr_correcao', 'nr_parte'])]
#[ORM\Index(name: 'IX_CD_PROVA_ALUNO', columns: ['cd_prova_aluno'])]
#[ORM\Index(name: 'IX_NR_QUESTAO', columns: ['nr_questao'])]
#[ORM\Index(name: 'IX_NR_CORRECAO', columns: ['nr_correcao'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class LeitoraProvasAlunosResp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_aluno_resposta', type: 'integer')]
    private ?int $cdProvaAlunoResposta = null;

    #[ORM\Column(name: 'cd_prova_aluno', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaAluno = 0;

    #[ORM\Column(name: 'nr_questao', type: 'smallint', options: ['default' => '0'])]
    private int $nrQuestao = 0;

    #[ORM\Column(name: 'ds_resposta', type: 'string', length: 4, options: ['fixed' => true, 'default' => ''])]
    private string $dsResposta = '';

    #[ORM\Column(name: 'cd_situacao', type: 'smallint', options: ['default' => '0'])]
    private int $cdSituacao = 0;

    #[ORM\Column(name: 'nr_correcao', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $nrCorrecao = 1;

    #[ORM\Column(name: 'db_pontuacao', type: 'float', options: ['default' => '0'])]
    private float $dbPontuacao = 0.0;

    #[ORM\Column(name: 'nr_parte', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => 'Informação de qual é a parte desta resposta'])]
    private int $nrParte = 1;

    public function __construct(
        int $cdProvaAluno = 0,
        int $nrQuestao = 0,
        string $dsResposta = '',
        int $cdSituacao = 0,
        int $nrCorrecao = 1,
        float $dbPontuacao = 0.0,
        int $nrParte = 1
    ) {
        $this->cdProvaAluno = $cdProvaAluno;
        $this->nrQuestao = $nrQuestao;
        $this->dsResposta = $dsResposta;
        $this->cdSituacao = $cdSituacao;
        $this->nrCorrecao = $nrCorrecao;
        $this->dbPontuacao = $dbPontuacao;
        $this->nrParte = $nrParte;
    }

    public function getCdProvaAlunoResposta(): ?int
    {
        return $this->cdProvaAlunoResposta;
    }

    public function getCdProvaAluno(): int
    {
        return $this->cdProvaAluno;
    }

    public function setCdProvaAluno(int $cdProvaAluno): self
    {
        $this->cdProvaAluno = $cdProvaAluno;
        return $this;
    }

    public function getNrQuestao(): int
    {
        return $this->nrQuestao;
    }

    public function setNrQuestao(int $nrQuestao): self
    {
        $this->nrQuestao = $nrQuestao;
        return $this;
    }

    public function getDsResposta(): string
    {
        return $this->dsResposta;
    }

    public function setDsResposta(string $dsResposta): self
    {
        $this->dsResposta = $dsResposta;
        return $this;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrCorrecao(): int
    {
        return $this->nrCorrecao;
    }

    public function setNrCorrecao(int $nrCorrecao): self
    {
        $this->nrCorrecao = $nrCorrecao;
        return $this;
    }

    public function getDbPontuacao(): float
    {
        return $this->dbPontuacao;
    }

    public function setDbPontuacao(float $dbPontuacao): self
    {
        $this->dbPontuacao = $dbPontuacao;
        return $this;
    }

    public function getNrParte(): int
    {
        return $this->nrParte;
    }

    public function setNrParte(int $nrParte): self
    {
        $this->nrParte = $nrParte;
        return $this;
    }
}
