<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlResolucaoPrazoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlResolucaoPrazoRepository::class)]
#[ORM\Table(
    name: 'avl_resolucao_prazo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'tabela para armazenar o  prazo para resolucao da avliacao po']
)]
#[ORM\Index(name: 'IX_DT_INICIO', columns: ['dt_inicio'])]
#[ORM\Index(name: 'IX_DT_FIM', columns: ['dt_fim'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class AvlResolucaoPrazo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_avaliacao', type: 'integer')]
    private ?int $cdAvaliacao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 255)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime')]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'me_resultado', type: 'text', length: 16777215, nullable: true)]
    private ?string $meResultado = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdAvaliacao = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?string $meResultado = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->meResultado = $meResultado;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtBase = $dtBase;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
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

    public function getMeResultado(): ?string
    {
        return $this->meResultado;
    }

    public function setMeResultado(?string $meResultado): self
    {
        $this->meResultado = $meResultado;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
