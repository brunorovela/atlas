<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlPesquisadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlPesquisadosRepository::class)]
#[ORM\Table(
    name: 'avl_pesquisados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Pessoas que responder?o a pesquisa']
)]
#[ORM\UniqueConstraint(name: 'cd_pesquisado', columns: ['cd_pesquisado'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMAPROFESSOR', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class AvlPesquisados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pesquisado', type: 'integer')]
    private ?int $cdPesquisado = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'cd_situ_respondeu', type: 'boolean', nullable: true)]
    private ?bool $cdSituRespondeu = null;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer', nullable: true)]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'dt_inicio_avaliacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioAvaliacao = null;

    #[ORM\Column(name: 'dt_fim_avaliacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimAvaliacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdGrupo = 0,
        int $cdPessoa = 0,
        bool $snDisponivel = true,
        ?bool $cdSituRespondeu = null,
        ?int $cdTurmaprofessor = null,
        ?\DateTimeInterface $dtInicioAvaliacao = null,
        ?\DateTimeInterface $dtFimAvaliacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->snDisponivel = $snDisponivel;
        $this->cdSituRespondeu = $cdSituRespondeu;
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->dtInicioAvaliacao = $dtInicioAvaliacao;
        $this->dtFimAvaliacao = $dtFimAvaliacao;
        $this->dtBase = $dtBase;
    }

    public function getCdPesquisado(): ?int
    {
        return $this->cdPesquisado;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function isCdSituRespondeu(): ?bool
    {
        return $this->cdSituRespondeu;
    }

    public function setCdSituRespondeu(?bool $cdSituRespondeu): self
    {
        $this->cdSituRespondeu = $cdSituRespondeu;
        return $this;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getDtInicioAvaliacao(): ?\DateTimeInterface
    {
        return $this->dtInicioAvaliacao;
    }

    public function setDtInicioAvaliacao(?\DateTimeInterface $dtInicioAvaliacao): self
    {
        $this->dtInicioAvaliacao = $dtInicioAvaliacao;
        return $this;
    }

    public function getDtFimAvaliacao(): ?\DateTimeInterface
    {
        return $this->dtFimAvaliacao;
    }

    public function setDtFimAvaliacao(?\DateTimeInterface $dtFimAvaliacao): self
    {
        $this->dtFimAvaliacao = $dtFimAvaliacao;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
