<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DispHorariosProfessoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DispHorariosProfessoresRepository::class)]
#[ORM\Table(
    name: 'disp_horarios_professores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_HORARIO', columns: ['cd_horario'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class DispHorariosProfessores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_horario_professor', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHorarioProfessor = null;

    #[ORM\Column(name: 'cd_horario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHorario = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_dia_semana', type: 'integer', nullable: true)]
    private ?int $nrDiaSemana = null;

    public function __construct(
        ?int $cdHorario = null,
        ?int $cdPessoa = null,
        ?int $nrDiaSemana = null
    ) {
        $this->cdHorario = $cdHorario;
        $this->cdPessoa = $cdPessoa;
        $this->nrDiaSemana = $nrDiaSemana;
    }

    public function getCdHorarioProfessor(): ?int
    {
        return $this->cdHorarioProfessor;
    }

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function setCdHorario(?int $cdHorario): self
    {
        $this->cdHorario = $cdHorario;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrDiaSemana(): ?int
    {
        return $this->nrDiaSemana;
    }

    public function setNrDiaSemana(?int $nrDiaSemana): self
    {
        $this->nrDiaSemana = $nrDiaSemana;
        return $this;
    }
}
