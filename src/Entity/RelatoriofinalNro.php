<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RelatoriofinalNroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelatoriofinalNroRepository::class)]
#[ORM\Table(
    name: 'relatoriofinal_nro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class RelatoriofinalNro
{
    #[ORM\Id]
    #[ORM\Column(name: 'nro', type: 'integer', options: ['default' => '0'])]
    private int $nro = 0;

    public function __construct(
        int $nro = 0
    ) {
        $this->nro = $nro;
    }

    public function getNro(): int
    {
        return $this->nro;
    }

    public function setNro(int $nro): self
    {
        $this->nro = $nro;
        return $this;
    }
}
