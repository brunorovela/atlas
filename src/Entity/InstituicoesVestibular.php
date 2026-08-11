<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\InstituicoesVestibularRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstituicoesVestibularRepository::class)]
#[ORM\Table(
    name: 'instituicoes_vestibular',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
class InstituicoesVestibular
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inst_vestibular', type: 'integer')]
    private ?int $cdInstVestibular = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true)]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?int $cdInstituicao = null,
        ?string $dsCurso = null,
        ?string $dsArquivo = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdInstituicao = $cdInstituicao;
        $this->dsCurso = $dsCurso;
        $this->dsArquivo = $dsArquivo;
    }

    public function getCdInstVestibular(): ?int
    {
        return $this->cdInstVestibular;
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

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }
}
