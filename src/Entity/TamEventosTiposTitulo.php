<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEventosTiposTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosTiposTituloRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_tipos_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_EVENTOS_TIPOS_TITULO', columns: ['CD_TIPO', 'CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['CD_TIPO'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['CD_TIPO_TITULO'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['CD_COLIGADA_MATRIZ'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_EVENTOS_TIPO_TITULO_TIT', 'colunas' => ['CD_TIPO_TITULO'], 'tabelaAlvo' => 'fin_config_tipos_titulo', 'colunasAlvo' => ['cd_tipo_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'tam_eventos_tipos_titulo_ibfk_1', 'colunas' => ['CD_TIPO'], 'tabelaAlvo' => 'tam_eventos_tipos', 'colunasAlvo' => ['CD_TIPO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class TamEventosTiposTitulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_EVENTO_TIPO_TITULO', type: 'integer')]
    private ?int $cdEventoTipoTitulo = null;

    #[ORM\ManyToOne(targetEntity: TamEventosTipos::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO', referencedColumnName: 'CD_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventosTipos $cdTipo = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    public function __construct(
        ?TamEventosTipos $cdTipo = null,
        ?int $cdTipoTitulo = null,
        ?int $cdColigadaMatriz = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdEventoTipoTitulo(): ?int
    {
        return $this->cdEventoTipoTitulo;
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

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
