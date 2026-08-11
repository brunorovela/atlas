<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\OuvSetoresGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvSetoresGruposRepository::class)]
#[ORM\Table(
    name: 'ouv_setores_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_ouv_sg_setor', columns: ['CD_SETOR'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['CD_SETOR'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OSG_SETOR_OS_SETOR', 'colunas' => ['CD_SETOR'], 'tabelaAlvo' => 'ouv_setores', 'colunasAlvo' => ['CD_SETOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvSetoresGrupos
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: OuvSetores::class)]
    #[ORM\JoinColumn(name: 'CD_SETOR', referencedColumnName: 'CD_SETOR', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvSetores $cdSetor = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?OuvSetores $cdSetor = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdSetor = $cdSetor;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdSetor(): ?OuvSetores
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?OuvSetores $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
        return $this;
    }
}
