<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogsTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsTiposRepository::class)]
#[ORM\Table(
    name: 'logs_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class LogsTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 50, nullable: true, options: ['default' => '0'])]
    private ?string $dsTipo = '0';

    #[ORM\Column(name: 'cp_chaves', type: 'string', length: 100, nullable: true)]
    private ?string $cpChaves = null;

    public function __construct(
        ?string $dsTipo = '0',
        ?string $cpChaves = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->cpChaves = $cpChaves;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
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

    public function getCpChaves(): ?string
    {
        return $this->cpChaves;
    }

    public function setCpChaves(?string $cpChaves): self
    {
        $this->cpChaves = $cpChaves;
        return $this;
    }
}
