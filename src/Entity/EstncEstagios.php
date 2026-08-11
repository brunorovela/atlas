<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncEstagiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncEstagiosRepository::class)]
#[ORM\Table(
    name: 'estnc_estagios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EMPRESA', columns: ['cd_empresa'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_SUPERVISOR', columns: ['cd_supervisor'])]
#[ORM\Index(name: 'IX_CD_VAGA_ORIGEM', columns: ['cd_vaga_origem'])]
#[ORM\Index(name: 'ix_estnc_matricula', columns: ['cd_matricula'])]
#[ORM\Index(name: 'FK_NC_ESTAGIOS_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_MATRICULA', columns: ['cd_matricula'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_estagios_alunos', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_CURSO', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_EMPRESA', 'colunas' => ['cd_empresa'], 'tabelaAlvo' => 'empresas', 'colunasAlvo' => ['cd_empresa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_INSTITUICAO', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_MATRICULA', 'colunas' => ['cd_matricula'], 'tabelaAlvo' => 'estnc_matriculas', 'colunasAlvo' => ['cd_matricula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_SITUACAO', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'estnc_situacoes_estagios', 'colunasAlvo' => ['cd_situacao_estagio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_ESTAGIOS_CD_VAGA', 'colunas' => ['cd_vaga_origem'], 'tabelaAlvo' => 'estnc_vagas', 'colunasAlvo' => ['cd_vaga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_pessoas_supervisores', 'colunas' => ['cd_supervisor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncEstagios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_estagio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstagio = null;

    #[ORM\Column(name: 'cd_empresa', type: 'integer')]
    private ?int $cdEmpresa = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'cd_curso', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCurso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_supervisor', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdSupervisor = null;

    #[ORM\ManyToOne(targetEntity: EstncVagas::class)]
    #[ORM\JoinColumn(name: 'cd_vaga_origem', referencedColumnName: 'cd_vaga', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncVagas $cdVagaOrigem = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\ManyToOne(targetEntity: EstncSituacoesEstagios::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao_estagio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?EstncSituacoesEstagios $cdSituacao = null;

    #[ORM\Column(name: 'sn_deferido_completo', type: 'boolean', nullable: true)]
    private ?bool $snDeferidoCompleto = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snObrigatorio = false;

    #[ORM\Column(name: 'dt_inicial_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicialCadastro = null;

    #[ORM\Column(name: 'dt_final_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinalCadastro = null;

    #[ORM\ManyToOne(targetEntity: EstncMatriculas::class)]
    #[ORM\JoinColumn(name: 'cd_matricula', referencedColumnName: 'cd_matricula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncMatriculas $cdMatricula = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_seguradora', type: 'string', length: 255, nullable: true)]
    private ?string $dsSeguradora = null;

    #[ORM\Column(name: 'nr_apolice', type: 'integer', nullable: true)]
    private ?int $nrApolice = null;

    public function __construct(
        ?int $cdEmpresa = null,
        ?InstituicoesEnsino $cdInstituicao = null,
        ?EstncCursos $cdCurso = null,
        ?Pessoas $cdPessoa = null,
        ?Pessoas $cdSupervisor = null,
        ?EstncVagas $cdVagaOrigem = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?EstncSituacoesEstagios $cdSituacao = null,
        ?bool $snDeferidoCompleto = null,
        ?bool $snObrigatorio = false,
        ?\DateTimeInterface $dtInicialCadastro = null,
        ?\DateTimeInterface $dtFinalCadastro = null,
        ?EstncMatriculas $cdMatricula = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsSeguradora = null,
        ?int $nrApolice = null
    ) {
        $this->cdEmpresa = $cdEmpresa;
        $this->cdInstituicao = $cdInstituicao;
        $this->cdCurso = $cdCurso;
        $this->cdPessoa = $cdPessoa;
        $this->cdSupervisor = $cdSupervisor;
        $this->cdVagaOrigem = $cdVagaOrigem;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->cdSituacao = $cdSituacao;
        $this->snDeferidoCompleto = $snDeferidoCompleto;
        $this->snObrigatorio = $snObrigatorio;
        $this->dtInicialCadastro = $dtInicialCadastro;
        $this->dtFinalCadastro = $dtFinalCadastro;
        $this->cdMatricula = $cdMatricula;
        $this->dtCadastro = $dtCadastro;
        $this->dsSeguradora = $dsSeguradora;
        $this->nrApolice = $nrApolice;
    }

    public function getCdEstagio(): ?int
    {
        return $this->cdEstagio;
    }

    public function getCdEmpresa(): ?int
    {
        return $this->cdEmpresa;
    }

    public function setCdEmpresa(?int $cdEmpresa): self
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
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

    public function getCdSupervisor(): ?Pessoas
    {
        return $this->cdSupervisor;
    }

    public function setCdSupervisor(?Pessoas $cdSupervisor): self
    {
        $this->cdSupervisor = $cdSupervisor;
        return $this;
    }

    public function getCdVagaOrigem(): ?EstncVagas
    {
        return $this->cdVagaOrigem;
    }

    public function setCdVagaOrigem(?EstncVagas $cdVagaOrigem): self
    {
        $this->cdVagaOrigem = $cdVagaOrigem;
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

    public function getCdSituacao(): ?EstncSituacoesEstagios
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?EstncSituacoesEstagios $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function isSnDeferidoCompleto(): ?bool
    {
        return $this->snDeferidoCompleto;
    }

    public function setSnDeferidoCompleto(?bool $snDeferidoCompleto): self
    {
        $this->snDeferidoCompleto = $snDeferidoCompleto;
        return $this;
    }

    public function isSnObrigatorio(): ?bool
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?bool $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function getDtInicialCadastro(): ?\DateTimeInterface
    {
        return $this->dtInicialCadastro;
    }

    public function setDtInicialCadastro(?\DateTimeInterface $dtInicialCadastro): self
    {
        $this->dtInicialCadastro = $dtInicialCadastro;
        return $this;
    }

    public function getDtFinalCadastro(): ?\DateTimeInterface
    {
        return $this->dtFinalCadastro;
    }

    public function setDtFinalCadastro(?\DateTimeInterface $dtFinalCadastro): self
    {
        $this->dtFinalCadastro = $dtFinalCadastro;
        return $this;
    }

    public function getCdMatricula(): ?EstncMatriculas
    {
        return $this->cdMatricula;
    }

    public function setCdMatricula(?EstncMatriculas $cdMatricula): self
    {
        $this->cdMatricula = $cdMatricula;
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

    public function getDsSeguradora(): ?string
    {
        return $this->dsSeguradora;
    }

    public function setDsSeguradora(?string $dsSeguradora): self
    {
        $this->dsSeguradora = $dsSeguradora;
        return $this;
    }

    public function getNrApolice(): ?int
    {
        return $this->nrApolice;
    }

    public function setNrApolice(?int $nrApolice): self
    {
        $this->nrApolice = $nrApolice;
        return $this;
    }
}
