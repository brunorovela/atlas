<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PolProvasPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasPessoasRepository::class)]
#[ORM\Table(
    name: 'pol_provas_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PolProvasPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa', type: 'integer')]
    private ?int $cdProvaPessoa = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true)]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nr_resolucao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrResolucao = 0;

    #[ORM\Column(name: 'nr_exibicoes', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrExibicoes = 0;

    #[ORM\Column(name: 'nr_qtd_alternativas', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdAlternativas = 0;

    #[ORM\Column(name: 'nr_nota', type: 'smallfloat', nullable: true, options: ['default' => '0'])]
    private ?float $nrNota = 0.0;

    #[ORM\Column(name: 'sn_finalizada', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snFinalizada = 0;

    #[ORM\Column(name: 'dt_resolucao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtResolucao = null;

    #[ORM\Column(name: 'dt_fim_resolucao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimResolucao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdProva = null,
        ?int $nrResolucao = 0,
        ?int $nrExibicoes = 0,
        ?int $nrQtdAlternativas = 0,
        ?float $nrNota = 0.0,
        ?int $snFinalizada = 0,
        ?\DateTimeInterface $dtResolucao = null,
        ?\DateTimeInterface $dtFimResolucao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdProva = $cdProva;
        $this->nrResolucao = $nrResolucao;
        $this->nrExibicoes = $nrExibicoes;
        $this->nrQtdAlternativas = $nrQtdAlternativas;
        $this->nrNota = $nrNota;
        $this->snFinalizada = $snFinalizada;
        $this->dtResolucao = $dtResolucao;
        $this->dtFimResolucao = $dtFimResolucao;
    }

    public function getCdProvaPessoa(): ?int
    {
        return $this->cdProvaPessoa;
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

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getNrResolucao(): ?int
    {
        return $this->nrResolucao;
    }

    public function setNrResolucao(?int $nrResolucao): self
    {
        $this->nrResolucao = $nrResolucao;
        return $this;
    }

    public function getNrExibicoes(): ?int
    {
        return $this->nrExibicoes;
    }

    public function setNrExibicoes(?int $nrExibicoes): self
    {
        $this->nrExibicoes = $nrExibicoes;
        return $this;
    }

    public function getNrQtdAlternativas(): ?int
    {
        return $this->nrQtdAlternativas;
    }

    public function setNrQtdAlternativas(?int $nrQtdAlternativas): self
    {
        $this->nrQtdAlternativas = $nrQtdAlternativas;
        return $this;
    }

    public function getNrNota(): ?float
    {
        return $this->nrNota;
    }

    public function setNrNota(?float $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }

    public function getSnFinalizada(): ?int
    {
        return $this->snFinalizada;
    }

    public function setSnFinalizada(?int $snFinalizada): self
    {
        $this->snFinalizada = $snFinalizada;
        return $this;
    }

    public function getDtResolucao(): ?\DateTimeInterface
    {
        return $this->dtResolucao;
    }

    public function setDtResolucao(?\DateTimeInterface $dtResolucao): self
    {
        $this->dtResolucao = $dtResolucao;
        return $this;
    }

    public function getDtFimResolucao(): ?\DateTimeInterface
    {
        return $this->dtFimResolucao;
    }

    public function setDtFimResolucao(?\DateTimeInterface $dtFimResolucao): self
    {
        $this->dtFimResolucao = $dtFimResolucao;
        return $this;
    }
}
