<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinRepasseParceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinRepasseParceiroRepository::class)]
#[ORM\Table(
    name: 'fin_repasse_parceiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ANOSEMESTRE_TURMA_ALUNO', columns: ['nr_anosemestre', 'cd_turma', 'cd_aluno'])]
class FinRepasseParceiro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_repasse_parceiro', type: 'integer')]
    private ?int $cdRepasseParceiro = null;

    #[ORM\Column(name: 'id_matricula', type: 'integer')]
    private ?int $idMatricula = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer')]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_vendedor', type: 'integer', nullable: true)]
    private ?int $cdVendedor = null;

    #[ORM\Column(name: 'vl_percentual', type: 'smallint', nullable: true)]
    private ?int $vlPercentual = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?int $idMatricula = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdAluno = null,
        ?int $cdVendedor = null,
        ?int $vlPercentual = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->idMatricula = $idMatricula;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdAluno = $cdAluno;
        $this->cdVendedor = $cdVendedor;
        $this->vlPercentual = $vlPercentual;
        $this->dtInclusao = $dtInclusao;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdRepasseParceiro(): ?int
    {
        return $this->cdRepasseParceiro;
    }

    public function getIdMatricula(): ?int
    {
        return $this->idMatricula;
    }

    public function setIdMatricula(?int $idMatricula): self
    {
        $this->idMatricula = $idMatricula;
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

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getCdVendedor(): ?int
    {
        return $this->cdVendedor;
    }

    public function setCdVendedor(?int $cdVendedor): self
    {
        $this->cdVendedor = $cdVendedor;
        return $this;
    }

    public function getVlPercentual(): ?int
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?int $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}
