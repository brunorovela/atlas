<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CompProdutosTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompProdutosTurmasRepository::class)]
#[ORM\Table(
    name: 'comp_produtos_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela para ligação dos produtos com as turmas.']
)]
#[ORM\Index(name: 'IX_CD_PRODUTO', columns: ['cd_produto'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
class CompProdutosTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_produtos_turmas', type: 'integer')]
    private ?int $cdProdutosTurmas = null;

    #[ORM\Column(name: 'cd_produto', type: 'string', length: 30)]
    private ?string $cdProduto = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_anosemestre', type: 'smallint')]
    private ?int $cdAnosemestre = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint', nullable: true)]
    private ?int $nrEtapa = null;

    public function __construct(
        ?string $cdProduto = null,
        ?string $cdTurma = null,
        ?int $cdAnosemestre = null,
        ?int $nrEtapa = null
    ) {
        $this->cdProduto = $cdProduto;
        $this->cdTurma = $cdTurma;
        $this->cdAnosemestre = $cdAnosemestre;
        $this->nrEtapa = $nrEtapa;
    }

    public function getCdProdutosTurmas(): ?int
    {
        return $this->cdProdutosTurmas;
    }

    public function getCdProduto(): ?string
    {
        return $this->cdProduto;
    }

    public function setCdProduto(?string $cdProduto): self
    {
        $this->cdProduto = $cdProduto;
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

    public function getCdAnosemestre(): ?int
    {
        return $this->cdAnosemestre;
    }

    public function setCdAnosemestre(?int $cdAnosemestre): self
    {
        $this->cdAnosemestre = $cdAnosemestre;
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
}
