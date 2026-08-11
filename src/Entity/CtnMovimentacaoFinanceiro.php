<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CtnMovimentacaoFinanceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnMovimentacaoFinanceiroRepository::class)]
#[ORM\Table(
    name: 'ctn_movimentacao_financeiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_ESTORNO', columns: ['cd_movimento_estorno'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTACAO', columns: ['cd_movimentacao'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FINANCEIRO_MOVIMENTACAO', 'colunas' => ['cd_movimentacao'], 'tabelaAlvo' => 'ctn_movimentacao_credito', 'colunasAlvo' => ['cd_movimentacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnMovimentacaoFinanceiro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_movimentacao_financeiro', type: 'integer')]
    private ?int $cdMovimentacaoFinanceiro = null;

    #[ORM\ManyToOne(targetEntity: CtnMovimentacaoCredito::class)]
    #[ORM\JoinColumn(name: 'cd_movimentacao', referencedColumnName: 'cd_movimentacao', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CtnMovimentacaoCredito $cdMovimentacao = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'sn_estorno', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEstorno = false;

    #[ORM\Column(name: 'cd_movimento_estorno', type: 'integer', nullable: true)]
    private ?int $cdMovimentoEstorno = null;

    #[ORM\Column(name: 'sn_pago', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snPago = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CtnMovimentacaoCredito $cdMovimentacao = null,
        ?int $cdMensalidade = null,
        ?bool $snEstorno = false,
        ?int $cdMovimentoEstorno = null,
        ?int $snPago = 1,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMovimentacao = $cdMovimentacao;
        $this->cdMensalidade = $cdMensalidade;
        $this->snEstorno = $snEstorno;
        $this->cdMovimentoEstorno = $cdMovimentoEstorno;
        $this->snPago = $snPago;
        $this->dtBase = $dtBase;
    }

    public function getCdMovimentacaoFinanceiro(): ?int
    {
        return $this->cdMovimentacaoFinanceiro;
    }

    public function getCdMovimentacao(): ?CtnMovimentacaoCredito
    {
        return $this->cdMovimentacao;
    }

    public function setCdMovimentacao(?CtnMovimentacaoCredito $cdMovimentacao): self
    {
        $this->cdMovimentacao = $cdMovimentacao;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function isSnEstorno(): ?bool
    {
        return $this->snEstorno;
    }

    public function setSnEstorno(?bool $snEstorno): self
    {
        $this->snEstorno = $snEstorno;
        return $this;
    }

    public function getCdMovimentoEstorno(): ?int
    {
        return $this->cdMovimentoEstorno;
    }

    public function setCdMovimentoEstorno(?int $cdMovimentoEstorno): self
    {
        $this->cdMovimentoEstorno = $cdMovimentoEstorno;
        return $this;
    }

    public function getSnPago(): ?int
    {
        return $this->snPago;
    }

    public function setSnPago(?int $snPago): self
    {
        $this->snPago = $snPago;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
