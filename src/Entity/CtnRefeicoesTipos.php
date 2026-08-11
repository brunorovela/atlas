<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CtnRefeicoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnRefeicoesTiposRepository::class)]
#[ORM\Table(
    name: 'ctn_refeicoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CtnRefeicoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_refeicao_tipo', type: 'integer')]
    private ?int $cdRefeicaoTipo = null;

    #[ORM\Column(name: 'ds_refeicao_tipo', type: 'string', length: 255, nullable: true)]
    private ?string $dsRefeicaoTipo = null;

    #[ORM\Column(name: 'ds_refeicao_grupo', type: 'string', length: 50, nullable: true)]
    private ?string $dsRefeicaoGrupo = null;

    public function __construct(
        ?string $dsRefeicaoTipo = null,
        ?string $dsRefeicaoGrupo = null
    ) {
        $this->dsRefeicaoTipo = $dsRefeicaoTipo;
        $this->dsRefeicaoGrupo = $dsRefeicaoGrupo;
    }

    public function getCdRefeicaoTipo(): ?int
    {
        return $this->cdRefeicaoTipo;
    }

    public function getDsRefeicaoTipo(): ?string
    {
        return $this->dsRefeicaoTipo;
    }

    public function setDsRefeicaoTipo(?string $dsRefeicaoTipo): self
    {
        $this->dsRefeicaoTipo = $dsRefeicaoTipo;
        return $this;
    }

    public function getDsRefeicaoGrupo(): ?string
    {
        return $this->dsRefeicaoGrupo;
    }

    public function setDsRefeicaoGrupo(?string $dsRefeicaoGrupo): self
    {
        $this->dsRefeicaoGrupo = $dsRefeicaoGrupo;
        return $this;
    }
}
