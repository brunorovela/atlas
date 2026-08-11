<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogInscricaoPersonalizadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogInscricaoPersonalizadaRepository::class)]
#[ORM\Table(
    name: 'log_inscricao_personalizada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class LogInscricaoPersonalizada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log_inscricao', type: 'integer')]
    private ?int $cdLogInscricao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'string', length: 5, nullable: true)]
    private ?string $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?string $nrAnosemestre = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $dsDescricao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtLog = $dtLog;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdLogInscricao(): ?int
    {
        return $this->cdLogInscricao;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getNrAnosemestre(): ?string
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?string $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
