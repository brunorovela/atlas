<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleAprendizagemItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleAprendizagemItensRepository::class)]
#[ORM\Table(
    name: 'ple_aprendizagem_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_layout_variavel', columns: ['cd_layout_variavel'])]
#[ORM\Index(name: 'ple_aprendizagem_itens_ibfk_1', columns: ['cd_ple_aprendizagem'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_aprendizagem_itens_ibfk_1', 'colunas' => ['cd_ple_aprendizagem'], 'tabelaAlvo' => 'ple_aprendizagem', 'colunasAlvo' => ['cd_ple_aprendizagem'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ple_aprendizagem_itens_ibfk_2', 'colunas' => ['cd_layout_variavel'], 'tabelaAlvo' => 'ple_layouts_variaveis', 'colunasAlvo' => ['cd_layout_variavel'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleAprendizagemItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ple_aprendizagem_item', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPleAprendizagemItem = null;

    #[ORM\ManyToOne(targetEntity: PleAprendizagem::class)]
    #[ORM\JoinColumn(name: 'cd_ple_aprendizagem', referencedColumnName: 'cd_ple_aprendizagem', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PleAprendizagem $cdPleAprendizagem = null;

    #[ORM\ManyToOne(targetEntity: PleLayoutsVariaveis::class)]
    #[ORM\JoinColumn(name: 'cd_layout_variavel', referencedColumnName: 'cd_layout_variavel', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PleLayoutsVariaveis $cdLayoutVariavel = null;

    #[ORM\Column(name: 'nr_linha', type: 'smallint', nullable: true)]
    private ?int $nrLinha = null;

    #[ORM\Column(name: 'me_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        ?PleAprendizagem $cdPleAprendizagem = null,
        ?PleLayoutsVariaveis $cdLayoutVariavel = null,
        ?int $nrLinha = null,
        ?string $meValor = null
    ) {
        $this->cdPleAprendizagem = $cdPleAprendizagem;
        $this->cdLayoutVariavel = $cdLayoutVariavel;
        $this->nrLinha = $nrLinha;
        $this->meValor = $meValor;
    }

    public function getCdPleAprendizagemItem(): ?int
    {
        return $this->cdPleAprendizagemItem;
    }

    public function getCdPleAprendizagem(): ?PleAprendizagem
    {
        return $this->cdPleAprendizagem;
    }

    public function setCdPleAprendizagem(?PleAprendizagem $cdPleAprendizagem): self
    {
        $this->cdPleAprendizagem = $cdPleAprendizagem;
        return $this;
    }

    public function getCdLayoutVariavel(): ?PleLayoutsVariaveis
    {
        return $this->cdLayoutVariavel;
    }

    public function setCdLayoutVariavel(?PleLayoutsVariaveis $cdLayoutVariavel): self
    {
        $this->cdLayoutVariavel = $cdLayoutVariavel;
        return $this;
    }

    public function getNrLinha(): ?int
    {
        return $this->nrLinha;
    }

    public function setNrLinha(?int $nrLinha): self
    {
        $this->nrLinha = $nrLinha;
        return $this;
    }

    public function getMeValor(): ?string
    {
        return $this->meValor;
    }

    public function setMeValor(?string $meValor): self
    {
        $this->meValor = $meValor;
        return $this;
    }
}
