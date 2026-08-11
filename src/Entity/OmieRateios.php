<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieRateiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieRateiosRepository::class)]
#[ORM\Table(
    name: 'omie_rateios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_REGRA', columns: ['cd_coligada_prestadora', 'nr_grau', 'cd_chave'])]
class OmieRateios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_coligada_prestadora', type: 'integer', nullable: true)]
    private ?int $cdColigadaPrestadora = null;

    #[ORM\Column(name: 'nr_grau', type: 'integer', nullable: true)]
    private ?int $nrGrau = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 10, nullable: true, options: ['comment' => 'Chave que indica a partida do faturamento = F72 F18 F10P'])]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'nr_porcentagem', type: 'float', nullable: true)]
    private ?float $nrPorcentagem = null;

    #[ORM\Column(name: 'ds_cnpj_faturamento', type: 'string', length: 18, nullable: true)]
    private ?string $dsCnpjFaturamento = null;

    #[ORM\Column(name: 'sn_produto', type: 'boolean', nullable: true)]
    private ?bool $snProduto = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdColigadaPrestadora = null,
        ?int $nrGrau = null,
        ?string $cdChave = null,
        ?float $nrPorcentagem = null,
        ?string $dsCnpjFaturamento = null,
        ?bool $snProduto = null,
        ?bool $snAtivo = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaPrestadora = $cdColigadaPrestadora;
        $this->nrGrau = $nrGrau;
        $this->cdChave = $cdChave;
        $this->nrPorcentagem = $nrPorcentagem;
        $this->dsCnpjFaturamento = $dsCnpjFaturamento;
        $this->snProduto = $snProduto;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdColigadaPrestadora(): ?int
    {
        return $this->cdColigadaPrestadora;
    }

    public function setCdColigadaPrestadora(?int $cdColigadaPrestadora): self
    {
        $this->cdColigadaPrestadora = $cdColigadaPrestadora;
        return $this;
    }

    public function getNrGrau(): ?int
    {
        return $this->nrGrau;
    }

    public function setNrGrau(?int $nrGrau): self
    {
        $this->nrGrau = $nrGrau;
        return $this;
    }

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getNrPorcentagem(): ?float
    {
        return $this->nrPorcentagem;
    }

    public function setNrPorcentagem(?float $nrPorcentagem): self
    {
        $this->nrPorcentagem = $nrPorcentagem;
        return $this;
    }

    public function getDsCnpjFaturamento(): ?string
    {
        return $this->dsCnpjFaturamento;
    }

    public function setDsCnpjFaturamento(?string $dsCnpjFaturamento): self
    {
        $this->dsCnpjFaturamento = $dsCnpjFaturamento;
        return $this;
    }

    public function isSnProduto(): ?bool
    {
        return $this->snProduto;
    }

    public function setSnProduto(?bool $snProduto): self
    {
        $this->snProduto = $snProduto;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
