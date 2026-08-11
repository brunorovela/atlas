<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SrvBs2AtualizarMensalidadeLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SrvBs2AtualizarMensalidadeLogRepository::class)]
#[ORM\Table(
    name: 'srv_bs2_atualizar_mensalidade_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SrvBs2AtualizarMensalidadeLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_srv_bs2_atualizar_mensalidade_log', type: 'integer')]
    private ?int $cdSrvBs2AtualizarMensalidadeLog = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 65535)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'sn_sucesso', type: 'integer')]
    private ?int $snSucesso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsMensagem = null,
        ?int $snSucesso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsMensagem = $dsMensagem;
        $this->snSucesso = $snSucesso;
        $this->dtBase = $dtBase;
    }

    public function getCdSrvBs2AtualizarMensalidadeLog(): ?int
    {
        return $this->cdSrvBs2AtualizarMensalidadeLog;
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

    public function getSnSucesso(): ?int
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(?int $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
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
