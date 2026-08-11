<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinCartoesParcelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCartoesParcelasRepository::class)]
#[ORM\Table(
    name: 'fin_cartoes_parcelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CARTAO', columns: ['cd_cartao'])]
#[ORM\Index(name: 'IX_NR_PARCELA', columns: ['nr_parcela'])]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_cartao']
)]
class FinCartoesParcelas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_cartao', type: 'integer')]
    private ?int $cdCartao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_parcela', type: 'integer', options: ['default' => '0'])]
    private int $nrParcela = 0;

    #[ORM\Column(name: 'vl_parcela', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlParcela = 0.0;

    #[ORM\Column(name: 'dt_previsao_cr', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrevisaoCr = null;

    #[ORM\Column(name: 'dt_credito', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCredito = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'sn_baixado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBaixado = false;

    public function __construct(
        ?int $cdCartao = null,
        int $nrParcela = 0,
        ?float $vlParcela = 0.0,
        ?\DateTimeInterface $dtPrevisaoCr = null,
        ?\DateTimeInterface $dtCredito = null,
        ?int $cdCaixa = null,
        ?bool $snBaixado = false
    ) {
        $this->cdCartao = $cdCartao;
        $this->nrParcela = $nrParcela;
        $this->vlParcela = $vlParcela;
        $this->dtPrevisaoCr = $dtPrevisaoCr;
        $this->dtCredito = $dtCredito;
        $this->cdCaixa = $cdCaixa;
        $this->snBaixado = $snBaixado;
    }

    public function getCdCartao(): ?int
    {
        return $this->cdCartao;
    }

    public function setCdCartao(?int $cdCartao): self
    {
        $this->cdCartao = $cdCartao;
        return $this;
    }

    public function getNrParcela(): int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlParcela(): ?float
    {
        return $this->vlParcela;
    }

    public function setVlParcela(?float $vlParcela): self
    {
        $this->vlParcela = $vlParcela;
        return $this;
    }

    public function getDtPrevisaoCr(): ?\DateTimeInterface
    {
        return $this->dtPrevisaoCr;
    }

    public function setDtPrevisaoCr(?\DateTimeInterface $dtPrevisaoCr): self
    {
        $this->dtPrevisaoCr = $dtPrevisaoCr;
        return $this;
    }

    public function getDtCredito(): ?\DateTimeInterface
    {
        return $this->dtCredito;
    }

    public function setDtCredito(?\DateTimeInterface $dtCredito): self
    {
        $this->dtCredito = $dtCredito;
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

    public function isSnBaixado(): ?bool
    {
        return $this->snBaixado;
    }

    public function setSnBaixado(?bool $snBaixado): self
    {
        $this->snBaixado = $snBaixado;
        return $this;
    }
}
