<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintProvasQuestoesDisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasQuestoesDisRepository::class)]
#[ORM\Table(
    name: 'pint_provas_questoes_dis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PintProvasQuestoesDis
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_aprovado', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAprovado = null;

    #[ORM\Column(name: 'sn_selecionada_primeira', type: TinyIntType::NAME, nullable: true)]
    private ?int $snSelecionadaPrimeira = null;

    #[ORM\Column(name: 'sn_selecionada_segunda', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snSelecionadaSegunda = 0;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $cdDisciplina = null,
        ?int $cdProva = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?int $snAprovado = null,
        ?int $snSelecionadaPrimeira = null,
        int $snSelecionadaSegunda = 0
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProva = $cdProva;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->snAprovado = $snAprovado;
        $this->snSelecionadaPrimeira = $snSelecionadaPrimeira;
        $this->snSelecionadaSegunda = $snSelecionadaSegunda;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
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

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getSnAprovado(): ?int
    {
        return $this->snAprovado;
    }

    public function setSnAprovado(?int $snAprovado): self
    {
        $this->snAprovado = $snAprovado;
        return $this;
    }

    public function getSnSelecionadaPrimeira(): ?int
    {
        return $this->snSelecionadaPrimeira;
    }

    public function setSnSelecionadaPrimeira(?int $snSelecionadaPrimeira): self
    {
        $this->snSelecionadaPrimeira = $snSelecionadaPrimeira;
        return $this;
    }

    public function getSnSelecionadaSegunda(): int
    {
        return $this->snSelecionadaSegunda;
    }

    public function setSnSelecionadaSegunda(int $snSelecionadaSegunda): self
    {
        $this->snSelecionadaSegunda = $snSelecionadaSegunda;
        return $this;
    }
}
