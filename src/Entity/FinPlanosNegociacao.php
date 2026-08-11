<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosNegociacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosNegociacaoRepository::class)]
#[ORM\Table(
    name: 'fin_planos_negociacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_DT_FIM_PLANO', columns: ['dt_fim_plano'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
class FinPlanosNegociacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_negociacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlanoNegociacao = null;

    #[ORM\Column(name: 'ds_negociacao', type: 'text', length: 255, nullable: true)]
    private ?string $dsNegociacao = null;

    #[ORM\Column(name: 'vl_entrada_minima', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlEntradaMinima = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'nr_max_parcelas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMaxParcelas = null;

    #[ORM\Column(name: 'vl_min_parcela', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlMinParcela = null;

    #[ORM\Column(name: 'sn_acrescimo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAcrescimo = null;

    #[ORM\Column(name: 'vl_juros', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlJuros = null;

    #[ORM\Column(name: 'tp_juros', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $tpJuros = null;

    #[ORM\Column(name: 'vl_max_divida', type: 'float', nullable: true)]
    private ?float $vlMaxDivida = null;

    #[ORM\Column(name: 'vl_min_divida', type: 'float', nullable: true)]
    private ?float $vlMinDivida = null;

    #[ORM\Column(name: 'nr_dia_vencimento', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiaVencimento = null;

    #[ORM\Column(name: 'tp_titulo_emitido', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $tpTituloEmitido = null;

    #[ORM\Column(name: 'ds_desc_negocia', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescNegocia = null;

    #[ORM\Column(name: 'vl_multa', type: 'smallfloat', nullable: true, options: ['unsigned' => true, 'comment' => 'em %'])]
    private ?float $vlMulta = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'dt_fim_plano', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimPlano = null;

    #[ORM\Column(name: 'vl_desconto_juros', type: 'float', nullable: true)]
    private ?float $vlDescontoJuros = null;

    #[ORM\Column(name: 'sn_usar_todas_turmas', type: 'boolean', nullable: true)]
    private ?bool $snUsarTodasTurmas = null;

    #[ORM\Column(name: 'nr_situacao_titulo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $nrSituacaoTitulo = false;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer', nullable: true)]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'sn_portal_online', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snPortalOnline = 0;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdPlanoNegociacao(): ?int
    {
        return $this->cdPlanoNegociacao;
    }

    public function getDsNegociacao(): ?string
    {
        return $this->dsNegociacao;
    }

    public function setDsNegociacao(?string $dsNegociacao): self
    {
        $this->dsNegociacao = $dsNegociacao;
        return $this;
    }

    public function getVlEntradaMinima(): ?float
    {
        return $this->vlEntradaMinima;
    }

    public function setVlEntradaMinima(?float $vlEntradaMinima): self
    {
        $this->vlEntradaMinima = $vlEntradaMinima;
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

    public function getNrMaxParcelas(): ?int
    {
        return $this->nrMaxParcelas;
    }

    public function setNrMaxParcelas(?int $nrMaxParcelas): self
    {
        $this->nrMaxParcelas = $nrMaxParcelas;
        return $this;
    }

    public function getVlMinParcela(): ?float
    {
        return $this->vlMinParcela;
    }

    public function setVlMinParcela(?float $vlMinParcela): self
    {
        $this->vlMinParcela = $vlMinParcela;
        return $this;
    }

    public function getSnAcrescimo(): ?int
    {
        return $this->snAcrescimo;
    }

    public function setSnAcrescimo(?int $snAcrescimo): self
    {
        $this->snAcrescimo = $snAcrescimo;
        return $this;
    }

    public function getVlJuros(): ?float
    {
        return $this->vlJuros;
    }

    public function setVlJuros(?float $vlJuros): self
    {
        $this->vlJuros = $vlJuros;
        return $this;
    }

    public function getTpJuros(): ?string
    {
        return $this->tpJuros;
    }

    public function setTpJuros(?string $tpJuros): self
    {
        $this->tpJuros = $tpJuros;
        return $this;
    }

    public function getVlMaxDivida(): ?float
    {
        return $this->vlMaxDivida;
    }

    public function setVlMaxDivida(?float $vlMaxDivida): self
    {
        $this->vlMaxDivida = $vlMaxDivida;
        return $this;
    }

    public function getVlMinDivida(): ?float
    {
        return $this->vlMinDivida;
    }

    public function setVlMinDivida(?float $vlMinDivida): self
    {
        $this->vlMinDivida = $vlMinDivida;
        return $this;
    }

    public function getNrDiaVencimento(): ?int
    {
        return $this->nrDiaVencimento;
    }

    public function setNrDiaVencimento(?int $nrDiaVencimento): self
    {
        $this->nrDiaVencimento = $nrDiaVencimento;
        return $this;
    }

    public function getTpTituloEmitido(): ?int
    {
        return $this->tpTituloEmitido;
    }

    public function setTpTituloEmitido(?int $tpTituloEmitido): self
    {
        $this->tpTituloEmitido = $tpTituloEmitido;
        return $this;
    }

    public function getDsDescNegocia(): ?string
    {
        return $this->dsDescNegocia;
    }

    public function setDsDescNegocia(?string $dsDescNegocia): self
    {
        $this->dsDescNegocia = $dsDescNegocia;
        return $this;
    }

    public function getVlMulta(): ?float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(?float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getDtFimPlano(): ?\DateTimeInterface
    {
        return $this->dtFimPlano;
    }

    public function setDtFimPlano(?\DateTimeInterface $dtFimPlano): self
    {
        $this->dtFimPlano = $dtFimPlano;
        return $this;
    }

    public function getVlDescontoJuros(): ?float
    {
        return $this->vlDescontoJuros;
    }

    public function setVlDescontoJuros(?float $vlDescontoJuros): self
    {
        $this->vlDescontoJuros = $vlDescontoJuros;
        return $this;
    }

    public function isSnUsarTodasTurmas(): ?bool
    {
        return $this->snUsarTodasTurmas;
    }

    public function setSnUsarTodasTurmas(?bool $snUsarTodasTurmas): self
    {
        $this->snUsarTodasTurmas = $snUsarTodasTurmas;
        return $this;
    }

    public function isNrSituacaoTitulo(): ?bool
    {
        return $this->nrSituacaoTitulo;
    }

    public function setNrSituacaoTitulo(?bool $nrSituacaoTitulo): self
    {
        $this->nrSituacaoTitulo = $nrSituacaoTitulo;
        return $this;
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

    public function getSnPortalOnline(): int
    {
        return $this->snPortalOnline;
    }

    public function setSnPortalOnline(int $snPortalOnline): self
    {
        $this->snPortalOnline = $snPortalOnline;
        return $this;
    }
}
