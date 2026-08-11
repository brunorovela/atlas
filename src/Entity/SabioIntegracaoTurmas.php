<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SabioIntegracaoTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SabioIntegracaoTurmasRepository::class)]
#[ORM\Table(
    name: 'sabio_integracao_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SabioIntegracaoTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'nr_integracao', type: 'integer')]
    private ?int $nrIntegracao = null;

    #[ORM\Column(name: 'cd_turma', type: 'integer')]
    private ?int $cdTurma = null;

    #[ORM\Column(name: 'nr_anosem', type: 'integer')]
    private ?int $nrAnosem = null;

    #[ORM\Column(name: 'ds_codigo', type: 'string', length: 50)]
    private ?string $dsCodigo = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_grau', type: 'smallint', nullable: true)]
    private ?int $cdGrau = null;

    #[ORM\Column(name: 'nr_serie', type: 'smallint', nullable: true)]
    private ?int $nrSerie = null;

    #[ORM\Column(name: 'ds_turno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsTurno = null;

    #[ORM\Column(name: 'ds_desc', type: 'string', length: 255)]
    private ?string $dsDesc = null;

    #[ORM\Column(name: 'fl_acao', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $flAcao = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    public function __construct(
        ?int $cdTurma = null,
        ?int $nrAnosem = null,
        ?string $dsCodigo = null,
        ?string $cdCurso = null,
        ?int $cdGrau = null,
        ?int $nrSerie = null,
        ?string $dsTurno = null,
        ?string $dsDesc = null,
        ?string $flAcao = null,
        ?\DateTimeInterface $dtRegistro = null
    ) {
        $this->cdTurma = $cdTurma;
        $this->nrAnosem = $nrAnosem;
        $this->dsCodigo = $dsCodigo;
        $this->cdCurso = $cdCurso;
        $this->cdGrau = $cdGrau;
        $this->nrSerie = $nrSerie;
        $this->dsTurno = $dsTurno;
        $this->dsDesc = $dsDesc;
        $this->flAcao = $flAcao;
        $this->dtRegistro = $dtRegistro;
    }

    public function getNrIntegracao(): ?int
    {
        return $this->nrIntegracao;
    }

    public function getCdTurma(): ?int
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?int $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }

    public function getDsCodigo(): ?string
    {
        return $this->dsCodigo;
    }

    public function setDsCodigo(?string $dsCodigo): self
    {
        $this->dsCodigo = $dsCodigo;
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

    public function getCdGrau(): ?int
    {
        return $this->cdGrau;
    }

    public function setCdGrau(?int $cdGrau): self
    {
        $this->cdGrau = $cdGrau;
        return $this;
    }

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
        return $this;
    }

    public function getDsTurno(): ?string
    {
        return $this->dsTurno;
    }

    public function setDsTurno(?string $dsTurno): self
    {
        $this->dsTurno = $dsTurno;
        return $this;
    }

    public function getDsDesc(): ?string
    {
        return $this->dsDesc;
    }

    public function setDsDesc(?string $dsDesc): self
    {
        $this->dsDesc = $dsDesc;
        return $this;
    }

    public function getFlAcao(): ?string
    {
        return $this->flAcao;
    }

    public function setFlAcao(?string $flAcao): self
    {
        $this->flAcao = $flAcao;
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
}
