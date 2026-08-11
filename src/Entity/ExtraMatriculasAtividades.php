<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtraMatriculasAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraMatriculasAtividadesRepository::class)]
#[ORM\Table(
    name: 'extra_matriculas_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_MES', columns: ['nr_mes'])]
class ExtraMatriculasAtividades
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['default' => '0'])]
    private int $cdAtividade = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_mes', type: 'integer', options: ['default' => '0'])]
    private int $nrMes = 0;

    #[ORM\Column(name: 'vl_atividade', type: 'smallfloat', nullable: true)]
    private ?float $vlAtividade = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'sn_paga', type: 'boolean', options: ['default' => '0'])]
    private bool $snPaga = false;

    #[ORM\Column(name: 'CD_MENSALIDADE', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    public function __construct(
        int $nrAnosemestre = 0,
        int $cdAtividade = 0,
        int $cdPessoa = 0,
        int $nrMes = 0,
        ?float $vlAtividade = null,
        ?string $dsObservacao = null,
        bool $snPaga = false,
        ?int $cdMensalidade = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdAtividade = $cdAtividade;
        $this->cdPessoa = $cdPessoa;
        $this->nrMes = $nrMes;
        $this->vlAtividade = $vlAtividade;
        $this->dsObservacao = $dsObservacao;
        $this->snPaga = $snPaga;
        $this->cdMensalidade = $cdMensalidade;
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

    public function getCdAtividade(): int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrMes(): int
    {
        return $this->nrMes;
    }

    public function setNrMes(int $nrMes): self
    {
        $this->nrMes = $nrMes;
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

    public function isSnPaga(): bool
    {
        return $this->snPaga;
    }

    public function setSnPaga(bool $snPaga): self
    {
        $this->snPaga = $snPaga;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
