<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtraAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraAtividadesRepository::class)]
#[ORM\Table(
    name: 'extra_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class ExtraAtividades
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['default' => '0'])]
    private int $cdAtividade = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipoTitulo = 0;

    #[ORM\Column(name: 'cd_centro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentro = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 50, nullable: true)]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 20, nullable: true)]
    private ?string $dsSigla = null;

    public function __construct(
        int $cdAtividade = 0,
        int $nrAnosemestre = 0,
        int $cdProfessor = 0,
        int $cdTipoTitulo = 0,
        ?int $cdCentro = null,
        ?int $cdColigada = null,
        ?string $dsAtividade = null,
        ?string $dsObservacao = null,
        ?string $dsSigla = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdProfessor = $cdProfessor;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdCentro = $cdCentro;
        $this->cdColigada = $cdColigada;
        $this->dsAtividade = $dsAtividade;
        $this->dsObservacao = $dsObservacao;
        $this->dsSigla = $dsSigla;
    }

    public function getCdAtividade(): int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
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

    public function getCdProfessor(): int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getCdTipoTitulo(): int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdCentro(): ?int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(?int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
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

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
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

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }
}
