<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioProfessoresOpcaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProfessoresOpcaoRepository::class)]
#[ORM\Table(
    name: 'diario_professores_opcao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_pessoa', columns: ['cd_pessoa', 'nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class DiarioProfessoresOpcao
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'nr_opcao', type: 'boolean', options: ['default' => '0'])]
    private bool $nrOpcao = false;

    public function __construct(
        int $cdPessoa = 0,
        int $nrAnosemestre = 0,
        bool $nrOpcao = false
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrOpcao = $nrOpcao;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function isNrOpcao(): bool
    {
        return $this->nrOpcao;
    }

    public function setNrOpcao(bool $nrOpcao): self
    {
        $this->nrOpcao = $nrOpcao;
        return $this;
    }
}
