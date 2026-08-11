<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibSugestoesTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibSugestoesTitulosRepository::class)]
#[ORM\Table(
    name: 'bib_sugestoes_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_sugestao', columns: ['cd_sugestao'])]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_SUGESTAO', columns: ['cd_sugestao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_sugestoes_titulos_ibfk_1', 'colunas' => ['cd_sugestao'], 'tabelaAlvo' => 'bib_sugestoes', 'colunasAlvo' => ['cd_sugestao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_sugestoes_titulos_ibfk_2', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibSugestoesTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sugestao_titulo', type: 'integer')]
    private ?int $cdSugestaoTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibSugestoes::class)]
    #[ORM\JoinColumn(name: 'cd_sugestao', referencedColumnName: 'cd_sugestao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibSugestoes $cdSugestao = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 100, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_editora', type: 'string', length: 100, nullable: true)]
    private ?string $dsEditora = null;

    #[ORM\Column(name: 'ds_autor', type: 'string', length: 100, nullable: true)]
    private ?string $dsAutor = null;

    public function __construct(
        ?BibSugestoes $cdSugestao = null,
        ?BibTitulos $cdTitulo = null,
        ?string $dsTitulo = null,
        ?string $dsEditora = null,
        ?string $dsAutor = null
    ) {
        $this->cdSugestao = $cdSugestao;
        $this->cdTitulo = $cdTitulo;
        $this->dsTitulo = $dsTitulo;
        $this->dsEditora = $dsEditora;
        $this->dsAutor = $dsAutor;
    }

    public function getCdSugestaoTitulo(): ?int
    {
        return $this->cdSugestaoTitulo;
    }

    public function getCdSugestao(): ?BibSugestoes
    {
        return $this->cdSugestao;
    }

    public function setCdSugestao(?BibSugestoes $cdSugestao): self
    {
        $this->cdSugestao = $cdSugestao;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsEditora(): ?string
    {
        return $this->dsEditora;
    }

    public function setDsEditora(?string $dsEditora): self
    {
        $this->dsEditora = $dsEditora;
        return $this;
    }

    public function getDsAutor(): ?string
    {
        return $this->dsAutor;
    }

    public function setDsAutor(?string $dsAutor): self
    {
        $this->dsAutor = $dsAutor;
        return $this;
    }
}
