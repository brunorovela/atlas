<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TurmaProfessorUnificadoVinculoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmaProfessorUnificadoVinculoRepository::class)]
#[ORM\Table(
    name: 'turma_professor_unificado_vinculo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TURMA_PROFESSOR_UNIFICADO_VINCULO', columns: ['cd_turma_professor_unificado', 'cd_turmaprofessor', 'cd_grupo'])]
#[ORM\Index(name: 'IX_SN_UNIFICADO_MANUAL', columns: ['sn_unificado_manual'])]
#[ORM\Index(name: 'FK_TURMASPROFESSORES_CD_TURMA_PROFESSOR', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'FK_TURMA_PROFESSOR_UNIFICADO_CD_TURMA_PROFESSOR_UNIFICADO', columns: ['cd_turma_professor_unificado'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TURMA_PROFESSOR_UNIFICADO_CD_TURMA_PROFESSOR_UNIFICADO', 'colunas' => ['cd_turma_professor_unificado'], 'tabelaAlvo' => 'turma_professor_unificado', 'colunasAlvo' => ['cd_turma_professor_unificado'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TURMASPROFESSORES_CD_TURMA_PROFESSOR', 'colunas' => ['cd_turmaprofessor'], 'tabelaAlvo' => 'turmasprofessores', 'colunasAlvo' => ['cd_turmaprofessor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TurmaProfessorUnificadoVinculo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turma_professor_unificado_vinculo', type: 'integer')]
    private ?int $cdTurmaProfessorUnificadoVinculo = null;

    #[ORM\ManyToOne(targetEntity: TurmaProfessorUnificado::class)]
    #[ORM\JoinColumn(name: 'cd_turma_professor_unificado', referencedColumnName: 'cd_turma_professor_unificado', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TurmaProfessorUnificado $cdTurmaProfessorUnificado = null;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer')]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'sn_unificado_manual', type: 'boolean')]
    private ?bool $snUnificadoManual = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?TurmaProfessorUnificado $cdTurmaProfessorUnificado = null,
        ?int $cdTurmaprofessor = null,
        int $cdGrupo = 0,
        ?bool $snUnificadoManual = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTurmaProfessorUnificado = $cdTurmaProfessorUnificado;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->cdGrupo = $cdGrupo;
        $this->snUnificadoManual = $snUnificadoManual;
        $this->dtBase = $dtBase;
    }

    public function getCdTurmaProfessorUnificadoVinculo(): ?int
    {
        return $this->cdTurmaProfessorUnificadoVinculo;
    }

    public function getCdTurmaProfessorUnificado(): ?TurmaProfessorUnificado
    {
        return $this->cdTurmaProfessorUnificado;
    }

    public function setCdTurmaProfessorUnificado(?TurmaProfessorUnificado $cdTurmaProfessorUnificado): self
    {
        $this->cdTurmaProfessorUnificado = $cdTurmaProfessorUnificado;
        return $this;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function isSnUnificadoManual(): ?bool
    {
        return $this->snUnificadoManual;
    }

    public function setSnUnificadoManual(?bool $snUnificadoManual): self
    {
        $this->snUnificadoManual = $snUnificadoManual;
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
