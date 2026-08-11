<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RelTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelTiposRepository::class)]
#[ORM\Table(
    name: 'rel_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_tipos_tipo', columns: ['ds_tipo'])]
#[ORM\Index(name: 'fk_componente_cd_componente', columns: ['cd_componente'])]
#[ORM\Index(name: 'IX_CD_COMPONENTE', columns: ['cd_componente'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_componente_cd_componente', 'colunas' => ['cd_componente'], 'tabelaAlvo' => 'rel_componentes', 'colunasAlvo' => ['cd_componente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RelTipos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 50)]
    private ?string $dsTipo = null;

    #[ORM\ManyToOne(targetEntity: RelComponentes::class)]
    #[ORM\JoinColumn(name: 'cd_componente', referencedColumnName: 'cd_componente', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelComponentes $cdComponente = null;

    public function __construct(
        ?int $cdTipo = null,
        ?string $dsTipo = null,
        ?RelComponentes $cdComponente = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsTipo = $dsTipo;
        $this->cdComponente = $cdComponente;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
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

    public function getCdComponente(): ?RelComponentes
    {
        return $this->cdComponente;
    }

    public function setCdComponente(?RelComponentes $cdComponente): self
    {
        $this->cdComponente = $cdComponente;
        return $this;
    }
}
