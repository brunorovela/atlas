<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosTurmasCadastroMemoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosTurmasCadastroMemoRepository::class)]
#[ORM\Table(
    name: 'cursos_turmas_cadastro_memo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class CursosTurmasCadastroMemo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint')]
    private ?int $cdColigada = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 65535, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'cd_polo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $cdPolo = 0;

    public function __construct(
        string $cdCurso = '',
        ?string $cdTurma = null,
        int $cdCampo = 0,
        ?int $cdColigada = null,
        int $nrAnosemestre = 0,
        ?string $dsConteudo = null,
        ?int $cdPolo = 0
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdCampo = $cdCampo;
        $this->cdColigada = $cdColigada;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dsConteudo = $dsConteudo;
        $this->cdPolo = $cdPolo;
    }

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
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

    public function getCdCampo(): int
    {
        return $this->cdCampo;
    }

    public function setCdCampo(int $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdPolo(): ?int
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?int $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
        return $this;
    }
}
