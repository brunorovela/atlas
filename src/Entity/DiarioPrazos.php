<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioPrazosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioPrazosRepository::class)]
#[ORM\Table(
    name: 'diario_prazos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DiarioPrazos
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_etapa', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrEtapa = 1;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'dt_baixa_inicio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtBaixaInicio = null;

    #[ORM\Column(name: 'dt_baixa_fim', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtBaixaFim = null;

    #[ORM\Column(name: 'dt_envio_inicio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtEnvioInicio = null;

    #[ORM\Column(name: 'dt_envio_fim', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtEnvioFim = null;

    #[ORM\Column(name: 'dt_exame_inicio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtExameInicio = null;

    #[ORM\Column(name: 'dt_exame_fim', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtExameFim = null;

    #[ORM\Column(name: 'dt_notas_inicio', type: 'datetime', options: ['default' => '2000-01-01 00:00:00'])]
    private ?\DateTimeInterface $dtNotasInicio = null;

    #[ORM\Column(name: 'sn_recuperacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snRecuperacao = 0;

    #[ORM\Column(name: 'nm_recuperacao', type: 'string', length: 50, nullable: true)]
    private ?string $nmRecuperacao = null;

    #[ORM\Column(name: 'cd_prova_tipo', type: 'integer', options: ['default' => '1'])]
    private int $cdProvaTipo = 1;

    #[ORM\Column(name: 'sn_ocultar_provas', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snOcultarProvas = 0;

    #[ORM\Column(name: 'dt_2epoca_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dt2epocaInicio = null;

    #[ORM\Column(name: 'dt_2epoca_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dt2epocaFim = null;

    public function __construct(
        int $nrAnosemestre = 0,
        string $cdCurso = '',
        ?string $cdTurma = null,
        int $nrEtapa = 1,
        ?int $cdDisciplina = null,
        ?\DateTimeInterface $dtBaixaInicio = null,
        ?\DateTimeInterface $dtBaixaFim = null,
        ?\DateTimeInterface $dtEnvioInicio = null,
        ?\DateTimeInterface $dtEnvioFim = null,
        ?\DateTimeInterface $dtExameInicio = null,
        ?\DateTimeInterface $dtExameFim = null,
        ?\DateTimeInterface $dtNotasInicio = null,
        ?int $snRecuperacao = 0,
        ?string $nmRecuperacao = null,
        int $cdProvaTipo = 1,
        ?int $snOcultarProvas = 0,
        ?\DateTimeInterface $dt2epocaInicio = null,
        ?\DateTimeInterface $dt2epocaFim = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrEtapa = $nrEtapa;
        $this->cdDisciplina = $cdDisciplina;
        $this->dtBaixaInicio = $dtBaixaInicio;
        $this->dtBaixaFim = $dtBaixaFim;
        $this->dtEnvioInicio = $dtEnvioInicio;
        $this->dtEnvioFim = $dtEnvioFim;
        $this->dtExameInicio = $dtExameInicio;
        $this->dtExameFim = $dtExameFim;
        $this->dtNotasInicio = $dtNotasInicio;
        $this->snRecuperacao = $snRecuperacao;
        $this->nmRecuperacao = $nmRecuperacao;
        $this->cdProvaTipo = $cdProvaTipo;
        $this->snOcultarProvas = $snOcultarProvas;
        $this->dt2epocaInicio = $dt2epocaInicio;
        $this->dt2epocaFim = $dt2epocaFim;
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

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrEtapa(): int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getDtBaixaInicio(): ?\DateTimeInterface
    {
        return $this->dtBaixaInicio;
    }

    public function setDtBaixaInicio(?\DateTimeInterface $dtBaixaInicio): self
    {
        $this->dtBaixaInicio = $dtBaixaInicio;
        return $this;
    }

    public function getDtBaixaFim(): ?\DateTimeInterface
    {
        return $this->dtBaixaFim;
    }

    public function setDtBaixaFim(?\DateTimeInterface $dtBaixaFim): self
    {
        $this->dtBaixaFim = $dtBaixaFim;
        return $this;
    }

    public function getDtEnvioInicio(): ?\DateTimeInterface
    {
        return $this->dtEnvioInicio;
    }

    public function setDtEnvioInicio(?\DateTimeInterface $dtEnvioInicio): self
    {
        $this->dtEnvioInicio = $dtEnvioInicio;
        return $this;
    }

    public function getDtEnvioFim(): ?\DateTimeInterface
    {
        return $this->dtEnvioFim;
    }

    public function setDtEnvioFim(?\DateTimeInterface $dtEnvioFim): self
    {
        $this->dtEnvioFim = $dtEnvioFim;
        return $this;
    }

    public function getDtExameInicio(): ?\DateTimeInterface
    {
        return $this->dtExameInicio;
    }

    public function setDtExameInicio(?\DateTimeInterface $dtExameInicio): self
    {
        $this->dtExameInicio = $dtExameInicio;
        return $this;
    }

    public function getDtExameFim(): ?\DateTimeInterface
    {
        return $this->dtExameFim;
    }

    public function setDtExameFim(?\DateTimeInterface $dtExameFim): self
    {
        $this->dtExameFim = $dtExameFim;
        return $this;
    }

    public function getDtNotasInicio(): ?\DateTimeInterface
    {
        return $this->dtNotasInicio;
    }

    public function setDtNotasInicio(?\DateTimeInterface $dtNotasInicio): self
    {
        $this->dtNotasInicio = $dtNotasInicio;
        return $this;
    }

    public function getSnRecuperacao(): ?int
    {
        return $this->snRecuperacao;
    }

    public function setSnRecuperacao(?int $snRecuperacao): self
    {
        $this->snRecuperacao = $snRecuperacao;
        return $this;
    }

    public function getNmRecuperacao(): ?string
    {
        return $this->nmRecuperacao;
    }

    public function setNmRecuperacao(?string $nmRecuperacao): self
    {
        $this->nmRecuperacao = $nmRecuperacao;
        return $this;
    }

    public function getCdProvaTipo(): int
    {
        return $this->cdProvaTipo;
    }

    public function setCdProvaTipo(int $cdProvaTipo): self
    {
        $this->cdProvaTipo = $cdProvaTipo;
        return $this;
    }

    public function getSnOcultarProvas(): ?int
    {
        return $this->snOcultarProvas;
    }

    public function setSnOcultarProvas(?int $snOcultarProvas): self
    {
        $this->snOcultarProvas = $snOcultarProvas;
        return $this;
    }

    public function getDt2epocaInicio(): ?\DateTimeInterface
    {
        return $this->dt2epocaInicio;
    }

    public function setDt2epocaInicio(?\DateTimeInterface $dt2epocaInicio): self
    {
        $this->dt2epocaInicio = $dt2epocaInicio;
        return $this;
    }

    public function getDt2epocaFim(): ?\DateTimeInterface
    {
        return $this->dt2epocaFim;
    }

    public function setDt2epocaFim(?\DateTimeInterface $dt2epocaFim): self
    {
        $this->dt2epocaFim = $dt2epocaFim;
        return $this;
    }
}
