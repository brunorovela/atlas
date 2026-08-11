<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IesdeMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeMatriculaRepository::class)]
#[ORM\Table(
    name: 'iesde_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Alunos matriculados na IESDE']
)]
#[ORM\Index(name: 'IX_CD_MOODLE_CURSO', columns: ['cd_moodle_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_ID_MATRICULA_IESDE', columns: ['id_matricula_iesde'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_MOODLE_CURSO', 'colunas' => ['cd_moodle_curso'], 'tabelaAlvo' => 'unim_moodle_cursos', 'colunasAlvo' => ['cd_moodle_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IesdeMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMatricula = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: UnimMoodleCursos::class)]
    #[ORM\JoinColumn(name: 'cd_moodle_curso', referencedColumnName: 'cd_moodle_curso', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimMoodleCursos $cdMoodleCurso = null;

    #[ORM\Column(name: 'nr_matriculado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $nrMatriculado = false;

    #[ORM\Column(name: 'dt_atualizado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAtualizado = null;

    #[ORM\Column(name: 'id_matricula_iesde', type: 'integer', nullable: true)]
    private ?int $idMatriculaIesde = null;

    #[ORM\Column(name: 'dt_acesso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAcesso = null;

    #[ORM\Column(name: 'nr_dias_curso', type: 'integer', nullable: true)]
    private ?int $nrDiasCurso = null;

    #[ORM\Column(name: 'ds_login_iesde', type: 'string', length: 255, nullable: true)]
    private ?string $dsLoginIesde = null;

    #[ORM\Column(name: 'ds_senha_iesde', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenhaIesde = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?UnimMoodleCursos $cdMoodleCurso = null,
        ?bool $nrMatriculado = false,
        ?\DateTimeInterface $dtAtualizado = null,
        ?int $idMatriculaIesde = null,
        ?\DateTimeInterface $dtAcesso = null,
        ?int $nrDiasCurso = null,
        ?string $dsLoginIesde = null,
        ?string $dsSenhaIesde = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->cdMoodleCurso = $cdMoodleCurso;
        $this->nrMatriculado = $nrMatriculado;
        $this->dtAtualizado = $dtAtualizado;
        $this->idMatriculaIesde = $idMatriculaIesde;
        $this->dtAcesso = $dtAcesso;
        $this->nrDiasCurso = $nrDiasCurso;
        $this->dsLoginIesde = $dsLoginIesde;
        $this->dsSenhaIesde = $dsSenhaIesde;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdMatricula(): ?int
    {
        return $this->cdMatricula;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdMoodleCurso(): ?UnimMoodleCursos
    {
        return $this->cdMoodleCurso;
    }

    public function setCdMoodleCurso(?UnimMoodleCursos $cdMoodleCurso): self
    {
        $this->cdMoodleCurso = $cdMoodleCurso;
        return $this;
    }

    public function isNrMatriculado(): ?bool
    {
        return $this->nrMatriculado;
    }

    public function setNrMatriculado(?bool $nrMatriculado): self
    {
        $this->nrMatriculado = $nrMatriculado;
        return $this;
    }

    public function getDtAtualizado(): ?\DateTimeInterface
    {
        return $this->dtAtualizado;
    }

    public function setDtAtualizado(?\DateTimeInterface $dtAtualizado): self
    {
        $this->dtAtualizado = $dtAtualizado;
        return $this;
    }

    public function getIdMatriculaIesde(): ?int
    {
        return $this->idMatriculaIesde;
    }

    public function setIdMatriculaIesde(?int $idMatriculaIesde): self
    {
        $this->idMatriculaIesde = $idMatriculaIesde;
        return $this;
    }

    public function getDtAcesso(): ?\DateTimeInterface
    {
        return $this->dtAcesso;
    }

    public function setDtAcesso(?\DateTimeInterface $dtAcesso): self
    {
        $this->dtAcesso = $dtAcesso;
        return $this;
    }

    public function getNrDiasCurso(): ?int
    {
        return $this->nrDiasCurso;
    }

    public function setNrDiasCurso(?int $nrDiasCurso): self
    {
        $this->nrDiasCurso = $nrDiasCurso;
        return $this;
    }

    public function getDsLoginIesde(): ?string
    {
        return $this->dsLoginIesde;
    }

    public function setDsLoginIesde(?string $dsLoginIesde): self
    {
        $this->dsLoginIesde = $dsLoginIesde;
        return $this;
    }

    public function getDsSenhaIesde(): ?string
    {
        return $this->dsSenhaIesde;
    }

    public function setDsSenhaIesde(?string $dsSenhaIesde): self
    {
        $this->dsSenhaIesde = $dsSenhaIesde;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
