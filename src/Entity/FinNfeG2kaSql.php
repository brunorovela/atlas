<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaSqlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaSqlRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_sql',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_tipo', columns: ['cd_nfe_g2ka_sql_tipo'])]
#[ORM\Index(name: 'IX_CD_NFE_G2KA_SQL_TIPO', columns: ['cd_nfe_g2ka_sql_tipo'])]
class FinNfeG2kaSql
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_g2ka_sql', type: 'integer')]
    private ?int $cdNfeG2kaSql = null;

    #[ORM\Column(name: 'cd_nfe_g2ka_sql_tipo', type: 'integer', nullable: true)]
    private ?int $cdNfeG2kaSqlTipo = null;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdColigada = 1;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 50, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?int $cdNfeG2kaSqlTipo = null,
        ?string $dsSql = null,
        ?int $cdColigada = 1,
        ?string $dsDescricao = null
    ) {
        $this->cdNfeG2kaSqlTipo = $cdNfeG2kaSqlTipo;
        $this->dsSql = $dsSql;
        $this->cdColigada = $cdColigada;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdNfeG2kaSql(): ?int
    {
        return $this->cdNfeG2kaSql;
    }

    public function getCdNfeG2kaSqlTipo(): ?int
    {
        return $this->cdNfeG2kaSqlTipo;
    }

    public function setCdNfeG2kaSqlTipo(?int $cdNfeG2kaSqlTipo): self
    {
        $this->cdNfeG2kaSqlTipo = $cdNfeG2kaSqlTipo;
        return $this;
    }

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
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

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
