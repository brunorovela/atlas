<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasPessoasRespostasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasPessoasRespostasRepository::class)]
#[ORM\Table(
    name: 'pol_provas_pessoas_respostas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PROVA_PESSOA', columns: ['cd_prova_pessoa', 'cd_questao', 'cd_alternativa_resposta', 'nr_questao', 'nr_resolucao'])]
#[ORM\UniqueConstraint(name: 'UK_PROVA_PESSOA2', columns: ['cd_prova_pessoa', 'cd_questao', 'nr_resolucao'])]
#[ORM\UniqueConstraint(name: 'UK_PROVA_PESSOA3', columns: ['cd_prova_pessoa', 'nr_questao', 'nr_resolucao'])]
#[ORM\Index(name: 'IX_CD_PROVA_PESSOA', columns: ['cd_prova_pessoa'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class PolProvasPessoasRespostas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa_resposta', type: 'integer')]
    private ?int $cdProvaPessoaResposta = null;

    #[ORM\Column(name: 'cd_prova_pessoa', type: 'integer', nullable: true)]
    private ?int $cdProvaPessoa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_alternativa_resposta', type: 'integer')]
    private ?int $cdAlternativaResposta = null;

    #[ORM\Column(name: 'nr_questao', type: 'integer', nullable: true)]
    private ?int $nrQuestao = null;

    #[ORM\Column(name: 'nr_resolucao', type: 'integer', nullable: true)]
    private ?int $nrResolucao = null;

    #[ORM\Column(name: 'dt_resolucao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtResolucao = null;

    #[ORM\Column(name: 'dt_cancelamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCancelamento = null;

    #[ORM\Column(name: 'ds_resposta_discursiva', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRespostaDiscursiva = null;

    #[ORM\Column(name: 'nr_pontuacao_discursiva_professor', type: 'float', nullable: true)]
    private ?float $nrPontuacaoDiscursivaProfessor = null;

    #[ORM\Column(name: 'ds_comentario_discursiva_professor', type: 'string', length: 1024, nullable: true)]
    private ?string $dsComentarioDiscursivaProfessor = null;

    #[ORM\Column(name: 'cd_pessoa_respondeu', type: 'integer', nullable: true)]
    private ?int $cdPessoaRespondeu = null;

    public function __construct(
        ?int $cdProvaPessoa = null,
        ?int $cdQuestao = null,
        ?int $cdAlternativaResposta = null,
        ?int $nrQuestao = null,
        ?int $nrResolucao = null,
        ?\DateTimeInterface $dtResolucao = null,
        ?\DateTimeInterface $dtCancelamento = null,
        ?string $dsRespostaDiscursiva = null,
        ?float $nrPontuacaoDiscursivaProfessor = null,
        ?string $dsComentarioDiscursivaProfessor = null,
        ?int $cdPessoaRespondeu = null
    ) {
        $this->cdProvaPessoa = $cdProvaPessoa;
        $this->cdQuestao = $cdQuestao;
        $this->cdAlternativaResposta = $cdAlternativaResposta;
        $this->nrQuestao = $nrQuestao;
        $this->nrResolucao = $nrResolucao;
        $this->dtResolucao = $dtResolucao;
        $this->dtCancelamento = $dtCancelamento;
        $this->dsRespostaDiscursiva = $dsRespostaDiscursiva;
        $this->nrPontuacaoDiscursivaProfessor = $nrPontuacaoDiscursivaProfessor;
        $this->dsComentarioDiscursivaProfessor = $dsComentarioDiscursivaProfessor;
        $this->cdPessoaRespondeu = $cdPessoaRespondeu;
    }

    public function getCdProvaPessoaResposta(): ?int
    {
        return $this->cdProvaPessoaResposta;
    }

    public function getCdProvaPessoa(): ?int
    {
        return $this->cdProvaPessoa;
    }

    public function setCdProvaPessoa(?int $cdProvaPessoa): self
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

    public function getCdAlternativaResposta(): ?int
    {
        return $this->cdAlternativaResposta;
    }

    public function setCdAlternativaResposta(?int $cdAlternativaResposta): self
    {
        $this->cdAlternativaResposta = $cdAlternativaResposta;
        return $this;
    }

    public function getNrQuestao(): ?int
    {
        return $this->nrQuestao;
    }

    public function setNrQuestao(?int $nrQuestao): self
    {
        $this->nrQuestao = $nrQuestao;
        return $this;
    }

    public function getNrResolucao(): ?int
    {
        return $this->nrResolucao;
    }

    public function setNrResolucao(?int $nrResolucao): self
    {
        $this->nrResolucao = $nrResolucao;
        return $this;
    }

    public function getDtResolucao(): ?\DateTimeInterface
    {
        return $this->dtResolucao;
    }

    public function setDtResolucao(?\DateTimeInterface $dtResolucao): self
    {
        $this->dtResolucao = $dtResolucao;
        return $this;
    }

    public function getDtCancelamento(): ?\DateTimeInterface
    {
        return $this->dtCancelamento;
    }

    public function setDtCancelamento(?\DateTimeInterface $dtCancelamento): self
    {
        $this->dtCancelamento = $dtCancelamento;
        return $this;
    }

    public function getDsRespostaDiscursiva(): ?string
    {
        return $this->dsRespostaDiscursiva;
    }

    public function setDsRespostaDiscursiva(?string $dsRespostaDiscursiva): self
    {
        $this->dsRespostaDiscursiva = $dsRespostaDiscursiva;
        return $this;
    }

    public function getNrPontuacaoDiscursivaProfessor(): ?float
    {
        return $this->nrPontuacaoDiscursivaProfessor;
    }

    public function setNrPontuacaoDiscursivaProfessor(?float $nrPontuacaoDiscursivaProfessor): self
    {
        $this->nrPontuacaoDiscursivaProfessor = $nrPontuacaoDiscursivaProfessor;
        return $this;
    }

    public function getDsComentarioDiscursivaProfessor(): ?string
    {
        return $this->dsComentarioDiscursivaProfessor;
    }

    public function setDsComentarioDiscursivaProfessor(?string $dsComentarioDiscursivaProfessor): self
    {
        $this->dsComentarioDiscursivaProfessor = $dsComentarioDiscursivaProfessor;
        return $this;
    }

    public function getCdPessoaRespondeu(): ?int
    {
        return $this->cdPessoaRespondeu;
    }

    public function setCdPessoaRespondeu(?int $cdPessoaRespondeu): self
    {
        $this->cdPessoaRespondeu = $cdPessoaRespondeu;
        return $this;
    }
}
