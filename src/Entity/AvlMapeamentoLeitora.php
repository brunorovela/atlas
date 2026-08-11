<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlMapeamentoLeitoraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlMapeamentoLeitoraRepository::class)]
#[ORM\Table(
    name: 'avl_mapeamento_leitora',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AvlMapeamentoLeitora
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo_questao', type: 'integer')]
    private ?int $cdGrupoQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer', options: ['default' => '0'])]
    private int $cdTurmaprofessor = 0;

    #[ORM\Column(name: 'nr_decimal', type: 'integer', nullable: true)]
    private ?int $nrDecimal = null;

    #[ORM\Column(name: 'nr_binario', type: 'string', length: 12, nullable: true)]
    private ?string $nrBinario = null;

    public function __construct(
        ?int $cdGrupoQuestao = null,
        int $cdTurmaprofessor = 0,
        ?int $nrDecimal = null,
        ?string $nrBinario = null
    ) {
        $this->cdGrupoQuestao = $cdGrupoQuestao;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->nrDecimal = $nrDecimal;
        $this->nrBinario = $nrBinario;
    }

    public function getCdGrupoQuestao(): ?int
    {
        return $this->cdGrupoQuestao;
    }

    public function setCdGrupoQuestao(?int $cdGrupoQuestao): self
    {
        $this->cdGrupoQuestao = $cdGrupoQuestao;
        return $this;
    }

    public function getCdTurmaprofessor(): int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getNrDecimal(): ?int
    {
        return $this->nrDecimal;
    }

    public function setNrDecimal(?int $nrDecimal): self
    {
        $this->nrDecimal = $nrDecimal;
        return $this;
    }

    public function getNrBinario(): ?string
    {
        return $this->nrBinario;
    }

    public function setNrBinario(?string $nrBinario): self
    {
        $this->nrBinario = $nrBinario;
        return $this;
    }
}
