<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\OuvGruposNugruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvGruposNugruposRepository::class)]
#[ORM\Table(
    name: 'ouv_grupos_nugrupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_ouv_gn_grupo', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_ogn_grupo_og_grupo', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'ouv_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvGruposNugrupos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: OuvGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?OuvGrupos $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_nugrupo', type: 'integer')]
    private ?int $cdNugrupo = null;

    public function __construct(
        ?OuvGrupos $cdGrupo = null,
        ?int $cdNugrupo = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdNugrupo = $cdNugrupo;
    }

    public function getCdGrupo(): ?OuvGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?OuvGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdNugrupo(): ?int
    {
        return $this->cdNugrupo;
    }

    public function setCdNugrupo(?int $cdNugrupo): self
    {
        $this->cdNugrupo = $cdNugrupo;
        return $this;
    }
}
