<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiarioAulasTurmasHorariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAulasTurmasHorariosRepository::class)]
#[ORM\Table(
    name: 'diario_aulas_turmas_horarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DIARIO_AULA_TURMA_HORARIO', columns: ['cd_diario_aula', 'cd_turma_horario'])]
#[ORM\Index(name: 'FK_DIARIO_AULA_TH_TURMA_HORA', columns: ['cd_turma_horario'])]
#[ORM\Index(name: 'FK_DIARIO_AULA_TH_DIARIO_AULA', columns: ['cd_diario_aula'])]
#[ORM\Index(name: 'IX_CD_DIARIO_AULA', columns: ['cd_diario_aula'])]
#[ORM\Index(name: 'IX_CD_TURMA_HORARIO', columns: ['cd_turma_horario'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DIARIO_AULA_TH_DIARIO_AULA', 'colunas' => ['cd_diario_aula'], 'tabelaAlvo' => 'diario_aulas', 'colunasAlvo' => ['cd_diario_aula'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DIARIO_AULA_TH_TURMA_HORA', 'colunas' => ['cd_turma_horario'], 'tabelaAlvo' => 'turmas_horarios_config', 'colunasAlvo' => ['cd_turmas_horarios'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioAulasTurmasHorarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diario_aula_turma_horario', type: 'integer')]
    private ?int $cdDiarioAulaTurmaHorario = null;

    #[ORM\ManyToOne(targetEntity: DiarioAulas::class)]
    #[ORM\JoinColumn(name: 'cd_diario_aula', referencedColumnName: 'cd_diario_aula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?DiarioAulas $cdDiarioAula = null;

    #[ORM\ManyToOne(targetEntity: TurmasHorariosConfig::class)]
    #[ORM\JoinColumn(name: 'cd_turma_horario', referencedColumnName: 'cd_turmas_horarios', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TurmasHorariosConfig $cdTurmaHorario = null;

    public function __construct(
        ?DiarioAulas $cdDiarioAula = null,
        ?TurmasHorariosConfig $cdTurmaHorario = null
    ) {
        $this->cdDiarioAula = $cdDiarioAula;
        $this->cdTurmaHorario = $cdTurmaHorario;
    }

    public function getCdDiarioAulaTurmaHorario(): ?int
    {
        return $this->cdDiarioAulaTurmaHorario;
    }

    public function getCdDiarioAula(): ?DiarioAulas
    {
        return $this->cdDiarioAula;
    }

    public function setCdDiarioAula(?DiarioAulas $cdDiarioAula): self
    {
        $this->cdDiarioAula = $cdDiarioAula;
        return $this;
    }

    public function getCdTurmaHorario(): ?TurmasHorariosConfig
    {
        return $this->cdTurmaHorario;
    }

    public function setCdTurmaHorario(?TurmasHorariosConfig $cdTurmaHorario): self
    {
        $this->cdTurmaHorario = $cdTurmaHorario;
        return $this;
    }
}
