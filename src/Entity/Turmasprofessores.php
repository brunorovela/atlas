<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TurmasprofessoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurmasprofessoresRepository::class)]
#[ORM\Table(
    name: 'turmasprofessores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Chave', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_PROFESSOR', columns: ['professor'])]
#[ORM\Index(name: 'FK_TURMASPROF_SALA_UNI_SALAS', columns: ['cd_sala'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TURMASPROF_SALA_UNIM_SALA_CD_SALA', 'colunas' => ['cd_sala'], 'tabelaAlvo' => 'unim_sala', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_turmaprofessor']
)]
class Turmasprofessores
{
    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $curso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'disciplina', type: 'integer', options: ['default' => '0'])]
    private int $disciplina = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'professor', type: 'integer', options: ['default' => '0'])]
    private int $professor = 0;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer')]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'numeroaulas', type: 'integer', nullable: true)]
    private ?int $numeroaulas = null;

    #[ORM\Column(name: 'situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $situacao = 'N';

    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 50, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'cd_chave_plano', type: 'integer', nullable: true)]
    private ?int $cdChavePlano = null;

    #[ORM\ManyToOne(targetEntity: UnimSala::class)]
    #[ORM\JoinColumn(name: 'cd_sala', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimSala $cdSala = null;

    #[ORM\Column(name: 'nr_carga_horaria_efetiva', type: 'float', nullable: true)]
    private ?float $nrCargaHorariaEfetiva = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_todos_polos', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snTodosPolos = 1;

    #[ORM\Column(name: 'nr_fator_ch', type: 'decimal', precision: 3, scale: 2, options: ['default' => '1.00', 'comment' => 'Fator carga horária (inspira)'])]
    private string $nrFatorCh = '1.00';

    #[ORM\Column(name: 'cd_chapa', type: 'string', length: 16, nullable: true, options: ['comment' => 'origem tabela funcionarios_admissoes'])]
    private ?string $cdChapa = null;

    public function __construct(
        int $anosemestre = 0,
        string $curso = '',
        int $disciplina = 0,
        ?string $turma = null,
        int $professor = 0,
        ?int $cdTurmaprofessor = null,
        ?int $numeroaulas = null,
        ?string $situacao = 'N',
        ?int $cdCategoria = null,
        ?string $dsSala = null,
        ?int $cdChavePlano = null,
        ?UnimSala $cdSala = null,
        ?float $nrCargaHorariaEfetiva = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $snTodosPolos = 1,
        string $nrFatorCh = '1.00',
        ?string $cdChapa = null
    ) {
        $this->anosemestre = $anosemestre;
        $this->curso = $curso;
        $this->disciplina = $disciplina;
        $this->turma = $turma;
        $this->professor = $professor;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->numeroaulas = $numeroaulas;
        $this->situacao = $situacao;
        $this->cdCategoria = $cdCategoria;
        $this->dsSala = $dsSala;
        $this->cdChavePlano = $cdChavePlano;
        $this->cdSala = $cdSala;
        $this->nrCargaHorariaEfetiva = $nrCargaHorariaEfetiva;
        $this->dtBase = $dtBase;
        $this->snTodosPolos = $snTodosPolos;
        $this->nrFatorCh = $nrFatorCh;
        $this->cdChapa = $cdChapa;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getDisciplina(): int
    {
        return $this->disciplina;
    }

    public function setDisciplina(int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getProfessor(): int
    {
        return $this->professor;
    }

    public function setProfessor(int $professor): self
    {
        $this->professor = $professor;
        return $this;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getNumeroaulas(): ?int
    {
        return $this->numeroaulas;
    }

    public function setNumeroaulas(?int $numeroaulas): self
    {
        $this->numeroaulas = $numeroaulas;
        return $this;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getDsSala(): ?string
    {
        return $this->dsSala;
    }

    public function setDsSala(?string $dsSala): self
    {
        $this->dsSala = $dsSala;
        return $this;
    }

    public function getCdChavePlano(): ?int
    {
        return $this->cdChavePlano;
    }

    public function setCdChavePlano(?int $cdChavePlano): self
    {
        $this->cdChavePlano = $cdChavePlano;
        return $this;
    }

    public function getCdSala(): ?UnimSala
    {
        return $this->cdSala;
    }

    public function setCdSala(?UnimSala $cdSala): self
    {
        $this->cdSala = $cdSala;
        return $this;
    }

    public function getNrCargaHorariaEfetiva(): ?float
    {
        return $this->nrCargaHorariaEfetiva;
    }

    public function setNrCargaHorariaEfetiva(?float $nrCargaHorariaEfetiva): self
    {
        $this->nrCargaHorariaEfetiva = $nrCargaHorariaEfetiva;
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

    public function getSnTodosPolos(): ?int
    {
        return $this->snTodosPolos;
    }

    public function setSnTodosPolos(?int $snTodosPolos): self
    {
        $this->snTodosPolos = $snTodosPolos;
        return $this;
    }

    public function getNrFatorCh(): string
    {
        return $this->nrFatorCh;
    }

    public function setNrFatorCh(string $nrFatorCh): self
    {
        $this->nrFatorCh = $nrFatorCh;
        return $this;
    }

    public function getCdChapa(): ?string
    {
        return $this->cdChapa;
    }

    public function setCdChapa(?string $cdChapa): self
    {
        $this->cdChapa = $cdChapa;
        return $this;
    }
}
