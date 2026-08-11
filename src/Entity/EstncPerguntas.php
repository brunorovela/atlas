<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncPerguntasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncPerguntasRepository::class)]
#[ORM\Table(
    name: 'estnc_perguntas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_PERGUNTA', columns: ['cd_grupo_pergunta'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_PERGUNTA', columns: ['cd_grupo_pergunta'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_PERGUNTAS_CD_AVALIACAO', 'colunas' => ['cd_avaliacao'], 'tabelaAlvo' => 'estnc_avaliacoes', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_PERGUNTAS_CD_PERGUNTA', 'colunas' => ['cd_grupo_pergunta'], 'tabelaAlvo' => 'estnc_grupos_perguntas', 'colunasAlvo' => ['cd_grupo_pergunta'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncPerguntas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pergunta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPergunta = null;

    #[ORM\ManyToOne(targetEntity: EstncAvaliacoes::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao', referencedColumnName: 'cd_avaliacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncAvaliacoes $cdAvaliacao = null;

    #[ORM\ManyToOne(targetEntity: EstncGruposPerguntas::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_pergunta', referencedColumnName: 'cd_grupo_pergunta', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncGruposPerguntas $cdGrupoPergunta = null;

    #[ORM\Column(name: 'ds_pergunta', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsPergunta = null;

    #[ORM\Column(name: 'me_objetivos', type: 'blob', length: 65535, nullable: true)]
    private ?string $meObjetivos = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    public function __construct(
        ?EstncAvaliacoes $cdAvaliacao = null,
        ?EstncGruposPerguntas $cdGrupoPergunta = null,
        ?string $dsPergunta = null,
        ?string $meObjetivos = null,
        ?int $cdTipo = null
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdGrupoPergunta = $cdGrupoPergunta;
        $this->dsPergunta = $dsPergunta;
        $this->meObjetivos = $meObjetivos;
        $this->cdTipo = $cdTipo;
    }

    public function getCdPergunta(): ?int
    {
        return $this->cdPergunta;
    }

    public function getCdAvaliacao(): ?EstncAvaliacoes
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?EstncAvaliacoes $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdGrupoPergunta(): ?EstncGruposPerguntas
    {
        return $this->cdGrupoPergunta;
    }

    public function setCdGrupoPergunta(?EstncGruposPerguntas $cdGrupoPergunta): self
    {
        $this->cdGrupoPergunta = $cdGrupoPergunta;
        return $this;
    }

    public function getDsPergunta(): ?string
    {
        return $this->dsPergunta;
    }

    public function setDsPergunta(?string $dsPergunta): self
    {
        $this->dsPergunta = $dsPergunta;
        return $this;
    }

    public function getMeObjetivos(): ?string
    {
        return $this->meObjetivos;
    }

    public function setMeObjetivos(?string $meObjetivos): self
    {
        $this->meObjetivos = $meObjetivos;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }
}
