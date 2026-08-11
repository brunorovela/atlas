<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfeXmlLayoutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeXmlLayoutRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_xml_layout',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeXmlLayout
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tag', type: 'integer')]
    private ?int $cdTag = null;

    #[ORM\Column(name: 'cd_tag_pai', type: 'integer', nullable: true)]
    private ?int $cdTagPai = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer')]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_tag', type: 'string', length: 255)]
    private ?string $dsTag = null;

    #[ORM\Column(name: 'ds_tag_raiz', type: 'string', length: 255)]
    private ?string $dsTagRaiz = null;

    #[ORM\Column(name: 'sn_multiplas_vezes', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snMultiplasVezes = 0;

    #[ORM\Column(name: 'ds_campo_sql', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoSql = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'sn_nota_produto', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNotaProduto = false;

    #[ORM\Column(name: 'cd_sql', type: 'integer', nullable: true)]
    private ?int $cdSql = null;

    #[ORM\Column(name: 'ds_atributos', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAtributos = null;

    #[ORM\Column(name: 'ds_parametros', type: 'text', length: 65535, nullable: true)]
    private ?string $dsParametros = null;

    #[ORM\Column(name: 'sn_nfc_enviar_cpf', type: 'boolean', options: ['default' => '0'])]
    private bool $snNfcEnviarCpf = false;

    public function __construct(
        ?int $cdTagPai = null,
        ?int $nrOrdem = null,
        ?string $dsTag = null,
        ?string $dsTagRaiz = null,
        int $snMultiplasVezes = 0,
        ?string $dsCampoSql = null,
        ?string $dsObservacao = null,
        ?bool $snNotaProduto = false,
        ?int $cdSql = null,
        ?string $dsAtributos = null,
        ?string $dsParametros = null,
        bool $snNfcEnviarCpf = false
    ) {
        $this->cdTagPai = $cdTagPai;
        $this->nrOrdem = $nrOrdem;
        $this->dsTag = $dsTag;
        $this->dsTagRaiz = $dsTagRaiz;
        $this->snMultiplasVezes = $snMultiplasVezes;
        $this->dsCampoSql = $dsCampoSql;
        $this->dsObservacao = $dsObservacao;
        $this->snNotaProduto = $snNotaProduto;
        $this->cdSql = $cdSql;
        $this->dsAtributos = $dsAtributos;
        $this->dsParametros = $dsParametros;
        $this->snNfcEnviarCpf = $snNfcEnviarCpf;
    }

    public function getCdTag(): ?int
    {
        return $this->cdTag;
    }

    public function getCdTagPai(): ?int
    {
        return $this->cdTagPai;
    }

    public function setCdTagPai(?int $cdTagPai): self
    {
        $this->cdTagPai = $cdTagPai;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsTag(): ?string
    {
        return $this->dsTag;
    }

    public function setDsTag(?string $dsTag): self
    {
        $this->dsTag = $dsTag;
        return $this;
    }

    public function getDsTagRaiz(): ?string
    {
        return $this->dsTagRaiz;
    }

    public function setDsTagRaiz(?string $dsTagRaiz): self
    {
        $this->dsTagRaiz = $dsTagRaiz;
        return $this;
    }

    public function getSnMultiplasVezes(): int
    {
        return $this->snMultiplasVezes;
    }

    public function setSnMultiplasVezes(int $snMultiplasVezes): self
    {
        $this->snMultiplasVezes = $snMultiplasVezes;
        return $this;
    }

    public function getDsCampoSql(): ?string
    {
        return $this->dsCampoSql;
    }

    public function setDsCampoSql(?string $dsCampoSql): self
    {
        $this->dsCampoSql = $dsCampoSql;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function isSnNotaProduto(): ?bool
    {
        return $this->snNotaProduto;
    }

    public function setSnNotaProduto(?bool $snNotaProduto): self
    {
        $this->snNotaProduto = $snNotaProduto;
        return $this;
    }

    public function getCdSql(): ?int
    {
        return $this->cdSql;
    }

    public function setCdSql(?int $cdSql): self
    {
        $this->cdSql = $cdSql;
        return $this;
    }

    public function getDsAtributos(): ?string
    {
        return $this->dsAtributos;
    }

    public function setDsAtributos(?string $dsAtributos): self
    {
        $this->dsAtributos = $dsAtributos;
        return $this;
    }

    public function getDsParametros(): ?string
    {
        return $this->dsParametros;
    }

    public function setDsParametros(?string $dsParametros): self
    {
        $this->dsParametros = $dsParametros;
        return $this;
    }

    public function isSnNfcEnviarCpf(): bool
    {
        return $this->snNfcEnviarCpf;
    }

    public function setSnNfcEnviarCpf(bool $snNfcEnviarCpf): self
    {
        $this->snNfcEnviarCpf = $snNfcEnviarCpf;
        return $this;
    }
}
