<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IesdeGradeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeGradeRepository::class)]
#[ORM\Table(
    name: 'iesde_grade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IesdeGrade
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_grade_iesde', type: 'integer')]
    private ?int $cdGradeIesde = null;

    #[ORM\Column(name: 'cd_curso', type: 'integer', nullable: true)]
    private ?int $cdCurso = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'nr_carga_horaria', type: 'integer', nullable: true)]
    private ?int $nrCargaHoraria = null;

    #[ORM\Column(name: 'nr_num_modulos', type: 'integer', nullable: true)]
    private ?int $nrNumModulos = null;

    #[ORM\Column(name: 'nr_duracao_meses', type: 'integer', nullable: true)]
    private ?int $nrDuracaoMeses = null;

    #[ORM\Column(name: 'modalidade', type: 'integer', nullable: true)]
    private ?int $modalidade = null;

    #[ORM\Column(name: 'situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $situacao = null;

    public function __construct(
        ?int $cdGradeIesde = null,
        ?int $cdCurso = null,
        ?string $dsCurso = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?int $nrCargaHoraria = null,
        ?int $nrNumModulos = null,
        ?int $nrDuracaoMeses = null,
        ?int $modalidade = null,
        ?string $situacao = null
    ) {
        $this->cdGradeIesde = $cdGradeIesde;
        $this->cdCurso = $cdCurso;
        $this->dsCurso = $dsCurso;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->nrCargaHoraria = $nrCargaHoraria;
        $this->nrNumModulos = $nrNumModulos;
        $this->nrDuracaoMeses = $nrDuracaoMeses;
        $this->modalidade = $modalidade;
        $this->situacao = $situacao;
    }

    public function getCdGradeIesde(): ?int
    {
        return $this->cdGradeIesde;
    }

    public function setCdGradeIesde(?int $cdGradeIesde): self
    {
        $this->cdGradeIesde = $cdGradeIesde;
        return $this;
    }

    public function getCdCurso(): ?int
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?int $cdCurso): self
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

    public function getNrCargaHoraria(): ?int
    {
        return $this->nrCargaHoraria;
    }

    public function setNrCargaHoraria(?int $nrCargaHoraria): self
    {
        $this->nrCargaHoraria = $nrCargaHoraria;
        return $this;
    }

    public function getNrNumModulos(): ?int
    {
        return $this->nrNumModulos;
    }

    public function setNrNumModulos(?int $nrNumModulos): self
    {
        $this->nrNumModulos = $nrNumModulos;
        return $this;
    }

    public function getNrDuracaoMeses(): ?int
    {
        return $this->nrDuracaoMeses;
    }

    public function setNrDuracaoMeses(?int $nrDuracaoMeses): self
    {
        $this->nrDuracaoMeses = $nrDuracaoMeses;
        return $this;
    }

    public function getModalidade(): ?int
    {
        return $this->modalidade;
    }

    public function setModalidade(?int $modalidade): self
    {
        $this->modalidade = $modalidade;
        return $this;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }
}
