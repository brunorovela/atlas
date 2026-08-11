<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConResolucoesSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConResolucoesSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_resolucoes_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EXAME', columns: ['cd_exame'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DT_INICIAL', columns: ['dt_inicial'])]
#[ORM\Index(name: 'IX_DT_FINAL', columns: ['dt_final'])]
#[ORM\Index(name: 'IX_DT_ENVIO', columns: ['dt_envio'])]
class ConResolucoesSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_resolucao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdResolucao = null;

    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExame = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_resolucao', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrResolucao = null;

    #[ORM\Column(name: 'nr_nota_prova', type: 'smallfloat', nullable: true)]
    private ?float $nrNotaProva = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime')]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    public function __construct(
        ?int $cdExame = null,
        ?int $cdPessoa = null,
        ?int $nrResolucao = null,
        ?float $nrNotaProva = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?\DateTimeInterface $dtEnvio = null
    ) {
        $this->cdExame = $cdExame;
        $this->cdPessoa = $cdPessoa;
        $this->nrResolucao = $nrResolucao;
        $this->nrNotaProva = $nrNotaProva;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->dtEnvio = $dtEnvio;
    }

    public function getCdResolucao(): ?int
    {
        return $this->cdResolucao;
    }

    public function getCdExame(): ?int
    {
        return $this->cdExame;
    }

    public function setCdExame(?int $cdExame): self
    {
        $this->cdExame = $cdExame;
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

    public function getNrResolucao(): ?int
    {
        return $this->nrResolucao;
    }

    public function setNrResolucao(?int $nrResolucao): self
    {
        $this->nrResolucao = $nrResolucao;
        return $this;
    }

    public function getNrNotaProva(): ?float
    {
        return $this->nrNotaProva;
    }

    public function setNrNotaProva(?float $nrNotaProva): self
    {
        $this->nrNotaProva = $nrNotaProva;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }
}
