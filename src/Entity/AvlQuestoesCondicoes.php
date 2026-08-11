<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlQuestoesCondicoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesCondicoesRepository::class)]
#[ORM\Table(
    name: 'avl_questoes_condicoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Condi??es para que uma quest?o seja visualizada']
)]
#[ORM\UniqueConstraint(name: 'cd_condicao', columns: ['cd_condicao'])]
#[ORM\UniqueConstraint(name: 'cd_condicao_2', columns: ['cd_questao', 'cd_alternativa'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA', columns: ['cd_alternativa'])]
class AvlQuestoesCondicoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_condicao', type: 'integer')]
    private ?int $cdCondicao = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['default' => '0'])]
    private int $cdQuestao = 0;

    #[ORM\Column(name: 'cd_alternativa', type: 'integer', options: ['default' => '0'])]
    private int $cdAlternativa = 0;

    public function __construct(
        int $cdQuestao = 0,
        int $cdAlternativa = 0
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdAlternativa = $cdAlternativa;
    }

    public function getCdCondicao(): ?int
    {
        return $this->cdCondicao;
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

    public function getCdAlternativa(): int
    {
        return $this->cdAlternativa;
    }

    public function setCdAlternativa(int $cdAlternativa): self
    {
        $this->cdAlternativa = $cdAlternativa;
        return $this;
    }
}
