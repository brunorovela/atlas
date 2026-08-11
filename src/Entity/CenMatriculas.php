<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CenMatriculasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CenMatriculasRepository::class)]
#[ORM\Table(
    name: 'cen_matriculas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'nr_ano', columns: ['nr_ano', 'cd_pessoa', 'cd_curso', 'cd_processo'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_NR_ANO', columns: ['nr_ano'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_TURMA_MATRICULA', columns: ['cd_turma_matricula'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class CenMatriculas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula', type: 'integer')]
    private ?int $cdMatricula = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer')]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_turma_matricula', type: 'string', length: 50)]
    private ?string $cdTurmaMatricula = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_curso_origem', type: 'string', length: 15, nullable: true)]
    private ?string $cdCursoOrigem = null;

    #[ORM\Column(name: 'cd_situacao_mec', type: 'integer')]
    private ?int $cdSituacaoMec = null;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'sn_bloqueado', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snBloqueado = 0;

    #[ORM\Column(name: 'sn_enviar', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snEnviar = 1;

    #[ORM\Column(name: 'cd_status', type: 'integer', options: ['default' => '1'])]
    private int $cdStatus = 1;

    public function __construct(
        ?int $nrAno = null,
        ?int $cdPessoa = null,
        ?string $cdCurso = null,
        ?int $cdProcesso = null,
        ?string $cdTurmaMatricula = null,
        ?int $nrAnosemestre = null,
        ?string $cdCursoOrigem = null,
        ?int $cdSituacaoMec = null,
        ?\DateTimeInterface $dtSaida = null,
        int $snBloqueado = 0,
        int $snEnviar = 1,
        int $cdStatus = 1
    ) {
        $this->nrAno = $nrAno;
        $this->cdPessoa = $cdPessoa;
        $this->cdCurso = $cdCurso;
        $this->cdProcesso = $cdProcesso;
        $this->cdTurmaMatricula = $cdTurmaMatricula;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdCursoOrigem = $cdCursoOrigem;
        $this->cdSituacaoMec = $cdSituacaoMec;
        $this->dtSaida = $dtSaida;
        $this->snBloqueado = $snBloqueado;
        $this->snEnviar = $snEnviar;
        $this->cdStatus = $cdStatus;
    }

    public function getCdMatricula(): ?int
    {
        return $this->cdMatricula;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdTurmaMatricula(): ?string
    {
        return $this->cdTurmaMatricula;
    }

    public function setCdTurmaMatricula(?string $cdTurmaMatricula): self
    {
        $this->cdTurmaMatricula = $cdTurmaMatricula;
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

    public function getCdCursoOrigem(): ?string
    {
        return $this->cdCursoOrigem;
    }

    public function setCdCursoOrigem(?string $cdCursoOrigem): self
    {
        $this->cdCursoOrigem = $cdCursoOrigem;
        return $this;
    }

    public function getCdSituacaoMec(): ?int
    {
        return $this->cdSituacaoMec;
    }

    public function setCdSituacaoMec(?int $cdSituacaoMec): self
    {
        $this->cdSituacaoMec = $cdSituacaoMec;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
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

    public function getSnEnviar(): int
    {
        return $this->snEnviar;
    }

    public function setSnEnviar(int $snEnviar): self
    {
        $this->snEnviar = $snEnviar;
        return $this;
    }

    public function getCdStatus(): int
    {
        return $this->cdStatus;
    }

    public function setCdStatus(int $cdStatus): self
    {
        $this->cdStatus = $cdStatus;
        return $this;
    }
}
