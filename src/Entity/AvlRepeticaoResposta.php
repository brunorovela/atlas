<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlRepeticaoRespostaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlRepeticaoRespostaRepository::class)]
#[ORM\Table(
    name: 'avl_repeticao_resposta',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_REPETICAO', columns: ['cd_repeticao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class AvlRepeticaoResposta
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_repeticao_resposta', type: 'integer')]
    private ?int $cdRepeticaoResposta = null;

    #[ORM\Column(name: 'cd_repeticao', type: 'integer')]
    private ?int $cdRepeticao = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'ds_turma', type: 'string', length: 255, nullable: true)]
    private ?string $dsTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'ds_disciplina', type: 'string', length: 150, nullable: true)]
    private ?string $dsDisciplina = null;

    #[ORM\Column(name: 'ds_disciplinas', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDisciplinas = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 60, nullable: true)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true)]
    private ?int $cdSituacao = null;

    public function __construct(
        ?int $cdRepeticao = null,
        ?string $cdCurso = null,
        ?string $dsCurso = null,
        ?string $cdTurma = null,
        ?string $dsTurma = null,
        ?int $cdDisciplina = null,
        ?string $dsDisciplina = null,
        ?string $dsDisciplinas = null,
        ?int $cdPessoa = null,
        ?string $nmPessoa = null,
        ?int $cdSituacao = null
    ) {
        $this->cdRepeticao = $cdRepeticao;
        $this->cdCurso = $cdCurso;
        $this->dsCurso = $dsCurso;
        $this->cdTurma = $cdTurma;
        $this->dsTurma = $dsTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->dsDisciplina = $dsDisciplina;
        $this->dsDisciplinas = $dsDisciplinas;
        $this->cdPessoa = $cdPessoa;
        $this->nmPessoa = $nmPessoa;
        $this->cdSituacao = $cdSituacao;
    }

    public function getCdRepeticaoResposta(): ?int
    {
        return $this->cdRepeticaoResposta;
    }

    public function getCdRepeticao(): ?int
    {
        return $this->cdRepeticao;
    }

    public function setCdRepeticao(?int $cdRepeticao): self
    {
        $this->cdRepeticao = $cdRepeticao;
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

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
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

    public function getDsTurma(): ?string
    {
        return $this->dsTurma;
    }

    public function setDsTurma(?string $dsTurma): self
    {
        $this->dsTurma = $dsTurma;
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

    public function getDsDisciplina(): ?string
    {
        return $this->dsDisciplina;
    }

    public function setDsDisciplina(?string $dsDisciplina): self
    {
        $this->dsDisciplina = $dsDisciplina;
        return $this;
    }

    public function getDsDisciplinas(): ?string
    {
        return $this->dsDisciplinas;
    }

    public function setDsDisciplinas(?string $dsDisciplinas): self
    {
        $this->dsDisciplinas = $dsDisciplinas;
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

    public function getNmPessoa(): ?string
    {
        return $this->nmPessoa;
    }

    public function setNmPessoa(?string $nmPessoa): self
    {
        $this->nmPessoa = $nmPessoa;
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
}
