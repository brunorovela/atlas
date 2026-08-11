<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ExpoProcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoProcessosRepository::class)]
#[ORM\Table(
    name: 'expo_processos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'expo_processos_layout', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'expo_processos_layout', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'expo_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ExpoProcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\ManyToOne(targetEntity: ExpoLayouts::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ExpoLayouts $cdLayout = null;

    #[ORM\Column(name: 'ds_processo', type: 'string', length: 100)]
    private ?string $dsProcesso = null;

    #[ORM\Column(name: 'me_edital', type: 'text', length: 16777215, nullable: true)]
    private ?string $meEdital = null;

    #[ORM\Column(name: 'dt_processo', type: 'datetime')]
    private ?\DateTimeInterface $dtProcesso = null;

    public function __construct(
        ?ExpoLayouts $cdLayout = null,
        ?string $dsProcesso = null,
        ?string $meEdital = null,
        ?\DateTimeInterface $dtProcesso = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->dsProcesso = $dsProcesso;
        $this->meEdital = $meEdital;
        $this->dtProcesso = $dtProcesso;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getCdLayout(): ?ExpoLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?ExpoLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getDsProcesso(): ?string
    {
        return $this->dsProcesso;
    }

    public function setDsProcesso(?string $dsProcesso): self
    {
        $this->dsProcesso = $dsProcesso;
        return $this;
    }

    public function getMeEdital(): ?string
    {
        return $this->meEdital;
    }

    public function setMeEdital(?string $meEdital): self
    {
        $this->meEdital = $meEdital;
        return $this;
    }

    public function getDtProcesso(): ?\DateTimeInterface
    {
        return $this->dtProcesso;
    }

    public function setDtProcesso(?\DateTimeInterface $dtProcesso): self
    {
        $this->dtProcesso = $dtProcesso;
        return $this;
    }
}
