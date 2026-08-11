<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimVoucherLoteTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimVoucherLoteTurmaRepository::class)]
#[ORM\Table(
    name: 'unim_voucher_lote_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_VOUCHER_LOTE_TURMA_NR_ANOSEMESTRE_CD_TURMA_TURMA', columns: ['NR_ANOSEMESTRE', 'CD_TURMA'])]
#[ORM\Index(name: 'IDX_993DA59CB460A0CD', columns: ['CD_LOTE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_VOUCHER_LOTE_TURMA_CD_LOTE_VOUCHER_LOTE_CD_LOTE', 'colunas' => ['CD_LOTE'], 'tabelaAlvo' => 'unim_voucher_lote', 'colunasAlvo' => ['CD_LOTE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_VOUCHER_LOTE_TURMA_NR_ANOSEMESTRE_CD_TURMA_TURMA', 'colunas' => ['NR_ANOSEMESTRE', 'CD_TURMA'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimVoucherLoteTurma
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimVoucherLote::class)]
    #[ORM\JoinColumn(name: 'CD_LOTE', referencedColumnName: 'CD_LOTE', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimVoucherLote $cdLote = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimVoucherLote $cdLote = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdLote = $cdLote;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->dtBase = $dtBase;
    }

    public function getCdLote(): ?UnimVoucherLote
    {
        return $this->cdLote;
    }

    public function setCdLote(?UnimVoucherLote $cdLote): self
    {
        $this->cdLote = $cdLote;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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
