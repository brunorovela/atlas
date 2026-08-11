<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoConsultaCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoConsultaCamposRepository::class)]
#[ORM\Table(
    name: 'expo_consulta_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['nm_campo', 'nm_tabela', 'nm_consulta'])]
#[ORM\Index(name: 'IX_NM_CAMPO', columns: ['nm_campo'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NM_TABELA', columns: ['nm_tabela'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NM_CONSULTA', columns: ['nm_consulta'], options: ['lengths' => [20]])]
class ExpoConsultaCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer', options: ['unsigned' => true])]
    private ?int $codigo = null;

    #[ORM\Column(name: 'nm_consulta', type: 'string', length: 30, nullable: true)]
    private ?string $nmConsulta = null;

    #[ORM\Column(name: 'nm_tabela', type: 'string', length: 30, nullable: true)]
    private ?string $nmTabela = null;

    #[ORM\Column(name: 'nm_campo', type: 'string', length: 100, nullable: true)]
    private ?string $nmCampo = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 100, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'sn_sql', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSql = false;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $meSql = null;

    public function __construct(
        ?string $nmConsulta = null,
        ?string $nmTabela = null,
        ?string $nmCampo = null,
        ?string $dsValor = null,
        ?bool $snSql = false,
        ?string $meSql = null
    ) {
        $this->nmConsulta = $nmConsulta;
        $this->nmTabela = $nmTabela;
        $this->nmCampo = $nmCampo;
        $this->dsValor = $dsValor;
        $this->snSql = $snSql;
        $this->meSql = $meSql;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getNmConsulta(): ?string
    {
        return $this->nmConsulta;
    }

    public function setNmConsulta(?string $nmConsulta): self
    {
        $this->nmConsulta = $nmConsulta;
        return $this;
    }

    public function getNmTabela(): ?string
    {
        return $this->nmTabela;
    }

    public function setNmTabela(?string $nmTabela): self
    {
        $this->nmTabela = $nmTabela;
        return $this;
    }

    public function getNmCampo(): ?string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(?string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
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

    public function isSnSql(): ?bool
    {
        return $this->snSql;
    }

    public function setSnSql(?bool $snSql): self
    {
        $this->snSql = $snSql;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }
}
