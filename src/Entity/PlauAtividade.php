<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAtividadeRepository::class)]
#[ORM\Table(
    name: 'plau_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa_criou', columns: ['cd_pessoa_criou'])]
#[ORM\Index(name: 'cd_professor', columns: ['cd_professor'])]
#[ORM\Index(name: 'cd_avaliacao', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CD_CURSO', columns: ['cd_disciplina', 'cd_curso'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'plau_atividade_ibfk_2', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'IDX_2E6DA858ED06CCD7', columns: ['cd_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_atividade_ibfk_1', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_2', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_3', 'colunas' => ['cd_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_4', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'plau_ativ_tipo', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_5', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'plau_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_6', 'colunas' => ['cd_pessoa_criou'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_7', 'colunas' => ['cd_professor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_ibfk_8', 'colunas' => ['cd_avaliacao'], 'tabelaAlvo' => 'avaliacoes_tipos', 'colunasAlvo' => ['cd_avaliacao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauAtividade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'nr_etapa', type: 'integer', nullable: true)]
    private ?int $nrEtapa = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\ManyToOne(targetEntity: PlauAtivTipo::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtivTipo $cdTipo = null;

    #[ORM\ManyToOne(targetEntity: PlauSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauSituacao $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_criou', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaCriou = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_professor', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdProfessor = null;

    #[ORM\ManyToOne(targetEntity: AvaliacoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao', referencedColumnName: 'cd_avaliacao_tipo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesTipos $cdAvaliacao = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacoes = null;

    #[ORM\Column(name: 'sn_avaliativa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAvaliativa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_interdisciplinar', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snInterdisciplinar = false;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true)]
    private ?int $cdProva = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?int $nrEtapa = null,
        ?CursosMestre $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?PlauAtivTipo $cdTipo = null,
        ?PlauSituacao $cdSituacao = null,
        ?Pessoas $cdPessoaCriou = null,
        ?Pessoas $cdProfessor = null,
        ?AvaliacoesTipos $cdAvaliacao = null,
        ?string $dsTitulo = null,
        ?string $meObservacoes = null,
        ?int $snAvaliativa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?bool $snInterdisciplinar = false,
        ?int $cdProva = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrEtapa = $nrEtapa;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdTipo = $cdTipo;
        $this->cdSituacao = $cdSituacao;
        $this->cdPessoaCriou = $cdPessoaCriou;
        $this->cdProfessor = $cdProfessor;
        $this->cdAvaliacao = $cdAvaliacao;
        $this->dsTitulo = $dsTitulo;
        $this->meObservacoes = $meObservacoes;
        $this->snAvaliativa = $snAvaliativa;
        $this->dtCadastro = $dtCadastro;
        $this->snInterdisciplinar = $snInterdisciplinar;
        $this->cdProva = $cdProva;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
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

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
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

    public function getCdTipo(): ?PlauAtivTipo
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?PlauAtivTipo $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdSituacao(): ?PlauSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?PlauSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPessoaCriou(): ?Pessoas
    {
        return $this->cdPessoaCriou;
    }

    public function setCdPessoaCriou(?Pessoas $cdPessoaCriou): self
    {
        $this->cdPessoaCriou = $cdPessoaCriou;
        return $this;
    }

    public function getCdProfessor(): ?Pessoas
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?Pessoas $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdAvaliacao(): ?AvaliacoesTipos
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?AvaliacoesTipos $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getMeObservacoes(): ?string
    {
        return $this->meObservacoes;
    }

    public function setMeObservacoes(?string $meObservacoes): self
    {
        $this->meObservacoes = $meObservacoes;
        return $this;
    }

    public function getSnAvaliativa(): ?int
    {
        return $this->snAvaliativa;
    }

    public function setSnAvaliativa(?int $snAvaliativa): self
    {
        $this->snAvaliativa = $snAvaliativa;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function isSnInterdisciplinar(): ?bool
    {
        return $this->snInterdisciplinar;
    }

    public function setSnInterdisciplinar(?bool $snInterdisciplinar): self
    {
        $this->snInterdisciplinar = $snInterdisciplinar;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }
}
