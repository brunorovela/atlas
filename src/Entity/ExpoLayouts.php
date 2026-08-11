<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoLayoutsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoLayoutsRepository::class)]
#[ORM\Table(
    name: 'expo_layouts',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ExpoLayouts
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout', type: 'integer')]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'ds_layout', type: 'string', length: 255, nullable: true)]
    private ?string $dsLayout = null;

    #[ORM\Column(name: 'me_layout', type: 'blob', length: 65535, nullable: true)]
    private ?string $meLayout = null;

    #[ORM\Column(name: 'cd_formato', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdFormato = 0;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'nm_arquivo_padrao', type: 'string', length: 240, nullable: true)]
    private ?string $nmArquivoPadrao = null;

    #[ORM\Column(name: 'sn_exportacao', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snExportacao = 0;

    #[ORM\Column(name: 'SN_USAR_CH_SIT', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snUsarChSit = 1;

    #[ORM\Column(name: 'SN_USAR_ANOSEMESTRE', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snUsarAnosemestre = 1;

    public function __construct(
        ?string $dsLayout = null,
        ?string $meLayout = null,
        ?int $cdFormato = 0,
        ?int $snAtivo = 1,
        ?string $nmArquivoPadrao = null,
        int $snExportacao = 0,
        int $snUsarChSit = 1,
        int $snUsarAnosemestre = 1
    ) {
        $this->dsLayout = $dsLayout;
        $this->meLayout = $meLayout;
        $this->cdFormato = $cdFormato;
        $this->snAtivo = $snAtivo;
        $this->nmArquivoPadrao = $nmArquivoPadrao;
        $this->snExportacao = $snExportacao;
        $this->snUsarChSit = $snUsarChSit;
        $this->snUsarAnosemestre = $snUsarAnosemestre;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function getDsLayout(): ?string
    {
        return $this->dsLayout;
    }

    public function setDsLayout(?string $dsLayout): self
    {
        $this->dsLayout = $dsLayout;
        return $this;
    }

    public function getMeLayout(): ?string
    {
        return $this->meLayout;
    }

    public function setMeLayout(?string $meLayout): self
    {
        $this->meLayout = $meLayout;
        return $this;
    }

    public function getCdFormato(): ?int
    {
        return $this->cdFormato;
    }

    public function setCdFormato(?int $cdFormato): self
    {
        $this->cdFormato = $cdFormato;
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

    public function getNmArquivoPadrao(): ?string
    {
        return $this->nmArquivoPadrao;
    }

    public function setNmArquivoPadrao(?string $nmArquivoPadrao): self
    {
        $this->nmArquivoPadrao = $nmArquivoPadrao;
        return $this;
    }

    public function getSnExportacao(): int
    {
        return $this->snExportacao;
    }

    public function setSnExportacao(int $snExportacao): self
    {
        $this->snExportacao = $snExportacao;
        return $this;
    }

    public function getSnUsarChSit(): int
    {
        return $this->snUsarChSit;
    }

    public function setSnUsarChSit(int $snUsarChSit): self
    {
        $this->snUsarChSit = $snUsarChSit;
        return $this;
    }

    public function getSnUsarAnosemestre(): int
    {
        return $this->snUsarAnosemestre;
    }

    public function setSnUsarAnosemestre(int $snUsarAnosemestre): self
    {
        $this->snUsarAnosemestre = $snUsarAnosemestre;
        return $this;
    }
}
