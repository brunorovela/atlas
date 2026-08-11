<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasDeferimentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasDeferimentosRepository::class)]
#[ORM\Table(
    name: 'diario_provas_deferimentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_BIMESTRE', columns: ['cd_bimestre'])]
#[ORM\Index(name: 'IX_NR_PROVA', columns: ['nr_prova'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class DiarioProvasDeferimentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_deferimento', type: 'integer')]
    private ?int $cdDeferimento = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_bimestre', type: 'smallint')]
    private ?int $cdBimestre = null;

    #[ORM\Column(name: 'nr_prova', type: 'integer')]
    private ?int $nrProva = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer')]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'vl_nota_anterior', type: 'float', nullable: true)]
    private ?float $vlNotaAnterior = null;

    #[ORM\Column(name: 'vl_nota_deferir', type: 'float', nullable: true)]
    private ?float $vlNotaDeferir = null;

    #[ORM\Column(name: 'sn_faltou_anterior', type: TinyIntType::NAME, nullable: true)]
    private ?int $snFaltouAnterior = null;

    #[ORM\Column(name: 'sn_faltou_deferir', type: TinyIntType::NAME, nullable: true)]
    private ?int $snFaltouDeferir = null;

    #[ORM\Column(name: 'sn_deferida', type: TinyIntType::NAME)]
    private ?int $snDeferida = null;

    #[ORM\Column(name: 'ds_motivo', type: 'text', length: 65535)]
    private ?string $dsMotivo = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?int $cdDisciplina = null,
        ?int $cdBimestre = null,
        ?int $nrProva = null,
        ?int $cdProfessor = null,
        ?float $vlNotaAnterior = null,
        ?float $vlNotaDeferir = null,
        ?int $snFaltouAnterior = null,
        ?int $snFaltouDeferir = null,
        ?int $snDeferida = null,
        ?string $dsMotivo = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrProva = $nrProva;
        $this->cdProfessor = $cdProfessor;
        $this->vlNotaAnterior = $vlNotaAnterior;
        $this->vlNotaDeferir = $vlNotaDeferir;
        $this->snFaltouAnterior = $snFaltouAnterior;
        $this->snFaltouDeferir = $snFaltouDeferir;
        $this->snDeferida = $snDeferida;
        $this->dsMotivo = $dsMotivo;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdDeferimento(): ?int
    {
        return $this->cdDeferimento;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdBimestre(): ?int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(?int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrProva(): ?int
    {
        return $this->nrProva;
    }

    public function setNrProva(?int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getVlNotaAnterior(): ?float
    {
        return $this->vlNotaAnterior;
    }

    public function setVlNotaAnterior(?float $vlNotaAnterior): self
    {
        $this->vlNotaAnterior = $vlNotaAnterior;
        return $this;
    }

    public function getVlNotaDeferir(): ?float
    {
        return $this->vlNotaDeferir;
    }

    public function setVlNotaDeferir(?float $vlNotaDeferir): self
    {
        $this->vlNotaDeferir = $vlNotaDeferir;
        return $this;
    }

    public function getSnFaltouAnterior(): ?int
    {
        return $this->snFaltouAnterior;
    }

    public function setSnFaltouAnterior(?int $snFaltouAnterior): self
    {
        $this->snFaltouAnterior = $snFaltouAnterior;
        return $this;
    }

    public function getSnFaltouDeferir(): ?int
    {
        return $this->snFaltouDeferir;
    }

    public function setSnFaltouDeferir(?int $snFaltouDeferir): self
    {
        $this->snFaltouDeferir = $snFaltouDeferir;
        return $this;
    }

    public function getSnDeferida(): ?int
    {
        return $this->snDeferida;
    }

    public function setSnDeferida(?int $snDeferida): self
    {
        $this->snDeferida = $snDeferida;
        return $this;
    }

    public function getDsMotivo(): ?string
    {
        return $this->dsMotivo;
    }

    public function setDsMotivo(?string $dsMotivo): self
    {
        $this->dsMotivo = $dsMotivo;
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
}
