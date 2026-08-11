<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlePlanoAulaItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlePlanoAulaItemRepository::class)]
#[ORM\Table(
    name: 'ple_plano_aula_item',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ple_plano_aula', columns: ['cd_ple_plano_aula', 'cd_layout_variavel', 'nr_linha'])]
#[ORM\Index(name: 'cd_layout_variavel', columns: ['cd_layout_variavel'])]
#[ORM\Index(name: 'IDX_54758E4110A331A', columns: ['cd_ple_plano_aula'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_plano_aula_item_ibfk_1', 'colunas' => ['cd_ple_plano_aula'], 'tabelaAlvo' => 'ple_plano_aula', 'colunasAlvo' => ['cd_ple_plano_aula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ple_plano_aula_item_ibfk_2', 'colunas' => ['cd_layout_variavel'], 'tabelaAlvo' => 'ple_layouts_variaveis', 'colunasAlvo' => ['cd_layout_variavel'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlePlanoAulaItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ple_plano_aula_item', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlePlanoAulaItem = null;

    #[ORM\ManyToOne(targetEntity: PlePlanoAula::class)]
    #[ORM\JoinColumn(name: 'cd_ple_plano_aula', referencedColumnName: 'cd_ple_plano_aula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlePlanoAula $cdPlePlanoAula = null;

    #[ORM\ManyToOne(targetEntity: PleLayoutsVariaveis::class)]
    #[ORM\JoinColumn(name: 'cd_layout_variavel', referencedColumnName: 'cd_layout_variavel', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PleLayoutsVariaveis $cdLayoutVariavel = null;

    #[ORM\Column(name: 'nr_linha', type: 'smallint', nullable: true)]
    private ?int $nrLinha = null;

    #[ORM\Column(name: 'me_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        ?PlePlanoAula $cdPlePlanoAula = null,
        ?PleLayoutsVariaveis $cdLayoutVariavel = null,
        ?int $nrLinha = null,
        ?string $meValor = null
    ) {
        $this->cdPlePlanoAula = $cdPlePlanoAula;
        $this->cdLayoutVariavel = $cdLayoutVariavel;
        $this->nrLinha = $nrLinha;
        $this->meValor = $meValor;
    }

    public function getCdPlePlanoAulaItem(): ?int
    {
        return $this->cdPlePlanoAulaItem;
    }

    public function getCdPlePlanoAula(): ?PlePlanoAula
    {
        return $this->cdPlePlanoAula;
    }

    public function setCdPlePlanoAula(?PlePlanoAula $cdPlePlanoAula): self
    {
        $this->cdPlePlanoAula = $cdPlePlanoAula;
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
