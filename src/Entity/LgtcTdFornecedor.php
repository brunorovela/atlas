<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LgtcTdFornecedorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcTdFornecedorRepository::class)]
#[ORM\Table(
    name: 'lgtc_td_fornecedor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TD_FORNECEDOR_CD_FORNECEDOR', columns: ['CD_FORNECEDOR'])]
#[ORM\UniqueConstraint(name: 'UK_TD_FORNECEDOR_DS_CHAVE', columns: ['DS_CHAVE'])]
class LgtcTdFornecedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_FORNECEDOR', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdFornecedor = null;

    #[ORM\Column(name: 'DS_VALOR', type: 'string', length: 64)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsValor = null,
        ?string $dsChave = null
    ) {
        $this->dsValor = $dsValor;
        $this->dsChave = $dsChave;
    }

    public function getCdFornecedor(): ?int
    {
        return $this->cdFornecedor;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
