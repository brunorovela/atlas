<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasSimuladoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasSimuladoRepository::class)]
#[ORM\Table(
    name: 'diario_provas_simulado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Chave', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_BIMESTRE', columns: ['bimestre'])]
#[ORM\Index(name: 'IX_NRO_NOTA', columns: ['nro_nota'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class DiarioProvasSimulado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nro_nota', type: 'smallint', nullable: true)]
    private ?int $nroNota = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'disciplina', type: 'integer', nullable: true)]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'bimestre', type: 'smallint', nullable: true)]
    private ?int $bimestre = null;

    #[ORM\Column(name: 'data', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(name: 'assunto', type: 'string', length: 200, nullable: true)]
    private ?string $assunto = null;

    #[ORM\Column(name: 'sn_bloqueado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueado = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'sn_compoe', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snCompoe = 1;

    #[ORM\Column(name: 'sn_especial', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEspecial = 0;

    #[ORM\Column(name: 'cd_prova_leitora', type: 'integer', nullable: true)]
    private ?int $cdProvaLeitora = null;

    #[ORM\Column(name: 'nr_dias_bloqueio', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrDiasBloqueio = 0;

    #[ORM\Column(name: 'dt_primeira_digitacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrimeiraDigitacao = null;

    public function __construct(
        ?int $nroNota = null,
        ?string $turma = null,
        ?int $anosemestre = null,
        ?int $disciplina = null,
        ?int $bimestre = null,
        ?\DateTimeInterface $data = null,
        ?string $assunto = null,
        ?int $snBloqueado = 0,
        int $cdProfessor = 0,
        ?int $snCompoe = 1,
        ?int $snEspecial = 0,
        ?int $cdProvaLeitora = null,
        ?int $nrDiasBloqueio = 0,
        ?\DateTimeInterface $dtPrimeiraDigitacao = null
    ) {
        $this->nroNota = $nroNota;
        $this->turma = $turma;
        $this->anosemestre = $anosemestre;
        $this->disciplina = $disciplina;
        $this->bimestre = $bimestre;
        $this->data = $data;
        $this->assunto = $assunto;
        $this->snBloqueado = $snBloqueado;
        $this->cdProfessor = $cdProfessor;
        $this->snCompoe = $snCompoe;
        $this->snEspecial = $snEspecial;
        $this->cdProvaLeitora = $cdProvaLeitora;
        $this->nrDiasBloqueio = $nrDiasBloqueio;
        $this->dtPrimeiraDigitacao = $dtPrimeiraDigitacao;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getNroNota(): ?int
    {
        return $this->nroNota;
    }

    public function setNroNota(?int $nroNota): self
    {
        $this->nroNota = $nroNota;
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

    public function getBimestre(): ?int
    {
        return $this->bimestre;
    }

    public function setBimestre(?int $bimestre): self
    {
        $this->bimestre = $bimestre;
        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getAssunto(): ?string
    {
        return $this->assunto;
    }

    public function setAssunto(?string $assunto): self
    {
        $this->assunto = $assunto;
        return $this;
    }

    public function getSnBloqueado(): ?int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(?int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getCdProfessor(): int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getSnCompoe(): ?int
    {
        return $this->snCompoe;
    }

    public function setSnCompoe(?int $snCompoe): self
    {
        $this->snCompoe = $snCompoe;
        return $this;
    }

    public function getSnEspecial(): ?int
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(?int $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getCdProvaLeitora(): ?int
    {
        return $this->cdProvaLeitora;
    }

    public function setCdProvaLeitora(?int $cdProvaLeitora): self
    {
        $this->cdProvaLeitora = $cdProvaLeitora;
        return $this;
    }

    public function getNrDiasBloqueio(): ?int
    {
        return $this->nrDiasBloqueio;
    }

    public function setNrDiasBloqueio(?int $nrDiasBloqueio): self
    {
        $this->nrDiasBloqueio = $nrDiasBloqueio;
        return $this;
    }

    public function getDtPrimeiraDigitacao(): ?\DateTimeInterface
    {
        return $this->dtPrimeiraDigitacao;
    }

    public function setDtPrimeiraDigitacao(?\DateTimeInterface $dtPrimeiraDigitacao): self
    {
        $this->dtPrimeiraDigitacao = $dtPrimeiraDigitacao;
        return $this;
    }
}
