<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiarioCronogramasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioCronogramasRepository::class)]
#[ORM\Table(
    name: 'diario_cronogramas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_Diario_Cronogramas', columns: ['turma', 'cd_professor', 'cd_horario', 'dt_cronograma', 'disciplina', 'anosemestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_CD_HORARIO', columns: ['cd_horario'])]
#[ORM\Index(name: 'FK_DIARIOCRON_SALA_UNI_SALAS', columns: ['cd_sala'])]
#[ORM\Index(name: 'anosemestre', columns: ['anosemestre', 'turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'diario_cronogramas_ibfk_1', 'colunas' => ['anosemestre', 'turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DIARIOCRON_SALA_UNIM_SALA_CD_SALA', 'colunas' => ['cd_sala'], 'tabelaAlvo' => 'unim_sala', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioCronogramas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cronograma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCronograma = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'dt_cronograma', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCronograma = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 255, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 65535, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'sn_confirmado', type: 'smallint', nullable: true)]
    private ?int $snConfirmado = null;

    #[ORM\Column(name: 'nr_valor', type: 'smallfloat', nullable: true)]
    private ?float $nrValor = null;

    #[ORM\Column(name: 'cd_horario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdHorario = null;

    #[ORM\Column(name: 'cd_prof_substituto', type: 'integer', nullable: true)]
    private ?int $cdProfSubstituto = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\ManyToOne(targetEntity: UnimSala::class)]
    #[ORM\JoinColumn(name: 'cd_sala', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimSala $cdSala = null;

    #[ORM\Column(name: 'bimestre', type: 'smallint', nullable: true, options: ['default' => '1'])]
    private ?int $bimestre = 1;

    public function __construct(
        ?string $turma = null,
        ?int $anosemestre = null,
        ?int $disciplina = null,
        ?\DateTimeInterface $dtCronograma = null,
        ?string $dsSala = null,
        ?int $cdProfessor = null,
        ?string $dsConteudo = null,
        ?int $snConfirmado = null,
        ?float $nrValor = null,
        ?int $cdHorario = null,
        ?int $cdProfSubstituto = null,
        ?int $cdGrupo = null,
        ?UnimSala $cdSala = null,
        ?int $bimestre = 1
    ) {
        $this->turma = $turma;
        $this->anosemestre = $anosemestre;
        $this->disciplina = $disciplina;
        $this->dtCronograma = $dtCronograma;
        $this->dsSala = $dsSala;
        $this->cdProfessor = $cdProfessor;
        $this->dsConteudo = $dsConteudo;
        $this->snConfirmado = $snConfirmado;
        $this->nrValor = $nrValor;
        $this->cdHorario = $cdHorario;
        $this->cdProfSubstituto = $cdProfSubstituto;
        $this->cdGrupo = $cdGrupo;
        $this->cdSala = $cdSala;
        $this->bimestre = $bimestre;
    }

    public function getCdCronograma(): ?int
    {
        return $this->cdCronograma;
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

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDisciplina(): ?int
    {
        return $this->disciplina;
    }

    public function setDisciplina(?int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getDtCronograma(): ?\DateTimeInterface
    {
        return $this->dtCronograma;
    }

    public function setDtCronograma(?\DateTimeInterface $dtCronograma): self
    {
        $this->dtCronograma = $dtCronograma;
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

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
        return $this;
    }

    public function getSnConfirmado(): ?int
    {
        return $this->snConfirmado;
    }

    public function setSnConfirmado(?int $snConfirmado): self
    {
        $this->snConfirmado = $snConfirmado;
        return $this;
    }

    public function getNrValor(): ?float
    {
        return $this->nrValor;
    }

    public function setNrValor(?float $nrValor): self
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function setCdHorario(?int $cdHorario): self
    {
        $this->cdHorario = $cdHorario;
        return $this;
    }

    public function getCdProfSubstituto(): ?int
    {
        return $this->cdProfSubstituto;
    }

    public function setCdProfSubstituto(?int $cdProfSubstituto): self
    {
        $this->cdProfSubstituto = $cdProfSubstituto;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getBimestre(): ?int
    {
        return $this->bimestre;
    }

    public function setBimestre(?int $bimestre): self
    {
        $this->bimestre = $bimestre;
        return $this;
    }
}
