<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PrgLiquidacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgLiquidacaoRepository::class)]
#[ORM\Table(
    name: 'prg_liquidacao',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_LIQUIDACAO', columns: ['liquidacao_id', 'dt_liquidacao'])]
#[ORM\Index(name: 'IDX_PRG_LIQUIDACAO_ID', columns: ['liquidacao_id'])]
#[ORM\Index(name: 'IDX_PRG_LIQUIDACAO_DT_CADASTRO', columns: ['dt_cadastro'])]
#[ORM\Index(name: 'IDX_PRG_LIQUIDACAO_DT_LIQUIDACAO', columns: ['dt_liquidacao'])]
#[ORM\Index(name: 'prg_liquidacao_acordo_id_IDX', columns: ['acordo_id'])]
#[ORM\Index(name: 'IX_PRG_LIQUIDACAO_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'idx_prg_liquidacao_parcela_original_id_externo', columns: ['parcela_original_id_externo'])]
class PrgLiquidacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'liquidacao_id', type: 'string', length: 255)]
    private ?string $liquidacaoId = null;

    #[ORM\Column(name: 'acordo_id', type: 'string', length: 255, nullable: true)]
    private ?string $acordoId = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'dt_liquidacao', type: 'date')]
    private ?\DateTimeInterface $dtLiquidacao = null;

    #[ORM\Column(name: 'dt_pagamento', type: 'date')]
    private ?\DateTimeInterface $dtPagamento = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'date')]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'ds_categoria_parcela', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoriaParcela = null;

    #[ORM\Column(name: 'nr_parcela', type: 'smallint', nullable: true)]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'vl_principal', type: 'float', options: ['default' => '0.00'])]
    private float $vlPrincipal = 0.0;

    #[ORM\Column(name: 'vl_multa', type: 'float', options: ['default' => '0.00'])]
    private float $vlMulta = 0.0;

    #[ORM\Column(name: 'vl_mora', type: 'float', options: ['default' => '0.00'])]
    private float $vlMora = 0.0;

    #[ORM\Column(name: 'vl_desconto', type: 'float', options: ['default' => '0.00'])]
    private float $vlDesconto = 0.0;

    #[ORM\Column(name: 'vl_recebido', type: 'float', options: ['default' => '0.00'])]
    private float $vlRecebido = 0.0;

    #[ORM\Column(name: 'vl_adimplencia', type: 'float', options: ['default' => '0.00'])]
    private float $vlAdimplencia = 0.0;

    #[ORM\Column(name: 'ds_forma_liquidacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormaLiquidacao = null;

    #[ORM\Column(name: 'ds_parcela_original_situacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsParcelaOriginalSituacao = null;

    #[ORM\Column(name: 'ds_tipo_pagamento', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoPagamento = null;

    #[ORM\Column(name: 'me_json_liquidacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meJsonLiquidacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'parcela_original_id_externo', type: 'string', length: 100, nullable: true)]
    private ?string $parcelaOriginalIdExterno = null;

    public function __construct(
        ?string $liquidacaoId = null,
        ?string $acordoId = null,
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtLiquidacao = null,
        ?\DateTimeInterface $dtPagamento = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?string $dsCategoriaParcela = null,
        ?int $nrParcela = null,
        float $vlPrincipal = 0.0,
        float $vlMulta = 0.0,
        float $vlMora = 0.0,
        float $vlDesconto = 0.0,
        float $vlRecebido = 0.0,
        float $vlAdimplencia = 0.0,
        ?string $dsFormaLiquidacao = null,
        ?string $dsParcelaOriginalSituacao = null,
        ?string $dsTipoPagamento = null,
        ?string $meJsonLiquidacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $parcelaOriginalIdExterno = null
    ) {
        $this->liquidacaoId = $liquidacaoId;
        $this->acordoId = $acordoId;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtLiquidacao = $dtLiquidacao;
        $this->dtPagamento = $dtPagamento;
        $this->dtVencimento = $dtVencimento;
        $this->dsCategoriaParcela = $dsCategoriaParcela;
        $this->nrParcela = $nrParcela;
        $this->vlPrincipal = $vlPrincipal;
        $this->vlMulta = $vlMulta;
        $this->vlMora = $vlMora;
        $this->vlDesconto = $vlDesconto;
        $this->vlRecebido = $vlRecebido;
        $this->vlAdimplencia = $vlAdimplencia;
        $this->dsFormaLiquidacao = $dsFormaLiquidacao;
        $this->dsParcelaOriginalSituacao = $dsParcelaOriginalSituacao;
        $this->dsTipoPagamento = $dsTipoPagamento;
        $this->meJsonLiquidacao = $meJsonLiquidacao;
        $this->dtCadastro = $dtCadastro;
        $this->parcelaOriginalIdExterno = $parcelaOriginalIdExterno;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiquidacaoId(): ?string
    {
        return $this->liquidacaoId;
    }

    public function setLiquidacaoId(?string $liquidacaoId): self
    {
        $this->liquidacaoId = $liquidacaoId;
        return $this;
    }

    public function getAcordoId(): ?string
    {
        return $this->acordoId;
    }

    public function setAcordoId(?string $acordoId): self
    {
        $this->acordoId = $acordoId;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDtLiquidacao(): ?\DateTimeInterface
    {
        return $this->dtLiquidacao;
    }

    public function setDtLiquidacao(?\DateTimeInterface $dtLiquidacao): self
    {
        $this->dtLiquidacao = $dtLiquidacao;
        return $this;
    }

    public function getDtPagamento(): ?\DateTimeInterface
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(?\DateTimeInterface $dtPagamento): self
    {
        $this->dtPagamento = $dtPagamento;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getDsCategoriaParcela(): ?string
    {
        return $this->dsCategoriaParcela;
    }

    public function setDsCategoriaParcela(?string $dsCategoriaParcela): self
    {
        $this->dsCategoriaParcela = $dsCategoriaParcela;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlPrincipal(): float
    {
        return $this->vlPrincipal;
    }

    public function setVlPrincipal(float $vlPrincipal): self
    {
        $this->vlPrincipal = $vlPrincipal;
        return $this;
    }

    public function getVlMulta(): float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
        return $this;
    }

    public function getVlMora(): float
    {
        return $this->vlMora;
    }

    public function setVlMora(float $vlMora): self
    {
        $this->vlMora = $vlMora;
        return $this;
    }

    public function getVlDesconto(): float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlRecebido(): float
    {
        return $this->vlRecebido;
    }

    public function setVlRecebido(float $vlRecebido): self
    {
        $this->vlRecebido = $vlRecebido;
        return $this;
    }

    public function getVlAdimplencia(): float
    {
        return $this->vlAdimplencia;
    }

    public function setVlAdimplencia(float $vlAdimplencia): self
    {
        $this->vlAdimplencia = $vlAdimplencia;
        return $this;
    }

    public function getDsFormaLiquidacao(): ?string
    {
        return $this->dsFormaLiquidacao;
    }

    public function setDsFormaLiquidacao(?string $dsFormaLiquidacao): self
    {
        $this->dsFormaLiquidacao = $dsFormaLiquidacao;
        return $this;
    }

    public function getDsParcelaOriginalSituacao(): ?string
    {
        return $this->dsParcelaOriginalSituacao;
    }

    public function setDsParcelaOriginalSituacao(?string $dsParcelaOriginalSituacao): self
    {
        $this->dsParcelaOriginalSituacao = $dsParcelaOriginalSituacao;
        return $this;
    }

    public function getDsTipoPagamento(): ?string
    {
        return $this->dsTipoPagamento;
    }

    public function setDsTipoPagamento(?string $dsTipoPagamento): self
    {
        $this->dsTipoPagamento = $dsTipoPagamento;
        return $this;
    }

    public function getMeJsonLiquidacao(): ?string
    {
        return $this->meJsonLiquidacao;
    }

    public function setMeJsonLiquidacao(?string $meJsonLiquidacao): self
    {
        $this->meJsonLiquidacao = $meJsonLiquidacao;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getParcelaOriginalIdExterno(): ?string
    {
        return $this->parcelaOriginalIdExterno;
    }

    public function setParcelaOriginalIdExterno(?string $parcelaOriginalIdExterno): self
    {
        $this->parcelaOriginalIdExterno = $parcelaOriginalIdExterno;
        return $this;
    }
}
