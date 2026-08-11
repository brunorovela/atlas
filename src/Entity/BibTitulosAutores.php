<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibTitulosAutoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosAutoresRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_autores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_autor', columns: ['cd_autor'])]
#[ORM\Index(name: 'cd_tipo_autoria', columns: ['cd_tipo_autoria'])]
#[ORM\Index(name: 'bib_titulos_autores_ibfk_2', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_AUTOR', columns: ['cd_autor'])]
#[ORM\Index(name: 'IX_CD_TIPO_AUTORIA', columns: ['cd_tipo_autoria'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_autores_ibfk_2', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_titulos_autores_ibfk_3', 'colunas' => ['cd_autor'], 'tabelaAlvo' => 'bib_autores', 'colunasAlvo' => ['cd_autor'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_titulos_autores_ibfk_4', 'colunas' => ['cd_tipo_autoria'], 'tabelaAlvo' => 'bib_titulos_autores_tipos', 'colunasAlvo' => ['cd_tipo_autoria'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'CASCADE']],
        ['nome' => 'FK_autor_titulo', 'colunas' => ['cd_autor'], 'tabelaAlvo' => 'bib_autores', 'colunasAlvo' => ['cd_autor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibTitulosAutores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_autor', type: 'integer')]
    private ?int $cdTituloAutor = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibAutores::class)]
    #[ORM\JoinColumn(name: 'cd_autor', referencedColumnName: 'cd_autor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAutores $cdAutor = null;

    #[ORM\ManyToOne(targetEntity: BibTitulosAutoresTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_autoria', referencedColumnName: 'cd_tipo_autoria', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulosAutoresTipos $cdTipoAutoria = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 30, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?BibAutores $cdAutor = null,
        ?BibTitulosAutoresTipos $cdTipoAutoria = null,
        ?string $dsObservacao = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdAutor = $cdAutor;
        $this->cdTipoAutoria = $cdTipoAutoria;
        $this->dsObservacao = $dsObservacao;
    }

    public function getCdTituloAutor(): ?int
    {
        return $this->cdTituloAutor;
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

    public function getCdAutor(): ?BibAutores
    {
        return $this->cdAutor;
    }

    public function setCdAutor(?BibAutores $cdAutor): self
    {
        $this->cdAutor = $cdAutor;
        return $this;
    }

    public function getCdTipoAutoria(): ?BibTitulosAutoresTipos
    {
        return $this->cdTipoAutoria;
    }

    public function setCdTipoAutoria(?BibTitulosAutoresTipos $cdTipoAutoria): self
    {
        $this->cdTipoAutoria = $cdTipoAutoria;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}
