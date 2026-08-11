<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinContabilCcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContabilCcRepository::class)]
#[ORM\Table(
    name: 'fin_contabil_cc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Apropriacao por Centro de Custo das contas contábeis']
)]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
class FinContabilCc
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['unsigned' => true, 'comment' => 'Codigo do Centro de Custo'])]
    private ?int $cdCentro = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_lancamento', type: 'integer', options: ['unsigned' => true, 'comment' => 'FK do lancamento contabil'])]
    private ?int $cdLancamento = null;

    #[ORM\Column(name: 'vl_movimento', type: 'float', nullable: true, options: ['comment' => 'Valor do rateio'])]
    private ?float $vlMovimento = null;

    #[ORM\Column(name: 'sn_lancamento_especifico', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snLancamentoEspecifico = 0;

    public function __construct(
        ?int $cdCentro = null,
        ?int $cdLancamento = null,
        ?float $vlMovimento = null,
        ?int $snLancamentoEspecifico = 0
    ) {
        $this->cdCentro = $cdCentro;
        $this->cdLancamento = $cdLancamento;
        $this->vlMovimento = $vlMovimento;
        $this->snLancamentoEspecifico = $snLancamentoEspecifico;
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

    public function getCdLancamento(): ?int
    {
        return $this->cdLancamento;
    }

    public function setCdLancamento(?int $cdLancamento): self
    {
        $this->cdLancamento = $cdLancamento;
        return $this;
    }

    public function getVlMovimento(): ?float
    {
        return $this->vlMovimento;
    }

    public function setVlMovimento(?float $vlMovimento): self
    {
        $this->vlMovimento = $vlMovimento;
        return $this;
    }

    public function getSnLancamentoEspecifico(): ?int
    {
        return $this->snLancamentoEspecifico;
    }

    public function setSnLancamentoEspecifico(?int $snLancamentoEspecifico): self
    {
        $this->snLancamentoEspecifico = $snLancamentoEspecifico;
        return $this;
    }
}
