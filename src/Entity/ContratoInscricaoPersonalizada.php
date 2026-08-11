<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ContratoInscricaoPersonalizadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratoInscricaoPersonalizadaRepository::class)]
#[ORM\Table(
    name: 'contrato_inscricao_personalizada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PESSOA_TURMA', columns: ['cd_turma', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class ContratoInscricaoPersonalizada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contrato_pessoa', type: 'integer')]
    private ?int $cdContratoPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'me_contrato', type: 'text')]
    private ?string $meContrato = null;

    public function __construct(
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?string $meContrato = null
    ) {
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->meContrato = $meContrato;
    }

    public function getCdContratoPessoa(): ?int
    {
        return $this->cdContratoPessoa;
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

    public function getMeContrato(): ?string
    {
        return $this->meContrato;
    }

    public function setMeContrato(?string $meContrato): self
    {
        $this->meContrato = $meContrato;
        return $this;
    }
}
