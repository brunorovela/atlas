<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlQuestoesAlternativasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesAlternativasRepository::class)]
#[ORM\Table(
    name: 'avl_questoes_alternativas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Alternativas de cada quest?o']
)]
#[ORM\UniqueConstraint(name: 'cd_alternativa', columns: ['cd_alternativa'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class AvlQuestoesAlternativas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alternativa', type: 'integer')]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['default' => '0'])]
    private int $cdQuestao = 0;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', options: ['default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'ds_alternativa', type: 'text', length: 16777215)]
    private ?string $dsAlternativa = null;

    #[ORM\Column(name: 'sn_correta', type: 'boolean', nullable: true)]
    private ?bool $snCorreta = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'sn_estatisticas', type: 'boolean', options: ['default' => '0'])]
    private bool $snEstatisticas = false;

    #[ORM\Column(name: 'vl_pontuacao', type: 'float')]
    private ?float $vlPontuacao = null;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 7, nullable: true)]
    private ?string $dsCor = null;

    public function __construct(
        int $cdQuestao = 0,
        int $nrOrdem = 0,
        ?string $dsAlternativa = null,
        ?bool $snCorreta = null,
        bool $snDisponivel = true,
        bool $snEstatisticas = false,
        ?float $vlPontuacao = null,
        ?string $dsCor = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->nrOrdem = $nrOrdem;
        $this->dsAlternativa = $dsAlternativa;
        $this->snCorreta = $snCorreta;
        $this->snDisponivel = $snDisponivel;
        $this->snEstatisticas = $snEstatisticas;
        $this->vlPontuacao = $vlPontuacao;
        $this->dsCor = $dsCor;
    }

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function getCdQuestao(): int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsAlternativa(): ?string
    {
        return $this->dsAlternativa;
    }

    public function setDsAlternativa(?string $dsAlternativa): self
    {
        $this->dsAlternativa = $dsAlternativa;
        return $this;
    }

    public function isSnCorreta(): ?bool
    {
        return $this->snCorreta;
    }

    public function setSnCorreta(?bool $snCorreta): self
    {
        $this->snCorreta = $snCorreta;
        return $this;
    }

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function isSnEstatisticas(): bool
    {
        return $this->snEstatisticas;
    }

    public function setSnEstatisticas(bool $snEstatisticas): self
    {
        $this->snEstatisticas = $snEstatisticas;
        return $this;
    }

    public function getVlPontuacao(): ?float
    {
        return $this->vlPontuacao;
    }

    public function setVlPontuacao(?float $vlPontuacao): self
    {
        $this->vlPontuacao = $vlPontuacao;
        return $this;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }
}
