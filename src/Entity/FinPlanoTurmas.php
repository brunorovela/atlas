<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoTurmasRepository::class)]
#[ORM\Table(
    name: 'fin_plano_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'id_plano_turma', columns: ['id_plano_turma'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NR_ANOSEM', columns: ['nr_anosem'])]
class FinPlanoTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_plano_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $idPlanoTurma = null;

    #[ORM\Column(name: 'cd_plano', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'nr_anosem', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    public function __construct(
        ?int $cdPlano = null,
        ?string $cdTurma = null,
        ?int $nrAnosem = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->cdTurma = $cdTurma;
        $this->nrAnosem = $nrAnosem;
    }

    public function getIdPlanoTurma(): ?int
    {
        return $this->idPlanoTurma;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
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

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }
}
