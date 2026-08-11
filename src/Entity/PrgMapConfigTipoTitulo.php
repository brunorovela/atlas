<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMapConfigTipoTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMapConfigTipoTituloRepository::class)]
#[ORM\Table(
    name: 'prg_map_config_tipo_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_config_coligada', columns: ['cd_config_tipo_titulo', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'idx_cd_config_tipo_titulo', columns: ['cd_config_tipo_titulo'])]
#[ORM\Index(name: 'idx_cd_prg_tipo_parcela', columns: ['cd_prg_tipo_parcela'])]
#[ORM\Index(name: 'idx_cd_coligada_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_map_prg_tipo_parcela', 'colunas' => ['cd_prg_tipo_parcela'], 'tabelaAlvo' => 'prg_tipo_parcela', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'fk_prg_map_tipo_titulo', 'colunas' => ['cd_config_tipo_titulo'], 'tabelaAlvo' => 'fin_config_tipos_titulo', 'colunasAlvo' => ['cd_tipo_titulo'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class PrgMapConfigTipoTitulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_config_tipo_titulo', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConfigTipoTitulo = null;

    #[ORM\ManyToOne(targetEntity: PrgTipoParcela::class)]
    #[ORM\JoinColumn(name: 'cd_prg_tipo_parcela', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgTipoParcela $cdPrgTipoParcela = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer')]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdConfigTipoTitulo = null,
        ?PrgTipoParcela $cdPrgTipoParcela = null,
        ?int $cdColigadaMatriz = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdConfigTipoTitulo = $cdConfigTipoTitulo;
        $this->cdPrgTipoParcela = $cdPrgTipoParcela;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdConfigTipoTitulo(): ?int
    {
        return $this->cdConfigTipoTitulo;
    }

    public function setCdConfigTipoTitulo(?int $cdConfigTipoTitulo): self
    {
        $this->cdConfigTipoTitulo = $cdConfigTipoTitulo;
        return $this;
    }

    public function getCdPrgTipoParcela(): ?PrgTipoParcela
    {
        return $this->cdPrgTipoParcela;
    }

    public function setCdPrgTipoParcela(?PrgTipoParcela $cdPrgTipoParcela): self
    {
        $this->cdPrgTipoParcela = $cdPrgTipoParcela;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
