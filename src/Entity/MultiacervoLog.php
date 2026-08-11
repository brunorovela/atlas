<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MultiacervoLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultiacervoLogRepository::class)]
#[ORM\Table(
    name: 'multiacervo_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MultiacervoLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_multiacervo_log', type: 'integer')]
    private ?int $cdMultiacervoLog = null;

    #[ORM\Column(name: 'cd_integracao_url', type: 'integer', nullable: true)]
    private ?int $cdIntegracaoUrl = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 65535, nullable: true)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoUrl = null,
        ?string $dsUrl = null,
        ?string $dsMensagem = null,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoUrl = $cdIntegracaoUrl;
        $this->dsUrl = $dsUrl;
        $this->dsMensagem = $dsMensagem;
        $this->dsRetorno = $dsRetorno;
        $this->dtBase = $dtBase;
    }

    public function getCdMultiacervoLog(): ?int
    {
        return $this->cdMultiacervoLog;
    }

    public function getCdIntegracaoUrl(): ?int
    {
        return $this->cdIntegracaoUrl;
    }

    public function setCdIntegracaoUrl(?int $cdIntegracaoUrl): self
    {
        $this->cdIntegracaoUrl = $cdIntegracaoUrl;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
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
