<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SicoobFilaProcessamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SicoobFilaProcessamentoRepository::class)]
#[ORM\Table(
    name: 'sicoob_fila_processamento',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
class SicoobFilaProcessamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'id_solicitacao', type: 'string', length: 50)]
    private ?string $idSolicitacao = null;

    #[ORM\Column(name: 'sn_processado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProcessado = false;

    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdCaixa = null,
        ?string $idSolicitacao = null,
        ?bool $snProcessado = false,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->idSolicitacao = $idSolicitacao;
        $this->snProcessado = $snProcessado;
        $this->updatedAt = $updatedAt;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getIdSolicitacao(): ?string
    {
        return $this->idSolicitacao;
    }

    public function setIdSolicitacao(?string $idSolicitacao): self
    {
        $this->idSolicitacao = $idSolicitacao;
        return $this;
    }

    public function isSnProcessado(): ?bool
    {
        return $this->snProcessado;
    }

    public function setSnProcessado(?bool $snProcessado): self
    {
        $this->snProcessado = $snProcessado;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
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
