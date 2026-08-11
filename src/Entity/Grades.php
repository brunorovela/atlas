<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GradesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradesRepository::class)]
#[ORM\Table(
    name: 'grades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_GRADE_CURSO', columns: ['CD_GRADE', 'CD_CURSO'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['CD_GRADE'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['SN_ATIVO'])]
#[ORM\Index(name: 'IX_CD_CURSO_CD_GRADE', columns: ['CD_CURSO', 'CD_GRADE'])]
class Grades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'CD_GRADE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrade = null;

    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'DS_GRADE', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrade = null;

    #[ORM\Column(name: 'NR_ANO_INICIAL', type: 'integer', nullable: true)]
    private ?int $nrAnoInicial = null;

    #[ORM\Column(name: 'SN_ATIVO', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'S'])]
    private string $snAtivo = 'S';

    #[ORM\Column(name: 'NR_CARGA_CURSO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCargaCurso = null;

    #[ORM\Column(name: 'NR_CARGA_ATIVIDADES', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCargaAtividades = null;

    #[ORM\Column(name: 'SN_PADRAO', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snPadrao = false;

    #[ORM\Column(name: 'NR_PERC_MAX_REPROVACAO', type: 'float', nullable: true)]
    private ?float $nrPercMaxReprovacao = null;

    #[ORM\Column(name: 'dt_criacao_curriculo', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCriacaoCurriculo = null;

    #[ORM\Column(name: 'nr_minutos_relogio_hora_aula', type: 'smallint', nullable: true)]
    private ?int $nrMinutosRelogioHoraAula = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_valida_ch_serie', type: 'boolean', options: ['default' => '0'])]
    private bool $snValidaChSerie = false;

    #[ORM\Column(name: 'sn_valida_ch_relogio', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snValidaChRelogio = null;

    #[ORM\Column(name: 'nr_carga_relogio', type: 'integer', nullable: true)]
    private ?int $nrCargaRelogio = null;

    public function __construct(
        ?int $cdGrade = null,
        ?string $cdCurso = null,
        ?string $dsGrade = null,
        ?int $nrAnoInicial = null,
        string $snAtivo = 'S',
        ?int $nrCargaCurso = null,
        ?int $nrCargaAtividades = null,
        ?bool $snPadrao = false,
        ?float $nrPercMaxReprovacao = null,
        ?\DateTimeInterface $dtCriacaoCurriculo = null,
        ?int $nrMinutosRelogioHoraAula = null,
        ?\DateTimeInterface $dtBase = null,
        bool $snValidaChSerie = false,
        ?string $snValidaChRelogio = null,
        ?int $nrCargaRelogio = null
    ) {
        $this->cdGrade = $cdGrade;
        $this->cdCurso = $cdCurso;
        $this->dsGrade = $dsGrade;
        $this->nrAnoInicial = $nrAnoInicial;
        $this->snAtivo = $snAtivo;
        $this->nrCargaCurso = $nrCargaCurso;
        $this->nrCargaAtividades = $nrCargaAtividades;
        $this->snPadrao = $snPadrao;
        $this->nrPercMaxReprovacao = $nrPercMaxReprovacao;
        $this->dtCriacaoCurriculo = $dtCriacaoCurriculo;
        $this->nrMinutosRelogioHoraAula = $nrMinutosRelogioHoraAula;
        $this->dtBase = $dtBase;
        $this->snValidaChSerie = $snValidaChSerie;
        $this->snValidaChRelogio = $snValidaChRelogio;
        $this->nrCargaRelogio = $nrCargaRelogio;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getDsGrade(): ?string
    {
        return $this->dsGrade;
    }

    public function setDsGrade(?string $dsGrade): self
    {
        $this->dsGrade = $dsGrade;
        return $this;
    }

    public function getNrAnoInicial(): ?int
    {
        return $this->nrAnoInicial;
    }

    public function setNrAnoInicial(?int $nrAnoInicial): self
    {
        $this->nrAnoInicial = $nrAnoInicial;
        return $this;
    }

    public function getSnAtivo(): string
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(string $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNrCargaCurso(): ?int
    {
        return $this->nrCargaCurso;
    }

    public function setNrCargaCurso(?int $nrCargaCurso): self
    {
        $this->nrCargaCurso = $nrCargaCurso;
        return $this;
    }

    public function getNrCargaAtividades(): ?int
    {
        return $this->nrCargaAtividades;
    }

    public function setNrCargaAtividades(?int $nrCargaAtividades): self
    {
        $this->nrCargaAtividades = $nrCargaAtividades;
        return $this;
    }

    public function isSnPadrao(): ?bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(?bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }

    public function getNrPercMaxReprovacao(): ?float
    {
        return $this->nrPercMaxReprovacao;
    }

    public function setNrPercMaxReprovacao(?float $nrPercMaxReprovacao): self
    {
        $this->nrPercMaxReprovacao = $nrPercMaxReprovacao;
        return $this;
    }

    public function getDtCriacaoCurriculo(): ?\DateTimeInterface
    {
        return $this->dtCriacaoCurriculo;
    }

    public function setDtCriacaoCurriculo(?\DateTimeInterface $dtCriacaoCurriculo): self
    {
        $this->dtCriacaoCurriculo = $dtCriacaoCurriculo;
        return $this;
    }

    public function getNrMinutosRelogioHoraAula(): ?int
    {
        return $this->nrMinutosRelogioHoraAula;
    }

    public function setNrMinutosRelogioHoraAula(?int $nrMinutosRelogioHoraAula): self
    {
        $this->nrMinutosRelogioHoraAula = $nrMinutosRelogioHoraAula;
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

    public function isSnValidaChSerie(): bool
    {
        return $this->snValidaChSerie;
    }

    public function setSnValidaChSerie(bool $snValidaChSerie): self
    {
        $this->snValidaChSerie = $snValidaChSerie;
        return $this;
    }

    public function getSnValidaChRelogio(): ?string
    {
        return $this->snValidaChRelogio;
    }

    public function setSnValidaChRelogio(?string $snValidaChRelogio): self
    {
        $this->snValidaChRelogio = $snValidaChRelogio;
        return $this;
    }

    public function getNrCargaRelogio(): ?int
    {
        return $this->nrCargaRelogio;
    }

    public function setNrCargaRelogio(?int $nrCargaRelogio): self
    {
        $this->nrCargaRelogio = $nrCargaRelogio;
        return $this;
    }
}
