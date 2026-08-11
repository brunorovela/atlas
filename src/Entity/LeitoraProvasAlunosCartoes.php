<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LeitoraProvasAlunosCartoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasAlunosCartoesRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_alunos_cartoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_aluno_cartao', columns: ['cd_prova_aluno_cartao'])]
#[ORM\Index(name: 'IX_CD_PROVA_ALUNO', columns: ['cd_prova_aluno'])]
class LeitoraProvasAlunosCartoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_aluno_cartao', type: 'integer')]
    private ?int $cdProvaAlunoCartao = null;

    #[ORM\Column(name: 'cd_prova_aluno', type: 'integer', nullable: true)]
    private ?int $cdProvaAluno = null;

    #[ORM\Column(name: 'cd_equivalente', type: 'string', length: 50, options: ['default' => ''])]
    private string $cdEquivalente = '';

    #[ORM\Column(name: 'nr_questao_inicial', type: 'smallint', options: ['default' => '0'])]
    private int $nrQuestaoInicial = 0;

    #[ORM\Column(name: 'nr_questao_final', type: 'smallint', options: ['default' => '0'])]
    private int $nrQuestaoFinal = 0;

    #[ORM\Column(name: 'nr_parte', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => 'Informação de qual é a parte deste cartão'])]
    private int $nrParte = 1;

    public function __construct(
        ?int $cdProvaAluno = null,
        string $cdEquivalente = '',
        int $nrQuestaoInicial = 0,
        int $nrQuestaoFinal = 0,
        int $nrParte = 1
    ) {
        $this->cdProvaAluno = $cdProvaAluno;
        $this->cdEquivalente = $cdEquivalente;
        $this->nrQuestaoInicial = $nrQuestaoInicial;
        $this->nrQuestaoFinal = $nrQuestaoFinal;
        $this->nrParte = $nrParte;
    }

    public function getCdProvaAlunoCartao(): ?int
    {
        return $this->cdProvaAlunoCartao;
    }

    public function getCdProvaAluno(): ?int
    {
        return $this->cdProvaAluno;
    }

    public function setCdProvaAluno(?int $cdProvaAluno): self
    {
        $this->cdProvaAluno = $cdProvaAluno;
        return $this;
    }

    public function getCdEquivalente(): string
    {
        return $this->cdEquivalente;
    }

    public function setCdEquivalente(string $cdEquivalente): self
    {
        $this->cdEquivalente = $cdEquivalente;
        return $this;
    }

    public function getNrQuestaoInicial(): int
    {
        return $this->nrQuestaoInicial;
    }

    public function setNrQuestaoInicial(int $nrQuestaoInicial): self
    {
        $this->nrQuestaoInicial = $nrQuestaoInicial;
        return $this;
    }

    public function getNrQuestaoFinal(): int
    {
        return $this->nrQuestaoFinal;
    }

    public function setNrQuestaoFinal(int $nrQuestaoFinal): self
    {
        $this->nrQuestaoFinal = $nrQuestaoFinal;
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
