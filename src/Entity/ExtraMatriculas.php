<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtraMatriculasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraMatriculasRepository::class)]
#[ORM\Table(
    name: 'extra_matriculas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_NR_MES', columns: ['nr_mes'])]
#[ORM\Index(name: 'IX_CD_TIPO_PESSOA', columns: ['cd_tipo_pessoa'])]
class ExtraMatriculas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_mes', type: 'integer', options: ['default' => '0'])]
    private int $nrMes = 0;

    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer', nullable: true)]
    private ?int $cdTipoPessoa = null;

    #[ORM\Column(name: 'vl_total', type: 'smallfloat', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'vl_descontos', type: 'smallfloat', nullable: true)]
    private ?float $vlDescontos = null;

    #[ORM\Column(name: 'vl_pago', type: 'smallfloat', nullable: true)]
    private ?float $vlPago = null;

    #[ORM\Column(name: 'dt_emissao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEmissao = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'cd_turma_matricula', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurmaMatricula = null;

    public function __construct(
        int $cdPessoa = 0,
        int $nrAnosemestre = 0,
        int $nrMes = 0,
        ?int $cdTipoPessoa = null,
        ?float $vlTotal = null,
        ?float $vlDescontos = null,
        ?float $vlPago = null,
        ?\DateTimeInterface $dtEmissao = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?string $cdTurmaMatricula = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrMes = $nrMes;
        $this->cdTipoPessoa = $cdTipoPessoa;
        $this->vlTotal = $vlTotal;
        $this->vlDescontos = $vlDescontos;
        $this->vlPago = $vlPago;
        $this->dtEmissao = $dtEmissao;
        $this->dtPagamento = $dtPagamento;
        $this->cdTurmaMatricula = $cdTurmaMatricula;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrMes(): int
    {
        return $this->nrMes;
    }

    public function setNrMes(int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getCdTipoPessoa(): ?int
    {
        return $this->cdTipoPessoa;
    }

    public function setCdTipoPessoa(?int $cdTipoPessoa): self
    {
        $this->cdTipoPessoa = $cdTipoPessoa;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getVlDescontos(): ?float
    {
        return $this->vlDescontos;
    }

    public function setVlDescontos(?float $vlDescontos): self
    {
        $this->vlDescontos = $vlDescontos;
        return $this;
    }

    public function getVlPago(): ?float
    {
        return $this->vlPago;
    }

    public function setVlPago(?float $vlPago): self
    {
        $this->vlPago = $vlPago;
        return $this;
    }

    public function getDtEmissao(): ?\DateTimeInterface
    {
        return $this->dtEmissao;
    }

    public function setDtEmissao(?\DateTimeInterface $dtEmissao): self
    {
        $this->dtEmissao = $dtEmissao;
        return $this;
    }

    public function getDtPagamento(): ?\DateTimeInterface
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(?\DateTimeInterface $dtPagamento): self
    {
        $this->dtPagamento = $dtPagamento;
        return $this;
    }

    public function getCdTurmaMatricula(): ?string
    {
        return $this->cdTurmaMatricula;
    }

    public function setCdTurmaMatricula(?string $cdTurmaMatricula): self
    {
        $this->cdTurmaMatricula = $cdTurmaMatricula;
        return $this;
    }
}
