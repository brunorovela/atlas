<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfRepository::class)]
#[ORM\Table(
    name: 'fin_nf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'nr_nf', columns: ['nr_nf'])]
class FinNf
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_nf', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrNf = 0;

    #[ORM\Column(name: 'dt_nf', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNf = null;

    #[ORM\Column(name: 'vl_bruto', type: 'float', nullable: true)]
    private ?float $vlBruto = null;

    #[ORM\Column(name: 'vl_bolsas', type: 'float', nullable: true)]
    private ?float $vlBolsas = null;

    #[ORM\Column(name: 'vl_pago', type: 'float', nullable: true)]
    private ?float $vlPago = null;

    #[ORM\Column(name: 'sn_cancelada', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCancelada = false;

    #[ORM\Column(name: 'grupo_curso', type: 'string', length: 15, nullable: true)]
    private ?string $grupoCurso = null;

    #[ORM\Column(name: 'grupo_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $grupoTitulo = null;

    #[ORM\Column(name: 'grupo_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $grupoPessoa = null;

    #[ORM\Column(name: 'grupo_turma', type: 'string', length: 50)]
    private ?string $grupoTurma = null;

    #[ORM\Column(name: 'filtro_anosemestre', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $filtroAnosemestre = null;

    #[ORM\Column(name: 'filtro_depto', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $filtroDepto = null;

    #[ORM\Column(name: 'filtro_curso', type: 'string', length: 15, nullable: true)]
    private ?string $filtroCurso = null;

    #[ORM\Column(name: 'filtro_turma', type: 'string', length: 50)]
    private ?string $filtroTurma = null;

    #[ORM\Column(name: 'filtro_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $filtroPessoa = null;

    #[ORM\Column(name: 'filtro_parcela_inicio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $filtroParcelaInicio = null;

    #[ORM\Column(name: 'filtro_parcela_fim', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $filtroParcelaFim = null;

    #[ORM\Column(name: 'filtro_vencimento_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $filtroVencimentoInicio = null;

    #[ORM\Column(name: 'filtro_vencimento_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $filtroVencimentoFim = null;

    #[ORM\Column(name: 'filtro_pagamento_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $filtroPagamentoInicio = null;

    #[ORM\Column(name: 'filtro_pagamento_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $filtroPagamentoFim = null;

    #[ORM\Column(name: 'filtro_tipo_titulo', type: 'string', length: 100, nullable: true)]
    private ?string $filtroTipoTitulo = null;

    // Sem construtor: 22 propriedades. Use os setters encadeados.

    public function getNrNf(): int
    {
        return $this->nrNf;
    }

    public function setNrNf(int $nrNf): self
    {
        $this->nrNf = $nrNf;
        return $this;
    }

    public function getDtNf(): ?\DateTimeInterface
    {
        return $this->dtNf;
    }

    public function setDtNf(?\DateTimeInterface $dtNf): self
    {
        $this->dtNf = $dtNf;
        return $this;
    }

    public function getVlBruto(): ?float
    {
        return $this->vlBruto;
    }

    public function setVlBruto(?float $vlBruto): self
    {
        $this->vlBruto = $vlBruto;
        return $this;
    }

    public function getVlBolsas(): ?float
    {
        return $this->vlBolsas;
    }

    public function setVlBolsas(?float $vlBolsas): self
    {
        $this->vlBolsas = $vlBolsas;
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

    public function isSnCancelada(): ?bool
    {
        return $this->snCancelada;
    }

    public function setSnCancelada(?bool $snCancelada): self
    {
        $this->snCancelada = $snCancelada;
        return $this;
    }

    public function getGrupoCurso(): ?string
    {
        return $this->grupoCurso;
    }

    public function setGrupoCurso(?string $grupoCurso): self
    {
        $this->grupoCurso = $grupoCurso;
        return $this;
    }

    public function getGrupoTitulo(): ?int
    {
        return $this->grupoTitulo;
    }

    public function setGrupoTitulo(?int $grupoTitulo): self
    {
        $this->grupoTitulo = $grupoTitulo;
        return $this;
    }

    public function getGrupoPessoa(): ?int
    {
        return $this->grupoPessoa;
    }

    public function setGrupoPessoa(?int $grupoPessoa): self
    {
        $this->grupoPessoa = $grupoPessoa;
        return $this;
    }

    public function getGrupoTurma(): ?string
    {
        return $this->grupoTurma;
    }

    public function setGrupoTurma(?string $grupoTurma): self
    {
        $this->grupoTurma = $grupoTurma;
        return $this;
    }

    public function getFiltroAnosemestre(): ?int
    {
        return $this->filtroAnosemestre;
    }

    public function setFiltroAnosemestre(?int $filtroAnosemestre): self
    {
        $this->filtroAnosemestre = $filtroAnosemestre;
        return $this;
    }

    public function getFiltroDepto(): ?int
    {
        return $this->filtroDepto;
    }

    public function setFiltroDepto(?int $filtroDepto): self
    {
        $this->filtroDepto = $filtroDepto;
        return $this;
    }

    public function getFiltroCurso(): ?string
    {
        return $this->filtroCurso;
    }

    public function setFiltroCurso(?string $filtroCurso): self
    {
        $this->filtroCurso = $filtroCurso;
        return $this;
    }

    public function getFiltroTurma(): ?string
    {
        return $this->filtroTurma;
    }

    public function setFiltroTurma(?string $filtroTurma): self
    {
        $this->filtroTurma = $filtroTurma;
        return $this;
    }

    public function getFiltroPessoa(): ?int
    {
        return $this->filtroPessoa;
    }

    public function setFiltroPessoa(?int $filtroPessoa): self
    {
        $this->filtroPessoa = $filtroPessoa;
        return $this;
    }

    public function getFiltroParcelaInicio(): ?int
    {
        return $this->filtroParcelaInicio;
    }

    public function setFiltroParcelaInicio(?int $filtroParcelaInicio): self
    {
        $this->filtroParcelaInicio = $filtroParcelaInicio;
        return $this;
    }

    public function getFiltroParcelaFim(): ?int
    {
        return $this->filtroParcelaFim;
    }

    public function setFiltroParcelaFim(?int $filtroParcelaFim): self
    {
        $this->filtroParcelaFim = $filtroParcelaFim;
        return $this;
    }

    public function getFiltroVencimentoInicio(): ?\DateTimeInterface
    {
        return $this->filtroVencimentoInicio;
    }

    public function setFiltroVencimentoInicio(?\DateTimeInterface $filtroVencimentoInicio): self
    {
        $this->filtroVencimentoInicio = $filtroVencimentoInicio;
        return $this;
    }

    public function getFiltroVencimentoFim(): ?\DateTimeInterface
    {
        return $this->filtroVencimentoFim;
    }

    public function setFiltroVencimentoFim(?\DateTimeInterface $filtroVencimentoFim): self
    {
        $this->filtroVencimentoFim = $filtroVencimentoFim;
        return $this;
    }

    public function getFiltroPagamentoInicio(): ?\DateTimeInterface
    {
        return $this->filtroPagamentoInicio;
    }

    public function setFiltroPagamentoInicio(?\DateTimeInterface $filtroPagamentoInicio): self
    {
        $this->filtroPagamentoInicio = $filtroPagamentoInicio;
        return $this;
    }

    public function getFiltroPagamentoFim(): ?\DateTimeInterface
    {
        return $this->filtroPagamentoFim;
    }

    public function setFiltroPagamentoFim(?\DateTimeInterface $filtroPagamentoFim): self
    {
        $this->filtroPagamentoFim = $filtroPagamentoFim;
        return $this;
    }

    public function getFiltroTipoTitulo(): ?string
    {
        return $this->filtroTipoTitulo;
    }

    public function setFiltroTipoTitulo(?string $filtroTipoTitulo): self
    {
        $this->filtroTipoTitulo = $filtroTipoTitulo;
        return $this;
    }
}
