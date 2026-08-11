<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibBibliotecasModalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibBibliotecasModalidadesRepository::class)]
#[ORM\Table(
    name: 'bib_bibliotecas_modalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['cd_biblioteca', 'cd_modalidade'])]
#[ORM\Index(name: 'cd_biblioteca', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'cd_modalidade', columns: ['cd_modalidade'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_CD_MODALIDADE', columns: ['cd_modalidade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_bibliotecas_modalidades_ibfk_1', 'colunas' => ['cd_biblioteca'], 'tabelaAlvo' => 'bib_bibliotecas', 'colunasAlvo' => ['cd_biblioteca'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_bibliotecas_modalidades_ibfk_2', 'colunas' => ['cd_modalidade'], 'tabelaAlvo' => 'bib_modalidades_movimento', 'colunasAlvo' => ['cd_modalidade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibBibliotecasModalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_biblioteca_modalidade', type: 'integer')]
    private ?int $cdBibliotecaModalidade = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecas::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca', referencedColumnName: 'cd_biblioteca', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecas $cdBiblioteca = null;

    #[ORM\ManyToOne(targetEntity: BibModalidadesMovimento::class)]
    #[ORM\JoinColumn(name: 'cd_modalidade', referencedColumnName: 'cd_modalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibModalidadesMovimento $cdModalidade = null;

    public function __construct(
        ?BibBibliotecas $cdBiblioteca = null,
        ?BibModalidadesMovimento $cdModalidade = null
    ) {
        $this->cdBiblioteca = $cdBiblioteca;
        $this->cdModalidade = $cdModalidade;
    }

    public function getCdBibliotecaModalidade(): ?int
    {
        return $this->cdBibliotecaModalidade;
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

    public function getCdModalidade(): ?BibModalidadesMovimento
    {
        return $this->cdModalidade;
    }

    public function setCdModalidade(?BibModalidadesMovimento $cdModalidade): self
    {
        $this->cdModalidade = $cdModalidade;
        return $this;
    }
}
