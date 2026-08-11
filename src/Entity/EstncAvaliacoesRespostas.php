<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncAvaliacoesRespostasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAvaliacoesRespostasRepository::class)]
#[ORM\Table(
    name: 'estnc_avaliacoes_respostas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACOES_RESP', columns: ['cd_avaliacoes_respondidas'])]
#[ORM\Index(name: 'IX_CD_PERGUNTA', columns: ['cd_pergunta'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_AVL_RESPOSTAS_CD_PERG', 'colunas' => ['cd_pergunta'], 'tabelaAlvo' => 'estnc_perguntas', 'colunasAlvo' => ['cd_pergunta'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncAvaliacoesRespostas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_avaliacoes_respondidas', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaliacoesRespondidas = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncPerguntas::class)]
    #[ORM\JoinColumn(name: 'cd_pergunta', referencedColumnName: 'cd_pergunta', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncPerguntas $cdPergunta = null;

    #[ORM\Column(name: 'me_descricao', type: 'blob', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true)]
    private ?float $vlNota = null;

    public function __construct(
        ?int $cdAvaliacoesRespondidas = null,
        ?EstncPerguntas $cdPergunta = null,
        ?string $meDescricao = null,
        ?float $vlNota = null
    ) {
        $this->cdAvaliacoesRespondidas = $cdAvaliacoesRespondidas;
        $this->cdPergunta = $cdPergunta;
        $this->meDescricao = $meDescricao;
        $this->vlNota = $vlNota;
    }

    public function getCdAvaliacoesRespondidas(): ?int
    {
        return $this->cdAvaliacoesRespondidas;
    }

    public function setCdAvaliacoesRespondidas(?int $cdAvaliacoesRespondidas): self
    {
        $this->cdAvaliacoesRespondidas = $cdAvaliacoesRespondidas;
        return $this;
    }

    public function getCdPergunta(): ?EstncPerguntas
    {
        return $this->cdPergunta;
    }

    public function setCdPergunta(?EstncPerguntas $cdPergunta): self
    {
        $this->cdPergunta = $cdPergunta;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getVlNota(): ?float
    {
        return $this->vlNota;
    }

    public function setVlNota(?float $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }
}
