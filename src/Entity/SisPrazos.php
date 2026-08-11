<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SisPrazosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SisPrazosRepository::class)]
#[ORM\Table(
    name: 'sis_prazos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
class SisPrazos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prazo', type: 'integer')]
    private ?int $cdPrazo = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true)]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_depto', type: 'integer', nullable: true)]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 50, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer', nullable: true)]
    private ?int $cdTipoDocumento = null;

    public function __construct(
        ?int $cdModulo = null,
        ?int $cdAcao = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?int $nrAnosemestre = null,
        ?int $cdDepto = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?bool $snAtivo = null,
        ?int $cdTipoDocumento = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->cdAcao = $cdAcao;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdDepto = $cdDepto;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->snAtivo = $snAtivo;
        $this->cdTipoDocumento = $cdTipoDocumento;
    }

    public function getCdPrazo(): ?int
    {
        return $this->cdPrazo;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdTipoDocumento(): ?int
    {
        return $this->cdTipoDocumento;
    }

    public function setCdTipoDocumento(?int $cdTipoDocumento): self
    {
        $this->cdTipoDocumento = $cdTipoDocumento;
        return $this;
    }
}
