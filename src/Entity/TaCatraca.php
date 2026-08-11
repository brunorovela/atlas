<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TaCatracaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaRepository::class)]
#[ORM\Table(
    name: 'ta_catraca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_NM_CATRACA', columns: ['NM_CATRACA'])]
#[ORM\Index(name: 'FK_TA_CATRACA_CD_CATRACA_MODELO_TA_CATRACA_MODELO', columns: ['CD_CATRACA_MODELO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TA_CATRACA_CD_CATRACA_MODELO_TA_CATRACA_MODELO', 'colunas' => ['CD_CATRACA_MODELO'], 'tabelaAlvo' => 'ta_catraca_modelo', 'colunasAlvo' => ['CD_CATRACA_MODELO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaCatraca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCatraca = null;

    #[ORM\ManyToOne(targetEntity: TaCatracaModelo::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_MODELO', referencedColumnName: 'CD_CATRACA_MODELO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatracaModelo $cdCatracaModelo = null;

    #[ORM\Column(name: 'NM_CATRACA', type: 'string', length: 255)]
    private ?string $nmCatraca = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'DS_IP', type: 'string', length: 15, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'NR_PORTA', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrPorta = 0;

    #[ORM\Column(name: 'DS_MAC_ADDRESS', type: 'string', length: 17, nullable: true, options: ['fixed' => true])]
    private ?string $dsMacAddress = null;

    #[ORM\Column(name: 'DS_CONFIG', type: 'text', length: 65535, nullable: true)]
    private ?string $dsConfig = null;

    public function __construct(
        ?TaCatracaModelo $cdCatracaModelo = null,
        ?string $nmCatraca = null,
        int $snAtivo = 1,
        ?string $dsIp = null,
        int $nrPorta = 0,
        ?string $dsMacAddress = null,
        ?string $dsConfig = null
    ) {
        $this->cdCatracaModelo = $cdCatracaModelo;
        $this->nmCatraca = $nmCatraca;
        $this->snAtivo = $snAtivo;
        $this->dsIp = $dsIp;
        $this->nrPorta = $nrPorta;
        $this->dsMacAddress = $dsMacAddress;
        $this->dsConfig = $dsConfig;
    }

    public function getCdCatraca(): ?int
    {
        return $this->cdCatraca;
    }

    public function getCdCatracaModelo(): ?TaCatracaModelo
    {
        return $this->cdCatracaModelo;
    }

    public function setCdCatracaModelo(?TaCatracaModelo $cdCatracaModelo): self
    {
        $this->cdCatracaModelo = $cdCatracaModelo;
        return $this;
    }

    public function getNmCatraca(): ?string
    {
        return $this->nmCatraca;
    }

    public function setNmCatraca(?string $nmCatraca): self
    {
        $this->nmCatraca = $nmCatraca;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getNrPorta(): int
    {
        return $this->nrPorta;
    }

    public function setNrPorta(int $nrPorta): self
    {
        $this->nrPorta = $nrPorta;
        return $this;
    }

    public function getDsMacAddress(): ?string
    {
        return $this->dsMacAddress;
    }

    public function setDsMacAddress(?string $dsMacAddress): self
    {
        $this->dsMacAddress = $dsMacAddress;
        return $this;
    }

    public function getDsConfig(): ?string
    {
        return $this->dsConfig;
    }

    public function setDsConfig(?string $dsConfig): self
    {
        $this->dsConfig = $dsConfig;
        return $this;
    }
}
