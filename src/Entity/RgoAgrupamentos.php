<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoAgrupamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoAgrupamentosRepository::class)]
#[ORM\Table(
    name: 'rgo_agrupamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RgoAgrupamentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_agrupamento', type: 'integer')]
    private ?int $cdAgrupamento = null;

    #[ORM\Column(name: 'cd_agrupamento_pai', type: 'integer', options: ['default' => '0'])]
    private int $cdAgrupamentoPai = 0;

    #[ORM\Column(name: 'ds_agrupamento', type: 'string', length: 255)]
    private ?string $dsAgrupamento = null;

    #[ORM\Column(name: 'ds_icone_agrupamento', type: 'string', length: 255)]
    private ?string $dsIconeAgrupamento = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdAgrupamentoPai = 0,
        ?string $dsAgrupamento = null,
        ?string $dsIconeAgrupamento = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAgrupamentoPai = $cdAgrupamentoPai;
        $this->dsAgrupamento = $dsAgrupamento;
        $this->dsIconeAgrupamento = $dsIconeAgrupamento;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdAgrupamento(): ?int
    {
        return $this->cdAgrupamento;
    }

    public function getCdAgrupamentoPai(): int
    {
        return $this->cdAgrupamentoPai;
    }

    public function setCdAgrupamentoPai(int $cdAgrupamentoPai): self
    {
        $this->cdAgrupamentoPai = $cdAgrupamentoPai;
        return $this;
    }

    public function getDsAgrupamento(): ?string
    {
        return $this->dsAgrupamento;
    }

    public function setDsAgrupamento(?string $dsAgrupamento): self
    {
        $this->dsAgrupamento = $dsAgrupamento;
        return $this;
    }

    public function getDsIconeAgrupamento(): ?string
    {
        return $this->dsIconeAgrupamento;
    }

    public function setDsIconeAgrupamento(?string $dsIconeAgrupamento): self
    {
        $this->dsIconeAgrupamento = $dsIconeAgrupamento;
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
