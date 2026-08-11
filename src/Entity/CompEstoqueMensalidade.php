<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CompEstoqueMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompEstoqueMensalidadeRepository::class)]
#[ORM\Table(
    name: 'comp_estoque_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COMPRA', columns: ['CD_COMPRA'])]
#[ORM\Index(name: 'IDX_24175A304F86B870', columns: ['CD_MENSALIDADE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_COMPRA', 'colunas' => ['CD_COMPRA'], 'tabelaAlvo' => 'comp_estoque', 'colunasAlvo' => ['CD_COMPRA'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_MENSALIDADE', 'colunas' => ['CD_MENSALIDADE'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompEstoqueMensalidade
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'CD_MENSALIDADE', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CompEstoque::class)]
    #[ORM\JoinColumn(name: 'CD_COMPRA', referencedColumnName: 'CD_COMPRA', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompEstoque $cdCompra = null;

    public function __construct(
        ?Mensalidades $cdMensalidade = null,
        ?CompEstoque $cdCompra = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdCompra = $cdCompra;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdCompra(): ?CompEstoque
    {
        return $this->cdCompra;
    }

    public function setCdCompra(?CompEstoque $cdCompra): self
    {
        $this->cdCompra = $cdCompra;
        return $this;
    }
}
