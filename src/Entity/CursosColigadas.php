<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosColigadasRepository::class)]
#[ORM\Table(
    name: 'cursos_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['CD_GRADE'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['SN_ATIVO'])]
#[ORM\Index(name: 'IX_CURSO_COLIGADA_ATIVO', columns: ['CD_CURSO', 'CD_COLIGADA', 'SN_ATIVO'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class CursosColigadas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_COLIGADA', type: 'smallint')]
    private ?int $cdColigada = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'CD_CURSO_EQUIVALENTE', type: 'string', length: 15, nullable: true)]
    private ?string $cdCursoEquivalente = null;

    #[ORM\Column(name: 'CD_GRADE', type: 'integer', nullable: true)]
    private ?int $cdGrade = null;

    #[ORM\Column(name: 'DS_CONTRATO', type: 'string', length: 30, nullable: true)]
    private ?string $dsContrato = null;

    #[ORM\Column(name: 'NR_CARGA_HORARIA', type: 'smallfloat', nullable: true)]
    private ?float $nrCargaHoraria = null;

    #[ORM\Column(name: 'nr_carga_horaria_relogio', type: 'smallfloat', nullable: true, options: ['comment' => 'Carga horaria do curso em horas relogio'])]
    private ?float $nrCargaHorariaRelogio = null;

    #[ORM\Column(name: 'nr_carga_horaria_relogio_integralizada', type: 'smallfloat', nullable: true, options: ['comment' => 'Carga horaria integralizada do curso em horas relogio'])]
    private ?float $nrCargaHorariaRelogioIntegralizada = null;

    #[ORM\Column(name: 'CD_DEPTO', type: 'smallint')]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'NR_DIAS_LETIVOS', type: 'smallfloat', nullable: true)]
    private ?float $nrDiasLetivos = null;

    #[ORM\Column(name: 'NR_DURACAO_AULA', type: 'smallfloat', nullable: true)]
    private ?float $nrDuracaoAula = null;

    #[ORM\Column(name: 'CD_CURSO_MEC', type: 'integer', nullable: true)]
    private ?int $cdCursoMec = null;

    #[ORM\Column(name: 'CD_GRAU_MEC', type: 'string', length: 20, nullable: true)]
    private ?string $cdGrauMec = null;

    #[ORM\Column(name: 'CD_HABILITACAO_MEC', type: 'integer', nullable: true)]
    private ?int $cdHabilitacaoMec = null;

    #[ORM\Column(name: 'DS_NOME_ETAPA', type: 'string', length: 20, nullable: true)]
    private ?string $dsNomeEtapa = null;

    #[ORM\Column(name: 'NR_SERIES', type: 'smallint', nullable: true)]
    private ?int $nrSeries = null;

    #[ORM\Column(name: 'ME_OBSERVACOES', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacoes = null;

    #[ORM\Column(name: 'DS_REQUERIMENTO', type: 'string', length: 50, nullable: true)]
    private ?string $dsRequerimento = null;

    #[ORM\Column(name: 'SN_ACADEMICO', type: 'smallint', nullable: true)]
    private ?int $snAcademico = null;

    #[ORM\Column(name: 'SN_ATIVO', type: 'smallint', options: ['default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdCursoEquivalente(): ?string
    {
        return $this->cdCursoEquivalente;
    }

    public function setCdCursoEquivalente(?string $cdCursoEquivalente): self
    {
        $this->cdCursoEquivalente = $cdCursoEquivalente;
        return $this;
    }

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
        return $this;
    }

    public function getDsContrato(): ?string
    {
        return $this->dsContrato;
    }

    public function setDsContrato(?string $dsContrato): self
    {
        $this->dsContrato = $dsContrato;
        return $this;
    }

    public function getNrCargaHoraria(): ?float
    {
        return $this->nrCargaHoraria;
    }

    public function setNrCargaHoraria(?float $nrCargaHoraria): self
    {
        $this->nrCargaHoraria = $nrCargaHoraria;
        return $this;
    }

    public function getNrCargaHorariaRelogio(): ?float
    {
        return $this->nrCargaHorariaRelogio;
    }

    public function setNrCargaHorariaRelogio(?float $nrCargaHorariaRelogio): self
    {
        $this->nrCargaHorariaRelogio = $nrCargaHorariaRelogio;
        return $this;
    }

    public function getNrCargaHorariaRelogioIntegralizada(): ?float
    {
        return $this->nrCargaHorariaRelogioIntegralizada;
    }

    public function setNrCargaHorariaRelogioIntegralizada(?float $nrCargaHorariaRelogioIntegralizada): self
    {
        $this->nrCargaHorariaRelogioIntegralizada = $nrCargaHorariaRelogioIntegralizada;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }

    public function getNrDiasLetivos(): ?float
    {
        return $this->nrDiasLetivos;
    }

    public function setNrDiasLetivos(?float $nrDiasLetivos): self
    {
        $this->nrDiasLetivos = $nrDiasLetivos;
        return $this;
    }

    public function getNrDuracaoAula(): ?float
    {
        return $this->nrDuracaoAula;
    }

    public function setNrDuracaoAula(?float $nrDuracaoAula): self
    {
        $this->nrDuracaoAula = $nrDuracaoAula;
        return $this;
    }

    public function getCdCursoMec(): ?int
    {
        return $this->cdCursoMec;
    }

    public function setCdCursoMec(?int $cdCursoMec): self
    {
        $this->cdCursoMec = $cdCursoMec;
        return $this;
    }

    public function getCdGrauMec(): ?string
    {
        return $this->cdGrauMec;
    }

    public function setCdGrauMec(?string $cdGrauMec): self
    {
        $this->cdGrauMec = $cdGrauMec;
        return $this;
    }

    public function getCdHabilitacaoMec(): ?int
    {
        return $this->cdHabilitacaoMec;
    }

    public function setCdHabilitacaoMec(?int $cdHabilitacaoMec): self
    {
        $this->cdHabilitacaoMec = $cdHabilitacaoMec;
        return $this;
    }

    public function getDsNomeEtapa(): ?string
    {
        return $this->dsNomeEtapa;
    }

    public function setDsNomeEtapa(?string $dsNomeEtapa): self
    {
        $this->dsNomeEtapa = $dsNomeEtapa;
        return $this;
    }

    public function getNrSeries(): ?int
    {
        return $this->nrSeries;
    }

    public function setNrSeries(?int $nrSeries): self
    {
        $this->nrSeries = $nrSeries;
        return $this;
    }

    public function getMeObservacoes(): ?string
    {
        return $this->meObservacoes;
    }

    public function setMeObservacoes(?string $meObservacoes): self
    {
        $this->meObservacoes = $meObservacoes;
        return $this;
    }

    public function getDsRequerimento(): ?string
    {
        return $this->dsRequerimento;
    }

    public function setDsRequerimento(?string $dsRequerimento): self
    {
        $this->dsRequerimento = $dsRequerimento;
        return $this;
    }

    public function getSnAcademico(): ?int
    {
        return $this->snAcademico;
    }

    public function setSnAcademico(?int $snAcademico): self
    {
        $this->snAcademico = $snAcademico;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
