<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimVoucherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimVoucherRepository::class)]
#[ORM\Table(
    name: 'unim_voucher',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_VOUCHER_CD_LOTE_NR_SEQUENCIAL', columns: ['CD_LOTE', 'NR_SEQUENCIAL'])]
#[ORM\Index(name: 'FK_VOUCHER_CD_LOTE_PESSOAS_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IDX_47B85F30B460A0CD', columns: ['CD_LOTE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_VOUCHER_CD_LOTE_PESSOAS_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_VOUCHER_CD_LOTE_VOUCHER_LOTE_CD_LOTE', 'colunas' => ['CD_LOTE'], 'tabelaAlvo' => 'unim_voucher_lote', 'colunasAlvo' => ['CD_LOTE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimVoucher
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_VOUCHER', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVoucher = null;

    #[ORM\ManyToOne(targetEntity: UnimVoucherLote::class)]
    #[ORM\JoinColumn(name: 'CD_LOTE', referencedColumnName: 'CD_LOTE', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimVoucherLote $cdLote = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'NR_SEQUENCIAL', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrSequencial = null;

    #[ORM\Column(name: 'DS_VOUCHER', type: 'string', length: 255)]
    private ?string $dsVoucher = null;

    #[ORM\Column(name: 'DT_VENCIMENTO', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'VL_DESCONTO', type: 'float')]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'VL_DESCONTO_VISTA', type: 'float')]
    private ?float $vlDescontoVista = null;

    #[ORM\Column(name: 'TP_DESCONTO', type: 'enum', nullable: true, options: ['default' => 'P', 'comment' => 'P=> Percentual, F=>Fixo', 'values' => ['P', 'F']])]
    private ?string $tpDesconto = 'P';

    #[ORM\Column(name: 'ds_parcela_range', type: 'string', length: 64, nullable: true, options: ['default' => ''])]
    private ?string $dsParcelaRange = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimVoucherLote $cdLote = null,
        ?Pessoas $cdPessoa = null,
        ?int $nrSequencial = null,
        ?string $dsVoucher = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?float $vlDesconto = null,
        ?float $vlDescontoVista = null,
        ?string $tpDesconto = 'P',
        ?string $dsParcelaRange = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdLote = $cdLote;
        $this->cdPessoa = $cdPessoa;
        $this->nrSequencial = $nrSequencial;
        $this->dsVoucher = $dsVoucher;
        $this->dtVencimento = $dtVencimento;
        $this->vlDesconto = $vlDesconto;
        $this->vlDescontoVista = $vlDescontoVista;
        $this->tpDesconto = $tpDesconto;
        $this->dsParcelaRange = $dsParcelaRange;
        $this->dtBase = $dtBase;
    }

    public function getCdVoucher(): ?int
    {
        return $this->cdVoucher;
    }

    public function getCdLote(): ?UnimVoucherLote
    {
        return $this->cdLote;
    }

    public function setCdLote(?UnimVoucherLote $cdLote): self
    {
        $this->cdLote = $cdLote;
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

    public function getNrSequencial(): ?int
    {
        return $this->nrSequencial;
    }

    public function setNrSequencial(?int $nrSequencial): self
    {
        $this->nrSequencial = $nrSequencial;
        return $this;
    }

    public function getDsVoucher(): ?string
    {
        return $this->dsVoucher;
    }

    public function setDsVoucher(?string $dsVoucher): self
    {
        $this->dsVoucher = $dsVoucher;
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

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
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
}
