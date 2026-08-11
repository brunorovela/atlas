<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasPareceresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasPareceresRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_pareceres',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_parecer', columns: ['cd_parecer'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_LIMITE', columns: ['cd_limite'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_NOTIFICACAO', columns: ['cd_notificacao'])]
class OcorrenciasPareceres
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parecer', type: 'integer')]
    private ?int $cdParecer = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer')]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'sn_aberto', type: 'smallint', options: ['default' => '1'])]
    private int $snAberto = 1;

    #[ORM\Column(name: 'dt_abertura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAbertura = null;

    #[ORM\Column(name: 'dt_encerramento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEncerramento = null;

    #[ORM\Column(name: 'dt_finalizado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinalizado = null;

    #[ORM\Column(name: 'cd_limite', type: 'integer')]
    private ?int $cdLimite = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_notificacao', type: 'integer', nullable: true)]
    private ?int $cdNotificacao = null;

    public function __construct(
        ?int $cdAluno = null,
        ?string $cdCurso = null,
        int $snAberto = 1,
        ?\DateTimeInterface $dtAbertura = null,
        ?\DateTimeInterface $dtEncerramento = null,
        ?\DateTimeInterface $dtFinalizado = null,
        ?int $cdLimite = null,
        ?int $nrAnosemestre = null,
        ?int $cdNotificacao = null
    ) {
        $this->cdAluno = $cdAluno;
        $this->cdCurso = $cdCurso;
        $this->snAberto = $snAberto;
        $this->dtAbertura = $dtAbertura;
        $this->dtEncerramento = $dtEncerramento;
        $this->dtFinalizado = $dtFinalizado;
        $this->cdLimite = $cdLimite;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdNotificacao = $cdNotificacao;
    }

    public function getCdParecer(): ?int
    {
        return $this->cdParecer;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
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

    public function getSnAberto(): int
    {
        return $this->snAberto;
    }

    public function setSnAberto(int $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }

    public function getDtAbertura(): ?\DateTimeInterface
    {
        return $this->dtAbertura;
    }

    public function setDtAbertura(?\DateTimeInterface $dtAbertura): self
    {
        $this->dtAbertura = $dtAbertura;
        return $this;
    }

    public function getDtEncerramento(): ?\DateTimeInterface
    {
        return $this->dtEncerramento;
    }

    public function setDtEncerramento(?\DateTimeInterface $dtEncerramento): self
    {
        $this->dtEncerramento = $dtEncerramento;
        return $this;
    }

    public function getDtFinalizado(): ?\DateTimeInterface
    {
        return $this->dtFinalizado;
    }

    public function setDtFinalizado(?\DateTimeInterface $dtFinalizado): self
    {
        $this->dtFinalizado = $dtFinalizado;
        return $this;
    }

    public function getCdLimite(): ?int
    {
        return $this->cdLimite;
    }

    public function setCdLimite(?int $cdLimite): self
    {
        $this->cdLimite = $cdLimite;
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

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function setCdNotificacao(?int $cdNotificacao): self
    {
        $this->cdNotificacao = $cdNotificacao;
        return $this;
    }
}
