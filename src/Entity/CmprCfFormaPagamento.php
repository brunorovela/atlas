<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprCfFormaPagamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCfFormaPagamentoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cf_forma_pagamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cf_forma_pagamento_cd_forma_pagamento', columns: ['cd_forma_pagamento'])]
#[ORM\Index(name: 'IX_cmpr_cf_forma_pagamento_cd_cotacao_fornecedor', columns: ['cd_cotacao_fornecedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cf_forma_pagamento_ibfk_1', 'colunas' => ['cd_forma_pagamento'], 'tabelaAlvo' => 'cmpr_forma_pagamento', 'colunasAlvo' => ['cd_forma_pagamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cf_forma_pagamento_ibfk_2', 'colunas' => ['cd_cotacao_fornecedor'], 'tabelaAlvo' => 'cmpr_cotacao_fornecedor', 'colunasAlvo' => ['cd_cotacao_fornecedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCfFormaPagamento
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprFormaPagamento::class)]
    #[ORM\JoinColumn(name: 'cd_forma_pagamento', referencedColumnName: 'cd_forma_pagamento', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprFormaPagamento $cdFormaPagamento = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCotacaoFornecedor::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao_fornecedor', referencedColumnName: 'cd_cotacao_fornecedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null;

    public function __construct(
        ?CmprFormaPagamento $cdFormaPagamento = null,
        ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null
    ) {
        $this->cdFormaPagamento = $cdFormaPagamento;
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
    }

    public function getCdFormaPagamento(): ?CmprFormaPagamento
    {
        return $this->cdFormaPagamento;
    }

    public function setCdFormaPagamento(?CmprFormaPagamento $cdFormaPagamento): self
    {
        $this->cdFormaPagamento = $cdFormaPagamento;
        return $this;
    }

    public function getCdCotacaoFornecedor(): ?CmprCotacaoFornecedor
    {
        return $this->cdCotacaoFornecedor;
    }

    public function setCdCotacaoFornecedor(?CmprCotacaoFornecedor $cdCotacaoFornecedor): self
    {
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        return $this;
    }
}
