<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintProvasPessoasAltRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasPessoasAltRepository::class)]
#[ORM\Table(
    name: 'pint_provas_pessoas_alt',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROVA_PESSOA_QUESTAO', columns: ['cd_prova_pessoa_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA', columns: ['cd_alternativa'])]
class PintProvasPessoasAlt
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa_alternativa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaPessoaAlternativa = null;

    #[ORM\Column(name: 'cd_prova_pessoa_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaPessoaQuestao = null;

    #[ORM\Column(name: 'cd_alternativa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'nr_ordem_alternativa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdemAlternativa = null;

    public function __construct(
        ?int $cdProvaPessoaQuestao = null,
        ?int $cdAlternativa = null,
        ?int $nrOrdemAlternativa = null
    ) {
        $this->cdProvaPessoaQuestao = $cdProvaPessoaQuestao;
        $this->cdAlternativa = $cdAlternativa;
        $this->nrOrdemAlternativa = $nrOrdemAlternativa;
    }

    public function getCdProvaPessoaAlternativa(): ?int
    {
        return $this->cdProvaPessoaAlternativa;
    }

    public function getCdProvaPessoaQuestao(): ?int
    {
        return $this->cdProvaPessoaQuestao;
    }

    public function setCdProvaPessoaQuestao(?int $cdProvaPessoaQuestao): self
    {
        $this->cdProvaPessoaQuestao = $cdProvaPessoaQuestao;
        return $this;
    }

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function setCdAlternativa(?int $cdAlternativa): self
    {
        $this->cdAlternativa = $cdAlternativa;
        return $this;
    }

    public function getNrOrdemAlternativa(): ?int
    {
        return $this->nrOrdemAlternativa;
    }

    public function setNrOrdemAlternativa(?int $nrOrdemAlternativa): self
    {
        $this->nrOrdemAlternativa = $nrOrdemAlternativa;
        return $this;
    }
}
