<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\VetrolMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VetrolMatriculaRepository::class)]
#[ORM\Table(
    name: 'vetrol_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class VetrolMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vetrol_matricula', type: 'integer')]
    private ?int $cdVetrolMatricula = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'vendedor_id', type: 'integer', nullable: true)]
    private ?int $vendedorId = null;

    #[ORM\Column(name: 'vl_valor_adesao', type: 'float', nullable: true)]
    private ?float $vlValorAdesao = null;

    #[ORM\Column(name: 'vl_desconto_taxa_adesao', type: 'float', nullable: true)]
    private ?float $vlDescontoTaxaAdesao = null;

    #[ORM\Column(name: 'vl_desconto_na_mensalidade', type: 'float', nullable: true)]
    private ?float $vlDescontoNaMensalidade = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $vendedorId = null,
        ?float $vlValorAdesao = null,
        ?float $vlDescontoTaxaAdesao = null,
        ?float $vlDescontoNaMensalidade = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->vendedorId = $vendedorId;
        $this->vlValorAdesao = $vlValorAdesao;
        $this->vlDescontoTaxaAdesao = $vlDescontoTaxaAdesao;
        $this->vlDescontoNaMensalidade = $vlDescontoNaMensalidade;
        $this->dtBase = $dtBase;
    }

    public function getCdVetrolMatricula(): ?int
    {
        return $this->cdVetrolMatricula;
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

    public function getVendedorId(): ?int
    {
        return $this->vendedorId;
    }

    public function setVendedorId(?int $vendedorId): self
    {
        $this->vendedorId = $vendedorId;
        return $this;
    }

    public function getVlValorAdesao(): ?float
    {
        return $this->vlValorAdesao;
    }

    public function setVlValorAdesao(?float $vlValorAdesao): self
    {
        $this->vlValorAdesao = $vlValorAdesao;
        return $this;
    }

    public function getVlDescontoTaxaAdesao(): ?float
    {
        return $this->vlDescontoTaxaAdesao;
    }

    public function setVlDescontoTaxaAdesao(?float $vlDescontoTaxaAdesao): self
    {
        $this->vlDescontoTaxaAdesao = $vlDescontoTaxaAdesao;
        return $this;
    }

    public function getVlDescontoNaMensalidade(): ?float
    {
        return $this->vlDescontoNaMensalidade;
    }

    public function setVlDescontoNaMensalidade(?float $vlDescontoNaMensalidade): self
    {
        $this->vlDescontoNaMensalidade = $vlDescontoNaMensalidade;
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
