<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfseRpsVariaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseRpsVariaveisRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_rps_variaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseRpsVariaveis
{
    #[ORM\Id]
    #[ORM\Column(name: 'nm_variavel', type: 'string', length: 30, options: ['fixed' => true])]
    private ?string $nmVariavel = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 100, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'tx_ajuda', type: 'text', length: 65535)]
    private ?string $txAjuda = null;

    public function __construct(
        ?string $nmVariavel = null,
        ?string $dsValor = null,
        ?string $txAjuda = null
    ) {
        $this->nmVariavel = $nmVariavel;
        $this->dsValor = $dsValor;
        $this->txAjuda = $txAjuda;
    }

    public function getNmVariavel(): ?string
    {
        return $this->nmVariavel;
    }

    public function setNmVariavel(?string $nmVariavel): self
    {
        $this->nmVariavel = $nmVariavel;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getTxAjuda(): ?string
    {
        return $this->txAjuda;
    }

    public function setTxAjuda(?string $txAjuda): self
    {
        $this->txAjuda = $txAjuda;
        return $this;
    }
}
