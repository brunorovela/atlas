<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\GeAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeAlunosRepository::class)]
#[ORM\Table(
    name: 'ge_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_NR_ETAPA', columns: ['nr_etapa'])]
#[ORM\Index(name: 'IX_CD_GE_ATIVIDADE', columns: ['cd_ge_atividade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_GE_ALUNOS_GE_ATIVIDADES_CD_GE_ATIVIDADE', 'colunas' => ['cd_ge_atividade'], 'tabelaAlvo' => 'ge_atividades', 'colunasAlvo' => ['cd_ge_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class GeAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ge_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGeAluno = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosem', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrEtapa = null;

    #[ORM\ManyToOne(targetEntity: GeAtividades::class)]
    #[ORM\JoinColumn(name: 'cd_ge_atividade', referencedColumnName: 'cd_ge_atividade', nullable: true, options: ['default' => '0', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?GeAtividades $cdGeAtividade = null;

    #[ORM\Column(name: 'nr_horas', type: 'float', nullable: true)]
    private ?float $nrHoras = null;

    #[ORM\Column(name: 'nr_horas_original', type: 'float', nullable: true)]
    private ?float $nrHorasOriginal = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 100, nullable: true)]
    private ?string $dsLocal = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_termino', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtTermino = null;

    #[ORM\Column(name: 'cd_situacao', type: 'boolean', options: ['default' => '0'])]
    private bool $cdSituacao = false;

    #[ORM\Column(name: 'ds_resumo', type: 'text', length: 65535, nullable: true)]
    private ?string $dsResumo = null;

    #[ORM\Column(name: 'ds_origem_cad', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrigemCad = null;

    #[ORM\Column(name: 'ds_usuario_cadastrou_origem', type: 'string', length: 255, nullable: true)]
    private ?string $dsUsuarioCadastrouOrigem = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'cd_professor_responsavel', type: 'integer', nullable: true)]
    private ?int $cdProfessorResponsavel = null;

    #[ORM\Column(name: 'cd_empresa_concedente', type: 'integer', nullable: true)]
    private ?int $cdEmpresaConcedente = null;

    #[ORM\Column(name: 'cd_atividade_ppc', type: 'string', length: 50, nullable: true)]
    private ?string $cdAtividadePpc = null;

    #[ORM\Column(name: 'etiqueta', type: 'string', length: 255, nullable: true)]
    private ?string $etiqueta = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $cdCurso = null,
        ?int $nrAnosem = null,
        ?int $nrEtapa = null,
        ?GeAtividades $cdGeAtividade = null,
        ?float $nrHoras = null,
        ?float $nrHorasOriginal = null,
        ?string $dsAtividade = null,
        ?string $dsLocal = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtTermino = null,
        bool $cdSituacao = false,
        ?string $dsResumo = null,
        ?string $dsOrigemCad = null,
        ?string $dsUsuarioCadastrouOrigem = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $cdProfessorResponsavel = null,
        ?int $cdEmpresaConcedente = null,
        ?string $cdAtividadePpc = null,
        ?string $etiqueta = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCurso = $cdCurso;
        $this->nrAnosem = $nrAnosem;
        $this->nrEtapa = $nrEtapa;
        $this->cdGeAtividade = $cdGeAtividade;
        $this->nrHoras = $nrHoras;
        $this->nrHorasOriginal = $nrHorasOriginal;
        $this->dsAtividade = $dsAtividade;
        $this->dsLocal = $dsLocal;
        $this->dtInicio = $dtInicio;
        $this->dtTermino = $dtTermino;
        $this->cdSituacao = $cdSituacao;
        $this->dsResumo = $dsResumo;
        $this->dsOrigemCad = $dsOrigemCad;
        $this->dsUsuarioCadastrouOrigem = $dsUsuarioCadastrouOrigem;
        $this->dtCadastro = $dtCadastro;
        $this->cdProfessorResponsavel = $cdProfessorResponsavel;
        $this->cdEmpresaConcedente = $cdEmpresaConcedente;
        $this->cdAtividadePpc = $cdAtividadePpc;
        $this->etiqueta = $etiqueta;
    }

    public function getCdGeAluno(): ?int
    {
        return $this->cdGeAluno;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
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

    public function getCdGeAtividade(): ?GeAtividades
    {
        return $this->cdGeAtividade;
    }

    public function setCdGeAtividade(?GeAtividades $cdGeAtividade): self
    {
        $this->cdGeAtividade = $cdGeAtividade;
        return $this;
    }

    public function getNrHoras(): ?float
    {
        return $this->nrHoras;
    }

    public function setNrHoras(?float $nrHoras): self
    {
        $this->nrHoras = $nrHoras;
        return $this;
    }

    public function getNrHorasOriginal(): ?float
    {
        return $this->nrHorasOriginal;
    }

    public function setNrHorasOriginal(?float $nrHorasOriginal): self
    {
        $this->nrHorasOriginal = $nrHorasOriginal;
        return $this;
    }

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtTermino(): ?\DateTimeInterface
    {
        return $this->dtTermino;
    }

    public function setDtTermino(?\DateTimeInterface $dtTermino): self
    {
        $this->dtTermino = $dtTermino;
        return $this;
    }

    public function isCdSituacao(): bool
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(bool $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsResumo(): ?string
    {
        return $this->dsResumo;
    }

    public function setDsResumo(?string $dsResumo): self
    {
        $this->dsResumo = $dsResumo;
        return $this;
    }

    public function getDsOrigemCad(): ?string
    {
        return $this->dsOrigemCad;
    }

    public function setDsOrigemCad(?string $dsOrigemCad): self
    {
        $this->dsOrigemCad = $dsOrigemCad;
        return $this;
    }

    public function getDsUsuarioCadastrouOrigem(): ?string
    {
        return $this->dsUsuarioCadastrouOrigem;
    }

    public function setDsUsuarioCadastrouOrigem(?string $dsUsuarioCadastrouOrigem): self
    {
        $this->dsUsuarioCadastrouOrigem = $dsUsuarioCadastrouOrigem;
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

    public function getCdProfessorResponsavel(): ?int
    {
        return $this->cdProfessorResponsavel;
    }

    public function setCdProfessorResponsavel(?int $cdProfessorResponsavel): self
    {
        $this->cdProfessorResponsavel = $cdProfessorResponsavel;
        return $this;
    }

    public function getCdEmpresaConcedente(): ?int
    {
        return $this->cdEmpresaConcedente;
    }

    public function setCdEmpresaConcedente(?int $cdEmpresaConcedente): self
    {
        $this->cdEmpresaConcedente = $cdEmpresaConcedente;
        return $this;
    }

    public function getCdAtividadePpc(): ?string
    {
        return $this->cdAtividadePpc;
    }

    public function setCdAtividadePpc(?string $cdAtividadePpc): self
    {
        $this->cdAtividadePpc = $cdAtividadePpc;
        return $this;
    }

    public function getEtiqueta(): ?string
    {
        return $this->etiqueta;
    }

    public function setEtiqueta(?string $etiqueta): self
    {
        $this->etiqueta = $etiqueta;
        return $this;
    }
}
