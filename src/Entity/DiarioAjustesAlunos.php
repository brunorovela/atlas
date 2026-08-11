<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioAjustesAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAjustesAlunosRepository::class)]
#[ORM\Table(
    name: 'diario_ajustes_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AJUSTE_TURMA', columns: ['cd_ajuste_turma'])]
#[ORM\Index(name: 'CD_PESSOA', columns: ['cd_pessoa'])]
class DiarioAjustesAlunos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_ajuste_turma', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdAjusteTurma = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'nt_ajuste', type: 'float', nullable: true)]
    private ?float $ntAjuste = null;

    public function __construct(
        int $cdAjusteTurma = 0,
        int $cdPessoa = 0,
        ?float $ntAjuste = null
    ) {
        $this->cdAjusteTurma = $cdAjusteTurma;
        $this->cdPessoa = $cdPessoa;
        $this->ntAjuste = $ntAjuste;
    }

    public function getCdAjusteTurma(): int
    {
        return $this->cdAjusteTurma;
    }

    public function setCdAjusteTurma(int $cdAjusteTurma): self
    {
        $this->cdAjusteTurma = $cdAjusteTurma;
        return $this;
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

    public function getNtAjuste(): ?float
    {
        return $this->ntAjuste;
    }

    public function setNtAjuste(?float $ntAjuste): self
    {
        $this->ntAjuste = $ntAjuste;
        return $this;
    }
}
