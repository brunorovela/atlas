<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MensalidadesCieloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesCieloRepository::class)]
#[ORM\Table(
    name: 'mensalidades_cielo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_STATUS', columns: ['cd_status'])]
class MensalidadesCielo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_chave_integracao', type: 'string', length: 255)]
    private ?string $cdChaveIntegracao = null;

    #[ORM\Column(name: 'nr_pedido', type: 'string', length: 255, nullable: true)]
    private ?string $nrPedido = null;

    #[ORM\Column(name: 'cd_status', type: 'integer', nullable: true)]
    private ?int $cdStatus = null;

    #[ORM\Column(name: 'sn_cancelado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snCancelado = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $cdChaveIntegracao = null,
        ?string $nrPedido = null,
        ?int $cdStatus = null,
        ?int $snCancelado = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdChaveIntegracao = $cdChaveIntegracao;
        $this->nrPedido = $nrPedido;
        $this->cdStatus = $cdStatus;
        $this->snCancelado = $snCancelado;
        $this->dtBase = $dtBase;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdChaveIntegracao(): ?string
    {
        return $this->cdChaveIntegracao;
    }

    public function setCdChaveIntegracao(?string $cdChaveIntegracao): self
    {
        $this->cdChaveIntegracao = $cdChaveIntegracao;
        return $this;
    }

    public function getNrPedido(): ?string
    {
        return $this->nrPedido;
    }

    public function setNrPedido(?string $nrPedido): self
    {
        $this->nrPedido = $nrPedido;
        return $this;
    }

    public function getCdStatus(): ?int
    {
        return $this->cdStatus;
    }

    public function setCdStatus(?int $cdStatus): self
    {
        $this->cdStatus = $cdStatus;
        return $this;
    }

    public function getSnCancelado(): ?int
    {
        return $this->snCancelado;
    }

    public function setSnCancelado(?int $snCancelado): self
    {
        $this->snCancelado = $snCancelado;
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
