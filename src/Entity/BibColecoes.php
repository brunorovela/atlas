<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibColecoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibColecoesRepository::class)]
#[ORM\Table(
    name: 'bib_colecoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_bib_colecoes_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_colecoes_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibColecoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_colecao', type: 'integer')]
    private ?int $cdColecao = null;

    #[ORM\Column(name: 'ds_colecao', type: 'string', length: 100, nullable: true)]
    private ?string $dsColecao = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'cd_idioma', type: 'integer', nullable: true)]
    private ?int $cdIdioma = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsColecao = null,
        ?int $nrAno = null,
        ?int $cdIdioma = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsColecao = $dsColecao;
        $this->nrAno = $nrAno;
        $this->cdIdioma = $cdIdioma;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdColecao(): ?int
    {
        return $this->cdColecao;
    }

    public function getDsColecao(): ?string
    {
        return $this->dsColecao;
    }

    public function setDsColecao(?string $dsColecao): self
    {
        $this->dsColecao = $dsColecao;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getCdIdioma(): ?int
    {
        return $this->cdIdioma;
    }

    public function setCdIdioma(?int $cdIdioma): self
    {
        $this->cdIdioma = $cdIdioma;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
