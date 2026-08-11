<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MatriculasComportamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculasComportamentoRepository::class)]
#[ORM\Table(
    name: 'matriculas_comportamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COMPORTAMENTOS', columns: ['cd_comportamento'])]
class MatriculasComportamento
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_etapa', type: 'smallint')]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'cd_comportamento', type: 'integer')]
    private ?int $cdComportamento = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?int $nrEtapa = null,
        ?int $cdComportamento = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->nrEtapa = $nrEtapa;
        $this->cdComportamento = $cdComportamento;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }

    public function getCdComportamento(): ?int
    {
        return $this->cdComportamento;
    }

    public function setCdComportamento(?int $cdComportamento): self
    {
        $this->cdComportamento = $cdComportamento;
        return $this;
    }
}
