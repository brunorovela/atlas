<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprCpRateioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCpRateioRepository::class)]
#[ORM\Table(
    name: 'cmpr_cp_rateio',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cp_rateio_cd_cotacao', columns: ['cd_cotacao'])]
#[ORM\Index(name: 'IX_cmpr_cp_rateio_cd_coligada', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_cmpr_cp_rateio_cd_apropriacao', columns: ['cd_apropriacao'])]
#[ORM\Index(name: 'IX_cmpr_cp_rateio_cd_centro', columns: ['cd_centro'])]
#[ORM\Index(name: 'cmpr_cp_rateio_ibfk_5', columns: ['cd_almoxarifado'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cp_rateio_ibfk_1', 'colunas' => ['cd_cotacao'], 'tabelaAlvo' => 'cmpr_cotacao', 'colunasAlvo' => ['cd_cotacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cp_rateio_ibfk_2', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cp_rateio_ibfk_3', 'colunas' => ['cd_apropriacao'], 'tabelaAlvo' => 'fin_criterios_apropria', 'colunasAlvo' => ['cd_apropriacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cp_rateio_ibfk_4', 'colunas' => ['cd_centro'], 'tabelaAlvo' => 'fin_config_centro_custos', 'colunasAlvo' => ['cd_centro'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cp_rateio_ibfk_5', 'colunas' => ['cd_almoxarifado'], 'tabelaAlvo' => 'cmpr_almoxarifado', 'colunasAlvo' => ['cd_almoxarifado'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCpRateio
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cp_rateio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCpRateio = null;

    #[ORM\Column(name: 'cd_req_comprar', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReqComprar = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacao::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao', referencedColumnName: 'cd_cotacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacao $cdCotacao = null;

    #[ORM\Column(name: 'nr_produto', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $nrProduto = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\ManyToOne(targetEntity: FinCriteriosApropria::class)]
    #[ORM\JoinColumn(name: 'cd_apropriacao', referencedColumnName: 'cd_apropriacao', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinCriteriosApropria $cdApropriacao = null;

    #[ORM\Column(name: 'cd_centro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCentro = null;

    #[ORM\ManyToOne(targetEntity: CmprAlmoxarifado::class)]
    #[ORM\JoinColumn(name: 'cd_almoxarifado', referencedColumnName: 'cd_almoxarifado', nullable: false, options: ['default' => '1', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CmprAlmoxarifado $cdAlmoxarifado = null;

    #[ORM\Column(name: 'nr_produto_faturado', type: 'integer', nullable: true)]
    private ?int $nrProdutoFaturado = null;

    public function __construct(
        ?int $cdReqComprar = null,
        ?CmprCotacao $cdCotacao = null,
        ?float $nrProduto = null,
        ?Coligadas $cdColigada = null,
        ?FinCriteriosApropria $cdApropriacao = null,
        ?int $cdCentro = null,
        ?CmprAlmoxarifado $cdAlmoxarifado = null,
        ?int $nrProdutoFaturado = null
    ) {
        $this->cdReqComprar = $cdReqComprar;
        $this->cdCotacao = $cdCotacao;
        $this->nrProduto = $nrProduto;
        $this->cdColigada = $cdColigada;
        $this->cdApropriacao = $cdApropriacao;
        $this->cdCentro = $cdCentro;
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        $this->nrProdutoFaturado = $nrProdutoFaturado;
    }

    public function getCdCpRateio(): ?int
    {
        return $this->cdCpRateio;
    }

    public function getCdReqComprar(): ?int
    {
        return $this->cdReqComprar;
    }

    public function setCdReqComprar(?int $cdReqComprar): self
    {
        $this->cdReqComprar = $cdReqComprar;
        return $this;
    }

    public function getCdCotacao(): ?CmprCotacao
    {
        return $this->cdCotacao;
    }

    public function setCdCotacao(?CmprCotacao $cdCotacao): self
    {
        $this->cdCotacao = $cdCotacao;
        return $this;
    }

    public function getNrProduto(): ?float
    {
        return $this->nrProduto;
    }

    public function setNrProduto(?float $nrProduto): self
    {
        $this->nrProduto = $nrProduto;
        return $this;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdApropriacao(): ?FinCriteriosApropria
    {
        return $this->cdApropriacao;
    }

    public function setCdApropriacao(?FinCriteriosApropria $cdApropriacao): self
    {
        $this->cdApropriacao = $cdApropriacao;
        return $this;
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

    public function getCdAlmoxarifado(): ?CmprAlmoxarifado
    {
        return $this->cdAlmoxarifado;
    }

    public function setCdAlmoxarifado(?CmprAlmoxarifado $cdAlmoxarifado): self
    {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        return $this;
    }

    public function getNrProdutoFaturado(): ?int
    {
        return $this->nrProdutoFaturado;
    }

    public function setNrProdutoFaturado(?int $nrProdutoFaturado): self
    {
        $this->nrProdutoFaturado = $nrProdutoFaturado;
        return $this;
    }
}
