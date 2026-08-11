<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieIntegracaoRepository::class)]
#[ORM\Table(
    name: 'omie_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_CD_INTEGRACAO_OMIE', columns: ['cd_coligada'])]
class OmieIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint')]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $cdColigada = 0;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 18, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'ds_app_key', type: 'string', length: 255)]
    private ?string $dsAppKey = null;

    #[ORM\Column(name: 'ds_app_secret', type: 'string', length: 255)]
    private ?string $dsAppSecret = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdColigada = 0,
        ?string $dsDescricao = null,
        ?string $dsCnpj = null,
        ?string $dsAppKey = null,
        ?string $dsAppSecret = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->dsDescricao = $dsDescricao;
        $this->dsCnpj = $dsCnpj;
        $this->dsAppKey = $dsAppKey;
        $this->dsAppSecret = $dsAppSecret;
        $this->dtBase = $dtBase;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getDsAppKey(): ?string
    {
        return $this->dsAppKey;
    }

    public function setDsAppKey(?string $dsAppKey): self
    {
        $this->dsAppKey = $dsAppKey;
        return $this;
    }

    public function getDsAppSecret(): ?string
    {
        return $this->dsAppSecret;
    }

    public function setDsAppSecret(?string $dsAppSecret): self
    {
        $this->dsAppSecret = $dsAppSecret;
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
