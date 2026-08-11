<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintQuestoesNotificacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesNotificacoesRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_notificacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PintQuestoesNotificacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_notificacao', type: 'integer')]
    private ?int $cdNotificacao = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $cdNotificacao = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdNotificacao = $cdNotificacao;
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

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function setCdNotificacao(?int $cdNotificacao): self
    {
        $this->cdNotificacao = $cdNotificacao;
        return $this;
    }
}
