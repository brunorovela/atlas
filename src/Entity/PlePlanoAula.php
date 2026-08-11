<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlePlanoAulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlePlanoAulaRepository::class)]
#[ORM\Table(
    name: 'ple_plano_aula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ple_aprendizagem_ementa', columns: ['cd_ple_aprendizagem_ementa', 'anosemestre', 'cd_turma', 'cd_disciplina', 'cd_pessoa_professor'])]
#[ORM\Index(name: 'cd_layout', columns: ['cd_layout'])]
#[ORM\Index(name: 'IDX_1E4051456DF66DAB', columns: ['cd_ple_aprendizagem_ementa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_plano_aula_ibfk_1', 'colunas' => ['cd_ple_aprendizagem_ementa'], 'tabelaAlvo' => 'ple_aprendizagem_ementa', 'colunasAlvo' => ['cd_ple_aprendizagem_ementa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ple_plano_aula_ibfk_2', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'ple_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlePlanoAula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ple_plano_aula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlePlanoAula = null;

    #[ORM\ManyToOne(targetEntity: PleAprendizagemEmenta::class)]
    #[ORM\JoinColumn(name: 'cd_ple_aprendizagem_ementa', referencedColumnName: 'cd_ple_aprendizagem_ementa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PleAprendizagemEmenta $cdPleAprendizagemEmenta = null;

    #[ORM\ManyToOne(targetEntity: PleLayouts::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PleLayouts $cdLayout = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_pessoa_editou', type: 'integer', nullable: true)]
    private ?int $cdPessoaEditou = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'me_revisao', type: 'text', nullable: true)]
    private ?string $meRevisao = null;

    #[ORM\Column(name: 'cd_pessoa_professor', type: 'integer', nullable: true)]
    private ?int $cdPessoaProfessor = null;

    public function __construct(
        ?PleAprendizagemEmenta $cdPleAprendizagemEmenta = null,
        ?PleLayouts $cdLayout = null,
        ?int $anosemestre = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdPessoaEditou = null,
        ?int $cdStatus = null,
        ?string $meRevisao = null,
        ?int $cdPessoaProfessor = null
    ) {
        $this->cdPleAprendizagemEmenta = $cdPleAprendizagemEmenta;
        $this->cdLayout = $cdLayout;
        $this->anosemestre = $anosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdPessoaEditou = $cdPessoaEditou;
        $this->cdStatus = $cdStatus;
        $this->meRevisao = $meRevisao;
        $this->cdPessoaProfessor = $cdPessoaProfessor;
    }

    public function getCdPlePlanoAula(): ?int
    {
        return $this->cdPlePlanoAula;
    }

    public function getCdPleAprendizagemEmenta(): ?PleAprendizagemEmenta
    {
        return $this->cdPleAprendizagemEmenta;
    }

    public function setCdPleAprendizagemEmenta(?PleAprendizagemEmenta $cdPleAprendizagemEmenta): self
    {
        $this->cdPleAprendizagemEmenta = $cdPleAprendizagemEmenta;
        return $this;
    }

    public function getCdLayout(): ?PleLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?PleLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdPessoaEditou(): ?int
    {
        return $this->cdPessoaEditou;
    }

    public function setCdPessoaEditou(?int $cdPessoaEditou): self
    {
        $this->cdPessoaEditou = $cdPessoaEditou;
        return $this;
    }

    public function getCdStatus(): ?int
    {
        return $this->cdStatus;
    }

    public function setCdStatus(?int $cdStatus): self
    {
        $this->cdStatus = $cdStatus;
        return $this;
    }

    public function getMeRevisao(): ?string
    {
        return $this->meRevisao;
    }

    public function setMeRevisao(?string $meRevisao): self
    {
        $this->meRevisao = $meRevisao;
        return $this;
    }

    public function getCdPessoaProfessor(): ?int
    {
        return $this->cdPessoaProfessor;
    }

    public function setCdPessoaProfessor(?int $cdPessoaProfessor): self
    {
        $this->cdPessoaProfessor = $cdPessoaProfessor;
        return $this;
    }
}
