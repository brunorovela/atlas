<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibPeriodicosAutoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibPeriodicosAutoresRepository::class)]
#[ORM\Table(
    name: 'bib_periodicos_autores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PER_AUT_PER_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'FK_PER_AUT_AUTORES_CD_AUTOR', columns: ['CD_AUTOR'])]
#[ORM\Index(name: 'IX_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'IX_CD_AUTOR', columns: ['CD_AUTOR'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PER_AUT_AUTORES_CD_AUTOR', 'colunas' => ['CD_AUTOR'], 'tabelaAlvo' => 'bib_autores', 'colunasAlvo' => ['cd_autor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PER_AUT_PER_CD_PERIODICO', 'colunas' => ['CD_PERIODICO'], 'tabelaAlvo' => 'bib_periodicos', 'colunasAlvo' => ['CD_PERIODICO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibPeriodicosAutores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PERIODICO_AUTOR', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPeriodicoAutor = null;

    #[ORM\ManyToOne(targetEntity: BibPeriodicos::class)]
    #[ORM\JoinColumn(name: 'CD_PERIODICO', referencedColumnName: 'CD_PERIODICO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?BibPeriodicos $cdPeriodico = null;

    #[ORM\ManyToOne(targetEntity: BibAutores::class)]
    #[ORM\JoinColumn(name: 'CD_AUTOR', referencedColumnName: 'cd_autor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAutores $cdAutor = null;

    public function __construct(
        ?BibPeriodicos $cdPeriodico = null,
        ?BibAutores $cdAutor = null
    ) {
        $this->cdPeriodico = $cdPeriodico;
        $this->cdAutor = $cdAutor;
    }

    public function getCdPeriodicoAutor(): ?int
    {
        return $this->cdPeriodicoAutor;
    }

    public function getCdPeriodico(): ?BibPeriodicos
    {
        return $this->cdPeriodico;
    }

    public function setCdPeriodico(?BibPeriodicos $cdPeriodico): self
    {
        $this->cdPeriodico = $cdPeriodico;
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
}
