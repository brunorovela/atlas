<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosTurmasCadastroArqRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosTurmasCadastroArqRepository::class)]
#[ORM\Table(
    name: 'cursos_turmas_cadastro_arq',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class CursosTurmasCadastroArq
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdTurma = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'integer', options: ['default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 50, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'me_arquivo', type: 'blob', nullable: true)]
    private ?string $meArquivo = null;

    #[ORM\Column(name: 'tipo_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $tipoArquivo = null;

    #[ORM\Column(name: 'cd_polo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $cdPolo = 0;

    public function __construct(
        string $cdCurso = '',
        string $cdTurma = '',
        int $cdCampo = 0,
        int $nrAnosemestre = 0,
        ?int $cdColigada = null,
        ?string $nmArquivo = null,
        ?string $meArquivo = null,
        ?string $tipoArquivo = null,
        ?int $cdPolo = 0
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdTurma = $cdTurma;
        $this->cdCampo = $cdCampo;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdColigada = $cdColigada;
        $this->nmArquivo = $nmArquivo;
        $this->meArquivo = $meArquivo;
        $this->tipoArquivo = $tipoArquivo;
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

    public function getCdTurma(): string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(string $cdTurma): self
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

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }

    public function getTipoArquivo(): ?string
    {
        return $this->tipoArquivo;
    }

    public function setTipoArquivo(?string $tipoArquivo): self
    {
        $this->tipoArquivo = $tipoArquivo;
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
