<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlPesquisadoRespostasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlPesquisadoRespostasRepository::class)]
#[ORM\Table(
    name: 'avl_pesquisado_respostas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Respostas dos pesquisados']
)]
#[ORM\UniqueConstraint(name: 'cd_resposta', columns: ['cd_resposta'])]
#[ORM\UniqueConstraint(name: 'cd_resposta_2', columns: ['cd_pesquisado', 'cd_questao', 'cd_alternativa', 'cd_chave'])]
#[ORM\Index(name: 'IX_CD_PESQUISADO', columns: ['cd_pesquisado'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA', columns: ['cd_alternativa'])]
#[ORM\Index(name: 'IX_CD_CHAVE', columns: ['cd_chave'])]
class AvlPesquisadoRespostas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resposta', type: 'integer')]
    private ?int $cdResposta = null;

    #[ORM\Column(name: 'cd_pesquisado', type: 'integer', options: ['default' => '0'])]
    private int $cdPesquisado = 0;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['default' => '0'])]
    private int $cdQuestao = 0;

    #[ORM\Column(name: 'cd_alternativa', type: 'integer', nullable: true)]
    private ?int $cdAlternativa = null;

    #[ORM\Column(name: 'ds_resposta', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsResposta = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', options: ['default' => '0'])]
    private int $cdChave = 0;

    #[ORM\Column(name: 'cd_repeticao_resposta', type: 'integer', nullable: true)]
    private ?int $cdRepeticaoResposta = null;

    public function __construct(
        int $cdPesquisado = 0,
        int $cdQuestao = 0,
        ?int $cdAlternativa = null,
        ?string $dsResposta = null,
        int $cdChave = 0,
        ?int $cdRepeticaoResposta = null
    ) {
        $this->cdPesquisado = $cdPesquisado;
        $this->cdQuestao = $cdQuestao;
        $this->cdAlternativa = $cdAlternativa;
        $this->dsResposta = $dsResposta;
        $this->cdChave = $cdChave;
        $this->cdRepeticaoResposta = $cdRepeticaoResposta;
    }

    public function getCdResposta(): ?int
    {
        return $this->cdResposta;
    }

    public function getCdPesquisado(): int
    {
        return $this->cdPesquisado;
    }

    public function setCdPesquisado(int $cdPesquisado): self
    {
        $this->cdPesquisado = $cdPesquisado;
        return $this;
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

    public function getCdAlternativa(): ?int
    {
        return $this->cdAlternativa;
    }

    public function setCdAlternativa(?int $cdAlternativa): self
    {
        $this->cdAlternativa = $cdAlternativa;
        return $this;
    }

    public function getDsResposta(): ?string
    {
        return $this->dsResposta;
    }

    public function setDsResposta(?string $dsResposta): self
    {
        $this->dsResposta = $dsResposta;
        return $this;
    }

    public function getCdChave(): int
    {
        return $this->cdChave;
    }

    public function setCdChave(int $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getCdRepeticaoResposta(): ?int
    {
        return $this->cdRepeticaoResposta;
    }

    public function setCdRepeticaoResposta(?int $cdRepeticaoResposta): self
    {
        $this->cdRepeticaoResposta = $cdRepeticaoResposta;
        return $this;
    }
}
