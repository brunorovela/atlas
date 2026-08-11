<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TurmasDespesasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasDespesasRepository::class)]
#[ORM\Table(
    name: 'turmas_despesas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class TurmasDespesas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_despesa', type: 'integer')]
    private ?int $cdDespesa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrAnosemestre = 0;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_conta_lcto', type: 'string', length: 20, nullable: true)]
    private ?string $cdContaLcto = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 70, nullable: true, options: ['default' => '0'])]
    private ?string $dsHistorico = '0';

    #[ORM\Column(name: 'vl_despesa', type: 'float', nullable: true)]
    private ?float $vlDespesa = null;

    #[ORM\Column(name: 'dt_despesa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDespesa = null;

    public function __construct(
        ?int $nrAnosemestre = 0,
        ?string $cdTurma = null,
        ?string $cdCurso = null,
        ?string $cdContaLcto = null,
        ?string $dsHistorico = '0',
        ?float $vlDespesa = null,
        ?\DateTimeInterface $dtDespesa = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->cdContaLcto = $cdContaLcto;
        $this->dsHistorico = $dsHistorico;
        $this->vlDespesa = $vlDespesa;
        $this->dtDespesa = $dtDespesa;
    }

    public function getCdDespesa(): ?int
    {
        return $this->cdDespesa;
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

    public function getCdContaLcto(): ?string
    {
        return $this->cdContaLcto;
    }

    public function setCdContaLcto(?string $cdContaLcto): self
    {
        $this->cdContaLcto = $cdContaLcto;
        return $this;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }

    public function getVlDespesa(): ?float
    {
        return $this->vlDespesa;
    }

    public function setVlDespesa(?float $vlDespesa): self
    {
        $this->vlDespesa = $vlDespesa;
        return $this;
    }

    public function getDtDespesa(): ?\DateTimeInterface
    {
        return $this->dtDespesa;
    }

    public function setDtDespesa(?\DateTimeInterface $dtDespesa): self
    {
        $this->dtDespesa = $dtDespesa;
        return $this;
    }
}
