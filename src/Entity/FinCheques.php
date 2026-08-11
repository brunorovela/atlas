<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinChequesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinChequesRepository::class)]
#[ORM\Table(
    name: 'fin_cheques',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_cheque', columns: ['cd_cheque'])]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['ds_agencia', 'ds_banco', 'ds_cheque', 'ds_conta'])]
#[ORM\Index(name: 'IX_DS_CHEQUE', columns: ['ds_cheque'])]
#[ORM\Index(name: 'IX_DS_CONTA', columns: ['ds_conta'])]
#[ORM\Index(name: 'IX_DS_BANCO', columns: ['ds_banco'])]
#[ORM\Index(name: 'IX_DS_AGENCIA', columns: ['ds_agencia'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
class FinCheques
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cheque', type: 'integer')]
    private ?int $cdCheque = null;

    #[ORM\Column(name: 'ds_cheque', type: 'string', length: 30, nullable: true)]
    private ?string $dsCheque = null;

    #[ORM\Column(name: 'ds_conta', type: 'string', length: 15, nullable: true)]
    private ?string $dsConta = null;

    #[ORM\Column(name: 'ds_banco', type: 'string', length: 15, nullable: true)]
    private ?string $dsBanco = null;

    #[ORM\Column(name: 'ds_agencia', type: 'string', length: 15, nullable: true)]
    private ?string $dsAgencia = null;

    #[ORM\Column(name: 'dt_compensacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCompensacao = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'nr_valor', type: 'float', nullable: true)]
    private ?float $nrValor = null;

    #[ORM\Column(name: 'cd_origem', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $cdOrigem = true;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'dt_emissao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEmissao = null;

    #[ORM\Column(name: 'nm_titular', type: 'string', length: 255, nullable: true)]
    private ?string $nmTitular = null;

    public function __construct(
        ?string $dsCheque = null,
        ?string $dsConta = null,
        ?string $dsBanco = null,
        ?string $dsAgencia = null,
        ?\DateTimeInterface $dtCompensacao = null,
        ?int $cdSituacao = null,
        ?float $nrValor = null,
        ?bool $cdOrigem = true,
        ?int $cdCaixa = null,
        ?string $dsObservacao = null,
        ?\DateTimeInterface $dtEmissao = null,
        ?string $nmTitular = null
    ) {
        $this->dsCheque = $dsCheque;
        $this->dsConta = $dsConta;
        $this->dsBanco = $dsBanco;
        $this->dsAgencia = $dsAgencia;
        $this->dtCompensacao = $dtCompensacao;
        $this->cdSituacao = $cdSituacao;
        $this->nrValor = $nrValor;
        $this->cdOrigem = $cdOrigem;
        $this->cdCaixa = $cdCaixa;
        $this->dsObservacao = $dsObservacao;
        $this->dtEmissao = $dtEmissao;
        $this->nmTitular = $nmTitular;
    }

    public function getCdCheque(): ?int
    {
        return $this->cdCheque;
    }

    public function getDsCheque(): ?string
    {
        return $this->dsCheque;
    }

    public function setDsCheque(?string $dsCheque): self
    {
        $this->dsCheque = $dsCheque;
        return $this;
    }

    public function getDsConta(): ?string
    {
        return $this->dsConta;
    }

    public function setDsConta(?string $dsConta): self
    {
        $this->dsConta = $dsConta;
        return $this;
    }

    public function getDsBanco(): ?string
    {
        return $this->dsBanco;
    }

    public function setDsBanco(?string $dsBanco): self
    {
        $this->dsBanco = $dsBanco;
        return $this;
    }

    public function getDsAgencia(): ?string
    {
        return $this->dsAgencia;
    }

    public function setDsAgencia(?string $dsAgencia): self
    {
        $this->dsAgencia = $dsAgencia;
        return $this;
    }

    public function getDtCompensacao(): ?\DateTimeInterface
    {
        return $this->dtCompensacao;
    }

    public function setDtCompensacao(?\DateTimeInterface $dtCompensacao): self
    {
        $this->dtCompensacao = $dtCompensacao;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrValor(): ?float
    {
        return $this->nrValor;
    }

    public function setNrValor(?float $nrValor): self
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    public function isCdOrigem(): ?bool
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?bool $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
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

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
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

    public function getNmTitular(): ?string
    {
        return $this->nmTitular;
    }

    public function setNmTitular(?string $nmTitular): self
    {
        $this->nmTitular = $nmTitular;
        return $this;
    }
}
