<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCpPreparacaoItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCpPreparacaoItensRepository::class)]
#[ORM\Table(
    name: 'fin_cp_preparacao_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_preparacao', columns: ['cd_preparacao', 'cd_titulo'])]
#[ORM\Index(name: 'IX_CD_PREPARACAO', columns: ['cd_preparacao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinCpPreparacaoItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_preparacao_item', type: 'integer')]
    private ?int $cdPreparacaoItem = null;

    #[ORM\Column(name: 'cd_preparacao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPreparacao = 0;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTitulo = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'vl_baixa', type: 'float', nullable: true)]
    private ?float $vlBaixa = null;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true)]
    private ?float $vlMulta = null;

    #[ORM\Column(name: 'vl_juros', type: 'float', nullable: true)]
    private ?float $vlJuros = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'sn_baixado', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snBaixado = 'N';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPreparacao = 0,
        int $cdTitulo = 0,
        int $cdColigada = 1,
        ?float $vlBaixa = null,
        ?float $vlMulta = null,
        ?float $vlJuros = null,
        ?float $vlDesconto = null,
        ?string $snBaixado = 'N',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPreparacao = $cdPreparacao;
        $this->cdTitulo = $cdTitulo;
        $this->cdColigada = $cdColigada;
        $this->vlBaixa = $vlBaixa;
        $this->vlMulta = $vlMulta;
        $this->vlJuros = $vlJuros;
        $this->vlDesconto = $vlDesconto;
        $this->snBaixado = $snBaixado;
        $this->dtBase = $dtBase;
    }

    public function getCdPreparacaoItem(): ?int
    {
        return $this->cdPreparacaoItem;
    }

    public function getCdPreparacao(): int
    {
        return $this->cdPreparacao;
    }

    public function setCdPreparacao(int $cdPreparacao): self
    {
        $this->cdPreparacao = $cdPreparacao;
        return $this;
    }

    public function getCdTitulo(): int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getVlBaixa(): ?float
    {
        return $this->vlBaixa;
    }

    public function setVlBaixa(?float $vlBaixa): self
    {
        $this->vlBaixa = $vlBaixa;
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

    public function getVlJuros(): ?float
    {
        return $this->vlJuros;
    }

    public function setVlJuros(?float $vlJuros): self
    {
        $this->vlJuros = $vlJuros;
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

    public function getSnBaixado(): ?string
    {
        return $this->snBaixado;
    }

    public function setSnBaixado(?string $snBaixado): self
    {
        $this->snBaixado = $snBaixado;
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
