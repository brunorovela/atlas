<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CursosAtosOficiaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosAtosOficiaisRepository::class)]
#[ORM\Table(
    name: 'cursos_atos_oficiais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_cd_curso_cd_coligada', columns: ['cd_curso', 'cd_coligada'])]
#[ORM\Index(name: 'fk_curso_instituicao', columns: ['cd_unidade_certificadora'])]
#[ORM\Index(name: 'fk_cd_tipo_certificadora', columns: ['cd_tipo_certificadora'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_tipo_certificadora', 'colunas' => ['cd_tipo_certificadora'], 'tabelaAlvo' => 'tipo_certificadora', 'colunasAlvo' => ['cd_tipo_certificadora'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_curso_instituicao', 'colunas' => ['cd_unidade_certificadora'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CursosAtosOficiais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ato_oficial', type: 'integer')]
    private ?int $cdAtoOficial = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => '0'])]
    private string $cdCurso = '0';

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'dt_ato', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAto = null;

    #[ORM\Column(name: 'ds_titulo_ato', type: 'string', length: 255, nullable: true)]
    private ?string $dsTituloAto = null;

    #[ORM\Column(name: 'ds_ato', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsAto = null;

    #[ORM\Column(name: 'sn_impressao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => '0'])]
    private ?string $snImpressao = '0';

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_unidade_certificadora', referencedColumnName: 'cd_instituicao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdUnidadeCertificadora = null;

    #[ORM\Column(name: 'cd_tipo_acao', type: TinyIntType::NAME, nullable: true, options: ['comment' => '0-Autorizacao 1-Reconhecimento'])]
    private ?int $cdTipoAcao = null;

    #[ORM\ManyToOne(targetEntity: TipoCertificadora::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_certificadora', referencedColumnName: 'cd_tipo_certificadora', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TipoCertificadora $cdTipoCertificadora = null;

    #[ORM\Column(name: 'nr_certificadora', type: 'integer', nullable: true)]
    private ?int $nrCertificadora = null;

    #[ORM\Column(name: 'ds_veiculo', type: 'string', length: 100, nullable: true, options: ['comment' => 'Veiculo de publicação do ato'])]
    private ?string $dsVeiculo = null;

    #[ORM\Column(name: 'dt_publicacao', type: 'date', nullable: true, options: ['comment' => 'Data de publicação do ato'])]
    private ?\DateTimeInterface $dtPublicacao = null;

    #[ORM\Column(name: 'ds_secao', type: 'string', length: 100, nullable: true, options: ['comment' => 'Seção da publicação do ato'])]
    private ?string $dsSecao = null;

    #[ORM\Column(name: 'nr_pagina', type: 'string', length: 100, nullable: true, options: ['comment' => 'Pagina da publicação do ato'])]
    private ?string $nrPagina = null;

    #[ORM\Column(name: 'nr_dou', type: 'string', length: 100, nullable: true, options: ['comment' => 'Numero DOU'])]
    private ?string $nrDou = null;

    #[ORM\Column(name: 'nr_processo', type: 'string', length: 100, nullable: true, options: ['comment' => 'Numero do processo de criação do e-MEC referente ao ato'])]
    private ?string $nrProcesso = null;

    #[ORM\Column(name: 'ds_tipo_processo', type: 'string', length: 100, nullable: true, options: ['comment' => 'Tipo do processo de criação do e-MEC referente ao ato'])]
    private ?string $dsTipoProcesso = null;

    #[ORM\Column(name: 'dt_processo', type: 'date', nullable: true, options: ['comment' => 'Data do processo de criação do e-MEC referente ao ato'])]
    private ?\DateTimeInterface $dtProcesso = null;

    #[ORM\Column(name: 'dt_protocolo', type: 'date', nullable: true, options: ['comment' => 'Data do protocolo de criação do e-MEC referente ao ato'])]
    private ?\DateTimeInterface $dtProtocolo = null;

    public function __construct(
        string $cdCurso = '0',
        int $nrAnosemestre = 0,
        ?\DateTimeInterface $dtAto = null,
        ?string $dsTituloAto = null,
        ?string $dsAto = null,
        ?string $snImpressao = '0',
        ?int $cdColigada = null,
        ?InstituicoesEnsino $cdUnidadeCertificadora = null,
        ?int $cdTipoAcao = null,
        ?TipoCertificadora $cdTipoCertificadora = null,
        ?int $nrCertificadora = null,
        ?string $dsVeiculo = null,
        ?\DateTimeInterface $dtPublicacao = null,
        ?string $dsSecao = null,
        ?string $nrPagina = null,
        ?string $nrDou = null,
        ?string $nrProcesso = null,
        ?string $dsTipoProcesso = null,
        ?\DateTimeInterface $dtProcesso = null,
        ?\DateTimeInterface $dtProtocolo = null
    ) {
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtAto = $dtAto;
        $this->dsTituloAto = $dsTituloAto;
        $this->dsAto = $dsAto;
        $this->snImpressao = $snImpressao;
        $this->cdColigada = $cdColigada;
        $this->cdUnidadeCertificadora = $cdUnidadeCertificadora;
        $this->cdTipoAcao = $cdTipoAcao;
        $this->cdTipoCertificadora = $cdTipoCertificadora;
        $this->nrCertificadora = $nrCertificadora;
        $this->dsVeiculo = $dsVeiculo;
        $this->dtPublicacao = $dtPublicacao;
        $this->dsSecao = $dsSecao;
        $this->nrPagina = $nrPagina;
        $this->nrDou = $nrDou;
        $this->nrProcesso = $nrProcesso;
        $this->dsTipoProcesso = $dsTipoProcesso;
        $this->dtProcesso = $dtProcesso;
        $this->dtProtocolo = $dtProtocolo;
    }

    public function getCdAtoOficial(): ?int
    {
        return $this->cdAtoOficial;
    }

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDtAto(): ?\DateTimeInterface
    {
        return $this->dtAto;
    }

    public function setDtAto(?\DateTimeInterface $dtAto): self
    {
        $this->dtAto = $dtAto;
        return $this;
    }

    public function getDsTituloAto(): ?string
    {
        return $this->dsTituloAto;
    }

    public function setDsTituloAto(?string $dsTituloAto): self
    {
        $this->dsTituloAto = $dsTituloAto;
        return $this;
    }

    public function getDsAto(): ?string
    {
        return $this->dsAto;
    }

    public function setDsAto(?string $dsAto): self
    {
        $this->dsAto = $dsAto;
        return $this;
    }

    public function getSnImpressao(): ?string
    {
        return $this->snImpressao;
    }

    public function setSnImpressao(?string $snImpressao): self
    {
        $this->snImpressao = $snImpressao;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdUnidadeCertificadora(): ?InstituicoesEnsino
    {
        return $this->cdUnidadeCertificadora;
    }

    public function setCdUnidadeCertificadora(?InstituicoesEnsino $cdUnidadeCertificadora): self
    {
        $this->cdUnidadeCertificadora = $cdUnidadeCertificadora;
        return $this;
    }

    public function getCdTipoAcao(): ?int
    {
        return $this->cdTipoAcao;
    }

    public function setCdTipoAcao(?int $cdTipoAcao): self
    {
        $this->cdTipoAcao = $cdTipoAcao;
        return $this;
    }

    public function getCdTipoCertificadora(): ?TipoCertificadora
    {
        return $this->cdTipoCertificadora;
    }

    public function setCdTipoCertificadora(?TipoCertificadora $cdTipoCertificadora): self
    {
        $this->cdTipoCertificadora = $cdTipoCertificadora;
        return $this;
    }

    public function getNrCertificadora(): ?int
    {
        return $this->nrCertificadora;
    }

    public function setNrCertificadora(?int $nrCertificadora): self
    {
        $this->nrCertificadora = $nrCertificadora;
        return $this;
    }

    public function getDsVeiculo(): ?string
    {
        return $this->dsVeiculo;
    }

    public function setDsVeiculo(?string $dsVeiculo): self
    {
        $this->dsVeiculo = $dsVeiculo;
        return $this;
    }

    public function getDtPublicacao(): ?\DateTimeInterface
    {
        return $this->dtPublicacao;
    }

    public function setDtPublicacao(?\DateTimeInterface $dtPublicacao): self
    {
        $this->dtPublicacao = $dtPublicacao;
        return $this;
    }

    public function getDsSecao(): ?string
    {
        return $this->dsSecao;
    }

    public function setDsSecao(?string $dsSecao): self
    {
        $this->dsSecao = $dsSecao;
        return $this;
    }

    public function getNrPagina(): ?string
    {
        return $this->nrPagina;
    }

    public function setNrPagina(?string $nrPagina): self
    {
        $this->nrPagina = $nrPagina;
        return $this;
    }

    public function getNrDou(): ?string
    {
        return $this->nrDou;
    }

    public function setNrDou(?string $nrDou): self
    {
        $this->nrDou = $nrDou;
        return $this;
    }

    public function getNrProcesso(): ?string
    {
        return $this->nrProcesso;
    }

    public function setNrProcesso(?string $nrProcesso): self
    {
        $this->nrProcesso = $nrProcesso;
        return $this;
    }

    public function getDsTipoProcesso(): ?string
    {
        return $this->dsTipoProcesso;
    }

    public function setDsTipoProcesso(?string $dsTipoProcesso): self
    {
        $this->dsTipoProcesso = $dsTipoProcesso;
        return $this;
    }

    public function getDtProcesso(): ?\DateTimeInterface
    {
        return $this->dtProcesso;
    }

    public function setDtProcesso(?\DateTimeInterface $dtProcesso): self
    {
        $this->dtProcesso = $dtProcesso;
        return $this;
    }

    public function getDtProtocolo(): ?\DateTimeInterface
    {
        return $this->dtProtocolo;
    }

    public function setDtProtocolo(?\DateTimeInterface $dtProtocolo): self
    {
        $this->dtProtocolo = $dtProtocolo;
        return $this;
    }
}
