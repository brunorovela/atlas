<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedTemplatesTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedTemplatesTurmasRepository::class)]
#[ORM\Table(
    name: 'ped_templates_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ped_templates_turmas_nr_anosemestre', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_ped_templates_turmas_cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_ped_templates_turmas_cd_turma', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_ped_templates_turmas_cd_template', columns: ['cd_template'])]
#[ORM\Index(name: 'ped_templates_turmas_ibfk_1', columns: ['nr_anosemestre', 'cd_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ped_templates_turmas_ibfk_1', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_templates_turmas_ibfk_3', 'colunas' => ['cd_template'], 'tabelaAlvo' => 'ped_templates', 'colunasAlvo' => ['cd_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedTemplatesTurmas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedTemplates::class)]
    #[ORM\JoinColumn(name: 'cd_template', referencedColumnName: 'cd_template', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedTemplates $cdTemplate = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    public function __construct(
        ?PedTemplates $cdTemplate = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null
    ) {
        $this->cdTemplate = $cdTemplate;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
    }

    public function getCdTemplate(): ?PedTemplates
    {
        return $this->cdTemplate;
    }

    public function setCdTemplate(?PedTemplates $cdTemplate): self
    {
        $this->cdTemplate = $cdTemplate;
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
}
