<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPrestacaoContasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPrestacaoContasRepository::class)]
#[ORM\Table(
    name: 'fin_prestacao_contas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PRESTACAO_CONTA', columns: ['cd_grupo_prestacao_conta'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class FinPrestacaoContas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prestacao_contas', type: 'integer')]
    private ?int $cdPrestacaoContas = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_periodo', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPeriodo = null;

    #[ORM\Column(name: 'cd_grupo_prestacao_conta', type: 'integer', nullable: true)]
    private ?int $cdGrupoPrestacaoConta = null;

    #[ORM\Column(name: 'sn_aberto', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAberto = false;

    #[ORM\Column(name: 'dt_bloqueio_provisorio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBloqueioProvisorio = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdColigada = 0;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtPeriodo = null,
        ?int $cdGrupoPrestacaoConta = null,
        ?bool $snAberto = false,
        ?\DateTimeInterface $dtBloqueioProvisorio = null,
        ?string $dsAcao = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?int $cdColigada = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtPeriodo = $dtPeriodo;
        $this->cdGrupoPrestacaoConta = $cdGrupoPrestacaoConta;
        $this->snAberto = $snAberto;
        $this->dtBloqueioProvisorio = $dtBloqueioProvisorio;
        $this->dsAcao = $dsAcao;
        $this->dtRegistro = $dtRegistro;
        $this->cdColigada = $cdColigada;
    }

    public function getCdPrestacaoContas(): ?int
    {
        return $this->cdPrestacaoContas;
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

    public function getDtPeriodo(): ?\DateTimeInterface
    {
        return $this->dtPeriodo;
    }

    public function setDtPeriodo(?\DateTimeInterface $dtPeriodo): self
    {
        $this->dtPeriodo = $dtPeriodo;
        return $this;
    }

    public function getCdGrupoPrestacaoConta(): ?int
    {
        return $this->cdGrupoPrestacaoConta;
    }

    public function setCdGrupoPrestacaoConta(?int $cdGrupoPrestacaoConta): self
    {
        $this->cdGrupoPrestacaoConta = $cdGrupoPrestacaoConta;
        return $this;
    }

    public function isSnAberto(): ?bool
    {
        return $this->snAberto;
    }

    public function setSnAberto(?bool $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }

    public function getDtBloqueioProvisorio(): ?\DateTimeInterface
    {
        return $this->dtBloqueioProvisorio;
    }

    public function setDtBloqueioProvisorio(?\DateTimeInterface $dtBloqueioProvisorio): self
    {
        $this->dtBloqueioProvisorio = $dtBloqueioProvisorio;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
