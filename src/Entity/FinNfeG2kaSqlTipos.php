<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaSqlTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaSqlTiposRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_sql_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfeG2kaSqlTipos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_nfe_g2ka_sql_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdNfeG2kaSqlTipo = 0;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        int $cdNfeG2kaSqlTipo = 0,
        ?string $dsDescricao = null
    ) {
        $this->cdNfeG2kaSqlTipo = $cdNfeG2kaSqlTipo;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdNfeG2kaSqlTipo(): int
    {
        return $this->cdNfeG2kaSqlTipo;
    }

    public function setCdNfeG2kaSqlTipo(int $cdNfeG2kaSqlTipo): self
    {
        $this->cdNfeG2kaSqlTipo = $cdNfeG2kaSqlTipo;
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
