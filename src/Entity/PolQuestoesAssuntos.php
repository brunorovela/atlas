<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolQuestoesAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolQuestoesAssuntosRepository::class)]
#[ORM\Table(
    name: 'pol_questoes_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['cd_assunto'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class PolQuestoesAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao_assunto', type: 'integer')]
    private ?int $cdQuestaoAssunto = null;

    #[ORM\Column(name: 'cd_assunto', type: 'integer')]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    public function __construct(
        ?int $cdAssunto = null,
        ?int $cdQuestao = null
    ) {
        $this->cdAssunto = $cdAssunto;
        $this->cdQuestao = $cdQuestao;
    }

    public function getCdQuestaoAssunto(): ?int
    {
        return $this->cdQuestaoAssunto;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?int $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
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
}
