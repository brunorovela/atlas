<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosPgtoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_NM_PLANO', columns: ['nm_plano'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'fk_plano_revisao', columns: ['cd_plano_origem'])]
#[ORM\Index(name: 'fk_plano_pessoa', columns: ['cd_pessoa_revisao'])]
class FinPlanosPgto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer')]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'nm_plano', type: 'string', length: 255)]
    private ?string $nmPlano = null;

    #[ORM\Column(name: 'tp_plano', type: TinyIntType::NAME)]
    private ?int $tpPlano = null;

    #[ORM\Column(name: 'sn_venc_dias_uteis', type: TinyIntType::NAME)]
    private ?int $snVencDiasUteis = null;

    #[ORM\Column(name: 'ds_dias_vencimento', type: 'string', length: 100, nullable: true)]
    private ?string $dsDiasVencimento = null;

    #[ORM\Column(name: 'nr_max_disciplinas', type: 'smallint', nullable: true)]
    private ?int $nrMaxDisciplinas = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 150, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_plano_origem', type: 'integer', nullable: true)]
    private ?int $cdPlanoOrigem = null;

    #[ORM\Column(name: 'dt_inicio_vigencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioVigencia = null;

    #[ORM\Column(name: 'dt_fim_vigencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimVigencia = null;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'cd_pessoa_revisao', type: 'integer', nullable: true)]
    private ?int $cdPessoaRevisao = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'nr_dia_padrao', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $nrDiaPadrao = 0;

    #[ORM\Column(name: 'sn_usar_matricula_online', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snUsarMatriculaOnline = 0;

    #[ORM\Column(name: 'sn_competencia_anosemestre_turma', type: 'boolean', options: ['default' => '0'])]
    private bool $snCompetenciaAnosemestreTurma = false;

    #[ORM\Column(name: 'sn_pagamento_express', type: 'boolean', options: ['default' => '0'])]
    private bool $snPagamentoExpress = false;

    #[ORM\Column(name: 'sn_vencimento_dinamico', type: 'boolean', options: ['default' => '0'])]
    private bool $snVencimentoDinamico = false;

    public function __construct(
        ?int $cdColigadaMatriz = null,
        ?string $nmPlano = null,
        ?int $tpPlano = null,
        ?int $snVencDiasUteis = null,
        ?string $dsDiasVencimento = null,
        ?int $nrMaxDisciplinas = null,
        ?int $snAtivo = null,
        ?string $dsObservacao = null,
        ?int $cdPlanoOrigem = null,
        ?\DateTimeInterface $dtInicioVigencia = null,
        ?\DateTimeInterface $dtFimVigencia = null,
        ?\DateTimeInterface $dtRevisao = null,
        ?int $cdPessoaRevisao = null,
        ?\DateTimeInterface $dtInclusao = null,
        int $nrDiaPadrao = 0,
        int $snUsarMatriculaOnline = 0,
        bool $snCompetenciaAnosemestreTurma = false,
        bool $snPagamentoExpress = false,
        bool $snVencimentoDinamico = false
    ) {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->nmPlano = $nmPlano;
        $this->tpPlano = $tpPlano;
        $this->snVencDiasUteis = $snVencDiasUteis;
        $this->dsDiasVencimento = $dsDiasVencimento;
        $this->nrMaxDisciplinas = $nrMaxDisciplinas;
        $this->snAtivo = $snAtivo;
        $this->dsObservacao = $dsObservacao;
        $this->cdPlanoOrigem = $cdPlanoOrigem;
        $this->dtInicioVigencia = $dtInicioVigencia;
        $this->dtFimVigencia = $dtFimVigencia;
        $this->dtRevisao = $dtRevisao;
        $this->cdPessoaRevisao = $cdPessoaRevisao;
        $this->dtInclusao = $dtInclusao;
        $this->nrDiaPadrao = $nrDiaPadrao;
        $this->snUsarMatriculaOnline = $snUsarMatriculaOnline;
        $this->snCompetenciaAnosemestreTurma = $snCompetenciaAnosemestreTurma;
        $this->snPagamentoExpress = $snPagamentoExpress;
        $this->snVencimentoDinamico = $snVencimentoDinamico;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getNmPlano(): ?string
    {
        return $this->nmPlano;
    }

    public function setNmPlano(?string $nmPlano): self
    {
        $this->nmPlano = $nmPlano;
        return $this;
    }

    public function getTpPlano(): ?int
    {
        return $this->tpPlano;
    }

    public function setTpPlano(?int $tpPlano): self
    {
        $this->tpPlano = $tpPlano;
        return $this;
    }

    public function getSnVencDiasUteis(): ?int
    {
        return $this->snVencDiasUteis;
    }

    public function setSnVencDiasUteis(?int $snVencDiasUteis): self
    {
        $this->snVencDiasUteis = $snVencDiasUteis;
        return $this;
    }

    public function getDsDiasVencimento(): ?string
    {
        return $this->dsDiasVencimento;
    }

    public function setDsDiasVencimento(?string $dsDiasVencimento): self
    {
        $this->dsDiasVencimento = $dsDiasVencimento;
        return $this;
    }

    public function getNrMaxDisciplinas(): ?int
    {
        return $this->nrMaxDisciplinas;
    }

    public function setNrMaxDisciplinas(?int $nrMaxDisciplinas): self
    {
        $this->nrMaxDisciplinas = $nrMaxDisciplinas;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getCdPlanoOrigem(): ?int
    {
        return $this->cdPlanoOrigem;
    }

    public function setCdPlanoOrigem(?int $cdPlanoOrigem): self
    {
        $this->cdPlanoOrigem = $cdPlanoOrigem;
        return $this;
    }

    public function getDtInicioVigencia(): ?\DateTimeInterface
    {
        return $this->dtInicioVigencia;
    }

    public function setDtInicioVigencia(?\DateTimeInterface $dtInicioVigencia): self
    {
        $this->dtInicioVigencia = $dtInicioVigencia;
        return $this;
    }

    public function getDtFimVigencia(): ?\DateTimeInterface
    {
        return $this->dtFimVigencia;
    }

    public function setDtFimVigencia(?\DateTimeInterface $dtFimVigencia): self
    {
        $this->dtFimVigencia = $dtFimVigencia;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
        return $this;
    }

    public function getCdPessoaRevisao(): ?int
    {
        return $this->cdPessoaRevisao;
    }

    public function setCdPessoaRevisao(?int $cdPessoaRevisao): self
    {
        $this->cdPessoaRevisao = $cdPessoaRevisao;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getNrDiaPadrao(): int
    {
        return $this->nrDiaPadrao;
    }

    public function setNrDiaPadrao(int $nrDiaPadrao): self
    {
        $this->nrDiaPadrao = $nrDiaPadrao;
        return $this;
    }

    public function getSnUsarMatriculaOnline(): int
    {
        return $this->snUsarMatriculaOnline;
    }

    public function setSnUsarMatriculaOnline(int $snUsarMatriculaOnline): self
    {
        $this->snUsarMatriculaOnline = $snUsarMatriculaOnline;
        return $this;
    }

    public function isSnCompetenciaAnosemestreTurma(): bool
    {
        return $this->snCompetenciaAnosemestreTurma;
    }

    public function setSnCompetenciaAnosemestreTurma(bool $snCompetenciaAnosemestreTurma): self
    {
        $this->snCompetenciaAnosemestreTurma = $snCompetenciaAnosemestreTurma;
        return $this;
    }

    public function isSnPagamentoExpress(): bool
    {
        return $this->snPagamentoExpress;
    }

    public function setSnPagamentoExpress(bool $snPagamentoExpress): self
    {
        $this->snPagamentoExpress = $snPagamentoExpress;
        return $this;
    }

    public function isSnVencimentoDinamico(): bool
    {
        return $this->snVencimentoDinamico;
    }

    public function setSnVencimentoDinamico(bool $snVencimentoDinamico): self
    {
        $this->snVencimentoDinamico = $snVencimentoDinamico;
        return $this;
    }
}
