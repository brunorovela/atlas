<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCadastroContasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCadastroContasTiposRepository::class)]
#[ORM\Table(
    name: 'fin_cadastro_contas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinCadastroContasTipos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipo = null;

    public function __construct(
        int $cdTipo = 0,
        ?string $dsTipo = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsTipo = $dsTipo;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }
}
