<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConRedacoesSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConRedacoesSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_redacoes_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EXAME', columns: ['cd_exame'])]
#[ORM\Index(name: 'IX_CD_TEMA', columns: ['cd_tema'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DT_INICIAL', columns: ['dt_inicial'])]
#[ORM\Index(name: 'IX_DT_FINAL', columns: ['dt_final'])]
#[ORM\Index(name: 'IX_DT_ENVIO', columns: ['dt_envio'])]
class ConRedacoesSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_redacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRedacao = null;

    #[ORM\Column(name: 'cd_tema', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTema = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExame = null;

    #[ORM\Column(name: 'nr_nota_redacao', type: 'smallfloat', nullable: true)]
    private ?float $nrNotaRedacao = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime')]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'ds_redacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRedacao = null;

    #[ORM\Column(name: 'cd_pessoa_correcao', type: 'integer', nullable: true)]
    private ?int $cdPessoaCorrecao = null;

    #[ORM\Column(name: 'cd_resolucao', type: 'integer', nullable: true)]
    private ?int $cdResolucao = null;

    #[ORM\Column(name: 'dt_tempo_restante', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtTempoRestante = null;

    public function __construct(
        ?int $cdTema = null,
        ?int $cdPessoa = null,
        ?int $cdExame = null,
        ?float $nrNotaRedacao = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?string $dsRedacao = null,
        ?int $cdPessoaCorrecao = null,
        ?int $cdResolucao = null,
        ?\DateTimeInterface $dtTempoRestante = null
    ) {
        $this->cdTema = $cdTema;
        $this->cdPessoa = $cdPessoa;
        $this->cdExame = $cdExame;
        $this->nrNotaRedacao = $nrNotaRedacao;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->dtEnvio = $dtEnvio;
        $this->dsRedacao = $dsRedacao;
        $this->cdPessoaCorrecao = $cdPessoaCorrecao;
        $this->cdResolucao = $cdResolucao;
        $this->dtTempoRestante = $dtTempoRestante;
    }

    public function getCdRedacao(): ?int
    {
        return $this->cdRedacao;
    }

    public function getCdTema(): ?int
    {
        return $this->cdTema;
    }

    public function setCdTema(?int $cdTema): self
    {
        $this->cdTema = $cdTema;
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

    public function getCdExame(): ?int
    {
        return $this->cdExame;
    }

    public function setCdExame(?int $cdExame): self
    {
        $this->cdExame = $cdExame;
        return $this;
    }

    public function getNrNotaRedacao(): ?float
    {
        return $this->nrNotaRedacao;
    }

    public function setNrNotaRedacao(?float $nrNotaRedacao): self
    {
        $this->nrNotaRedacao = $nrNotaRedacao;
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

    public function getDsRedacao(): ?string
    {
        return $this->dsRedacao;
    }

    public function setDsRedacao(?string $dsRedacao): self
    {
        $this->dsRedacao = $dsRedacao;
        return $this;
    }

    public function getCdPessoaCorrecao(): ?int
    {
        return $this->cdPessoaCorrecao;
    }

    public function setCdPessoaCorrecao(?int $cdPessoaCorrecao): self
    {
        $this->cdPessoaCorrecao = $cdPessoaCorrecao;
        return $this;
    }

    public function getCdResolucao(): ?int
    {
        return $this->cdResolucao;
    }

    public function setCdResolucao(?int $cdResolucao): self
    {
        $this->cdResolucao = $cdResolucao;
        return $this;
    }

    public function getDtTempoRestante(): ?\DateTimeInterface
    {
        return $this->dtTempoRestante;
    }

    public function setDtTempoRestante(?\DateTimeInterface $dtTempoRestante): self
    {
        $this->dtTempoRestante = $dtTempoRestante;
        return $this;
    }
}
