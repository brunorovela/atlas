<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExtraPlanoDescontosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraPlanoDescontosRepository::class)]
#[ORM\Table(
    name: 'extra_plano_descontos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_QT_ATIVIDADES', columns: ['qt_atividades'])]
#[ORM\Index(name: 'IX_CD_TIPO_PESSOA', columns: ['cd_tipo_pessoa'])]
class ExtraPlanoDescontos
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'qt_atividades', type: 'integer', options: ['default' => '0'])]
    private int $qtAtividades = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoPessoa = 0;

    #[ORM\Column(name: 'vl_percentual', type: 'smallfloat', nullable: true)]
    private ?float $vlPercentual = null;

    #[ORM\Column(name: 'vl_desconto', type: 'smallfloat', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'vl_desconto_fixo', type: 'smallfloat', nullable: true)]
    private ?float $vlDescontoFixo = null;

    public function __construct(
        int $nrAnosemestre = 0,
        int $qtAtividades = 0,
        int $cdTipoPessoa = 0,
        ?float $vlPercentual = null,
        ?float $vlDesconto = null,
        ?float $vlDescontoFixo = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->qtAtividades = $qtAtividades;
        $this->cdTipoPessoa = $cdTipoPessoa;
        $this->vlPercentual = $vlPercentual;
        $this->vlDesconto = $vlDesconto;
        $this->vlDescontoFixo = $vlDescontoFixo;
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

    public function getQtAtividades(): int
    {
        return $this->qtAtividades;
    }

    public function setQtAtividades(int $qtAtividades): self
    {
        $this->qtAtividades = $qtAtividades;
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

    public function getVlPercentual(): ?float
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?float $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlDescontoFixo(): ?float
    {
        return $this->vlDescontoFixo;
    }

    public function setVlDescontoFixo(?float $vlDescontoFixo): self
    {
        $this->vlDescontoFixo = $vlDescontoFixo;
        return $this;
    }
}
