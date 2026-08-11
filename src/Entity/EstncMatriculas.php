<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncMatriculasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncMatriculasRepository::class)]
#[ORM\Table(
    name: 'estnc_matriculas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ESTNC_MATRICULA', columns: ['cd_instituicao', 'cd_curso', 'cd_pessoa', 'nr_anosemestre'])]
#[ORM\Index(name: 'IDX_CURSO_MATRICULA', columns: ['cd_curso'])]
#[ORM\Index(name: 'IDX_PESSOA_MATRICULA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IDX_INSTITUICAO_MATRICULA', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CURSO_MATRICULA', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_INSTITUICAO_MATRICULA', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOA_MATRICULA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncMatriculas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMatricula = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'cd_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCurso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestre = null;

    #[ORM\Column(name: 'nr_anosemestre_inicial', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestreInicial = null;

    #[ORM\Column(name: 'nr_anosemestre_final', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestreFinal = null;

    #[ORM\Column(name: 'nr_anosemestre_conclusao', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestreConclusao = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'ds_cod_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodCurso = null;

    #[ORM\Column(name: 'nr_carga_horaria', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrCargaHoraria = null;

    #[ORM\Column(name: 'ds_turma', type: 'string', length: 255, nullable: true)]
    private ?string $dsTurma = null;

    #[ORM\Column(name: 'nr_hora_aula', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrHoraAula = null;

    #[ORM\Column(name: 'nr_semestre', type: 'string', length: 255, nullable: true)]
    private ?string $nrSemestre = null;

    #[ORM\Column(name: 'ds_matricula', type: 'string', length: 255, nullable: true)]
    private ?string $dsMatricula = null;

    #[ORM\Column(name: 'sn_matriculado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snMatriculado = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?InstituicoesEnsino $cdInstituicao = null,
        ?EstncCursos $cdCurso = null,
        ?Pessoas $cdPessoa = null,
        ?string $nrAnosemestre = null,
        ?string $nrAnosemestreInicial = null,
        ?string $nrAnosemestreFinal = null,
        ?string $nrAnosemestreConclusao = null,
        ?string $dsCurso = null,
        ?string $dsCodCurso = null,
        ?int $nrCargaHoraria = null,
        ?string $dsTurma = null,
        ?int $nrHoraAula = null,
        ?string $nrSemestre = null,
        ?string $dsMatricula = null,
        ?int $snMatriculado = 0,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->cdCurso = $cdCurso;
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrAnosemestreInicial = $nrAnosemestreInicial;
        $this->nrAnosemestreFinal = $nrAnosemestreFinal;
        $this->nrAnosemestreConclusao = $nrAnosemestreConclusao;
        $this->dsCurso = $dsCurso;
        $this->dsCodCurso = $dsCodCurso;
        $this->nrCargaHoraria = $nrCargaHoraria;
        $this->dsTurma = $dsTurma;
        $this->nrHoraAula = $nrHoraAula;
        $this->nrSemestre = $nrSemestre;
        $this->dsMatricula = $dsMatricula;
        $this->snMatriculado = $snMatriculado;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdMatricula(): ?int
    {
        return $this->cdMatricula;
    }

    public function getCdInstituicao(): ?InstituicoesEnsino
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?InstituicoesEnsino $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getCdCurso(): ?EstncCursos
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?EstncCursos $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrAnosemestre(): ?string
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?string $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrAnosemestreInicial(): ?string
    {
        return $this->nrAnosemestreInicial;
    }

    public function setNrAnosemestreInicial(?string $nrAnosemestreInicial): self
    {
        $this->nrAnosemestreInicial = $nrAnosemestreInicial;
        return $this;
    }

    public function getNrAnosemestreFinal(): ?string
    {
        return $this->nrAnosemestreFinal;
    }

    public function setNrAnosemestreFinal(?string $nrAnosemestreFinal): self
    {
        $this->nrAnosemestreFinal = $nrAnosemestreFinal;
        return $this;
    }

    public function getNrAnosemestreConclusao(): ?string
    {
        return $this->nrAnosemestreConclusao;
    }

    public function setNrAnosemestreConclusao(?string $nrAnosemestreConclusao): self
    {
        $this->nrAnosemestreConclusao = $nrAnosemestreConclusao;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getDsCodCurso(): ?string
    {
        return $this->dsCodCurso;
    }

    public function setDsCodCurso(?string $dsCodCurso): self
    {
        $this->dsCodCurso = $dsCodCurso;
        return $this;
    }

    public function getNrCargaHoraria(): ?int
    {
        return $this->nrCargaHoraria;
    }

    public function setNrCargaHoraria(?int $nrCargaHoraria): self
    {
        $this->nrCargaHoraria = $nrCargaHoraria;
        return $this;
    }

    public function getDsTurma(): ?string
    {
        return $this->dsTurma;
    }

    public function setDsTurma(?string $dsTurma): self
    {
        $this->dsTurma = $dsTurma;
        return $this;
    }

    public function getNrHoraAula(): ?int
    {
        return $this->nrHoraAula;
    }

    public function setNrHoraAula(?int $nrHoraAula): self
    {
        $this->nrHoraAula = $nrHoraAula;
        return $this;
    }

    public function getNrSemestre(): ?string
    {
        return $this->nrSemestre;
    }

    public function setNrSemestre(?string $nrSemestre): self
    {
        $this->nrSemestre = $nrSemestre;
        return $this;
    }

    public function getDsMatricula(): ?string
    {
        return $this->dsMatricula;
    }

    public function setDsMatricula(?string $dsMatricula): self
    {
        $this->dsMatricula = $dsMatricula;
        return $this;
    }

    public function getSnMatriculado(): ?int
    {
        return $this->snMatriculado;
    }

    public function setSnMatriculado(?int $snMatriculado): self
    {
        $this->snMatriculado = $snMatriculado;
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
}
