<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibAquisicoesTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAquisicoesTitulosRepository::class)]
#[ORM\Table(
    name: 'bib_aquisicoes_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_aquisicao', columns: ['cd_aquisicao'])]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_AQUISICAO', columns: ['cd_aquisicao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_aquisicoes_titulos_ibfk_1', 'colunas' => ['cd_aquisicao'], 'tabelaAlvo' => 'bib_aquisicoes', 'colunasAlvo' => ['cd_aquisicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_aquisicoes_titulos_ibfk_2', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibAquisicoesTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aquisicao_titulo', type: 'integer')]
    private ?int $cdAquisicaoTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibAquisicoes::class)]
    #[ORM\JoinColumn(name: 'cd_aquisicao', referencedColumnName: 'cd_aquisicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAquisicoes $cdAquisicao = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\Column(name: 'db_valor_unitario', type: 'float', nullable: true)]
    private ?float $dbValorUnitario = null;

    #[ORM\Column(name: 'nr_quantidade', type: 'integer', nullable: true)]
    private ?int $nrQuantidade = null;

    public function __construct(
        ?BibAquisicoes $cdAquisicao = null,
        ?BibTitulos $cdTitulo = null,
        ?float $dbValorUnitario = null,
        ?int $nrQuantidade = null
    ) {
        $this->cdAquisicao = $cdAquisicao;
        $this->cdTitulo = $cdTitulo;
        $this->dbValorUnitario = $dbValorUnitario;
        $this->nrQuantidade = $nrQuantidade;
    }

    public function getCdAquisicaoTitulo(): ?int
    {
        return $this->cdAquisicaoTitulo;
    }

    public function getCdAquisicao(): ?BibAquisicoes
    {
        return $this->cdAquisicao;
    }

    public function setCdAquisicao(?BibAquisicoes $cdAquisicao): self
    {
        $this->cdAquisicao = $cdAquisicao;
        return $this;
    }

    public function getCdTitulo(): ?BibTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?BibTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getDbValorUnitario(): ?float
    {
        return $this->dbValorUnitario;
    }

    public function setDbValorUnitario(?float $dbValorUnitario): self
    {
        $this->dbValorUnitario = $dbValorUnitario;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }
}
