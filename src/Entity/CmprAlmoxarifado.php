<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CmprAlmoxarifadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprAlmoxarifadoRepository::class)]
#[ORM\Table(
    name: 'cmpr_almoxarifado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CmprAlmoxarifado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_almoxarifado', type: 'integer')]
    private ?int $cdAlmoxarifado = null;

    #[ORM\Column(name: 'nm_almoxarifado', type: 'string', length: 200)]
    private ?string $nmAlmoxarifado = null;

    #[ORM\Column(name: 'ds_razao_social', type: 'string', length: 500, nullable: true)]
    private ?string $dsRazaoSocial = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 14, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'ds_endereco', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_coligada_faturamento', type: 'integer')]
    private ?int $cdColigadaFaturamento = null;

    #[ORM\Column(name: 'sn_independente', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snIndependente = false;

    public function __construct(
        ?string $nmAlmoxarifado = null,
        ?string $dsRazaoSocial = null,
        ?string $dsCnpj = null,
        ?string $dsEndereco = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $cdColigadaFaturamento = null,
        ?bool $snIndependente = false
    ) {
        $this->nmAlmoxarifado = $nmAlmoxarifado;
        $this->dsRazaoSocial = $dsRazaoSocial;
        $this->dsCnpj = $dsCnpj;
        $this->dsEndereco = $dsEndereco;
        $this->dtBase = $dtBase;
        $this->cdColigadaFaturamento = $cdColigadaFaturamento;
        $this->snIndependente = $snIndependente;
    }

    public function getCdAlmoxarifado(): ?int
    {
        return $this->cdAlmoxarifado;
    }

    public function getNmAlmoxarifado(): ?string
    {
        return $this->nmAlmoxarifado;
    }

    public function setNmAlmoxarifado(?string $nmAlmoxarifado): self
    {
        $this->nmAlmoxarifado = $nmAlmoxarifado;
        return $this;
    }

    public function getDsRazaoSocial(): ?string
    {
        return $this->dsRazaoSocial;
    }

    public function setDsRazaoSocial(?string $dsRazaoSocial): self
    {
        $this->dsRazaoSocial = $dsRazaoSocial;
        return $this;
    }

    public function getDsCnpj(): ?string
    {
        return $this->dsCnpj;
    }

    public function setDsCnpj(?string $dsCnpj): self
    {
        $this->dsCnpj = $dsCnpj;
        return $this;
    }

    public function getDsEndereco(): ?string
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco(?string $dsEndereco): self
    {
        $this->dsEndereco = $dsEndereco;
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

    public function getCdColigadaFaturamento(): ?int
    {
        return $this->cdColigadaFaturamento;
    }

    public function setCdColigadaFaturamento(?int $cdColigadaFaturamento): self
    {
        $this->cdColigadaFaturamento = $cdColigadaFaturamento;
        return $this;
    }

    public function isSnIndependente(): ?bool
    {
        return $this->snIndependente;
    }

    public function setSnIndependente(?bool $snIndependente): self
    {
        $this->snIndependente = $snIndependente;
        return $this;
    }
}
