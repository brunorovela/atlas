<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MecAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MecAreasRepository::class)]
#[ORM\Table(
    name: 'mec_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_area_cor', columns: ['cd_area_cor'])]
#[ORM\Index(name: 'IX_CD_AREA_COR', columns: ['cd_area_cor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mec_areas_ibfk_1', 'colunas' => ['cd_area_cor'], 'tabelaAlvo' => 'mec_areas_cores', 'colunasAlvo' => ['cd_area_cor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MecAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer')]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_area', type: 'string', length: 50, nullable: true)]
    private ?string $dsArea = null;

    #[ORM\Column(name: 'cd_area_mae', type: 'integer', options: ['default' => '0'])]
    private int $cdAreaMae = 0;

    #[ORM\ManyToOne(targetEntity: MecAreasCores::class)]
    #[ORM\JoinColumn(name: 'cd_area_cor', referencedColumnName: 'cd_area_cor', nullable: false, options: ['default' => '1', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?MecAreasCores $cdAreaCor = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsArea = null,
        int $cdAreaMae = 0,
        ?MecAreasCores $cdAreaCor = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsArea = $dsArea;
        $this->cdAreaMae = $cdAreaMae;
        $this->cdAreaCor = $cdAreaCor;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
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

    public function getDsArea(): ?string
    {
        return $this->dsArea;
    }

    public function setDsArea(?string $dsArea): self
    {
        $this->dsArea = $dsArea;
        return $this;
    }

    public function getCdAreaMae(): int
    {
        return $this->cdAreaMae;
    }

    public function setCdAreaMae(int $cdAreaMae): self
    {
        $this->cdAreaMae = $cdAreaMae;
        return $this;
    }

    public function getCdAreaCor(): ?MecAreasCores
    {
        return $this->cdAreaCor;
    }

    public function setCdAreaCor(?MecAreasCores $cdAreaCor): self
    {
        $this->cdAreaCor = $cdAreaCor;
        return $this;
    }
}
