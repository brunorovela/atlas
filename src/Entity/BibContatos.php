<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibContatosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibContatosRepository::class)]
#[ORM\Table(
    name: 'bib_contatos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_contato_biblioteca', columns: ['cd_contato_biblioteca'])]
#[ORM\UniqueConstraint(name: 'IdxContato', columns: ['cd_contato', 'cd_biblioteca', 'cd_editora', 'cd_autor', 'ds_contato'])]
#[ORM\Index(name: 'cd_biblioteca', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'cd_editora', columns: ['cd_editora'])]
#[ORM\Index(name: 'cd_autor', columns: ['cd_autor'])]
#[ORM\Index(name: 'cd_config', columns: ['cd_config'])]
#[ORM\Index(name: 'IX_CD_CONTATO', columns: ['cd_contato'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_CD_EDITORA', columns: ['cd_editora'])]
#[ORM\Index(name: 'IX_CD_AUTOR', columns: ['cd_autor'])]
#[ORM\Index(name: 'IX_CD_CONFIG', columns: ['cd_config'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_contatos_ibfk_2', 'colunas' => ['cd_biblioteca'], 'tabelaAlvo' => 'bib_bibliotecas', 'colunasAlvo' => ['cd_biblioteca'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_contatos_ibfk_3', 'colunas' => ['cd_editora'], 'tabelaAlvo' => 'bib_editoras', 'colunasAlvo' => ['cd_editora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_contatos_ibfk_4', 'colunas' => ['cd_autor'], 'tabelaAlvo' => 'bib_autores', 'colunasAlvo' => ['cd_autor'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_contatos_ibfk_5', 'colunas' => ['cd_config'], 'tabelaAlvo' => 'bib_config', 'colunasAlvo' => ['cd_config'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibContatos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contato_biblioteca', type: 'integer')]
    private ?int $cdContatoBiblioteca = null;

    #[ORM\Column(name: 'cd_contato', type: 'integer')]
    private ?int $cdContato = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecas::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca', referencedColumnName: 'cd_biblioteca', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecas $cdBiblioteca = null;

    #[ORM\ManyToOne(targetEntity: BibEditoras::class)]
    #[ORM\JoinColumn(name: 'cd_editora', referencedColumnName: 'cd_editora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibEditoras $cdEditora = null;

    #[ORM\ManyToOne(targetEntity: BibAutores::class)]
    #[ORM\JoinColumn(name: 'cd_autor', referencedColumnName: 'cd_autor', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAutores $cdAutor = null;

    #[ORM\Column(name: 'ds_contato', type: 'string', length: 100, nullable: true)]
    private ?string $dsContato = null;

    #[ORM\ManyToOne(targetEntity: BibConfig::class)]
    #[ORM\JoinColumn(name: 'cd_config', referencedColumnName: 'cd_config', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibConfig $cdConfig = null;

    public function __construct(
        ?int $cdContato = null,
        ?BibBibliotecas $cdBiblioteca = null,
        ?BibEditoras $cdEditora = null,
        ?BibAutores $cdAutor = null,
        ?string $dsContato = null,
        ?BibConfig $cdConfig = null
    ) {
        $this->cdContato = $cdContato;
        $this->cdBiblioteca = $cdBiblioteca;
        $this->cdEditora = $cdEditora;
        $this->cdAutor = $cdAutor;
        $this->dsContato = $dsContato;
        $this->cdConfig = $cdConfig;
    }

    public function getCdContatoBiblioteca(): ?int
    {
        return $this->cdContatoBiblioteca;
    }

    public function getCdContato(): ?int
    {
        return $this->cdContato;
    }

    public function setCdContato(?int $cdContato): self
    {
        $this->cdContato = $cdContato;
        return $this;
    }

    public function getCdBiblioteca(): ?BibBibliotecas
    {
        return $this->cdBiblioteca;
    }

    public function setCdBiblioteca(?BibBibliotecas $cdBiblioteca): self
    {
        $this->cdBiblioteca = $cdBiblioteca;
        return $this;
    }

    public function getCdEditora(): ?BibEditoras
    {
        return $this->cdEditora;
    }

    public function setCdEditora(?BibEditoras $cdEditora): self
    {
        $this->cdEditora = $cdEditora;
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

    public function getDsContato(): ?string
    {
        return $this->dsContato;
    }

    public function setDsContato(?string $dsContato): self
    {
        $this->dsContato = $dsContato;
        return $this;
    }

    public function getCdConfig(): ?BibConfig
    {
        return $this->cdConfig;
    }

    public function setCdConfig(?BibConfig $cdConfig): self
    {
        $this->cdConfig = $cdConfig;
        return $this;
    }
}
