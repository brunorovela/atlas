<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleAprendizagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleAprendizagemRepository::class)]
#[ORM\Table(
    name: 'ple_aprendizagem',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'cd_layout', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CD_CURSO', columns: ['cd_disciplina', 'cd_curso'])]
#[ORM\Index(name: 'IDX_788547D6ED06CCD7', columns: ['cd_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_aprendizagem_ibfk_1', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ple_aprendizagem_ibfk_2', 'colunas' => ['cd_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'ple_aprendizagem_ibfk_3', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'ple_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleAprendizagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ple_aprendizagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPleAprendizagem = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\ManyToOne(targetEntity: PleLayouts::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PleLayouts $cdLayout = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer')]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'nr_anosem_inicio', type: 'smallint')]
    private ?int $nrAnosemInicio = null;

    #[ORM\Column(name: 'nr_ppc_ano', type: 'smallint', nullable: true)]
    private ?int $nrPpcAno = null;

    #[ORM\Column(name: 'vl_ch', type: 'float', nullable: true)]
    private ?float $vlCh = null;

    #[ORM\Column(name: 'dt_vigencia_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVigenciaInicio = null;

    #[ORM\Column(name: 'dt_vigencia_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVigenciaFim = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'me_revisao', type: 'text', nullable: true)]
    private ?string $meRevisao = null;

    public function __construct(
        ?CursosMestre $cdCurso = null,
        ?int $cdDisciplina = null,
        ?PleLayouts $cdLayout = null,
        ?int $cdProfessor = null,
        ?int $nrAnosemInicio = null,
        ?int $nrPpcAno = null,
        ?float $vlCh = null,
        ?\DateTimeInterface $dtVigenciaInicio = null,
        ?\DateTimeInterface $dtVigenciaFim = null,
        ?int $cdStatus = null,
        ?string $meRevisao = null
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdLayout = $cdLayout;
        $this->cdProfessor = $cdProfessor;
        $this->nrAnosemInicio = $nrAnosemInicio;
        $this->nrPpcAno = $nrPpcAno;
        $this->vlCh = $vlCh;
        $this->dtVigenciaInicio = $dtVigenciaInicio;
        $this->dtVigenciaFim = $dtVigenciaFim;
        $this->cdStatus = $cdStatus;
        $this->meRevisao = $meRevisao;
    }

    public function getCdPleAprendizagem(): ?int
    {
        return $this->cdPleAprendizagem;
    }

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
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

    public function getCdLayout(): ?PleLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?PleLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getNrAnosemInicio(): ?int
    {
        return $this->nrAnosemInicio;
    }

    public function setNrAnosemInicio(?int $nrAnosemInicio): self
    {
        $this->nrAnosemInicio = $nrAnosemInicio;
        return $this;
    }

    public function getNrPpcAno(): ?int
    {
        return $this->nrPpcAno;
    }

    public function setNrPpcAno(?int $nrPpcAno): self
    {
        $this->nrPpcAno = $nrPpcAno;
        return $this;
    }

    public function getVlCh(): ?float
    {
        return $this->vlCh;
    }

    public function setVlCh(?float $vlCh): self
    {
        $this->vlCh = $vlCh;
        return $this;
    }

    public function getDtVigenciaInicio(): ?\DateTimeInterface
    {
        return $this->dtVigenciaInicio;
    }

    public function setDtVigenciaInicio(?\DateTimeInterface $dtVigenciaInicio): self
    {
        $this->dtVigenciaInicio = $dtVigenciaInicio;
        return $this;
    }

    public function getDtVigenciaFim(): ?\DateTimeInterface
    {
        return $this->dtVigenciaFim;
    }

    public function setDtVigenciaFim(?\DateTimeInterface $dtVigenciaFim): self
    {
        $this->dtVigenciaFim = $dtVigenciaFim;
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
}
