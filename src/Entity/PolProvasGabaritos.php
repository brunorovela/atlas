<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasGabaritosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasGabaritosRepository::class)]
#[ORM\Table(
    name: 'pol_provas_gabaritos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA', columns: ['cd_alternativa'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class PolProvasGabaritos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer')]
    private ?int $cdAlternativa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_ordem_questao', type: 'integer')]
    private ?int $nrOrdemQuestao = null;

    #[ORM\Column(name: 'nr_ordem_alternativa', type: 'integer')]
    private ?int $nrOrdemAlternativa = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $cdAlternativa = null,
        ?int $cdProva = null,
        ?int $cdPessoa = null,
        ?int $nrOrdemQuestao = null,
        ?int $nrOrdemAlternativa = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdAlternativa = $cdAlternativa;
        $this->cdProva = $cdProva;
        $this->cdPessoa = $cdPessoa;
        $this->nrOrdemQuestao = $nrOrdemQuestao;
        $this->nrOrdemAlternativa = $nrOrdemAlternativa;
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

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function setCdAlternativa(?int $cdAlternativa): self
    {
        $this->cdAlternativa = $cdAlternativa;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getNrOrdemQuestao(): ?int
    {
        return $this->nrOrdemQuestao;
    }

    public function setNrOrdemQuestao(?int $nrOrdemQuestao): self
    {
        $this->nrOrdemQuestao = $nrOrdemQuestao;
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
