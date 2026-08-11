<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CompAcumuladosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompAcumuladosRepository::class)]
#[ORM\Table(
    name: 'comp_acumulados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'comp_acumulados_ibfk_1', columns: ['CD_COMPRA'])]
#[ORM\Index(name: 'IX_CD_COMPRA', columns: ['CD_COMPRA'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'comp_acumulados_ibfk_1', 'colunas' => ['CD_COMPRA'], 'tabelaAlvo' => 'comp_estoque', 'colunasAlvo' => ['CD_COMPRA'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompAcumulados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ACUMULADO', type: 'integer')]
    private ?int $cdAcumulado = null;

    #[ORM\ManyToOne(targetEntity: CompEstoque::class)]
    #[ORM\JoinColumn(name: 'CD_COMPRA', referencedColumnName: 'CD_COMPRA', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompEstoque $cdCompra = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'DT_REGISTRO', type: 'datetime')]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'SN_PAGO', type: 'boolean', options: ['default' => '0'])]
    private bool $snPago = false;

    #[ORM\Column(name: 'CD_KIT', type: 'integer', nullable: true)]
    private ?int $cdKit = null;

    public function __construct(
        ?CompEstoque $cdCompra = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtRegistro = null,
        bool $snPago = false,
        ?int $cdKit = null
    ) {
        $this->cdCompra = $cdCompra;
        $this->cdPessoa = $cdPessoa;
        $this->dtRegistro = $dtRegistro;
        $this->snPago = $snPago;
        $this->cdKit = $cdKit;
    }

    public function getCdAcumulado(): ?int
    {
        return $this->cdAcumulado;
    }

    public function getCdCompra(): ?CompEstoque
    {
        return $this->cdCompra;
    }

    public function setCdCompra(?CompEstoque $cdCompra): self
    {
        $this->cdCompra = $cdCompra;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function isSnPago(): bool
    {
        return $this->snPago;
    }

    public function setSnPago(bool $snPago): self
    {
        $this->snPago = $snPago;
        return $this;
    }

    public function getCdKit(): ?int
    {
        return $this->cdKit;
    }

    public function setCdKit(?int $cdKit): self
    {
        $this->cdKit = $cdKit;
        return $this;
    }
}
