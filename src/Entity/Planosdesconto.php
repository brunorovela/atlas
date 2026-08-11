<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PlanosdescontoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanosdescontoRepository::class)]
#[ORM\Table(
    name: 'planosdesconto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['codigo'])]
#[ORM\Index(name: 'IX_CODIGO', columns: ['codigo'])]
#[ORM\Index(name: 'IX_CD_ACAO_MOVIMENTO', columns: ['cd_acao_movimento'])]
class Planosdesconto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer')]
    private ?int $codigo = null;

    #[ORM\Column(name: 'descricaoplano', type: 'string', length: 255, nullable: true)]
    private ?string $descricaoplano = null;

    #[ORM\Column(name: 'percentualdesconto', type: 'float', nullable: true)]
    private ?float $percentualdesconto = null;

    #[ORM\Column(name: 'valordesconto', type: 'float', nullable: true)]
    private ?float $valordesconto = null;

    #[ORM\Column(name: 'cd_acao_movimento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcaoMovimento = null;

    #[ORM\Column(name: 'sn_condicional', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snCondicional = 1;

    #[ORM\Column(name: 'cd_tipo_desconto', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0', 'comment' => '0 = SOMA; 1 = PROPORCIONAL; 2 = SOBREPOR'])]
    private ?int $cdTipoDesconto = 0;

    #[ORM\Column(name: 'sn_primeira_parcela', type: 'string', length: 1, nullable: true, options: ['default' => 'S'])]
    private ?string $snPrimeiraParcela = 'S';

    #[ORM\Column(name: 'CD_FINANCIAMENTO', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdFinanciamento = 0;

    public function __construct(
        ?string $descricaoplano = null,
        ?float $percentualdesconto = null,
        ?float $valordesconto = null,
        ?int $cdAcaoMovimento = null,
        ?int $snCondicional = 1,
        ?int $cdTipoDesconto = 0,
        ?string $snPrimeiraParcela = 'S',
        ?int $cdFinanciamento = 0
    ) {
        $this->descricaoplano = $descricaoplano;
        $this->percentualdesconto = $percentualdesconto;
        $this->valordesconto = $valordesconto;
        $this->cdAcaoMovimento = $cdAcaoMovimento;
        $this->snCondicional = $snCondicional;
        $this->cdTipoDesconto = $cdTipoDesconto;
        $this->snPrimeiraParcela = $snPrimeiraParcela;
        $this->cdFinanciamento = $cdFinanciamento;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getDescricaoplano(): ?string
    {
        return $this->descricaoplano;
    }

    public function setDescricaoplano(?string $descricaoplano): self
    {
        $this->descricaoplano = $descricaoplano;
        return $this;
    }

    public function getPercentualdesconto(): ?float
    {
        return $this->percentualdesconto;
    }

    public function setPercentualdesconto(?float $percentualdesconto): self
    {
        $this->percentualdesconto = $percentualdesconto;
        return $this;
    }

    public function getValordesconto(): ?float
    {
        return $this->valordesconto;
    }

    public function setValordesconto(?float $valordesconto): self
    {
        $this->valordesconto = $valordesconto;
        return $this;
    }

    public function getCdAcaoMovimento(): ?int
    {
        return $this->cdAcaoMovimento;
    }

    public function setCdAcaoMovimento(?int $cdAcaoMovimento): self
    {
        $this->cdAcaoMovimento = $cdAcaoMovimento;
        return $this;
    }

    public function getSnCondicional(): ?int
    {
        return $this->snCondicional;
    }

    public function setSnCondicional(?int $snCondicional): self
    {
        $this->snCondicional = $snCondicional;
        return $this;
    }

    public function getCdTipoDesconto(): ?int
    {
        return $this->cdTipoDesconto;
    }

    public function setCdTipoDesconto(?int $cdTipoDesconto): self
    {
        $this->cdTipoDesconto = $cdTipoDesconto;
        return $this;
    }

    public function getSnPrimeiraParcela(): ?string
    {
        return $this->snPrimeiraParcela;
    }

    public function setSnPrimeiraParcela(?string $snPrimeiraParcela): self
    {
        $this->snPrimeiraParcela = $snPrimeiraParcela;
        return $this;
    }

    public function getCdFinanciamento(): ?int
    {
        return $this->cdFinanciamento;
    }

    public function setCdFinanciamento(?int $cdFinanciamento): self
    {
        $this->cdFinanciamento = $cdFinanciamento;
        return $this;
    }
}
