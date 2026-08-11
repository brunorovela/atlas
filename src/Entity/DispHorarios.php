<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DispHorariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DispHorariosRepository::class)]
#[ORM\Table(
    name: 'disp_horarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DispHorarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_horario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHorario = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_chave_integracao', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveIntegracao = null;

    #[ORM\Column(name: 'cd_turno', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $cdTurno = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsChaveIntegracao = null,
        ?string $cdTurno = null,
        ?int $cdColigada = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        $this->cdTurno = $cdTurno;
        $this->cdColigada = $cdColigada;
    }

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsChaveIntegracao(): ?string
    {
        return $this->dsChaveIntegracao;
    }

    public function setDsChaveIntegracao(?string $dsChaveIntegracao): self
    {
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        return $this;
    }

    public function getCdTurno(): ?string
    {
        return $this->cdTurno;
    }

    public function setCdTurno(?string $cdTurno): self
    {
        $this->cdTurno = $cdTurno;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
