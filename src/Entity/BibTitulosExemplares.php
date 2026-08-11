<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibTitulosExemplaresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosExemplaresRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_exemplares',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_numero_registro', columns: ['ds_numero_registro', 'cd_biblioteca'])]
#[ORM\UniqueConstraint(name: 'uk_codigo_barras', columns: ['ds_codigo_barras', 'cd_biblioteca'])]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'cd_biblioteca', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'cd_biblioteca_modalidade', columns: ['cd_biblioteca_modalidade'])]
#[ORM\Index(name: 'cd_localizacao', columns: ['cd_localizacao'])]
#[ORM\Index(name: 'cd_aquisicao', columns: ['cd_aquisicao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA_MODALIDADE', columns: ['cd_biblioteca_modalidade'])]
#[ORM\Index(name: 'IX_CD_LOCALIZACAO', columns: ['cd_localizacao'])]
#[ORM\Index(name: 'IX_DS_NUMERO_REGISTRO', columns: ['ds_numero_registro'])]
#[ORM\Index(name: 'IX_DS_CODIGO_BARRAS', columns: ['ds_codigo_barras'])]
#[ORM\Index(name: 'IX_CD_AQUISICAO', columns: ['cd_aquisicao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_exemplares_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_exemplares_ibfk_2', 'colunas' => ['cd_biblioteca'], 'tabelaAlvo' => 'bib_bibliotecas', 'colunasAlvo' => ['cd_biblioteca'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_exemplares_ibfk_3', 'colunas' => ['cd_biblioteca_modalidade'], 'tabelaAlvo' => 'bib_bibliotecas_modalidades', 'colunasAlvo' => ['cd_biblioteca_modalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_exemplares_ibfk_4', 'colunas' => ['cd_localizacao'], 'tabelaAlvo' => 'bib_bibliotecas_localizacoes', 'colunasAlvo' => ['cd_localizacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_exemplares_ibfk_5', 'colunas' => ['cd_aquisicao'], 'tabelaAlvo' => 'bib_aquisicoes', 'colunasAlvo' => ['cd_aquisicao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_titulos_exemplares_ibfk_6', 'colunas' => ['cd_localizacao'], 'tabelaAlvo' => 'bib_bibliotecas_localizacoes', 'colunasAlvo' => ['cd_localizacao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']]
    ],
    autoIncremento: []
)]
class BibTitulosExemplares
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exemplar', type: 'integer')]
    private ?int $cdExemplar = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecas::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca', referencedColumnName: 'cd_biblioteca', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecas $cdBiblioteca = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecasModalidades::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca_modalidade', referencedColumnName: 'cd_biblioteca_modalidade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecasModalidades $cdBibliotecaModalidade = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecasLocalizacoes::class)]
    #[ORM\JoinColumn(name: 'cd_localizacao', referencedColumnName: 'cd_localizacao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecasLocalizacoes $cdLocalizacao = null;

    #[ORM\Column(name: 'ds_numero_registro', type: 'string', length: 50)]
    private ?string $dsNumeroRegistro = null;

    #[ORM\Column(name: 'ds_codigo_barras', type: 'string', length: 50, nullable: true)]
    private ?string $dsCodigoBarras = null;

    #[ORM\Column(name: 'nr_exemplar', type: 'integer')]
    private ?int $nrExemplar = null;

    #[ORM\Column(name: 'nr_volume', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrVolume = null;

    #[ORM\ManyToOne(targetEntity: BibAquisicoes::class)]
    #[ORM\JoinColumn(name: 'cd_aquisicao', referencedColumnName: 'cd_aquisicao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAquisicoes $cdAquisicao = null;

    #[ORM\Column(name: 'bb_capa', type: 'blob', length: 65535, nullable: true)]
    private ?string $bbCapa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'VL_PRECO', type: 'float', nullable: true)]
    private ?float $vlPreco = null;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?BibBibliotecas $cdBiblioteca = null,
        ?BibBibliotecasModalidades $cdBibliotecaModalidade = null,
        ?BibBibliotecasLocalizacoes $cdLocalizacao = null,
        ?string $dsNumeroRegistro = null,
        ?string $dsCodigoBarras = null,
        ?int $nrExemplar = null,
        ?int $nrVolume = null,
        ?BibAquisicoes $cdAquisicao = null,
        ?string $bbCapa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtRevisao = null,
        ?int $snExcluido = 0,
        ?float $vlPreco = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdBiblioteca = $cdBiblioteca;
        $this->cdBibliotecaModalidade = $cdBibliotecaModalidade;
        $this->cdLocalizacao = $cdLocalizacao;
        $this->dsNumeroRegistro = $dsNumeroRegistro;
        $this->dsCodigoBarras = $dsCodigoBarras;
        $this->nrExemplar = $nrExemplar;
        $this->nrVolume = $nrVolume;
        $this->cdAquisicao = $cdAquisicao;
        $this->bbCapa = $bbCapa;
        $this->dtCadastro = $dtCadastro;
        $this->dtRevisao = $dtRevisao;
        $this->snExcluido = $snExcluido;
        $this->vlPreco = $vlPreco;
    }

    public function getCdExemplar(): ?int
    {
        return $this->cdExemplar;
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

    public function getCdBiblioteca(): ?BibBibliotecas
    {
        return $this->cdBiblioteca;
    }

    public function setCdBiblioteca(?BibBibliotecas $cdBiblioteca): self
    {
        $this->cdBiblioteca = $cdBiblioteca;
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

    public function getCdLocalizacao(): ?BibBibliotecasLocalizacoes
    {
        return $this->cdLocalizacao;
    }

    public function setCdLocalizacao(?BibBibliotecasLocalizacoes $cdLocalizacao): self
    {
        $this->cdLocalizacao = $cdLocalizacao;
        return $this;
    }

    public function getDsNumeroRegistro(): ?string
    {
        return $this->dsNumeroRegistro;
    }

    public function setDsNumeroRegistro(?string $dsNumeroRegistro): self
    {
        $this->dsNumeroRegistro = $dsNumeroRegistro;
        return $this;
    }

    public function getDsCodigoBarras(): ?string
    {
        return $this->dsCodigoBarras;
    }

    public function setDsCodigoBarras(?string $dsCodigoBarras): self
    {
        $this->dsCodigoBarras = $dsCodigoBarras;
        return $this;
    }

    public function getNrExemplar(): ?int
    {
        return $this->nrExemplar;
    }

    public function setNrExemplar(?int $nrExemplar): self
    {
        $this->nrExemplar = $nrExemplar;
        return $this;
    }

    public function getNrVolume(): ?int
    {
        return $this->nrVolume;
    }

    public function setNrVolume(?int $nrVolume): self
    {
        $this->nrVolume = $nrVolume;
        return $this;
    }

    public function getCdAquisicao(): ?BibAquisicoes
    {
        return $this->cdAquisicao;
    }

    public function setCdAquisicao(?BibAquisicoes $cdAquisicao): self
    {
        $this->cdAquisicao = $cdAquisicao;
        return $this;
    }

    public function getBbCapa(): ?string
    {
        return $this->bbCapa;
    }

    public function setBbCapa(?string $bbCapa): self
    {
        $this->bbCapa = $bbCapa;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
        return $this;
    }

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }

    public function getVlPreco(): ?float
    {
        return $this->vlPreco;
    }

    public function setVlPreco(?float $vlPreco): self
    {
        $this->vlPreco = $vlPreco;
        return $this;
    }
}
