<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinFacturasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinFacturasRepository::class)]
#[ORM\Table(
    name: 'fin_facturas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class FinFacturas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_factura', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdFactura = null;

    #[ORM\Column(name: 'dt_emissao', type: 'datetime')]
    private ?\DateTimeInterface $dtEmissao = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdPessoa = null;

    #[ORM\Column(name: 'vl_total', type: 'float', options: ['default' => '0'])]
    private float $vlTotal = 0.0;

    #[ORM\Column(name: 'dt_cancelamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCancelamento = null;

    public function __construct(
        ?\DateTimeInterface $dtEmissao = null,
        ?int $cdSituacao = null,
        ?string $cdPessoa = null,
        float $vlTotal = 0.0,
        ?\DateTimeInterface $dtCancelamento = null
    ) {
        $this->dtEmissao = $dtEmissao;
        $this->cdSituacao = $cdSituacao;
        $this->cdPessoa = $cdPessoa;
        $this->vlTotal = $vlTotal;
        $this->dtCancelamento = $dtCancelamento;
    }

    public function getCdFactura(): ?string
    {
        return $this->cdFactura;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPessoa(): ?string
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?string $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getVlTotal(): float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getDtCancelamento(): ?\DateTimeInterface
    {
        return $this->dtCancelamento;
    }

    public function setDtCancelamento(?\DateTimeInterface $dtCancelamento): self
    {
        $this->dtCancelamento = $dtCancelamento;
        return $this;
    }
}
