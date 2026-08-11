<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RelGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelGruposRepository::class)]
#[ORM\Table(
    name: 'rel_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_grupos_cod_descricao', columns: ['cd_grupo', 'ds_grupo'])]
#[ORM\Index(name: 'fk_grupo_cd_grupo_pai', columns: ['cd_grupo_pai'])]
#[ORM\Index(name: 'fk_modulos_cd_modulo', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_PAI', columns: ['cd_grupo_pai'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_grupo_cd_grupo_pai', 'colunas' => ['cd_grupo_pai'], 'tabelaAlvo' => 'rel_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_modulos_cd_modulo', 'colunas' => ['cd_modulo'], 'tabelaAlvo' => 'nu_modulos', 'colunasAlvo' => ['cd_modulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RelGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\ManyToOne(targetEntity: RelGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_pai', referencedColumnName: 'cd_grupo', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelGrupos $cdGrupoPai = null;

    #[ORM\ManyToOne(targetEntity: NuModulos::class)]
    #[ORM\JoinColumn(name: 'cd_modulo', referencedColumnName: 'cd_modulo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuModulos $cdModulo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 200)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    public function __construct(
        ?RelGrupos $cdGrupoPai = null,
        ?NuModulos $cdModulo = null,
        ?string $dsGrupo = null,
        ?int $snAtivo = 1
    ) {
        $this->cdGrupoPai = $cdGrupoPai;
        $this->cdModulo = $cdModulo;
        $this->dsGrupo = $dsGrupo;
        $this->snAtivo = $snAtivo;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getCdGrupoPai(): ?RelGrupos
    {
        return $this->cdGrupoPai;
    }

    public function setCdGrupoPai(?RelGrupos $cdGrupoPai): self
    {
        $this->cdGrupoPai = $cdGrupoPai;
        return $this;
    }

    public function getCdModulo(): ?NuModulos
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?NuModulos $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
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
