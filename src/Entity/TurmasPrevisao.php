<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TurmasPrevisaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasPrevisaoRepository::class)]
#[ORM\Table(
    name: 'turmas_previsao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_CONTA_LCTO', columns: ['cd_conta_lcto'])]
class TurmasPrevisao
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_conta_lcto', type: 'string', length: 20, options: ['default' => ''])]
    private string $cdContaLcto = '';

    #[ORM\Column(name: 'vl_debito', type: 'float', nullable: true)]
    private ?float $vlDebito = null;

    #[ORM\Column(name: 'vl_credito', type: 'float', nullable: true)]
    private ?float $vlCredito = null;

    public function __construct(
        int $nrAnosemestre = 0,
        ?string $cdTurma = null,
        string $cdCurso = '',
        string $cdContaLcto = '',
        ?float $vlDebito = null,
        ?float $vlCredito = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdCurso = $cdCurso;
        $this->cdContaLcto = $cdContaLcto;
        $this->vlDebito = $vlDebito;
        $this->vlCredito = $vlCredito;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
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

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdContaLcto(): string
    {
        return $this->cdContaLcto;
    }

    public function setCdContaLcto(string $cdContaLcto): self
    {
        $this->cdContaLcto = $cdContaLcto;
        return $this;
    }

    public function getVlDebito(): ?float
    {
        return $this->vlDebito;
    }

    public function setVlDebito(?float $vlDebito): self
    {
        $this->vlDebito = $vlDebito;
        return $this;
    }

    public function getVlCredito(): ?float
    {
        return $this->vlCredito;
    }

    public function setVlCredito(?float $vlCredito): self
    {
        $this->vlCredito = $vlCredito;
        return $this;
    }
}
