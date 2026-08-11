<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasAlunosRepository::class)]
#[ORM\Table(
    name: 'diario_provas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_CD_BIMESTRE', columns: ['cd_bimestre'])]
#[ORM\Index(name: 'IX_NR_PROVA', columns: ['nr_prova'])]
#[ORM\Index(name: 'IX_MOODLE_UPDATE_BIMESTRE', columns: ['cd_turma', 'nr_anosem', 'cd_disciplina', 'cd_bimestre', 'nr_prova'], options: ['lengths' => [20, null, null, null, null]])]
#[ORM\Index(name: 'IX_ID_PROVA', columns: ['id_prova'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['id_prova']
)]
class DiarioProvasAlunos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosem = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDisciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_bimestre', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdBimestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_prova', type: 'integer', options: ['default' => '0'])]
    private int $nrProva = 0;

    #[ORM\Column(name: 'vl_nota', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlNota = null;

    #[ORM\Column(name: 'sn_importada', type: 'boolean', options: ['default' => '0'])]
    private bool $snImportada = false;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'sn_faltou', type: TinyIntType::NAME, nullable: true)]
    private ?int $snFaltou = null;

    #[ORM\Column(name: 'sn_bloqueado', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snBloqueado = 0;

    #[ORM\Column(name: 'id_prova', type: 'integer')]
    private ?int $idProva = null;

    #[ORM\Column(name: 'cd_prova_importada', type: 'integer', nullable: true)]
    private ?int $cdProvaImportada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPessoa = 0,
        ?string $cdTurma = null,
        int $nrAnosem = 0,
        int $cdDisciplina = 0,
        int $cdBimestre = 0,
        int $nrProva = 0,
        ?float $vlNota = null,
        bool $snImportada = false,
        ?string $dsObservacao = null,
        ?int $snFaltou = null,
        int $snBloqueado = 0,
        ?int $idProva = null,
        ?int $cdProvaImportada = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->nrAnosem = $nrAnosem;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdBimestre = $cdBimestre;
        $this->nrProva = $nrProva;
        $this->vlNota = $vlNota;
        $this->snImportada = $snImportada;
        $this->dsObservacao = $dsObservacao;
        $this->snFaltou = $snFaltou;
        $this->snBloqueado = $snBloqueado;
        $this->idProva = $idProva;
        $this->cdProvaImportada = $cdProvaImportada;
        $this->dtBase = $dtBase;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getNrAnosem(): int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }

    public function getCdDisciplina(): int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdBimestre(): int
    {
        return $this->cdBimestre;
    }

    public function setCdBimestre(int $cdBimestre): self
    {
        $this->cdBimestre = $cdBimestre;
        return $this;
    }

    public function getNrProva(): int
    {
        return $this->nrProva;
    }

    public function setNrProva(int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getVlNota(): ?float
    {
        return $this->vlNota;
    }

    public function setVlNota(?float $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }

    public function isSnImportada(): bool
    {
        return $this->snImportada;
    }

    public function setSnImportada(bool $snImportada): self
    {
        $this->snImportada = $snImportada;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getSnFaltou(): ?int
    {
        return $this->snFaltou;
    }

    public function setSnFaltou(?int $snFaltou): self
    {
        $this->snFaltou = $snFaltou;
        return $this;
    }

    public function getSnBloqueado(): int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getIdProva(): ?int
    {
        return $this->idProva;
    }

    public function setIdProva(?int $idProva): self
    {
        $this->idProva = $idProva;
        return $this;
    }

    public function getCdProvaImportada(): ?int
    {
        return $this->cdProvaImportada;
    }

    public function setCdProvaImportada(?int $cdProvaImportada): self
    {
        $this->cdProvaImportada = $cdProvaImportada;
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
