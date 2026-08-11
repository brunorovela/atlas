<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConProvasDatasHorariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConProvasDatasHorariosRepository::class)]
#[ORM\Table(
    name: 'con_provas_datas_horarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DATA', columns: ['cd_data'])]
class ConProvasDatasHorarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_horario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHorario = null;

    #[ORM\Column(name: 'cd_data', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdData = null;

    #[ORM\Column(name: 'hr_horario', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrHorario = null;

    public function __construct(
        ?int $cdData = null,
        ?\DateTimeInterface $hrHorario = null
    ) {
        $this->cdData = $cdData;
        $this->hrHorario = $hrHorario;
    }

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function getCdData(): ?int
    {
        return $this->cdData;
    }

    public function setCdData(?int $cdData): self
    {
        $this->cdData = $cdData;
        return $this;
    }

    public function getHrHorario(): ?\DateTimeInterface
    {
        return $this->hrHorario;
    }

    public function setHrHorario(?\DateTimeInterface $hrHorario): self
    {
        $this->hrHorario = $hrHorario;
        return $this;
    }
}
