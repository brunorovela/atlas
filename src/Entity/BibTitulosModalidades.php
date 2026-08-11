<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibTitulosModalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosModalidadesRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_modalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_biblioteca_modalidade', columns: ['cd_biblioteca_modalidade'])]
#[ORM\Index(name: 'cd_biblioteca_modalidade_2', columns: ['cd_biblioteca_modalidade'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA_MODALIDADE', columns: ['cd_biblioteca_modalidade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_modalidades_ibfk_2', 'colunas' => ['cd_biblioteca_modalidade'], 'tabelaAlvo' => 'bib_bibliotecas_modalidades', 'colunasAlvo' => ['cd_biblioteca_modalidade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibTitulosModalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_modalidade', type: 'integer')]
    private ?int $cdTituloModalidade = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer')]
    private ?int $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecasModalidades::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca_modalidade', referencedColumnName: 'cd_biblioteca_modalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecasModalidades $cdBibliotecaModalidade = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?BibBibliotecasModalidades $cdBibliotecaModalidade = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdBibliotecaModalidade = $cdBibliotecaModalidade;
    }

    public function getCdTituloModalidade(): ?int
    {
        return $this->cdTituloModalidade;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdBibliotecaModalidade(): ?BibBibliotecasModalidades
    {
        return $this->cdBibliotecaModalidade;
    }

    public function setCdBibliotecaModalidade(?BibBibliotecasModalidades $cdBibliotecaModalidade): self
    {
        $this->cdBibliotecaModalidade = $cdBibliotecaModalidade;
        return $this;
    }
}
