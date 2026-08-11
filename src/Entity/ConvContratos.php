<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ConvContratosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvContratosRepository::class)]
#[ORM\Table(
    name: 'conv_contratos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CONV_CONTRATOS_CD_COLIGADA_COLIGADAS_CD_COLIGADA', columns: ['CD_COLIGADA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONV_CONTRATOS_CD_COLIGADA_COLIGADAS_CD_COLIGADA', 'colunas' => ['CD_COLIGADA'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConvContratos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CONTRATO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContrato = null;

    #[ORM\Column(name: 'CD_TIPO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'NR_DIA_VENCIMENTO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $nrDiaVencimento = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'CD_COLIGADA', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'VL_CONTRATO', type: 'decimal', precision: 15, scale: 9)]
    private ?string $vlContrato = null;

    #[ORM\Column(name: 'DS_CONTRATO', type: 'string', length: 255)]
    private ?string $dsContrato = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    public function __construct(
        ?int $cdTipo = null,
        ?int $cdPessoa = null,
        ?int $nrDiaVencimento = null,
        ?Coligadas $cdColigada = null,
        int $snAtivo = 1,
        ?string $vlContrato = null,
        ?string $dsContrato = null,
        ?int $cdTipoTitulo = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdPessoa = $cdPessoa;
        $this->nrDiaVencimento = $nrDiaVencimento;
        $this->cdColigada = $cdColigada;
        $this->snAtivo = $snAtivo;
        $this->vlContrato = $vlContrato;
        $this->dsContrato = $dsContrato;
        $this->cdTipoTitulo = $cdTipoTitulo;
    }

    public function getCdContrato(): ?int
    {
        return $this->cdContrato;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
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

    public function getNrDiaVencimento(): ?int
    {
        return $this->nrDiaVencimento;
    }

    public function setNrDiaVencimento(?int $nrDiaVencimento): self
    {
        $this->nrDiaVencimento = $nrDiaVencimento;
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

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getVlContrato(): ?string
    {
        return $this->vlContrato;
    }

    public function setVlContrato(?string $vlContrato): self
    {
        $this->vlContrato = $vlContrato;
        return $this;
    }

    public function getDsContrato(): ?string
    {
        return $this->dsContrato;
    }

    public function setDsContrato(?string $dsContrato): self
    {
        $this->dsContrato = $dsContrato;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }
}
