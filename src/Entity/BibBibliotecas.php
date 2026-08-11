<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibBibliotecasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibBibliotecasRepository::class)]
#[ORM\Table(
    name: 'bib_bibliotecas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_bib_bibliotecas_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_bibliotecas_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibBibliotecas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_biblioteca', type: 'integer')]
    private ?int $cdBiblioteca = null;

    #[ORM\Column(name: 'ds_biblioteca', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsBiblioteca = '';

    #[ORM\Column(name: 'ds_sigla_biblioteca', type: 'string', length: 10, nullable: true)]
    private ?string $dsSiglaBiblioteca = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        string $dsBiblioteca = '',
        ?string $dsSiglaBiblioteca = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsBiblioteca = $dsBiblioteca;
        $this->dsSiglaBiblioteca = $dsSiglaBiblioteca;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdBiblioteca(): ?int
    {
        return $this->cdBiblioteca;
    }

    public function getDsBiblioteca(): string
    {
        return $this->dsBiblioteca;
    }

    public function setDsBiblioteca(string $dsBiblioteca): self
    {
        $this->dsBiblioteca = $dsBiblioteca;
        return $this;
    }

    public function getDsSiglaBiblioteca(): ?string
    {
        return $this->dsSiglaBiblioteca;
    }

    public function setDsSiglaBiblioteca(?string $dsSiglaBiblioteca): self
    {
        $this->dsSiglaBiblioteca = $dsSiglaBiblioteca;
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
