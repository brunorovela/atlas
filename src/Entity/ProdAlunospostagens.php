<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProdAlunospostagensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdAlunospostagensRepository::class)]
#[ORM\Table(
    name: 'prod_alunospostagens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idx_unique', columns: ['cd_processo', 'cd_turma', 'cd_disciplina', 'cd_aluno', 'nr_anosemestre', 'dt_postagem'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_DT_POSTAGEM', columns: ['dt_postagem'])]
class ProdAlunospostagens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_postagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPostagem = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_postagem', type: 'datetime')]
    private ?\DateTimeInterface $dtPostagem = null;

    #[ORM\Column(name: 'cd_origem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOrigem = null;

    #[ORM\Column(name: 'me_comentario', type: 'text', length: 65535, nullable: true)]
    private ?string $meComentario = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdAluno = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtPostagem = null,
        ?int $cdOrigem = null,
        ?string $meComentario = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdAluno = $cdAluno;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtPostagem = $dtPostagem;
        $this->cdOrigem = $cdOrigem;
        $this->meComentario = $meComentario;
    }

    public function getCdPostagem(): ?int
    {
        return $this->cdPostagem;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
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

    public function getDtPostagem(): ?\DateTimeInterface
    {
        return $this->dtPostagem;
    }

    public function setDtPostagem(?\DateTimeInterface $dtPostagem): self
    {
        $this->dtPostagem = $dtPostagem;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getMeComentario(): ?string
    {
        return $this->meComentario;
    }

    public function setMeComentario(?string $meComentario): self
    {
        $this->meComentario = $meComentario;
        return $this;
    }
}
