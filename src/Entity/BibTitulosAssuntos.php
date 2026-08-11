<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibTitulosAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosAssuntosRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'cd_assunto', columns: ['cd_assunto'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['cd_assunto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_assuntos_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'bib_titulos_assuntos_ibfk_2', 'colunas' => ['cd_assunto'], 'tabelaAlvo' => 'bib_assuntos', 'colunasAlvo' => ['cd_assunto'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibTitulosAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_assunto', type: 'integer')]
    private ?int $cdTituloAssunto = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibAssuntos::class)]
    #[ORM\JoinColumn(name: 'cd_assunto', referencedColumnName: 'cd_assunto', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAssuntos $cdAssunto = null;

    #[ORM\Column(name: 'nr_assunto', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAssunto = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?BibAssuntos $cdAssunto = null,
        ?int $nrAssunto = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdAssunto = $cdAssunto;
        $this->nrAssunto = $nrAssunto;
    }

    public function getCdTituloAssunto(): ?int
    {
        return $this->cdTituloAssunto;
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

    public function getCdAssunto(): ?BibAssuntos
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?BibAssuntos $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
        return $this;
    }

    public function getNrAssunto(): ?int
    {
        return $this->nrAssunto;
    }

    public function setNrAssunto(?int $nrAssunto): self
    {
        $this->nrAssunto = $nrAssunto;
        return $this;
    }
}
