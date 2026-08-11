<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConRespostasSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConRespostasSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_respostas_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RESOLUCAO', columns: ['cd_resolucao'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA_RESPOSTA', columns: ['cd_alternativa_resposta'])]
class ConRespostasSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resposta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdResposta = null;

    #[ORM\Column(name: 'cd_alternativa_resposta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAlternativaResposta = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_resolucao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdResolucao = null;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    public function __construct(
        ?int $cdAlternativaResposta = null,
        ?int $cdQuestao = null,
        ?int $cdResolucao = null,
        ?int $nrOrdem = null
    ) {
        $this->cdAlternativaResposta = $cdAlternativaResposta;
        $this->cdQuestao = $cdQuestao;
        $this->cdResolucao = $cdResolucao;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdResposta(): ?int
    {
        return $this->cdResposta;
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

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getCdResolucao(): ?int
    {
        return $this->cdResolucao;
    }

    public function setCdResolucao(?int $cdResolucao): self
    {
        $this->cdResolucao = $cdResolucao;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
