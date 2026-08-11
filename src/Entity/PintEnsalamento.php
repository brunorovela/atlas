<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintEnsalamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintEnsalamentoRepository::class)]
#[ORM\Table(
    name: 'pint_ensalamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UNQ_PINT_ENSALAMENTO', columns: ['cd_regra_ensalamento', 'cd_prova', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_SALA', columns: ['cd_sala'])]
class PintEnsalamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ensalamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnsalamento = null;

    #[ORM\Column(name: 'cd_regra_ensalamento', type: 'integer')]
    private ?int $cdRegraEnsalamento = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_sala', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSala = null;

    #[ORM\Column(name: 'nr_posicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPosicao = null;

    #[ORM\Column(name: 'sn_faltou', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snFaltou = 0;

    public function __construct(
        ?int $cdRegraEnsalamento = null,
        ?int $cdProva = null,
        ?int $cdPessoa = null,
        ?int $cdSala = null,
        ?int $nrPosicao = null,
        ?int $snFaltou = 0
    ) {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
        $this->cdProva = $cdProva;
        $this->cdPessoa = $cdPessoa;
        $this->cdSala = $cdSala;
        $this->nrPosicao = $nrPosicao;
        $this->snFaltou = $snFaltou;
    }

    public function getCdEnsalamento(): ?int
    {
        return $this->cdEnsalamento;
    }

    public function getCdRegraEnsalamento(): ?int
    {
        return $this->cdRegraEnsalamento;
    }

    public function setCdRegraEnsalamento(?int $cdRegraEnsalamento): self
    {
        $this->cdRegraEnsalamento = $cdRegraEnsalamento;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getCdSala(): ?int
    {
        return $this->cdSala;
    }

    public function setCdSala(?int $cdSala): self
    {
        $this->cdSala = $cdSala;
        return $this;
    }

    public function getNrPosicao(): ?int
    {
        return $this->nrPosicao;
    }

    public function setNrPosicao(?int $nrPosicao): self
    {
        $this->nrPosicao = $nrPosicao;
        return $this;
    }

    public function getSnFaltou(): ?int
    {
        return $this->snFaltou;
    }

    public function setSnFaltou(?int $snFaltou): self
    {
        $this->snFaltou = $snFaltou;
        return $this;
    }
}
