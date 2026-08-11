<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasTipoAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasTipoAnexoRepository::class)]
#[ORM\Table(
    name: 'monografias_tipo_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class MonografiasTipoAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_anexo', type: 'integer')]
    private ?int $cdTipoAnexo = null;

    #[ORM\Column(name: 'ds_tipo_anexo', type: 'string', length: 255)]
    private ?string $dsTipoAnexo = null;

    public function __construct(
        ?string $dsTipoAnexo = null
    ) {
        $this->dsTipoAnexo = $dsTipoAnexo;
    }

    public function getCdTipoAnexo(): ?int
    {
        return $this->cdTipoAnexo;
    }

    public function getDsTipoAnexo(): ?string
    {
        return $this->dsTipoAnexo;
    }

    public function setDsTipoAnexo(?string $dsTipoAnexo): self
    {
        $this->dsTipoAnexo = $dsTipoAnexo;
        return $this;
    }
}
