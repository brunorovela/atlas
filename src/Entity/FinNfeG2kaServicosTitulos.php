<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaServicosTitulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaServicosTitulosRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_servicos_titulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_NFE_G2KA_SERVICOS_TITU', columns: ['cd_nfe_g2ka_servicos_titulos'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinNfeG2kaServicosTitulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_g2ka_servicos_titulos', type: 'integer')]
    private ?int $cdNfeG2kaServicosTitulos = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'ds_descricao_servico', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricaoServico = null;

    #[ORM\Column(name: 'ds_item_servico', type: 'string', length: 5, nullable: true)]
    private ?string $dsItemServico = null;

    #[ORM\Column(name: 'cd_cnae', type: 'string', length: 10, nullable: true)]
    private ?string $cdCnae = null;

    #[ORM\Column(name: 'cd_tributacao_municipio', type: 'string', length: 20, nullable: true)]
    private ?string $cdTributacaoMunicipio = null;

    #[ORM\Column(name: 'ds_j_tributacao', type: 'string', length: 5, nullable: true)]
    private ?string $dsJTributacao = null;

    #[ORM\Column(name: 'sn_issretido', type: 'boolean', nullable: true)]
    private ?bool $snIssretido = null;

    #[ORM\Column(name: 'vl_aliquota', type: 'string', length: 10, nullable: true)]
    private ?string $vlAliquota = null;

    #[ORM\Column(name: 'ds_k2_tributavel', type: 'string', length: 5, nullable: true)]
    private ?string $dsK2Tributavel = null;

    #[ORM\Column(name: 'ds_unidadeitemservico', type: 'string', length: 5, nullable: true, options: ['default' => '0'])]
    private ?string $dsUnidadeitemservico = '0';

    #[ORM\Column(name: 'ds_codigounidadeitemservico', type: 'string', length: 10, nullable: true, options: ['default' => '0'])]
    private ?string $dsCodigounidadeitemservico = '0';

    public function __construct(
        ?int $cdColigada = null,
        ?string $dsDescricaoServico = null,
        ?string $dsItemServico = null,
        ?string $cdCnae = null,
        ?string $cdTributacaoMunicipio = null,
        ?string $dsJTributacao = null,
        ?bool $snIssretido = null,
        ?string $vlAliquota = null,
        ?string $dsK2Tributavel = null,
        ?string $dsUnidadeitemservico = '0',
        ?string $dsCodigounidadeitemservico = '0'
    ) {
        $this->cdColigada = $cdColigada;
        $this->dsDescricaoServico = $dsDescricaoServico;
        $this->dsItemServico = $dsItemServico;
        $this->cdCnae = $cdCnae;
        $this->cdTributacaoMunicipio = $cdTributacaoMunicipio;
        $this->dsJTributacao = $dsJTributacao;
        $this->snIssretido = $snIssretido;
        $this->vlAliquota = $vlAliquota;
        $this->dsK2Tributavel = $dsK2Tributavel;
        $this->dsUnidadeitemservico = $dsUnidadeitemservico;
        $this->dsCodigounidadeitemservico = $dsCodigounidadeitemservico;
    }

    public function getCdNfeG2kaServicosTitulos(): ?int
    {
        return $this->cdNfeG2kaServicosTitulos;
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

    public function getDsDescricaoServico(): ?string
    {
        return $this->dsDescricaoServico;
    }

    public function setDsDescricaoServico(?string $dsDescricaoServico): self
    {
        $this->dsDescricaoServico = $dsDescricaoServico;
        return $this;
    }

    public function getDsItemServico(): ?string
    {
        return $this->dsItemServico;
    }

    public function setDsItemServico(?string $dsItemServico): self
    {
        $this->dsItemServico = $dsItemServico;
        return $this;
    }

    public function getCdCnae(): ?string
    {
        return $this->cdCnae;
    }

    public function setCdCnae(?string $cdCnae): self
    {
        $this->cdCnae = $cdCnae;
        return $this;
    }

    public function getCdTributacaoMunicipio(): ?string
    {
        return $this->cdTributacaoMunicipio;
    }

    public function setCdTributacaoMunicipio(?string $cdTributacaoMunicipio): self
    {
        $this->cdTributacaoMunicipio = $cdTributacaoMunicipio;
        return $this;
    }

    public function getDsJTributacao(): ?string
    {
        return $this->dsJTributacao;
    }

    public function setDsJTributacao(?string $dsJTributacao): self
    {
        $this->dsJTributacao = $dsJTributacao;
        return $this;
    }

    public function isSnIssretido(): ?bool
    {
        return $this->snIssretido;
    }

    public function setSnIssretido(?bool $snIssretido): self
    {
        $this->snIssretido = $snIssretido;
        return $this;
    }

    public function getVlAliquota(): ?string
    {
        return $this->vlAliquota;
    }

    public function setVlAliquota(?string $vlAliquota): self
    {
        $this->vlAliquota = $vlAliquota;
        return $this;
    }

    public function getDsK2Tributavel(): ?string
    {
        return $this->dsK2Tributavel;
    }

    public function setDsK2Tributavel(?string $dsK2Tributavel): self
    {
        $this->dsK2Tributavel = $dsK2Tributavel;
        return $this;
    }

    public function getDsUnidadeitemservico(): ?string
    {
        return $this->dsUnidadeitemservico;
    }

    public function setDsUnidadeitemservico(?string $dsUnidadeitemservico): self
    {
        $this->dsUnidadeitemservico = $dsUnidadeitemservico;
        return $this;
    }

    public function getDsCodigounidadeitemservico(): ?string
    {
        return $this->dsCodigounidadeitemservico;
    }

    public function setDsCodigounidadeitemservico(?string $dsCodigounidadeitemservico): self
    {
        $this->dsCodigounidadeitemservico = $dsCodigounidadeitemservico;
        return $this;
    }
}
