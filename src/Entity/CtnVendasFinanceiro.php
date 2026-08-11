<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CtnVendasFinanceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnVendasFinanceiroRepository::class)]
#[ORM\Table(
    name: 'ctn_vendas_financeiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_ESTORNO', columns: ['cd_movimento_estorno'])]
#[ORM\Index(name: 'IX_CD_VENDA', columns: ['cd_venda'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FINANCEIRO_MENSALIDADE', 'colunas' => ['cd_mensalidade'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FINANCEIRO_VENDA', 'colunas' => ['cd_venda'], 'tabelaAlvo' => 'ctn_vendas', 'colunasAlvo' => ['cd_venda'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnVendasFinanceiro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vendas_financeiro', type: 'integer')]
    private ?int $cdVendasFinanceiro = null;

    #[ORM\ManyToOne(targetEntity: CtnVendas::class)]
    #[ORM\JoinColumn(name: 'cd_venda', referencedColumnName: 'cd_venda', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CtnVendas $cdVenda = null;

    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'cd_mensalidade', referencedColumnName: 'cd_mensalidade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Column(name: 'sn_estorno', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEstorno = false;

    #[ORM\Column(name: 'cd_movimento_estorno', type: 'integer', nullable: true)]
    private ?int $cdMovimentoEstorno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CtnVendas $cdVenda = null,
        ?Mensalidades $cdMensalidade = null,
        ?bool $snEstorno = false,
        ?int $cdMovimentoEstorno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdVenda = $cdVenda;
        $this->cdMensalidade = $cdMensalidade;
        $this->snEstorno = $snEstorno;
        $this->cdMovimentoEstorno = $cdMovimentoEstorno;
        $this->dtBase = $dtBase;
    }

    public function getCdVendasFinanceiro(): ?int
    {
        return $this->cdVendasFinanceiro;
    }

    public function getCdVenda(): ?CtnVendas
    {
        return $this->cdVenda;
    }

    public function setCdVenda(?CtnVendas $cdVenda): self
    {
        $this->cdVenda = $cdVenda;
        return $this;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
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
