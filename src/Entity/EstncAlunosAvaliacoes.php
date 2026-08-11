<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncAlunosAvaliacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAlunosAvaliacoesRepository::class)]
#[ORM\Table(
    name: 'estnc_alunos_avaliacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_VAGA', columns: ['CD_VAGA'])]
class EstncAlunosAvaliacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ALUNOS_AVALIACAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAlunosAvaliacao = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'CD_VAGA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdVaga = null;

    #[ORM\Column(name: 'NR_NOTA_INTERESSE', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrNotaInteresse = null;

    #[ORM\Column(name: 'NR_NOTA_EMPRESA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrNotaEmpresa = null;

    #[ORM\Column(name: 'DT_DATA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtData = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdVaga = null,
        ?int $nrNotaInteresse = null,
        ?int $nrNotaEmpresa = null,
        ?\DateTimeInterface $dtData = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdVaga = $cdVaga;
        $this->nrNotaInteresse = $nrNotaInteresse;
        $this->nrNotaEmpresa = $nrNotaEmpresa;
        $this->dtData = $dtData;
    }

    public function getCdAlunosAvaliacao(): ?int
    {
        return $this->cdAlunosAvaliacao;
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

    public function getCdVaga(): ?int
    {
        return $this->cdVaga;
    }

    public function setCdVaga(?int $cdVaga): self
    {
        $this->cdVaga = $cdVaga;
        return $this;
    }

    public function getNrNotaInteresse(): ?int
    {
        return $this->nrNotaInteresse;
    }

    public function setNrNotaInteresse(?int $nrNotaInteresse): self
    {
        $this->nrNotaInteresse = $nrNotaInteresse;
        return $this;
    }

    public function getNrNotaEmpresa(): ?int
    {
        return $this->nrNotaEmpresa;
    }

    public function setNrNotaEmpresa(?int $nrNotaEmpresa): self
    {
        $this->nrNotaEmpresa = $nrNotaEmpresa;
        return $this;
    }

    public function getDtData(): ?\DateTimeInterface
    {
        return $this->dtData;
    }

    public function setDtData(?\DateTimeInterface $dtData): self
    {
        $this->dtData = $dtData;
        return $this;
    }
}
