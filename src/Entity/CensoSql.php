<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoSqlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoSqlRepository::class)]
#[ORM\Table(
    name: 'censo_sql',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CensoSql
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_sql', type: 'smallint', options: ['default' => '0'])]
    private int $cdSql = 0;

    #[ORM\Column(name: 'nm_sql', type: 'string', length: 100, nullable: true)]
    private ?string $nmSql = null;

    #[ORM\Column(name: 'ds_tabela', type: 'string', length: 250, nullable: true)]
    private ?string $dsTabela = null;

    #[ORM\Column(name: 'ds_filtro', type: 'string', length: 250, nullable: true)]
    private ?string $dsFiltro = null;

    #[ORM\Column(name: 'ds_link_tabela', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsLinkTabela = null;

    public function __construct(
        int $cdSql = 0,
        ?string $nmSql = null,
        ?string $dsTabela = null,
        ?string $dsFiltro = null,
        ?string $dsLinkTabela = null
    ) {
        $this->cdSql = $cdSql;
        $this->nmSql = $nmSql;
        $this->dsTabela = $dsTabela;
        $this->dsFiltro = $dsFiltro;
        $this->dsLinkTabela = $dsLinkTabela;
    }

    public function getCdSql(): int
    {
        return $this->cdSql;
    }

    public function setCdSql(int $cdSql): self
    {
        $this->cdSql = $cdSql;
        return $this;
    }

    public function getNmSql(): ?string
    {
        return $this->nmSql;
    }

    public function setNmSql(?string $nmSql): self
    {
        $this->nmSql = $nmSql;
        return $this;
    }

    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    public function setDsTabela(?string $dsTabela): self
    {
        $this->dsTabela = $dsTabela;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }

    public function getDsLinkTabela(): ?string
    {
        return $this->dsLinkTabela;
    }

    public function setDsLinkTabela(?string $dsLinkTabela): self
    {
        $this->dsLinkTabela = $dsLinkTabela;
        return $this;
    }
}
