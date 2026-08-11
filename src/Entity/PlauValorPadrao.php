<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlauValorPadraoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauValorPadraoRepository::class)]
#[ORM\Table(
    name: 'plau_valor_padrao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IC_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PESSOA_CAMPO', columns: ['cd_pessoa', 'ds_campo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_valor_padrao_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauValorPadrao
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?string $dsCampo = null,
        ?string $dsValor = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsCampo = $dsCampo;
        $this->dsValor = $dsValor;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
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
}
