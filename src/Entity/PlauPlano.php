<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlauPlanoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauPlanoRepository::class)]
#[ORM\Table(
    name: 'plau_plano',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_professor', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CD_CURSO', columns: ['cd_disciplina', 'cd_curso'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'plau_plano_ibfk_3', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'IDX_17194956ED06CCD7', columns: ['cd_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_plano_ibfk_1', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'plau_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_ibfk_2', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_ibfk_3', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_ibfk_4', 'colunas' => ['cd_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_ibfk_5', 'colunas' => ['cd_professor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauPlano
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlano = null;

    #[ORM\ManyToOne(targetEntity: PlauSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauSituacao $cdSituacao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_professor', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdProfessor = null;

    #[ORM\Column(name: 'cd_pessoa_criou', type: 'integer', nullable: true)]
    private ?int $cdPessoaCriou = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'me_estrategia', type: 'text', length: 16777215, nullable: true)]
    private ?string $meEstrategia = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?PlauSituacao $cdSituacao = null,
        ?int $nrAnosemestre = null,
        ?CursosMestre $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?Pessoas $cdProfessor = null,
        ?int $cdPessoaCriou = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?string $meEstrategia = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProfessor = $cdProfessor;
        $this->cdPessoaCriou = $cdPessoaCriou;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->meEstrategia = $meEstrategia;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdProfessor(): ?Pessoas
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?Pessoas $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdPessoaCriou(): ?int
    {
        return $this->cdPessoaCriou;
    }

    public function setCdPessoaCriou(?int $cdPessoaCriou): self
    {
        $this->cdPessoaCriou = $cdPessoaCriou;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getMeEstrategia(): ?string
    {
        return $this->meEstrategia;
    }

    public function setMeEstrategia(?string $meEstrategia): self
    {
        $this->meEstrategia = $meEstrategia;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}
