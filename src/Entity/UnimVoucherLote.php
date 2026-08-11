<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimVoucherLoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimVoucherLoteRepository::class)]
#[ORM\Table(
    name: 'unim_voucher_lote',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_VOUCHER_LOTE_CD_FORNECEDOR_PESSOAS_CD_PESSOA', columns: ['CD_FORNECEDOR'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_VOUCHER_LOTE_CD_FORNECEDOR_PESSOAS_CD_PESSOA', 'colunas' => ['CD_FORNECEDOR'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimVoucherLote
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_LOTE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLote = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_FORNECEDOR', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdFornecedor = null;

    #[ORM\Column(name: 'DS_LOTE', type: 'string', length: 255)]
    private ?string $dsLote = null;

    #[ORM\Column(name: 'DT_VENCIMENTO', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'DS_PREFIXO', type: 'string', length: 64, nullable: true)]
    private ?string $dsPrefixo = null;

    #[ORM\Column(name: 'DS_SUFIXO', type: 'string', length: 64, nullable: true)]
    private ?string $dsSufixo = null;

    #[ORM\Column(name: 'VL_DESCONTO', type: 'float')]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'NR_QUANTIDADE', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrQuantidade = null;

    #[ORM\Column(name: 'VL_DESCONTO_VISTA', type: 'float')]
    private ?float $vlDescontoVista = null;

    #[ORM\Column(name: 'TP_DESCONTO', type: 'enum', nullable: true, options: ['default' => 'P', 'comment' => 'P=> Percentual, F=>Fixo', 'values' => ['P', 'F']])]
    private ?string $tpDesconto = 'P';

    #[ORM\Column(name: 'DS_PARCELA_RANGE', type: 'string', length: 64, nullable: true, options: ['default' => ''])]
    private ?string $dsParcelaRange = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'nr_tipo_voucher', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => '1 - Gerar vouchers com código de uso individual; 
2 - Gerar vouchers com código de uso coletivo; 
'])]
    private int $nrTipoVoucher = 1;

    public function __construct(
        ?Pessoas $cdFornecedor = null,
        ?string $dsLote = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?string $dsPrefixo = null,
        ?string $dsSufixo = null,
        ?float $vlDesconto = null,
        ?int $nrQuantidade = null,
        ?float $vlDescontoVista = null,
        ?string $tpDesconto = 'P',
        ?string $dsParcelaRange = '',
        ?\DateTimeInterface $dtBase = null,
        int $nrTipoVoucher = 1
    ) {
        $this->cdFornecedor = $cdFornecedor;
        $this->dsLote = $dsLote;
        $this->dtVencimento = $dtVencimento;
        $this->dsPrefixo = $dsPrefixo;
        $this->dsSufixo = $dsSufixo;
        $this->vlDesconto = $vlDesconto;
        $this->nrQuantidade = $nrQuantidade;
        $this->vlDescontoVista = $vlDescontoVista;
        $this->tpDesconto = $tpDesconto;
        $this->dsParcelaRange = $dsParcelaRange;
        $this->dtBase = $dtBase;
        $this->nrTipoVoucher = $nrTipoVoucher;
    }

    public function getCdLote(): ?int
    {
        return $this->cdLote;
    }

    public function getCdFornecedor(): ?Pessoas
    {
        return $this->cdFornecedor;
    }

    public function setCdFornecedor(?Pessoas $cdFornecedor): self
    {
        $this->cdFornecedor = $cdFornecedor;
        return $this;
    }

    public function getDsLote(): ?string
    {
        return $this->dsLote;
    }

    public function setDsLote(?string $dsLote): self
    {
        $this->dsLote = $dsLote;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getDsPrefixo(): ?string
    {
        return $this->dsPrefixo;
    }

    public function setDsPrefixo(?string $dsPrefixo): self
    {
        $this->dsPrefixo = $dsPrefixo;
        return $this;
    }

    public function getDsSufixo(): ?string
    {
        return $this->dsSufixo;
    }

    public function setDsSufixo(?string $dsSufixo): self
    {
        $this->dsSufixo = $dsSufixo;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getVlDescontoVista(): ?float
    {
        return $this->vlDescontoVista;
    }

    public function setVlDescontoVista(?float $vlDescontoVista): self
    {
        $this->vlDescontoVista = $vlDescontoVista;
        return $this;
    }

    public function getTpDesconto(): ?string
    {
        return $this->tpDesconto;
    }

    public function setTpDesconto(?string $tpDesconto): self
    {
        $this->tpDesconto = $tpDesconto;
        return $this;
    }

    public function getDsParcelaRange(): ?string
    {
        return $this->dsParcelaRange;
    }

    public function setDsParcelaRange(?string $dsParcelaRange): self
    {
        $this->dsParcelaRange = $dsParcelaRange;
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

    public function getNrTipoVoucher(): int
    {
        return $this->nrTipoVoucher;
    }

    public function setNrTipoVoucher(int $nrTipoVoucher): self
    {
        $this->nrTipoVoucher = $nrTipoVoucher;
        return $this;
    }
}
