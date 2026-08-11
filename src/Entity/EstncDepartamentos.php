<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncDepartamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncDepartamentosRepository::class)]
#[ORM\Table(
    name: 'estnc_departamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncDepartamentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_departamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDepartamento = null;

    #[ORM\Column(name: 'ds_departamento', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsDepartamento = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsDepartamento = null,
        ?int $snAtivo = null
    ) {
        $this->dsDepartamento = $dsDepartamento;
        $this->snAtivo = $snAtivo;
    }

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function getDsDepartamento(): ?string
    {
        return $this->dsDepartamento;
    }

    public function setDsDepartamento(?string $dsDepartamento): self
    {
        $this->dsDepartamento = $dsDepartamento;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
