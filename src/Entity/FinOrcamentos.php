<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinOrcamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentosRepository::class)]
#[ORM\Table(
    name: 'fin_orcamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_ORCAMENTOS_CD_DEMONSTRATIVO', columns: ['cd_demonstrativo'])]
#[ORM\Index(name: 'IX_CD_DEMONSTRATIVO', columns: ['cd_demonstrativo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ORCAMENTOS_CD_DEMONSTRATIVO', 'colunas' => ['cd_demonstrativo'], 'tabelaAlvo' => 'fin_demonstrativos', 'colunasAlvo' => ['cd_demonstrativo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_orcamento']
)]
class FinOrcamentos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrcamento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento_ano', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOrcamentoAno = null;

    #[ORM\Column(name: 'nr_mes_base', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMesBase = null;

    #[ORM\Column(name: 'nr_ano_base', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnoBase = null;

    #[ORM\Column(name: 'ds_orcamento', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrcamento = null;

    #[ORM\ManyToOne(targetEntity: FinDemonstrativos::class)]
    #[ORM\JoinColumn(name: 'cd_demonstrativo', referencedColumnName: 'cd_demonstrativo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinDemonstrativos $cdDemonstrativo = null;

    #[ORM\Column(name: 'sn_mostrar_sig', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snMostrarSig = 0;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigadaMatriz = 1;

    public function __construct(
        ?int $cdOrcamento = null,
        ?int $cdOrcamentoAno = null,
        ?int $nrMesBase = null,
        ?int $nrAnoBase = null,
        ?string $dsOrcamento = null,
        ?FinDemonstrativos $cdDemonstrativo = null,
        ?int $snMostrarSig = 0,
        int $cdColigadaMatriz = 1
    ) {
        $this->cdOrcamento = $cdOrcamento;
        $this->cdOrcamentoAno = $cdOrcamentoAno;
        $this->nrMesBase = $nrMesBase;
        $this->nrAnoBase = $nrAnoBase;
        $this->dsOrcamento = $dsOrcamento;
        $this->cdDemonstrativo = $cdDemonstrativo;
        $this->snMostrarSig = $snMostrarSig;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdOrcamento(): ?int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(?int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
    }

    public function getCdOrcamentoAno(): ?int
    {
        return $this->cdOrcamentoAno;
    }

    public function setCdOrcamentoAno(?int $cdOrcamentoAno): self
    {
        $this->cdOrcamentoAno = $cdOrcamentoAno;
        return $this;
    }

    public function getNrMesBase(): ?int
    {
        return $this->nrMesBase;
    }

    public function setNrMesBase(?int $nrMesBase): self
    {
        $this->nrMesBase = $nrMesBase;
        return $this;
    }

    public function getNrAnoBase(): ?int
    {
        return $this->nrAnoBase;
    }

    public function setNrAnoBase(?int $nrAnoBase): self
    {
        $this->nrAnoBase = $nrAnoBase;
        return $this;
    }

    public function getDsOrcamento(): ?string
    {
        return $this->dsOrcamento;
    }

    public function setDsOrcamento(?string $dsOrcamento): self
    {
        $this->dsOrcamento = $dsOrcamento;
        return $this;
    }

    public function getCdDemonstrativo(): ?FinDemonstrativos
    {
        return $this->cdDemonstrativo;
    }

    public function setCdDemonstrativo(?FinDemonstrativos $cdDemonstrativo): self
    {
        $this->cdDemonstrativo = $cdDemonstrativo;
        return $this;
    }

    public function getSnMostrarSig(): ?int
    {
        return $this->snMostrarSig;
    }

    public function setSnMostrarSig(?int $snMostrarSig): self
    {
        $this->snMostrarSig = $snMostrarSig;
        return $this;
    }

    public function getCdColigadaMatriz(): int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
