<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DisciplinasPrereqEspecialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasPrereqEspecialRepository::class)]
#[ORM\Table(
    name: 'disciplinas_prereq_especial',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK__disciplinas_tipos_req', columns: ['cd_tipo_req'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_GRADE', columns: ['cd_grade'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_TIPO_REQ', columns: ['cd_tipo_req'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK__disciplinas_tipos_req', 'colunas' => ['cd_tipo_req'], 'tabelaAlvo' => 'disciplinas_tipos_req', 'colunasAlvo' => ['cd_tipo_req'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DisciplinasPrereqEspecial
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grade', type: 'integer')]
    private ?int $cdGrade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: DisciplinasTiposReq::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_req', referencedColumnName: 'cd_tipo_req', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?DisciplinasTiposReq $cdTipoReq = null;

    public function __construct(
        ?string $cdCurso = null,
        ?int $cdGrade = null,
        ?int $cdDisciplina = null,
        ?DisciplinasTiposReq $cdTipoReq = null
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdGrade = $cdGrade;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdTipoReq = $cdTipoReq;
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

    public function getCdGrade(): ?int
    {
        return $this->cdGrade;
    }

    public function setCdGrade(?int $cdGrade): self
    {
        $this->cdGrade = $cdGrade;
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

    public function getCdTipoReq(): ?DisciplinasTiposReq
    {
        return $this->cdTipoReq;
    }

    public function setCdTipoReq(?DisciplinasTiposReq $cdTipoReq): self
    {
        $this->cdTipoReq = $cdTipoReq;
        return $this;
    }
}
