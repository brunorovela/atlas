<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCartaoHistoricoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCartaoHistoricoRepository::class)]
#[ORM\Table(
    name: 'fin_cartao_historico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PARCELA', columns: ['cd_parcela'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_ENTRADA', columns: ['cd_movimento_entrada'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_SAIDA', columns: ['cd_movimento_saida'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_TAXA', columns: ['cd_movimento_taxa'])]
class FinCartaoHistorico
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_historico_operacao', type: 'integer')]
    private ?int $cdHistoricoOperacao = null;

    #[ORM\Column(name: 'cd_parcela', type: 'integer')]
    private ?int $cdParcela = null;

    #[ORM\Column(name: 'cd_movimento_entrada', type: 'integer')]
    private ?int $cdMovimentoEntrada = null;

    #[ORM\Column(name: 'cd_movimento_saida', type: 'integer')]
    private ?int $cdMovimentoSaida = null;

    #[ORM\Column(name: 'cd_movimento_taxa', type: 'integer')]
    private ?int $cdMovimentoTaxa = null;

    #[ORM\Column(name: 'sn_estorno', type: 'smallint')]
    private ?int $snEstorno = null;

    public function __construct(
        ?int $cdParcela = null,
        ?int $cdMovimentoEntrada = null,
        ?int $cdMovimentoSaida = null,
        ?int $cdMovimentoTaxa = null,
        ?int $snEstorno = null
    ) {
        $this->cdParcela = $cdParcela;
        $this->cdMovimentoEntrada = $cdMovimentoEntrada;
        $this->cdMovimentoSaida = $cdMovimentoSaida;
        $this->cdMovimentoTaxa = $cdMovimentoTaxa;
        $this->snEstorno = $snEstorno;
    }

    public function getCdHistoricoOperacao(): ?int
    {
        return $this->cdHistoricoOperacao;
    }

    public function getCdParcela(): ?int
    {
        return $this->cdParcela;
    }

    public function setCdParcela(?int $cdParcela): self
    {
        $this->cdParcela = $cdParcela;
        return $this;
    }

    public function getCdMovimentoEntrada(): ?int
    {
        return $this->cdMovimentoEntrada;
    }

    public function setCdMovimentoEntrada(?int $cdMovimentoEntrada): self
    {
        $this->cdMovimentoEntrada = $cdMovimentoEntrada;
        return $this;
    }

    public function getCdMovimentoSaida(): ?int
    {
        return $this->cdMovimentoSaida;
    }

    public function setCdMovimentoSaida(?int $cdMovimentoSaida): self
    {
        $this->cdMovimentoSaida = $cdMovimentoSaida;
        return $this;
    }

    public function getCdMovimentoTaxa(): ?int
    {
        return $this->cdMovimentoTaxa;
    }

    public function setCdMovimentoTaxa(?int $cdMovimentoTaxa): self
    {
        $this->cdMovimentoTaxa = $cdMovimentoTaxa;
        return $this;
    }

    public function getSnEstorno(): ?int
    {
        return $this->snEstorno;
    }

    public function setSnEstorno(?int $snEstorno): self
    {
        $this->snEstorno = $snEstorno;
        return $this;
    }
}
