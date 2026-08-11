<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasTiposDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasTiposDisciplinasRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_tipos_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
class OcorrenciasTiposDisciplinas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'sn_carta', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $snCarta = 1;

    #[ORM\Column(name: 'sn_email', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $snEmail = 1;

    public function __construct(
        ?int $cdTipo = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        int $snCarta = 1,
        int $snEmail = 1
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->snCarta = $snCarta;
        $this->snEmail = $snEmail;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getSnCarta(): int
    {
        return $this->snCarta;
    }

    public function setSnCarta(int $snCarta): self
    {
        $this->snCarta = $snCarta;
        return $this;
    }

    public function getSnEmail(): int
    {
        return $this->snEmail;
    }

    public function setSnEmail(int $snEmail): self
    {
        $this->snEmail = $snEmail;
        return $this;
    }
}
