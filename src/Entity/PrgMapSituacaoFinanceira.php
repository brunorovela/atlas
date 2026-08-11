<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMapSituacaoFinanceiraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMapSituacaoFinanceiraRepository::class)]
#[ORM\Table(
    name: 'prg_map_situacao_financeira',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_situacao_financeira_baixa', columns: ['cd_situacao_financeira', 'cd_prg_situacao_baixa'])]
#[ORM\Index(name: 'idx_cd_situacao_financeira', columns: ['cd_situacao_financeira'])]
#[ORM\Index(name: 'idx_cd_prg_situacao_baixa', columns: ['cd_prg_situacao_baixa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_map_prg_situacao_baixa', 'colunas' => ['cd_prg_situacao_baixa'], 'tabelaAlvo' => 'prg_situacao_baixa', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'fk_map_situacao_financeira', 'colunas' => ['cd_situacao_financeira'], 'tabelaAlvo' => 'situacoes_financeiras', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class PrgMapSituacaoFinanceira
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: SituacoesFinanceiras::class)]
    #[ORM\JoinColumn(name: 'cd_situacao_financeira', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?SituacoesFinanceiras $cdSituacaoFinanceira = null;

    #[ORM\ManyToOne(targetEntity: PrgSituacaoBaixa::class)]
    #[ORM\JoinColumn(name: 'cd_prg_situacao_baixa', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgSituacaoBaixa $cdPrgSituacaoBaixa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?SituacoesFinanceiras $cdSituacaoFinanceira = null,
        ?PrgSituacaoBaixa $cdPrgSituacaoBaixa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSituacaoFinanceira = $cdSituacaoFinanceira;
        $this->cdPrgSituacaoBaixa = $cdPrgSituacaoBaixa;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdSituacaoFinanceira(): ?SituacoesFinanceiras
    {
        return $this->cdSituacaoFinanceira;
    }

    public function setCdSituacaoFinanceira(?SituacoesFinanceiras $cdSituacaoFinanceira): self
    {
        $this->cdSituacaoFinanceira = $cdSituacaoFinanceira;
        return $this;
    }

    public function getCdPrgSituacaoBaixa(): ?PrgSituacaoBaixa
    {
        return $this->cdPrgSituacaoBaixa;
    }

    public function setCdPrgSituacaoBaixa(?PrgSituacaoBaixa $cdPrgSituacaoBaixa): self
    {
        $this->cdPrgSituacaoBaixa = $cdPrgSituacaoBaixa;
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
