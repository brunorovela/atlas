<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuLogRepository::class)]
#[ORM\Table(
    name: 'nu_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'codigo', columns: ['codigo'])]
#[ORM\Index(name: 'IX_DT_LOG', columns: ['dt_log'])]
class NuLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer', options: ['unsigned' => true])]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true)]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_autorizador', type: 'integer', nullable: true)]
    private ?int $cdAutorizador = null;

    public function __construct(
        ?int $cdAcao = null,
        ?int $cdUsuario = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtLog = null,
        ?int $cdColigada = null,
        ?int $cdAutorizador = null
    ) {
        $this->cdAcao = $cdAcao;
        $this->cdUsuario = $cdUsuario;
        $this->dsChave = $dsChave;
        $this->dtLog = $dtLog;
        $this->cdColigada = $cdColigada;
        $this->cdAutorizador = $cdAutorizador;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
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

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
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

    public function getCdAutorizador(): ?int
    {
        return $this->cdAutorizador;
    }

    public function setCdAutorizador(?int $cdAutorizador): self
    {
        $this->cdAutorizador = $cdAutorizador;
        return $this;
    }
}
