<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConInscricoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesTiposRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_inscricao_tipo', columns: ['cd_inscricao_tipo'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
class ConInscricoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoTipo = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_inscricao_tipo', type: 'string', length: 100, nullable: true)]
    private ?string $dsInscricaoTipo = null;

    #[ORM\Column(name: 'sn_especial', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $snEspecial = 0;

    #[ORM\Column(name: 'sn_isento', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $snIsento = 0;

    #[ORM\Column(name: 'sn_classificar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snClassificar = 1;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    public function __construct(
        ?int $cdTipo = null,
        ?string $dsInscricaoTipo = null,
        int $snEspecial = 0,
        int $snIsento = 0,
        ?int $snClassificar = 1,
        ?bool $snAtivo = true,
        ?float $vlValor = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsInscricaoTipo = $dsInscricaoTipo;
        $this->snEspecial = $snEspecial;
        $this->snIsento = $snIsento;
        $this->snClassificar = $snClassificar;
        $this->snAtivo = $snAtivo;
        $this->vlValor = $vlValor;
    }

    public function getCdInscricaoTipo(): ?int
    {
        return $this->cdInscricaoTipo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsInscricaoTipo(): ?string
    {
        return $this->dsInscricaoTipo;
    }

    public function setDsInscricaoTipo(?string $dsInscricaoTipo): self
    {
        $this->dsInscricaoTipo = $dsInscricaoTipo;
        return $this;
    }

    public function getSnEspecial(): int
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(int $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getSnIsento(): int
    {
        return $this->snIsento;
    }

    public function setSnIsento(int $snIsento): self
    {
        $this->snIsento = $snIsento;
        return $this;
    }

    public function getSnClassificar(): ?int
    {
        return $this->snClassificar;
    }

    public function setSnClassificar(?int $snClassificar): self
    {
        $this->snClassificar = $snClassificar;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }
}
