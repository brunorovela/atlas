<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\VindiConfigTiposTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VindiConfigTiposTituloRepository::class)]
#[ORM\Table(
    name: 'vindi_config_tipos_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'vindi_id_tipo_titulo_unique', columns: ['id_tipo_titulo'])]
class VindiConfigTiposTitulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vindi_config_tipos_titulo', type: 'integer')]
    private ?int $cdVindiConfigTiposTitulo = null;

    #[ORM\Column(name: 'id_tipo_titulo', type: 'integer', nullable: true)]
    private ?int $idTipoTitulo = null;

    #[ORM\Column(name: 'sn_recorrencia', type: 'boolean', nullable: true)]
    private ?bool $snRecorrencia = null;

    #[ORM\Column(name: 'sn_agendado', type: 'boolean', nullable: true)]
    private ?bool $snAgendado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $idTipoTitulo = null,
        ?bool $snRecorrencia = null,
        ?bool $snAgendado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idTipoTitulo = $idTipoTitulo;
        $this->snRecorrencia = $snRecorrencia;
        $this->snAgendado = $snAgendado;
        $this->dtBase = $dtBase;
    }

    public function getCdVindiConfigTiposTitulo(): ?int
    {
        return $this->cdVindiConfigTiposTitulo;
    }

    public function getIdTipoTitulo(): ?int
    {
        return $this->idTipoTitulo;
    }

    public function setIdTipoTitulo(?int $idTipoTitulo): self
    {
        $this->idTipoTitulo = $idTipoTitulo;
        return $this;
    }

    public function isSnRecorrencia(): ?bool
    {
        return $this->snRecorrencia;
    }

    public function setSnRecorrencia(?bool $snRecorrencia): self
    {
        $this->snRecorrencia = $snRecorrencia;
        return $this;
    }

    public function isSnAgendado(): ?bool
    {
        return $this->snAgendado;
    }

    public function setSnAgendado(?bool $snAgendado): self
    {
        $this->snAgendado = $snAgendado;
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
