<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEventosTiposGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosTiposGruposRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_tipos_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_EVENTOS_TIPOS_GRUPOS', columns: ['CD_GRUPO', 'CD_TIPO'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['CD_TIPO'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_eventos_tipos_grupos_ibfk_1', 'colunas' => ['CD_TIPO'], 'tabelaAlvo' => 'tam_eventos_tipos', 'colunasAlvo' => ['CD_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamEventosTiposGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO_GRUPO', type: 'integer')]
    private ?int $cdTipoGrupo = null;

    #[ORM\ManyToOne(targetEntity: TamEventosTipos::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO', referencedColumnName: 'CD_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventosTipos $cdTipo = null;

    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    public function __construct(
        ?TamEventosTipos $cdTipo = null,
        ?int $cdGrupo = null,
        ?int $cdPessoa = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdTipoGrupo(): ?int
    {
        return $this->cdTipoGrupo;
    }

    public function getCdTipo(): ?TamEventosTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?TamEventosTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }
}
