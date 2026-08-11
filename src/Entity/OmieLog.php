<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieLogRepository::class)]
#[ORM\Table(
    name: 'omie_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OmieLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_log', type: 'integer')]
    private ?int $cdOmieLog = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint', nullable: true)]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_codigo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigo = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'sn_erro', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snErro = false;

    #[ORM\Column(name: 'ds_envio', type: 'text', length: 65535, nullable: true)]
    private ?string $dsEnvio = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?string $dsChave = null,
        ?string $dsCodigo = null,
        ?string $dsAcao = null,
        ?bool $snErro = false,
        ?string $dsEnvio = null,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->dsChave = $dsChave;
        $this->dsCodigo = $dsCodigo;
        $this->dsAcao = $dsAcao;
        $this->snErro = $snErro;
        $this->dsEnvio = $dsEnvio;
        $this->dsRetorno = $dsRetorno;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieLog(): ?int
    {
        return $this->cdOmieLog;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsCodigo(): ?string
    {
        return $this->dsCodigo;
    }

    public function setDsCodigo(?string $dsCodigo): self
    {
        $this->dsCodigo = $dsCodigo;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function isSnErro(): ?bool
    {
        return $this->snErro;
    }

    public function setSnErro(?bool $snErro): self
    {
        $this->snErro = $snErro;
        return $this;
    }

    public function getDsEnvio(): ?string
    {
        return $this->dsEnvio;
    }

    public function setDsEnvio(?string $dsEnvio): self
    {
        $this->dsEnvio = $dsEnvio;
        return $this;
    }

    public function getDsRetorno(): ?string
    {
        return $this->dsRetorno;
    }

    public function setDsRetorno(?string $dsRetorno): self
    {
        $this->dsRetorno = $dsRetorno;
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
