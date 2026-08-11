<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibPeriodicosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibPeriodicosRepository::class)]
#[ORM\Table(
    name: 'bib_periodicos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_EXEMPLAR_TITULOS_EXEMPLARES', columns: ['cd_exemplar'])]
#[ORM\Index(name: 'UK_TITULO_EXEMPLAR_ASSUNTO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_EXEMPLAR', columns: ['cd_exemplar'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_TITULO_BIB_TITULOS', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_EXEMPLAR_TITULOS_EXEMPLARES', 'colunas' => ['cd_exemplar'], 'tabelaAlvo' => 'bib_titulos_exemplares', 'colunasAlvo' => ['cd_exemplar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibPeriodicos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PERIODICO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPeriodico = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibTitulosExemplares::class)]
    #[ORM\JoinColumn(name: 'cd_exemplar', referencedColumnName: 'cd_exemplar', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulosExemplares $cdExemplar = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_pagina', type: 'string', length: 50, nullable: true, options: ['fixed' => true])]
    private ?string $dsPagina = null;

    #[ORM\Column(name: 'tx_resumo', type: 'text', length: 65535, nullable: true)]
    private ?string $txResumo = null;

    #[ORM\Column(name: 'nr_volume', type: 'string', length: 255, nullable: true)]
    private ?string $nrVolume = null;

    #[ORM\Column(name: 'nr_numero', type: 'string', length: 255, nullable: true)]
    private ?string $nrNumero = null;

    #[ORM\Column(name: 'NR_ANO', type: 'string', length: 255, nullable: true)]
    private ?string $nrAno = null;

    #[ORM\Column(name: 'ds_suplemento', type: 'string', length: 255, nullable: true)]
    private ?string $dsSuplemento = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?BibTitulosExemplares $cdExemplar = null,
        ?string $dsTitulo = null,
        ?string $dsPagina = null,
        ?string $txResumo = null,
        ?string $nrVolume = null,
        ?string $nrNumero = null,
        ?string $nrAno = null,
        ?string $dsSuplemento = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdExemplar = $cdExemplar;
        $this->dsTitulo = $dsTitulo;
        $this->dsPagina = $dsPagina;
        $this->txResumo = $txResumo;
        $this->nrVolume = $nrVolume;
        $this->nrNumero = $nrNumero;
        $this->nrAno = $nrAno;
        $this->dsSuplemento = $dsSuplemento;
    }

    public function getCdPeriodico(): ?int
    {
        return $this->cdPeriodico;
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

    public function getCdExemplar(): ?BibTitulosExemplares
    {
        return $this->cdExemplar;
    }

    public function setCdExemplar(?BibTitulosExemplares $cdExemplar): self
    {
        $this->cdExemplar = $cdExemplar;
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

    public function getDsPagina(): ?string
    {
        return $this->dsPagina;
    }

    public function setDsPagina(?string $dsPagina): self
    {
        $this->dsPagina = $dsPagina;
        return $this;
    }

    public function getTxResumo(): ?string
    {
        return $this->txResumo;
    }

    public function setTxResumo(?string $txResumo): self
    {
        $this->txResumo = $txResumo;
        return $this;
    }

    public function getNrVolume(): ?string
    {
        return $this->nrVolume;
    }

    public function setNrVolume(?string $nrVolume): self
    {
        $this->nrVolume = $nrVolume;
        return $this;
    }

    public function getNrNumero(): ?string
    {
        return $this->nrNumero;
    }

    public function setNrNumero(?string $nrNumero): self
    {
        $this->nrNumero = $nrNumero;
        return $this;
    }

    public function getNrAno(): ?string
    {
        return $this->nrAno;
    }

    public function setNrAno(?string $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getDsSuplemento(): ?string
    {
        return $this->dsSuplemento;
    }

    public function setDsSuplemento(?string $dsSuplemento): self
    {
        $this->dsSuplemento = $dsSuplemento;
        return $this;
    }
}
