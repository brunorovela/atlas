<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IesdeDisciplinaOriginalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeDisciplinaOriginalRepository::class)]
#[ORM\Table(
    name: 'iesde_disciplina_original',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Disciplinas originais da IESDE - integracao']
)]
class IesdeDisciplinaOriginal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_codigo_iesde', type: 'string', length: 255, nullable: true)]
    private ?string $nrCodigoIesde = null;

    #[ORM\Column(name: 'ds_disciplina', type: 'string', length: 255, nullable: true)]
    private ?string $dsDisciplina = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'cd_curso_iesde', type: 'bigint', nullable: true)]
    private ?string $cdCursoIesde = null;

    #[ORM\Column(name: 'cd_grade_iesde', type: 'bigint', nullable: true)]
    private ?string $cdGradeIesde = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    public function __construct(
        ?string $nrCodigoIesde = null,
        ?string $dsDisciplina = null,
        ?string $dsTipo = null,
        ?string $cdCursoIesde = null,
        ?string $cdGradeIesde = null,
        ?bool $snAtivo = null
    ) {
        $this->nrCodigoIesde = $nrCodigoIesde;
        $this->dsDisciplina = $dsDisciplina;
        $this->dsTipo = $dsTipo;
        $this->cdCursoIesde = $cdCursoIesde;
        $this->cdGradeIesde = $cdGradeIesde;
        $this->snAtivo = $snAtivo;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function getNrCodigoIesde(): ?string
    {
        return $this->nrCodigoIesde;
    }

    public function setNrCodigoIesde(?string $nrCodigoIesde): self
    {
        $this->nrCodigoIesde = $nrCodigoIesde;
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

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getCdCursoIesde(): ?string
    {
        return $this->cdCursoIesde;
    }

    public function setCdCursoIesde(?string $cdCursoIesde): self
    {
        $this->cdCursoIesde = $cdCursoIesde;
        return $this;
    }

    public function getCdGradeIesde(): ?string
    {
        return $this->cdGradeIesde;
    }

    public function setCdGradeIesde(?string $cdGradeIesde): self
    {
        $this->cdGradeIesde = $cdGradeIesde;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
