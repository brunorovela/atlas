<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuTabelasBancosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTabelasBancosRepository::class)]
#[ORM\Table(
    name: 'nu_tabelas_bancos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuTabelasBancos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_banco', type: 'integer')]
    private ?int $cdBanco = null;

    #[ORM\Column(name: 'ds_banco', type: 'string', length: 50, nullable: true)]
    private ?string $dsBanco = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 75, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_diretorio', type: 'string', length: 150, nullable: true)]
    private ?string $dsDiretorio = null;

    public function __construct(
        ?string $dsBanco = null,
        ?string $dsChave = null,
        ?string $dsDiretorio = null
    ) {
        $this->dsBanco = $dsBanco;
        $this->dsChave = $dsChave;
        $this->dsDiretorio = $dsDiretorio;
    }

    public function getCdBanco(): ?int
    {
        return $this->cdBanco;
    }

    public function getDsBanco(): ?string
    {
        return $this->dsBanco;
    }

    public function setDsBanco(?string $dsBanco): self
    {
        $this->dsBanco = $dsBanco;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsDiretorio(): ?string
    {
        return $this->dsDiretorio;
    }

    public function setDsDiretorio(?string $dsDiretorio): self
    {
        $this->dsDiretorio = $dsDiretorio;
        return $this;
    }
}
