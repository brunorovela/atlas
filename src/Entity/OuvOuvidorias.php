<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\OuvOuvidoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvOuvidoriasRepository::class)]
#[ORM\Table(
    name: 'ouv_ouvidorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_ouv_assunto', columns: ['CD_ASSUNTO'])]
#[ORM\Index(name: 'ix_ouv_setor', columns: ['CD_SETOR_ABERTURA'])]
#[ORM\Index(name: 'ix_ouv_tipo', columns: ['CD_TIPO'])]
#[ORM\Index(name: 'IX_CD_SETOR_ABERTURA', columns: ['CD_SETOR_ABERTURA'])]
#[ORM\Index(name: 'IX_CD_SOLICITANTE', columns: ['CD_SOLICITANTE'])]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['CD_ASSUNTO'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['CD_TIPO'])]
#[ORM\Index(name: 'IX_CD_ARQUIVO', columns: ['CD_ARQUIVO'])]
#[ORM\Index(name: 'IX_CD_SETOR_ATUAL', columns: ['CD_SETOR_ATUAL'])]
#[ORM\Index(name: 'IX_CD_PESSOA_RESPONSAVEL', columns: ['CD_PESSOA_RESPONSAVEL'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OO_ASSUNTO_OA_ASSUNTO', 'colunas' => ['CD_ASSUNTO'], 'tabelaAlvo' => 'ouv_assuntos', 'colunasAlvo' => ['CD_ASSUNTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_OO_SETABERT_OS_SETOR', 'colunas' => ['CD_SETOR_ABERTURA'], 'tabelaAlvo' => 'ouv_setores', 'colunasAlvo' => ['CD_SETOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_OO_TIPO_OT_TIPO', 'colunas' => ['CD_TIPO'], 'tabelaAlvo' => 'ouv_tipos', 'colunasAlvo' => ['CD_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvOuvidorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_OUVIDORIA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOuvidoria = null;

    #[ORM\ManyToOne(targetEntity: OuvSetores::class)]
    #[ORM\JoinColumn(name: 'CD_SETOR_ABERTURA', referencedColumnName: 'CD_SETOR', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvSetores $cdSetorAbertura = null;

    #[ORM\Column(name: 'CD_SOLICITANTE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSolicitante = null;

    #[ORM\ManyToOne(targetEntity: OuvAssuntos::class)]
    #[ORM\JoinColumn(name: 'CD_ASSUNTO', referencedColumnName: 'CD_ASSUNTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvAssuntos $cdAssunto = null;

    #[ORM\ManyToOne(targetEntity: OuvTipos::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO', referencedColumnName: 'CD_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvTipos $cdTipo = null;

    #[ORM\Column(name: 'CD_ARQUIVO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'CD_SETOR_ATUAL', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSetorAtual = null;

    #[ORM\Column(name: 'CD_PESSOA_RESPONSAVEL', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaResponsavel = null;

    #[ORM\Column(name: 'DT_CADASTRO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'DT_PRAZO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrazo = null;

    #[ORM\Column(name: 'SN_ANONIMO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAnonimo = null;

    #[ORM\Column(name: 'SN_STATUS', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snStatus = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 255, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 255, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'CD_ASSUNTO_ABERTURA', type: 'integer')]
    private ?int $cdAssuntoAbertura = null;

    #[ORM\Column(name: 'DT_PRIMEIRA_RESPOSTA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrimeiraResposta = null;

    #[ORM\Column(name: 'cd_grupo_solicitante', type: 'integer', nullable: true)]
    private ?int $cdGrupoSolicitante = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?OuvSetores $cdSetorAbertura = null,
        ?int $cdSolicitante = null,
        ?OuvAssuntos $cdAssunto = null,
        ?OuvTipos $cdTipo = null,
        ?int $cdArquivo = null,
        ?int $cdSetorAtual = null,
        ?int $cdPessoaResponsavel = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtPrazo = null,
        ?int $snAnonimo = null,
        ?int $snStatus = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?int $cdAssuntoAbertura = null,
        ?\DateTimeInterface $dtPrimeiraResposta = null,
        ?int $cdGrupoSolicitante = null,
        ?int $snExcluido = 0,
        ?int $cdColigada = null
    ) {
        $this->cdSetorAbertura = $cdSetorAbertura;
        $this->cdSolicitante = $cdSolicitante;
        $this->cdAssunto = $cdAssunto;
        $this->cdTipo = $cdTipo;
        $this->cdArquivo = $cdArquivo;
        $this->cdSetorAtual = $cdSetorAtual;
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        $this->dtCadastro = $dtCadastro;
        $this->dtPrazo = $dtPrazo;
        $this->snAnonimo = $snAnonimo;
        $this->snStatus = $snStatus;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdAssuntoAbertura = $cdAssuntoAbertura;
        $this->dtPrimeiraResposta = $dtPrimeiraResposta;
        $this->cdGrupoSolicitante = $cdGrupoSolicitante;
        $this->snExcluido = $snExcluido;
        $this->cdColigada = $cdColigada;
    }

    public function getCdOuvidoria(): ?int
    {
        return $this->cdOuvidoria;
    }

    public function getCdSetorAbertura(): ?OuvSetores
    {
        return $this->cdSetorAbertura;
    }

    public function setCdSetorAbertura(?OuvSetores $cdSetorAbertura): self
    {
        $this->cdSetorAbertura = $cdSetorAbertura;
        return $this;
    }

    public function getCdSolicitante(): ?int
    {
        return $this->cdSolicitante;
    }

    public function setCdSolicitante(?int $cdSolicitante): self
    {
        $this->cdSolicitante = $cdSolicitante;
        return $this;
    }

    public function getCdAssunto(): ?OuvAssuntos
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?OuvAssuntos $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
        return $this;
    }

    public function getCdTipo(): ?OuvTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?OuvTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function setCdArquivo(?int $cdArquivo): self
    {
        $this->cdArquivo = $cdArquivo;
        return $this;
    }

    public function getCdSetorAtual(): ?int
    {
        return $this->cdSetorAtual;
    }

    public function setCdSetorAtual(?int $cdSetorAtual): self
    {
        $this->cdSetorAtual = $cdSetorAtual;
        return $this;
    }

    public function getCdPessoaResponsavel(): ?int
    {
        return $this->cdPessoaResponsavel;
    }

    public function setCdPessoaResponsavel(?int $cdPessoaResponsavel): self
    {
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
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

    public function getDtPrazo(): ?\DateTimeInterface
    {
        return $this->dtPrazo;
    }

    public function setDtPrazo(?\DateTimeInterface $dtPrazo): self
    {
        $this->dtPrazo = $dtPrazo;
        return $this;
    }

    public function getSnAnonimo(): ?int
    {
        return $this->snAnonimo;
    }

    public function setSnAnonimo(?int $snAnonimo): self
    {
        $this->snAnonimo = $snAnonimo;
        return $this;
    }

    public function getSnStatus(): ?int
    {
        return $this->snStatus;
    }

    public function setSnStatus(?int $snStatus): self
    {
        $this->snStatus = $snStatus;
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

    public function getCdAssuntoAbertura(): ?int
    {
        return $this->cdAssuntoAbertura;
    }

    public function setCdAssuntoAbertura(?int $cdAssuntoAbertura): self
    {
        $this->cdAssuntoAbertura = $cdAssuntoAbertura;
        return $this;
    }

    public function getDtPrimeiraResposta(): ?\DateTimeInterface
    {
        return $this->dtPrimeiraResposta;
    }

    public function setDtPrimeiraResposta(?\DateTimeInterface $dtPrimeiraResposta): self
    {
        $this->dtPrimeiraResposta = $dtPrimeiraResposta;
        return $this;
    }

    public function getCdGrupoSolicitante(): ?int
    {
        return $this->cdGrupoSolicitante;
    }

    public function setCdGrupoSolicitante(?int $cdGrupoSolicitante): self
    {
        $this->cdGrupoSolicitante = $cdGrupoSolicitante;
        return $this;
    }

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
