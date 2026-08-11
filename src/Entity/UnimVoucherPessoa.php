<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimVoucherPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimVoucherPessoaRepository::class)]
#[ORM\Table(
    name: 'unim_voucher_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_CD_VOUCHER', columns: ['CD_VOUCHER'])]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_NR_ANOSEMESTRE', columns: ['NR_ANOSEMESTRE'])]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_CD_CURSO', columns: ['CD_CURSO'])]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_CD_TURMA', columns: ['CD_TURMA'])]
#[ORM\Index(name: 'IX_VOUCHER_PESSOA_ID_TURMA', columns: ['ID_TURMA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_voucher_pessoa_turmas', 'colunas' => ['ID_TURMA'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_VOUCHER_PESSOA_CD_VOUCHER_VOUCHER_CD_VOUCHER', 'colunas' => ['CD_VOUCHER'], 'tabelaAlvo' => 'unim_voucher', 'colunasAlvo' => ['CD_VOUCHER'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimVoucherPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_VOUCHER_PESSOA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVoucherPessoa = null;

    #[ORM\ManyToOne(targetEntity: UnimVoucher::class)]
    #[ORM\JoinColumn(name: 'CD_VOUCHER', referencedColumnName: 'CD_VOUCHER', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimVoucher $cdVoucher = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'ID_TURMA', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimVoucher $cdVoucher = null,
        ?int $nrAnosemestre = null,
        ?string $cdCurso = null,
        ?string $cdTurma = null,
        ?Turmas $idTurma = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdVoucher = $cdVoucher;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->idTurma = $idTurma;
        $this->cdPessoa = $cdPessoa;
        $this->dtBase = $dtBase;
    }

    public function getCdVoucherPessoa(): ?int
    {
        return $this->cdVoucherPessoa;
    }

    public function getCdVoucher(): ?UnimVoucher
    {
        return $this->cdVoucher;
    }

    public function setCdVoucher(?UnimVoucher $cdVoucher): self
    {
        $this->cdVoucher = $cdVoucher;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
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

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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
