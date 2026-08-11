<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosRepository::class)]
#[ORM\Table(
    name: 'bib_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_genero', columns: ['cd_genero'])]
#[ORM\Index(name: 'cd_editora', columns: ['cd_editora'])]
#[ORM\Index(name: 'cd_serie', columns: ['cd_serie'])]
#[ORM\Index(name: 'cd_colecao', columns: ['cd_colecao'])]
#[ORM\Index(name: 'cd_imprenta_local', columns: ['cd_imprenta_local'])]
#[ORM\Index(name: 'cd_classificacao', columns: ['cd_classificacao'])]
#[ORM\Index(name: 'cd_area_geografica', columns: ['cd_area_geografica'])]
#[ORM\Index(name: 'IX_CD_GENERO', columns: ['cd_genero'])]
#[ORM\Index(name: 'IX_CD_EDITORA', columns: ['cd_editora'])]
#[ORM\Index(name: 'IX_CD_SERIE', columns: ['cd_serie'])]
#[ORM\Index(name: 'IX_CD_COLECAO', columns: ['cd_colecao'])]
#[ORM\Index(name: 'IX_CD_IDIOMA', columns: ['cd_idioma'])]
#[ORM\Index(name: 'IX_CD_IMPRETA_LOCAL', columns: ['cd_imprenta_local'])]
#[ORM\Index(name: 'IX_CD_CLASSIFICACAO', columns: ['cd_classificacao'])]
#[ORM\Index(name: 'IX_DS_CUTTER', columns: ['ds_cutter'])]
#[ORM\Index(name: 'IX_CD_AREA_GEOGRAFICA', columns: ['cd_area_geografica'])]
#[ORM\Index(name: 'IX_CD_PERIODICIDADE', columns: ['cd_periodicidade'])]
#[ORM\Index(name: 'FK_bib_titulos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_ibfk_1', 'colunas' => ['cd_area_geografica'], 'tabelaAlvo' => 'bib_areas_geograficas', 'colunasAlvo' => ['cd_area_geografica'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_titulos_ibfk_2', 'colunas' => ['cd_genero'], 'tabelaAlvo' => 'bib_generos', 'colunasAlvo' => ['cd_genero'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_ibfk_4', 'colunas' => ['cd_editora'], 'tabelaAlvo' => 'bib_editoras', 'colunasAlvo' => ['cd_editora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_titulos_ibfk_5', 'colunas' => ['cd_serie'], 'tabelaAlvo' => 'bib_series', 'colunasAlvo' => ['cd_serie'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_titulos_ibfk_6', 'colunas' => ['cd_colecao'], 'tabelaAlvo' => 'bib_colecoes', 'colunasAlvo' => ['cd_colecao'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_titulos_ibfk_8', 'colunas' => ['cd_imprenta_local'], 'tabelaAlvo' => 'bib_imprenta_locais', 'colunasAlvo' => ['cd_imprenta_local'], 'opcoes' => ['onDelete' => 'SET NULL', 'onUpdate' => 'SET NULL']],
        ['nome' => 'bib_titulos_ibfk_9', 'colunas' => ['cd_classificacao'], 'tabelaAlvo' => 'bib_classificacoes', 'colunasAlvo' => ['cd_classificacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_bib_titulos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo', type: 'integer')]
    private ?int $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: BibGeneros::class)]
    #[ORM\JoinColumn(name: 'cd_genero', referencedColumnName: 'cd_genero', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibGeneros $cdGenero = null;

    #[ORM\ManyToOne(targetEntity: BibEditoras::class)]
    #[ORM\JoinColumn(name: 'cd_editora', referencedColumnName: 'cd_editora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibEditoras $cdEditora = null;

    #[ORM\ManyToOne(targetEntity: BibSeries::class)]
    #[ORM\JoinColumn(name: 'cd_serie', referencedColumnName: 'cd_serie', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibSeries $cdSerie = null;

    #[ORM\Column(name: 'nr_sequencial_serie', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrSequencialSerie = null;

    #[ORM\Column(name: 'ds_serie', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $dsSerie = null;

    #[ORM\ManyToOne(targetEntity: BibColecoes::class)]
    #[ORM\JoinColumn(name: 'cd_colecao', referencedColumnName: 'cd_colecao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibColecoes $cdColecao = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_subtitulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsSubtitulo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'nr_paginas', type: 'integer', nullable: true)]
    private ?int $nrPaginas = null;

    #[ORM\Column(name: 'ds_edicao', type: 'string', length: 255, nullable: true)]
    private ?string $dsEdicao = null;

    #[ORM\Column(name: 'ds_edicao_adicionais', type: 'string', length: 255, nullable: true)]
    private ?string $dsEdicaoAdicionais = null;

    #[ORM\Column(name: 'cd_idioma', type: 'integer', nullable: true)]
    private ?int $cdIdioma = null;

    #[ORM\Column(name: 'nr_volume', type: 'string', length: 10, nullable: true, options: ['fixed' => true])]
    private ?string $nrVolume = null;

    #[ORM\Column(name: 'ds_tombo', type: 'string', length: 50, nullable: true)]
    private ?string $dsTombo = null;

    #[ORM\Column(name: 'ds_tomo', type: 'string', length: 50, nullable: true)]
    private ?string $dsTomo = null;

    #[ORM\Column(name: 'tx_resumo', type: 'text', length: 65535, nullable: true)]
    private ?string $txResumo = null;

    #[ORM\ManyToOne(targetEntity: BibImprentaLocais::class)]
    #[ORM\JoinColumn(name: 'cd_imprenta_local', referencedColumnName: 'cd_imprenta_local', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibImprentaLocais $cdImprentaLocal = null;

    #[ORM\Column(name: 'nr_imprenta_ano', type: 'string', length: 10, nullable: true, options: ['fixed' => true])]
    private ?string $nrImprentaAno = null;

    #[ORM\Column(name: 'ds_titulo_artigo', type: 'string', length: 10, nullable: true)]
    private ?string $dsTituloArtigo = null;

    #[ORM\Column(name: 'nr_tempo', type: 'string', length: 10, nullable: true, options: ['fixed' => true])]
    private ?string $nrTempo = null;

    #[ORM\Column(name: 'ds_isbn', type: 'string', length: 100, nullable: true)]
    private ?string $dsIsbn = null;

    #[ORM\Column(name: 'ds_issn', type: 'string', length: 100, nullable: true)]
    private ?string $dsIssn = null;

    #[ORM\Column(name: 'ds_tituloequivalente', type: 'string', length: 255, nullable: true)]
    private ?string $dsTituloequivalente = null;

    #[ORM\ManyToOne(targetEntity: BibClassificacoes::class)]
    #[ORM\JoinColumn(name: 'cd_classificacao', referencedColumnName: 'cd_classificacao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibClassificacoes $cdClassificacao = null;

    #[ORM\Column(name: 'ds_cutter', type: 'string', length: 255, nullable: true)]
    private ?string $dsCutter = null;

    #[ORM\Column(name: 'bb_capa', type: 'blob', length: 65535, nullable: true)]
    private ?string $bbCapa = null;

    #[ORM\ManyToOne(targetEntity: BibAreasGeograficas::class)]
    #[ORM\JoinColumn(name: 'cd_area_geografica', referencedColumnName: 'cd_area_geografica', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAreasGeograficas $cdAreaGeografica = null;

    #[ORM\Column(name: 'ds_detalhes_fisicos', type: 'string', length: 255, nullable: true)]
    private ?string $dsDetalhesFisicos = null;

    #[ORM\Column(name: 'ds_dimensoes', type: 'string', length: 50, nullable: true)]
    private ?string $dsDimensoes = null;

    #[ORM\Column(name: 'cd_periodicidade', type: 'integer', nullable: true)]
    private ?int $cdPeriodicidade = null;

    #[ORM\Column(name: 'nr_periodicidade_inicio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPeriodicidadeInicio = null;

    #[ORM\Column(name: 'nr_periodicidade_fim', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPeriodicidadeFim = null;

    #[ORM\Column(name: 'ds_aux01', type: 'string', length: 100, nullable: true)]
    private ?string $dsAux01 = null;

    #[ORM\Column(name: 'ds_banca', type: 'string', length: 100, nullable: true)]
    private ?string $dsBanca = null;

    #[ORM\Column(name: 'ds_ano_defesa', type: 'string', length: 100, nullable: true)]
    private ?string $dsAnoDefesa = null;

    #[ORM\Column(name: 'ds_folhas', type: 'string', length: 70, nullable: true)]
    private ?string $dsFolhas = null;

    #[ORM\Column(name: 'ds_instituicao', type: 'string', length: 165, nullable: true)]
    private ?string $dsInstituicao = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 200, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'dt_ultima_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaAlteracao = null;

    #[ORM\Column(name: 'cd_pessoa_alteracao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdPessoaAlteracao = 0;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    // Sem construtor: 43 propriedades. Use os setters encadeados.

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function getCdGenero(): ?BibGeneros
    {
        return $this->cdGenero;
    }

    public function setCdGenero(?BibGeneros $cdGenero): self
    {
        $this->cdGenero = $cdGenero;
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

    public function getCdSerie(): ?BibSeries
    {
        return $this->cdSerie;
    }

    public function setCdSerie(?BibSeries $cdSerie): self
    {
        $this->cdSerie = $cdSerie;
        return $this;
    }

    public function getNrSequencialSerie(): ?int
    {
        return $this->nrSequencialSerie;
    }

    public function setNrSequencialSerie(?int $nrSequencialSerie): self
    {
        $this->nrSequencialSerie = $nrSequencialSerie;
        return $this;
    }

    public function getDsSerie(): ?int
    {
        return $this->dsSerie;
    }

    public function setDsSerie(?int $dsSerie): self
    {
        $this->dsSerie = $dsSerie;
        return $this;
    }

    public function getCdColecao(): ?BibColecoes
    {
        return $this->cdColecao;
    }

    public function setCdColecao(?BibColecoes $cdColecao): self
    {
        $this->cdColecao = $cdColecao;
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

    public function getDsSubtitulo(): ?string
    {
        return $this->dsSubtitulo;
    }

    public function setDsSubtitulo(?string $dsSubtitulo): self
    {
        $this->dsSubtitulo = $dsSubtitulo;
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

    public function getNrPaginas(): ?int
    {
        return $this->nrPaginas;
    }

    public function setNrPaginas(?int $nrPaginas): self
    {
        $this->nrPaginas = $nrPaginas;
        return $this;
    }

    public function getDsEdicao(): ?string
    {
        return $this->dsEdicao;
    }

    public function setDsEdicao(?string $dsEdicao): self
    {
        $this->dsEdicao = $dsEdicao;
        return $this;
    }

    public function getDsEdicaoAdicionais(): ?string
    {
        return $this->dsEdicaoAdicionais;
    }

    public function setDsEdicaoAdicionais(?string $dsEdicaoAdicionais): self
    {
        $this->dsEdicaoAdicionais = $dsEdicaoAdicionais;
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

    public function getNrVolume(): ?string
    {
        return $this->nrVolume;
    }

    public function setNrVolume(?string $nrVolume): self
    {
        $this->nrVolume = $nrVolume;
        return $this;
    }

    public function getDsTombo(): ?string
    {
        return $this->dsTombo;
    }

    public function setDsTombo(?string $dsTombo): self
    {
        $this->dsTombo = $dsTombo;
        return $this;
    }

    public function getDsTomo(): ?string
    {
        return $this->dsTomo;
    }

    public function setDsTomo(?string $dsTomo): self
    {
        $this->dsTomo = $dsTomo;
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

    public function getCdImprentaLocal(): ?BibImprentaLocais
    {
        return $this->cdImprentaLocal;
    }

    public function setCdImprentaLocal(?BibImprentaLocais $cdImprentaLocal): self
    {
        $this->cdImprentaLocal = $cdImprentaLocal;
        return $this;
    }

    public function getNrImprentaAno(): ?string
    {
        return $this->nrImprentaAno;
    }

    public function setNrImprentaAno(?string $nrImprentaAno): self
    {
        $this->nrImprentaAno = $nrImprentaAno;
        return $this;
    }

    public function getDsTituloArtigo(): ?string
    {
        return $this->dsTituloArtigo;
    }

    public function setDsTituloArtigo(?string $dsTituloArtigo): self
    {
        $this->dsTituloArtigo = $dsTituloArtigo;
        return $this;
    }

    public function getNrTempo(): ?string
    {
        return $this->nrTempo;
    }

    public function setNrTempo(?string $nrTempo): self
    {
        $this->nrTempo = $nrTempo;
        return $this;
    }

    public function getDsIsbn(): ?string
    {
        return $this->dsIsbn;
    }

    public function setDsIsbn(?string $dsIsbn): self
    {
        $this->dsIsbn = $dsIsbn;
        return $this;
    }

    public function getDsIssn(): ?string
    {
        return $this->dsIssn;
    }

    public function setDsIssn(?string $dsIssn): self
    {
        $this->dsIssn = $dsIssn;
        return $this;
    }

    public function getDsTituloequivalente(): ?string
    {
        return $this->dsTituloequivalente;
    }

    public function setDsTituloequivalente(?string $dsTituloequivalente): self
    {
        $this->dsTituloequivalente = $dsTituloequivalente;
        return $this;
    }

    public function getCdClassificacao(): ?BibClassificacoes
    {
        return $this->cdClassificacao;
    }

    public function setCdClassificacao(?BibClassificacoes $cdClassificacao): self
    {
        $this->cdClassificacao = $cdClassificacao;
        return $this;
    }

    public function getDsCutter(): ?string
    {
        return $this->dsCutter;
    }

    public function setDsCutter(?string $dsCutter): self
    {
        $this->dsCutter = $dsCutter;
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

    public function getCdAreaGeografica(): ?BibAreasGeograficas
    {
        return $this->cdAreaGeografica;
    }

    public function setCdAreaGeografica(?BibAreasGeograficas $cdAreaGeografica): self
    {
        $this->cdAreaGeografica = $cdAreaGeografica;
        return $this;
    }

    public function getDsDetalhesFisicos(): ?string
    {
        return $this->dsDetalhesFisicos;
    }

    public function setDsDetalhesFisicos(?string $dsDetalhesFisicos): self
    {
        $this->dsDetalhesFisicos = $dsDetalhesFisicos;
        return $this;
    }

    public function getDsDimensoes(): ?string
    {
        return $this->dsDimensoes;
    }

    public function setDsDimensoes(?string $dsDimensoes): self
    {
        $this->dsDimensoes = $dsDimensoes;
        return $this;
    }

    public function getCdPeriodicidade(): ?int
    {
        return $this->cdPeriodicidade;
    }

    public function setCdPeriodicidade(?int $cdPeriodicidade): self
    {
        $this->cdPeriodicidade = $cdPeriodicidade;
        return $this;
    }

    public function getNrPeriodicidadeInicio(): ?int
    {
        return $this->nrPeriodicidadeInicio;
    }

    public function setNrPeriodicidadeInicio(?int $nrPeriodicidadeInicio): self
    {
        $this->nrPeriodicidadeInicio = $nrPeriodicidadeInicio;
        return $this;
    }

    public function getNrPeriodicidadeFim(): ?int
    {
        return $this->nrPeriodicidadeFim;
    }

    public function setNrPeriodicidadeFim(?int $nrPeriodicidadeFim): self
    {
        $this->nrPeriodicidadeFim = $nrPeriodicidadeFim;
        return $this;
    }

    public function getDsAux01(): ?string
    {
        return $this->dsAux01;
    }

    public function setDsAux01(?string $dsAux01): self
    {
        $this->dsAux01 = $dsAux01;
        return $this;
    }

    public function getDsBanca(): ?string
    {
        return $this->dsBanca;
    }

    public function setDsBanca(?string $dsBanca): self
    {
        $this->dsBanca = $dsBanca;
        return $this;
    }

    public function getDsAnoDefesa(): ?string
    {
        return $this->dsAnoDefesa;
    }

    public function setDsAnoDefesa(?string $dsAnoDefesa): self
    {
        $this->dsAnoDefesa = $dsAnoDefesa;
        return $this;
    }

    public function getDsFolhas(): ?string
    {
        return $this->dsFolhas;
    }

    public function setDsFolhas(?string $dsFolhas): self
    {
        $this->dsFolhas = $dsFolhas;
        return $this;
    }

    public function getDsInstituicao(): ?string
    {
        return $this->dsInstituicao;
    }

    public function setDsInstituicao(?string $dsInstituicao): self
    {
        $this->dsInstituicao = $dsInstituicao;
        return $this;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
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

    public function getDtUltimaAlteracao(): ?\DateTimeInterface
    {
        return $this->dtUltimaAlteracao;
    }

    public function setDtUltimaAlteracao(?\DateTimeInterface $dtUltimaAlteracao): self
    {
        $this->dtUltimaAlteracao = $dtUltimaAlteracao;
        return $this;
    }

    public function getCdPessoaAlteracao(): ?int
    {
        return $this->cdPessoaAlteracao;
    }

    public function setCdPessoaAlteracao(?int $cdPessoaAlteracao): self
    {
        $this->cdPessoaAlteracao = $cdPessoaAlteracao;
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
