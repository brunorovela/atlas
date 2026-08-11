<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CompEstoqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompEstoqueRepository::class)]
#[ORM\Table(
    name: 'comp_estoque',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'comp_estoque_ibfk_1', columns: ['CD_PRODUTO'])]
#[ORM\Index(name: 'IX_CD_PRODUTO', columns: ['CD_PRODUTO'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'comp_estoque_ibfk_1', 'colunas' => ['CD_PRODUTO'], 'tabelaAlvo' => 'comp_produtos', 'colunasAlvo' => ['CD_PRODUTO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CompEstoque
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_COMPRA', type: 'integer')]
    private ?int $cdCompra = null;

    #[ORM\ManyToOne(targetEntity: CompProdutos::class)]
    #[ORM\JoinColumn(name: 'CD_PRODUTO', referencedColumnName: 'CD_PRODUTO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CompProdutos $cdProduto = null;

    #[ORM\Column(name: 'TP_ENTRADA_SAIDA', type: 'boolean', options: ['comment' => '1=ENTRADA; 2=SAíDA; 3=ESTORNO; 4=ESTORNADO'])]
    private ?bool $tpEntradaSaida = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'TP_PESSOA', type: 'boolean', options: ['comment' => '0=SEM FORNECEDOR; 1=PESSOA; 2=EMPRESA;3=TROCA DE PRODUTO;'])]
    private ?bool $tpPessoa = null;

    #[ORM\Column(name: 'NR_QUANTIDADE', type: 'integer')]
    private ?int $nrQuantidade = null;

    #[ORM\Column(name: 'DT_COMPRA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCompra = null;

    #[ORM\Column(name: 'DT_ENTRADA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'VL_COMPRA', type: 'float', nullable: true)]
    private ?float $vlCompra = null;

    #[ORM\Column(name: 'CD_COMPRA_EXTORNADO', type: 'integer', nullable: true)]
    private ?int $cdCompraExtornado = null;

    #[ORM\Column(name: 'SN_PRIMEIRA_IMPRESSAO', type: 'boolean', options: ['default' => '0'])]
    private bool $snPrimeiraImpressao = false;

    #[ORM\Column(name: 'CD_KIT', type: 'integer', nullable: true)]
    private ?int $cdKit = null;

    #[ORM\Column(name: 'CD_USUARIO', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'id_comp_estoque_troca', type: 'integer', nullable: true)]
    private ?int $idCompEstoqueTroca = null;

    #[ORM\Column(name: 'CD_COMPRA_TROCA', type: 'integer', nullable: true)]
    private ?int $cdCompraTroca = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?CompProdutos $cdProduto = null,
        ?bool $tpEntradaSaida = null,
        ?int $cdPessoa = null,
        ?bool $tpPessoa = null,
        ?int $nrQuantidade = null,
        ?\DateTimeInterface $dtCompra = null,
        ?\DateTimeInterface $dtEntrada = null,
        ?float $vlCompra = null,
        ?int $cdCompraExtornado = null,
        bool $snPrimeiraImpressao = false,
        ?int $cdKit = null,
        ?int $cdUsuario = null,
        ?int $nrAnosemestre = null,
        ?int $idCompEstoqueTroca = null,
        ?int $cdCompraTroca = null,
        ?int $cdColigada = null
    ) {
        $this->cdProduto = $cdProduto;
        $this->tpEntradaSaida = $tpEntradaSaida;
        $this->cdPessoa = $cdPessoa;
        $this->tpPessoa = $tpPessoa;
        $this->nrQuantidade = $nrQuantidade;
        $this->dtCompra = $dtCompra;
        $this->dtEntrada = $dtEntrada;
        $this->vlCompra = $vlCompra;
        $this->cdCompraExtornado = $cdCompraExtornado;
        $this->snPrimeiraImpressao = $snPrimeiraImpressao;
        $this->cdKit = $cdKit;
        $this->cdUsuario = $cdUsuario;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->idCompEstoqueTroca = $idCompEstoqueTroca;
        $this->cdCompraTroca = $cdCompraTroca;
        $this->cdColigada = $cdColigada;
    }

    public function getCdCompra(): ?int
    {
        return $this->cdCompra;
    }

    public function getCdProduto(): ?CompProdutos
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?CompProdutos $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
        return $this;
    }

    public function isTpEntradaSaida(): ?bool
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?bool $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function isTpPessoa(): ?bool
    {
        return $this->tpPessoa;
    }

    public function setTpPessoa(?bool $tpPessoa): self
    {
        $this->tpPessoa = $tpPessoa;
        return $this;
    }

    public function getNrQuantidade(): ?int
    {
        return $this->nrQuantidade;
    }

    public function setNrQuantidade(?int $nrQuantidade): self
    {
        $this->nrQuantidade = $nrQuantidade;
        return $this;
    }

    public function getDtCompra(): ?\DateTimeInterface
    {
        return $this->dtCompra;
    }

    public function setDtCompra(?\DateTimeInterface $dtCompra): self
    {
        $this->dtCompra = $dtCompra;
        return $this;
    }

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getVlCompra(): ?float
    {
        return $this->vlCompra;
    }

    public function setVlCompra(?float $vlCompra): self
    {
        $this->vlCompra = $vlCompra;
        return $this;
    }

    public function getCdCompraExtornado(): ?int
    {
        return $this->cdCompraExtornado;
    }

    public function setCdCompraExtornado(?int $cdCompraExtornado): self
    {
        $this->cdCompraExtornado = $cdCompraExtornado;
        return $this;
    }

    public function isSnPrimeiraImpressao(): bool
    {
        return $this->snPrimeiraImpressao;
    }

    public function setSnPrimeiraImpressao(bool $snPrimeiraImpressao): self
    {
        $this->snPrimeiraImpressao = $snPrimeiraImpressao;
        return $this;
    }

    public function getCdKit(): ?int
    {
        return $this->cdKit;
    }

    public function setCdKit(?int $cdKit): self
    {
        $this->cdKit = $cdKit;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getIdCompEstoqueTroca(): ?int
    {
        return $this->idCompEstoqueTroca;
    }

    public function setIdCompEstoqueTroca(?int $idCompEstoqueTroca): self
    {
        $this->idCompEstoqueTroca = $idCompEstoqueTroca;
        return $this;
    }

    public function getCdCompraTroca(): ?int
    {
        return $this->cdCompraTroca;
    }

    public function setCdCompraTroca(?int $cdCompraTroca): self
    {
        $this->cdCompraTroca = $cdCompraTroca;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
