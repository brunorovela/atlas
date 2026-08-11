<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaLayoutColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaLayoutColigadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_layout_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class FinNfeG2kaLayoutColigadas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo', type: 'string', length: 20, options: ['default' => ''])]
    private string $cdGrupo = '';

    public function __construct(
        int $cdColigada = 0,
        string $cdGrupo = ''
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdGrupo(): string
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(string $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }
}
