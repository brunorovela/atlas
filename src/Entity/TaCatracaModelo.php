<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TaCatracaModeloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaModeloRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_modelo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_MODELO_NM_MODELO', columns: ['NM_MODELO'])]
#[ORM\Index(name: 'FK_TA_CATRACA_MODELO_CD_CATRACA_MARCA_TA_CATRACA_MARCA', columns: ['CD_CATRACA_MARCA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TA_CATRACA_MODELO_CD_CATRACA_MARCA_TA_CATRACA_MARCA', 'colunas' => ['CD_CATRACA_MARCA'], 'tabelaAlvo' => 'ta_catraca_marca', 'colunasAlvo' => ['CD_CATRACA_MARCA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaCatracaModelo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_MODELO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCatracaModelo = null;

    #[ORM\ManyToOne(targetEntity: TaCatracaMarca::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_MARCA', referencedColumnName: 'CD_CATRACA_MARCA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatracaMarca $cdCatracaMarca = null;

    #[ORM\Column(name: 'NM_MODELO', type: 'string', length: 255)]
    private ?string $nmModelo = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?TaCatracaMarca $cdCatracaMarca = null,
        ?string $nmModelo = null,
        ?string $dsChave = null
    ) {
        $this->cdCatracaMarca = $cdCatracaMarca;
        $this->nmModelo = $nmModelo;
        $this->dsChave = $dsChave;
    }

    public function getCdCatracaModelo(): ?int
    {
        return $this->cdCatracaModelo;
    }

    public function getCdCatracaMarca(): ?TaCatracaMarca
    {
        return $this->cdCatracaMarca;
    }

    public function setCdCatracaMarca(?TaCatracaMarca $cdCatracaMarca): self
    {
        $this->cdCatracaMarca = $cdCatracaMarca;
        return $this;
    }

    public function getNmModelo(): ?string
    {
        return $this->nmModelo;
    }

    public function setNmModelo(?string $nmModelo): self
    {
        $this->nmModelo = $nmModelo;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
