<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinOrcamentosValoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentosValoresRepository::class)]
#[ORM\Table(
    name: 'fin_orcamentos_valores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxOrcamento', columns: ['ds_grupo', 'cd_orcamento', 'nr_ano', 'nr_mes', 'cd_conta'])]
#[ORM\Index(name: 'IX_CD_ORCAMENTO', columns: ['cd_orcamento'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_STATUS', columns: ['cd_status'])]
class FinOrcamentosValores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orcamentos_valores', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrcamentosValores = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 255)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'cd_orcamento', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdOrcamento = 0;

    #[ORM\Column(name: 'nr_ano', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAno = 0;

    #[ORM\Column(name: 'nr_mes', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrMes = 0;

    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'vl_realizado_anterior', type: 'float', nullable: true)]
    private ?float $vlRealizadoAnterior = null;

    #[ORM\Column(name: 'vl_orcamento', type: 'float', nullable: true)]
    private ?float $vlOrcamento = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_totalizador', type: 'boolean', options: ['default' => '0'])]
    private bool $snTotalizador = false;

    #[ORM\Column(name: 'cd_status', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdStatus = 0;

    public function __construct(
        ?string $dsGrupo = null,
        int $cdOrcamento = 0,
        int $nrAno = 0,
        int $nrMes = 0,
        ?int $cdConta = null,
        ?float $vlRealizadoAnterior = null,
        ?float $vlOrcamento = null,
        ?int $nrOrdem = null,
        bool $snTotalizador = false,
        ?int $cdStatus = 0
    ) {
        $this->dsGrupo = $dsGrupo;
        $this->cdOrcamento = $cdOrcamento;
        $this->nrAno = $nrAno;
        $this->nrMes = $nrMes;
        $this->cdConta = $cdConta;
        $this->vlRealizadoAnterior = $vlRealizadoAnterior;
        $this->vlOrcamento = $vlOrcamento;
        $this->nrOrdem = $nrOrdem;
        $this->snTotalizador = $snTotalizador;
        $this->cdStatus = $cdStatus;
    }

    public function getCdOrcamentosValores(): ?int
    {
        return $this->cdOrcamentosValores;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getCdOrcamento(): int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
    }

    public function getNrAno(): int
    {
        return $this->nrAno;
    }

    public function setNrAno(int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getNrMes(): int
    {
        return $this->nrMes;
    }

    public function setNrMes(int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getVlRealizadoAnterior(): ?float
    {
        return $this->vlRealizadoAnterior;
    }

    public function setVlRealizadoAnterior(?float $vlRealizadoAnterior): self
    {
        $this->vlRealizadoAnterior = $vlRealizadoAnterior;
        return $this;
    }

    public function getVlOrcamento(): ?float
    {
        return $this->vlOrcamento;
    }

    public function setVlOrcamento(?float $vlOrcamento): self
    {
        $this->vlOrcamento = $vlOrcamento;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnTotalizador(): bool
    {
        return $this->snTotalizador;
    }

    public function setSnTotalizador(bool $snTotalizador): self
    {
        $this->snTotalizador = $snTotalizador;
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
}
