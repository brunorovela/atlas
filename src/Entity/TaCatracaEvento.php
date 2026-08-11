<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TaCatracaEventoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaEventoRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_evento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TA_CATRACA_EVENTO_CD_CATRACA_EVENTO_TIPO_TA_CATRACA_EVENTO_TP', columns: ['CD_CATRACA_EVENTO_TIPO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TA_CATRACA_EVENTO_CD_CATRACA_EVENTO_TIPO_TA_CATRACA_EVENTO_TP', 'colunas' => ['CD_CATRACA_EVENTO_TIPO'], 'tabelaAlvo' => 'ta_catraca_evento_tipo', 'colunasAlvo' => ['CD_CATRACA_EVENTO_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaCatracaEvento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_EVENTO', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdCatracaEvento = null;

    #[ORM\Column(name: 'CD_CATRACA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCatraca = null;

    #[ORM\ManyToOne(targetEntity: TaCatracaEventoTipo::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_EVENTO_TIPO', referencedColumnName: 'CD_CATRACA_EVENTO_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatracaEventoTipo $cdCatracaEventoTipo = null;

    #[ORM\Column(name: 'CD_CATRACA_IDENTIFICACAO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCatracaIdentificacao = null;

    #[ORM\Column(name: 'DS_INFO', type: 'text', length: 65535)]
    private ?string $dsInfo = null;

    #[ORM\Column(name: 'DT_EVENTO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtEvento = null;

    public function __construct(
        ?int $cdCatraca = null,
        ?TaCatracaEventoTipo $cdCatracaEventoTipo = null,
        ?int $cdCatracaIdentificacao = null,
        ?string $dsInfo = null,
        ?\DateTimeInterface $dtEvento = null
    ) {
        $this->cdCatraca = $cdCatraca;
        $this->cdCatracaEventoTipo = $cdCatracaEventoTipo;
        $this->cdCatracaIdentificacao = $cdCatracaIdentificacao;
        $this->dsInfo = $dsInfo;
        $this->dtEvento = $dtEvento;
    }

    public function getCdCatracaEvento(): ?string
    {
        return $this->cdCatracaEvento;
    }

    public function getCdCatraca(): ?int
    {
        return $this->cdCatraca;
    }

    public function setCdCatraca(?int $cdCatraca): self
    {
        $this->cdCatraca = $cdCatraca;
        return $this;
    }

    public function getCdCatracaEventoTipo(): ?TaCatracaEventoTipo
    {
        return $this->cdCatracaEventoTipo;
    }

    public function setCdCatracaEventoTipo(?TaCatracaEventoTipo $cdCatracaEventoTipo): self
    {
        $this->cdCatracaEventoTipo = $cdCatracaEventoTipo;
        return $this;
    }

    public function getCdCatracaIdentificacao(): ?int
    {
        return $this->cdCatracaIdentificacao;
    }

    public function setCdCatracaIdentificacao(?int $cdCatracaIdentificacao): self
    {
        $this->cdCatracaIdentificacao = $cdCatracaIdentificacao;
        return $this;
    }

    public function getDsInfo(): ?string
    {
        return $this->dsInfo;
    }

    public function setDsInfo(?string $dsInfo): self
    {
        $this->dsInfo = $dsInfo;
        return $this;
    }

    public function getDtEvento(): ?\DateTimeInterface
    {
        return $this->dtEvento;
    }

    public function setDtEvento(?\DateTimeInterface $dtEvento): self
    {
        $this->dtEvento = $dtEvento;
        return $this;
    }
}
