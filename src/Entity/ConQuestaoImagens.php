<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConQuestaoImagensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConQuestaoImagensRepository::class)]
#[ORM\Table(
    name: 'con_questao_imagens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class ConQuestaoImagens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_imagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImagem = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'im_questao', type: 'blob', length: 16777215)]
    private ?string $imQuestao = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'string', length: 30)]
    private ?string $nrTamanho = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?string $imQuestao = null,
        ?string $nmOriginal = null,
        ?string $nrTamanho = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->imQuestao = $imQuestao;
        $this->nmOriginal = $nmOriginal;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdImagem(): ?int
    {
        return $this->cdImagem;
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

    public function getImQuestao(): ?string
    {
        return $this->imQuestao;
    }

    public function setImQuestao(?string $imQuestao): self
    {
        $this->imQuestao = $imQuestao;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getNrTamanho(): ?string
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?string $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}
