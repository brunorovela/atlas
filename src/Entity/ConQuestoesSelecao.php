<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConQuestoesSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConQuestoesSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_questoes_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['cd_assunto'])]
class ConQuestoesSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_assunto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'ds_questao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsQuestao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    public function __construct(
        ?int $cdAssunto = null,
        ?string $dsQuestao = null,
        int $snAtivo = 1
    ) {
        $this->cdAssunto = $cdAssunto;
        $this->dsQuestao = $dsQuestao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
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

    public function getDsQuestao(): ?string
    {
        return $this->dsQuestao;
    }

    public function setDsQuestao(?string $dsQuestao): self
    {
        $this->dsQuestao = $dsQuestao;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
