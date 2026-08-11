<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtraValoresPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraValoresPessoasRepository::class)]
#[ORM\Table(
    name: 'extra_valores_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TIPO_PESSOA', columns: ['cd_tipo_pessoa'])]
class ExtraValoresPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['default' => '0'])]
    private int $cdAtividade = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoPessoa = 0;

    #[ORM\Column(name: 'vl_atividade', type: 'smallfloat', nullable: true)]
    private ?float $vlAtividade = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        int $cdAtividade = 0,
        int $nrAnosemestre = 0,
        int $cdTipoPessoa = 0,
        ?float $vlAtividade = null,
        ?string $dsObservacao = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTipoPessoa = $cdTipoPessoa;
        $this->vlAtividade = $vlAtividade;
        $this->dsObservacao = $dsObservacao;
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

    public function getCdTipoPessoa(): int
    {
        return $this->cdTipoPessoa;
    }

    public function setCdTipoPessoa(int $cdTipoPessoa): self
    {
        $this->cdTipoPessoa = $cdTipoPessoa;
        return $this;
    }

    public function getVlAtividade(): ?float
    {
        return $this->vlAtividade;
    }

    public function setVlAtividade(?float $vlAtividade): self
    {
        $this->vlAtividade = $vlAtividade;
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
}
