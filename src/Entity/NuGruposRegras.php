<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuGruposRegrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposRegrasRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_regras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo_regra', columns: ['cd_grupo_regra'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_SERIE', columns: ['nr_serie'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class NuGruposRegras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_regra', type: 'integer')]
    private ?int $cdGrupoRegra = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_departamento', type: 'smallint', nullable: true)]
    private ?int $cdDepartamento = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_serie', type: 'integer', nullable: true)]
    private ?int $nrSerie = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'sn_professores', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snProfessores = 0;

    #[ORM\Column(name: 'sn_estudantes', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snEstudantes = 1;

    #[ORM\Column(name: 'ds_regra', type: 'string', length: 255, nullable: true)]
    private ?string $dsRegra = null;

    #[ORM\Column(name: 'sn_excluir', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExcluir = false;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdDepartamento = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $nrSerie = null,
        ?int $cdDisciplina = null,
        ?int $nrAnosemestre = null,
        int $snAtivo = 1,
        int $snProfessores = 0,
        int $snEstudantes = 1,
        ?string $dsRegra = null,
        ?bool $snExcluir = false
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdDepartamento = $cdDepartamento;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->nrSerie = $nrSerie;
        $this->cdDisciplina = $cdDisciplina;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->snAtivo = $snAtivo;
        $this->snProfessores = $snProfessores;
        $this->snEstudantes = $snEstudantes;
        $this->dsRegra = $dsRegra;
        $this->snExcluir = $snExcluir;
    }

    public function getCdGrupoRegra(): ?int
    {
        return $this->cdGrupoRegra;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?int $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
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

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnProfessores(): int
    {
        return $this->snProfessores;
    }

    public function setSnProfessores(int $snProfessores): self
    {
        $this->snProfessores = $snProfessores;
        return $this;
    }

    public function getSnEstudantes(): int
    {
        return $this->snEstudantes;
    }

    public function setSnEstudantes(int $snEstudantes): self
    {
        $this->snEstudantes = $snEstudantes;
        return $this;
    }

    public function getDsRegra(): ?string
    {
        return $this->dsRegra;
    }

    public function setDsRegra(?string $dsRegra): self
    {
        $this->dsRegra = $dsRegra;
        return $this;
    }

    public function isSnExcluir(): ?bool
    {
        return $this->snExcluir;
    }

    public function setSnExcluir(?bool $snExcluir): self
    {
        $this->snExcluir = $snExcluir;
        return $this;
    }
}
