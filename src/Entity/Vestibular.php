<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\VestibularRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VestibularRepository::class)]
#[ORM\Table(
    name: 'vestibular',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'anosemestre', columns: ['anosemestre', 'codigoaluno', 'cd_exame_seleti', 'curso'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
class Vestibular
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vestibular', type: 'integer')]
    private ?int $cdVestibular = null;

    #[ORM\Column(name: 'anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Column(name: 'curso', type: 'string', length: 255)]
    private ?string $curso = null;

    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Column(name: 'nome', type: 'string', length: 50, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(name: 'nr_inscri_ENEM', type: 'string', length: 30, nullable: true)]
    private ?string $nrInscriEnem = null;

    #[ORM\Column(name: 'nr_ano_ENEM', type: 'integer', nullable: true)]
    private ?int $nrAnoEnem = null;

    #[ORM\Column(name: 'acertos', type: 'integer', nullable: true)]
    private ?int $acertos = null;

    #[ORM\Column(name: 'redacao1', type: 'float', nullable: true)]
    private ?float $redacao1 = null;

    #[ORM\Column(name: 'redacao2', type: 'float', nullable: true)]
    private ?float $redacao2 = null;

    #[ORM\Column(name: 'notaredacao', type: 'float', nullable: true)]
    private ?float $notaredacao = null;

    #[ORM\Column(name: 'notaprova', type: 'float', nullable: true)]
    private ?float $notaprova = null;

    #[ORM\Column(name: 'media', type: 'float', nullable: true)]
    private ?float $media = null;

    #[ORM\Column(name: 'classificacaogeral', type: 'integer', nullable: true)]
    private ?int $classificacaogeral = null;

    #[ORM\Column(name: 'classificacaocurso', type: 'integer', nullable: true)]
    private ?int $classificacaocurso = null;

    #[ORM\Column(name: 'classificado', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $classificado = null;

    #[ORM\Column(name: 'lingua', type: 'string', length: 10, nullable: true)]
    private ?string $lingua = null;

    #[ORM\Column(name: 'teste', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $teste = null;

    #[ORM\Column(name: 'tipo', type: 'string', length: 50, nullable: true)]
    private ?string $tipo = null;

    #[ORM\Column(name: 'turno', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $turno = null;

    #[ORM\Column(name: 'ip', type: 'string', length: 20, nullable: true)]
    private ?string $ip = null;

    #[ORM\Column(name: 'curso_inscricao', type: 'string', length: 255, nullable: true)]
    private ?string $cursoInscricao = null;

    #[ORM\Column(name: 'nota1a', type: 'float', nullable: true)]
    private ?float $nota1a = null;

    #[ORM\Column(name: 'nota1b', type: 'float', nullable: true)]
    private ?float $nota1b = null;

    #[ORM\Column(name: 'nota1', type: 'float', nullable: true)]
    private ?float $nota1 = null;

    #[ORM\Column(name: 'nota2a', type: 'float', nullable: true)]
    private ?float $nota2a = null;

    #[ORM\Column(name: 'nota2b', type: 'float', nullable: true)]
    private ?float $nota2b = null;

    #[ORM\Column(name: 'nota2', type: 'float', nullable: true)]
    private ?float $nota2 = null;

    #[ORM\Column(name: 'nota3a', type: 'float', nullable: true)]
    private ?float $nota3a = null;

    #[ORM\Column(name: 'nota3b', type: 'float', nullable: true)]
    private ?float $nota3b = null;

    #[ORM\Column(name: 'nota3', type: 'float', nullable: true)]
    private ?float $nota3 = null;

    #[ORM\Column(name: 'cd_exame_seleti', type: 'integer', options: ['default' => '0'])]
    private int $cdExameSeleti = 0;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdInstituicao = 0;

    #[ORM\Column(name: 'ds_resultado', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsResultado = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 50, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'dt_exame', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExame = null;

    // Sem construtor: 35 propriedades. Use os setters encadeados.

    public function getCdVestibular(): ?int
    {
        return $this->cdVestibular;
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

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNrInscriEnem(): ?string
    {
        return $this->nrInscriEnem;
    }

    public function setNrInscriEnem(?string $nrInscriEnem): self
    {
        $this->nrInscriEnem = $nrInscriEnem;
        return $this;
    }

    public function getNrAnoEnem(): ?int
    {
        return $this->nrAnoEnem;
    }

    public function setNrAnoEnem(?int $nrAnoEnem): self
    {
        $this->nrAnoEnem = $nrAnoEnem;
        return $this;
    }

    public function getAcertos(): ?int
    {
        return $this->acertos;
    }

    public function setAcertos(?int $acertos): self
    {
        $this->acertos = $acertos;
        return $this;
    }

    public function getRedacao1(): ?float
    {
        return $this->redacao1;
    }

    public function setRedacao1(?float $redacao1): self
    {
        $this->redacao1 = $redacao1;
        return $this;
    }

    public function getRedacao2(): ?float
    {
        return $this->redacao2;
    }

    public function setRedacao2(?float $redacao2): self
    {
        $this->redacao2 = $redacao2;
        return $this;
    }

    public function getNotaredacao(): ?float
    {
        return $this->notaredacao;
    }

    public function setNotaredacao(?float $notaredacao): self
    {
        $this->notaredacao = $notaredacao;
        return $this;
    }

    public function getNotaprova(): ?float
    {
        return $this->notaprova;
    }

    public function setNotaprova(?float $notaprova): self
    {
        $this->notaprova = $notaprova;
        return $this;
    }

    public function getMedia(): ?float
    {
        return $this->media;
    }

    public function setMedia(?float $media): self
    {
        $this->media = $media;
        return $this;
    }

    public function getClassificacaogeral(): ?int
    {
        return $this->classificacaogeral;
    }

    public function setClassificacaogeral(?int $classificacaogeral): self
    {
        $this->classificacaogeral = $classificacaogeral;
        return $this;
    }

    public function getClassificacaocurso(): ?int
    {
        return $this->classificacaocurso;
    }

    public function setClassificacaocurso(?int $classificacaocurso): self
    {
        $this->classificacaocurso = $classificacaocurso;
        return $this;
    }

    public function getClassificado(): ?string
    {
        return $this->classificado;
    }

    public function setClassificado(?string $classificado): self
    {
        $this->classificado = $classificado;
        return $this;
    }

    public function getLingua(): ?string
    {
        return $this->lingua;
    }

    public function setLingua(?string $lingua): self
    {
        $this->lingua = $lingua;
        return $this;
    }

    public function getTeste(): ?string
    {
        return $this->teste;
    }

    public function setTeste(?string $teste): self
    {
        $this->teste = $teste;
        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;
        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    public function getCursoInscricao(): ?string
    {
        return $this->cursoInscricao;
    }

    public function setCursoInscricao(?string $cursoInscricao): self
    {
        $this->cursoInscricao = $cursoInscricao;
        return $this;
    }

    public function getNota1a(): ?float
    {
        return $this->nota1a;
    }

    public function setNota1a(?float $nota1a): self
    {
        $this->nota1a = $nota1a;
        return $this;
    }

    public function getNota1b(): ?float
    {
        return $this->nota1b;
    }

    public function setNota1b(?float $nota1b): self
    {
        $this->nota1b = $nota1b;
        return $this;
    }

    public function getNota1(): ?float
    {
        return $this->nota1;
    }

    public function setNota1(?float $nota1): self
    {
        $this->nota1 = $nota1;
        return $this;
    }

    public function getNota2a(): ?float
    {
        return $this->nota2a;
    }

    public function setNota2a(?float $nota2a): self
    {
        $this->nota2a = $nota2a;
        return $this;
    }

    public function getNota2b(): ?float
    {
        return $this->nota2b;
    }

    public function setNota2b(?float $nota2b): self
    {
        $this->nota2b = $nota2b;
        return $this;
    }

    public function getNota2(): ?float
    {
        return $this->nota2;
    }

    public function setNota2(?float $nota2): self
    {
        $this->nota2 = $nota2;
        return $this;
    }

    public function getNota3a(): ?float
    {
        return $this->nota3a;
    }

    public function setNota3a(?float $nota3a): self
    {
        $this->nota3a = $nota3a;
        return $this;
    }

    public function getNota3b(): ?float
    {
        return $this->nota3b;
    }

    public function setNota3b(?float $nota3b): self
    {
        $this->nota3b = $nota3b;
        return $this;
    }

    public function getNota3(): ?float
    {
        return $this->nota3;
    }

    public function setNota3(?float $nota3): self
    {
        $this->nota3 = $nota3;
        return $this;
    }

    public function getCdExameSeleti(): int
    {
        return $this->cdExameSeleti;
    }

    public function setCdExameSeleti(int $cdExameSeleti): self
    {
        $this->cdExameSeleti = $cdExameSeleti;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getDsResultado(): ?string
    {
        return $this->dsResultado;
    }

    public function setDsResultado(?string $dsResultado): self
    {
        $this->dsResultado = $dsResultado;
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

    public function getDtExame(): ?\DateTimeInterface
    {
        return $this->dtExame;
    }

    public function setDtExame(?\DateTimeInterface $dtExame): self
    {
        $this->dtExame = $dtExame;
        return $this;
    }
}
