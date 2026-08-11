<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedTemplatesDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedTemplatesDisciplinasRepository::class)]
#[ORM\Table(
    name: 'ped_templates_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ped_templates_disciplinas_cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_ped_templates_disciplinas_cd_disciplina', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_ped_templates_disciplinas_cd_template', columns: ['cd_template'])]
#[ORM\Index(name: 'ped_templates_disciplinas_ibfk_1', columns: ['cd_disciplina', 'cd_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ped_templates_disciplinas_ibfk_1', 'colunas' => ['cd_disciplina', 'cd_curso'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo', 'curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ped_templates_disciplinas_ibfk_2', 'colunas' => ['cd_template'], 'tabelaAlvo' => 'ped_templates', 'colunasAlvo' => ['cd_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedTemplatesDisciplinas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PedTemplates::class)]
    #[ORM\JoinColumn(name: 'cd_template', referencedColumnName: 'cd_template', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PedTemplates $cdTemplate = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    public function __construct(
        ?PedTemplates $cdTemplate = null,
        ?string $cdCurso = null,
        ?int $cdDisciplina = null
    ) {
        $this->cdTemplate = $cdTemplate;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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
}
