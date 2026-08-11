<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasAlteracoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasAlteracoesRepository::class)]
#[ORM\Table(
    name: 'diario_provas_alteracoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_BIMESTRE', columns: ['bimestre'])]
#[ORM\Index(name: 'IX_NRO_NOTA', columns: ['nro_nota'])]
#[ORM\Index(name: 'IX_CODALUNO', columns: ['codaluno'])]
class DiarioProvasAlteracoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alteracao', type: 'integer')]
    private ?int $cdAlteracao = null;

    #[ORM\Column(name: 'nro_nota', type: 'smallint', options: ['default' => '0'])]
    private int $nroNota = 0;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Column(name: 'disciplina', type: 'integer', options: ['default' => '0'])]
    private int $disciplina = 0;

    #[ORM\Column(name: 'bimestre', type: 'smallint', options: ['default' => '0'])]
    private int $bimestre = 0;

    #[ORM\Column(name: 'codaluno', type: 'integer', options: ['default' => '0'])]
    private int $codaluno = 0;

    #[ORM\Column(name: 'nr_nota_antiga', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrNotaAntiga = 0.0;

    #[ORM\Column(name: 'nr_nota_nova', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrNotaNova = 0.0;

    #[ORM\Column(name: 'cd_situacao', type: 'smallint', options: ['default' => '1'])]
    private int $cdSituacao = 1;

    #[ORM\Column(name: 'ds_requerimento', type: 'text', length: 65535)]
    private ?string $dsRequerimento = null;

    #[ORM\Column(name: 'ds_resposta', type: 'text', length: 65535, nullable: true)]
    private ?string $dsResposta = null;

    #[ORM\Column(name: 'nm_professor', type: 'string', length: 255, nullable: true)]
    private ?string $nmProfessor = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'dt_deferimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDeferimento = null;

    #[ORM\Column(name: 'sn_faltou_antigo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snFaltouAntigo = null;

    #[ORM\Column(name: 'sn_faltou_novo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snFaltouNovo = null;

    public function __construct(
        int $nroNota = 0,
        ?string $turma = null,
        int $anosemestre = 0,
        int $disciplina = 0,
        int $bimestre = 0,
        int $codaluno = 0,
        ?float $nrNotaAntiga = 0.0,
        ?float $nrNotaNova = 0.0,
        int $cdSituacao = 1,
        ?string $dsRequerimento = null,
        ?string $dsResposta = null,
        ?string $nmProfessor = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?\DateTimeInterface $dtDeferimento = null,
        ?int $snFaltouAntigo = null,
        ?int $snFaltouNovo = null
    ) {
        $this->nroNota = $nroNota;
        $this->turma = $turma;
        $this->anosemestre = $anosemestre;
        $this->disciplina = $disciplina;
        $this->bimestre = $bimestre;
        $this->codaluno = $codaluno;
        $this->nrNotaAntiga = $nrNotaAntiga;
        $this->nrNotaNova = $nrNotaNova;
        $this->cdSituacao = $cdSituacao;
        $this->dsRequerimento = $dsRequerimento;
        $this->dsResposta = $dsResposta;
        $this->nmProfessor = $nmProfessor;
        $this->dtAlteracao = $dtAlteracao;
        $this->dtDeferimento = $dtDeferimento;
        $this->snFaltouAntigo = $snFaltouAntigo;
        $this->snFaltouNovo = $snFaltouNovo;
    }

    public function getCdAlteracao(): ?int
    {
        return $this->cdAlteracao;
    }

    public function getNroNota(): int
    {
        return $this->nroNota;
    }

    public function setNroNota(int $nroNota): self
    {
        $this->nroNota = $nroNota;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDisciplina(): int
    {
        return $this->disciplina;
    }

    public function setDisciplina(int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getBimestre(): int
    {
        return $this->bimestre;
    }

    public function setBimestre(int $bimestre): self
    {
        $this->bimestre = $bimestre;
        return $this;
    }

    public function getCodaluno(): int
    {
        return $this->codaluno;
    }

    public function setCodaluno(int $codaluno): self
    {
        $this->codaluno = $codaluno;
        return $this;
    }

    public function getNrNotaAntiga(): ?float
    {
        return $this->nrNotaAntiga;
    }

    public function setNrNotaAntiga(?float $nrNotaAntiga): self
    {
        $this->nrNotaAntiga = $nrNotaAntiga;
        return $this;
    }

    public function getNrNotaNova(): ?float
    {
        return $this->nrNotaNova;
    }

    public function setNrNotaNova(?float $nrNotaNova): self
    {
        $this->nrNotaNova = $nrNotaNova;
        return $this;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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

    public function getDsResposta(): ?string
    {
        return $this->dsResposta;
    }

    public function setDsResposta(?string $dsResposta): self
    {
        $this->dsResposta = $dsResposta;
        return $this;
    }

    public function getNmProfessor(): ?string
    {
        return $this->nmProfessor;
    }

    public function setNmProfessor(?string $nmProfessor): self
    {
        $this->nmProfessor = $nmProfessor;
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

    public function getDtDeferimento(): ?\DateTimeInterface
    {
        return $this->dtDeferimento;
    }

    public function setDtDeferimento(?\DateTimeInterface $dtDeferimento): self
    {
        $this->dtDeferimento = $dtDeferimento;
        return $this;
    }

    public function getSnFaltouAntigo(): ?int
    {
        return $this->snFaltouAntigo;
    }

    public function setSnFaltouAntigo(?int $snFaltouAntigo): self
    {
        $this->snFaltouAntigo = $snFaltouAntigo;
        return $this;
    }

    public function getSnFaltouNovo(): ?int
    {
        return $this->snFaltouNovo;
    }

    public function setSnFaltouNovo(?int $snFaltouNovo): self
    {
        $this->snFaltouNovo = $snFaltouNovo;
        return $this;
    }
}
