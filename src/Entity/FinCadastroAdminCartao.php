<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCadastroAdminCartaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCadastroAdminCartaoRepository::class)]
#[ORM\Table(
    name: 'fin_cadastro_admin_cartao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONTA_CREDITO', columns: ['cd_conta_credito'])]
#[ORM\Index(name: 'IX_CD_CONTA_DEBITO', columns: ['cd_conta_debito'])]
#[ORM\Index(name: 'IX_CD_CONTA_BAIXA_CREDITO', columns: ['cd_conta_baixa_credito'])]
#[ORM\Index(name: 'IX_CD_CONTA_BAIXA_DEBITO', columns: ['cd_conta_baixa_debito'])]
class FinCadastroAdminCartao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_admin_cartao', type: 'integer')]
    private ?int $cdAdminCartao = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'cd_conta_credito', type: 'integer', nullable: true)]
    private ?int $cdContaCredito = null;

    #[ORM\Column(name: 'cd_conta_debito', type: 'integer', nullable: true)]
    private ?int $cdContaDebito = null;

    #[ORM\Column(name: 'cd_conta_baixa_credito', type: 'integer', nullable: true)]
    private ?int $cdContaBaixaCredito = null;

    #[ORM\Column(name: 'cd_conta_baixa_debito', type: 'integer', nullable: true)]
    private ?int $cdContaBaixaDebito = null;

    #[ORM\Column(name: 'nr_dia_vencimento_credito', type: 'integer')]
    private ?int $nrDiaVencimentoCredito = null;

    #[ORM\Column(name: 'nr_dia_vencimento_debito', type: 'integer')]
    private ?int $nrDiaVencimentoDebito = null;

    #[ORM\Column(name: 'nr_taxa_debito', type: 'float')]
    private ?float $nrTaxaDebito = null;

    #[ORM\Column(name: 'vl_min_operacao', type: 'float', nullable: true)]
    private ?float $vlMinOperacao = null;

    #[ORM\Column(name: 'sn_ativo', type: 'smallint')]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsNome = null,
        ?int $cdContaCredito = null,
        ?int $cdContaDebito = null,
        ?int $cdContaBaixaCredito = null,
        ?int $cdContaBaixaDebito = null,
        ?int $nrDiaVencimentoCredito = null,
        ?int $nrDiaVencimentoDebito = null,
        ?float $nrTaxaDebito = null,
        ?float $vlMinOperacao = null,
        ?int $snAtivo = null
    ) {
        $this->dsNome = $dsNome;
        $this->cdContaCredito = $cdContaCredito;
        $this->cdContaDebito = $cdContaDebito;
        $this->cdContaBaixaCredito = $cdContaBaixaCredito;
        $this->cdContaBaixaDebito = $cdContaBaixaDebito;
        $this->nrDiaVencimentoCredito = $nrDiaVencimentoCredito;
        $this->nrDiaVencimentoDebito = $nrDiaVencimentoDebito;
        $this->nrTaxaDebito = $nrTaxaDebito;
        $this->vlMinOperacao = $vlMinOperacao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdAdminCartao(): ?int
    {
        return $this->cdAdminCartao;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getCdContaCredito(): ?int
    {
        return $this->cdContaCredito;
    }

    public function setCdContaCredito(?int $cdContaCredito): self
    {
        $this->cdContaCredito = $cdContaCredito;
        return $this;
    }

    public function getCdContaDebito(): ?int
    {
        return $this->cdContaDebito;
    }

    public function setCdContaDebito(?int $cdContaDebito): self
    {
        $this->cdContaDebito = $cdContaDebito;
        return $this;
    }

    public function getCdContaBaixaCredito(): ?int
    {
        return $this->cdContaBaixaCredito;
    }

    public function setCdContaBaixaCredito(?int $cdContaBaixaCredito): self
    {
        $this->cdContaBaixaCredito = $cdContaBaixaCredito;
        return $this;
    }

    public function getCdContaBaixaDebito(): ?int
    {
        return $this->cdContaBaixaDebito;
    }

    public function setCdContaBaixaDebito(?int $cdContaBaixaDebito): self
    {
        $this->cdContaBaixaDebito = $cdContaBaixaDebito;
        return $this;
    }

    public function getNrDiaVencimentoCredito(): ?int
    {
        return $this->nrDiaVencimentoCredito;
    }

    public function setNrDiaVencimentoCredito(?int $nrDiaVencimentoCredito): self
    {
        $this->nrDiaVencimentoCredito = $nrDiaVencimentoCredito;
        return $this;
    }

    public function getNrDiaVencimentoDebito(): ?int
    {
        return $this->nrDiaVencimentoDebito;
    }

    public function setNrDiaVencimentoDebito(?int $nrDiaVencimentoDebito): self
    {
        $this->nrDiaVencimentoDebito = $nrDiaVencimentoDebito;
        return $this;
    }

    public function getNrTaxaDebito(): ?float
    {
        return $this->nrTaxaDebito;
    }

    public function setNrTaxaDebito(?float $nrTaxaDebito): self
    {
        $this->nrTaxaDebito = $nrTaxaDebito;
        return $this;
    }

    public function getVlMinOperacao(): ?float
    {
        return $this->vlMinOperacao;
    }

    public function setVlMinOperacao(?float $vlMinOperacao): self
    {
        $this->vlMinOperacao = $vlMinOperacao;
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
}
