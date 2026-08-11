<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinAcoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinAcoesTiposRepository::class)]
#[ORM\Table(
    name: 'fin_acoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinAcoesTipos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_acao', type: 'smallint', options: ['default' => '0'])]
    private int $cdTipoAcao = 0;

    #[ORM\Column(name: 'ds_tipo_acao', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoAcao = null;

    public function __construct(
        int $cdTipoAcao = 0,
        ?string $dsTipoAcao = null
    ) {
        $this->cdTipoAcao = $cdTipoAcao;
        $this->dsTipoAcao = $dsTipoAcao;
    }

    public function getCdTipoAcao(): int
    {
        return $this->cdTipoAcao;
    }

    public function setCdTipoAcao(int $cdTipoAcao): self
    {
        $this->cdTipoAcao = $cdTipoAcao;
        return $this;
    }

    public function getDsTipoAcao(): ?string
    {
        return $this->dsTipoAcao;
    }

    public function setDsTipoAcao(?string $dsTipoAcao): self
    {
        $this->dsTipoAcao = $dsTipoAcao;
        return $this;
    }
}
