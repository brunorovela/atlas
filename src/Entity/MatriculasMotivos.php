<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MatriculasMotivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculasMotivosRepository::class)]
#[ORM\Table(
    name: 'matriculas_motivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
class MatriculasMotivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula_motivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMatriculaMotivo = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['fixed' => true])]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime')]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'tx_motivo', type: 'text', length: 65535)]
    private ?string $txMotivo = null;

    #[ORM\Column(name: 'cd_motivo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMotivo = null;

    public function __construct(
        ?int $cdUsuario = null,
        ?int $cdPessoa = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?int $cdSituacao = null,
        ?string $txMotivo = null,
        ?int $cdMotivo = null
    ) {
        $this->cdUsuario = $cdUsuario;
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->dtRegistro = $dtRegistro;
        $this->cdSituacao = $cdSituacao;
        $this->txMotivo = $txMotivo;
        $this->cdMotivo = $cdMotivo;
    }

    public function getCdMatriculaMotivo(): ?int
    {
        return $this->cdMatriculaMotivo;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getTxMotivo(): ?string
    {
        return $this->txMotivo;
    }

    public function setTxMotivo(?string $txMotivo): self
    {
        $this->txMotivo = $txMotivo;
        return $this;
    }

    public function getCdMotivo(): ?int
    {
        return $this->cdMotivo;
    }

    public function setCdMotivo(?int $cdMotivo): self
    {
        $this->cdMotivo = $cdMotivo;
        return $this;
    }
}
