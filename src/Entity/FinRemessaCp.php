<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinRemessaCpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinRemessaCpRepository::class)]
#[ORM\Table(
    name: 'fin_remessa_cp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_REMESSA', columns: ['nr_remessa'])]
#[ORM\Index(name: 'IX_CD_REMESSA', columns: ['cd_remessa', 'nr_remessa'])]
class FinRemessaCp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_remessa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRemessa = null;

    #[ORM\Column(name: 'nr_remessa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrRemessa = null;

    #[ORM\Column(name: 'ds_remessa', type: 'string', length: 150, nullable: true)]
    private ?string $dsRemessa = null;

    #[ORM\Column(name: 'dt_criacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'dt_retorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRetorno = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', nullable: true)]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_cp_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCpInicio = null;

    #[ORM\Column(name: 'dt_cp_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCpFim = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    public function __construct(
        ?int $nrRemessa = null,
        ?string $dsRemessa = null,
        ?\DateTimeInterface $dtCriacao = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?\DateTimeInterface $dtRetorno = null,
        ?int $cdCaixa = null,
        ?int $cdLayout = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtCpInicio = null,
        ?\DateTimeInterface $dtCpFim = null,
        ?int $cdUsuario = null
    ) {
        $this->nrRemessa = $nrRemessa;
        $this->dsRemessa = $dsRemessa;
        $this->dtCriacao = $dtCriacao;
        $this->dtEnvio = $dtEnvio;
        $this->dtRetorno = $dtRetorno;
        $this->cdCaixa = $cdCaixa;
        $this->cdLayout = $cdLayout;
        $this->cdColigada = $cdColigada;
        $this->dtCpInicio = $dtCpInicio;
        $this->dtCpFim = $dtCpFim;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdRemessa(): ?int
    {
        return $this->cdRemessa;
    }

    public function getNrRemessa(): ?int
    {
        return $this->nrRemessa;
    }

    public function setNrRemessa(?int $nrRemessa): self
    {
        $this->nrRemessa = $nrRemessa;
        return $this;
    }

    public function getDsRemessa(): ?string
    {
        return $this->dsRemessa;
    }

    public function setDsRemessa(?string $dsRemessa): self
    {
        $this->dsRemessa = $dsRemessa;
        return $this;
    }

    public function getDtCriacao(): ?\DateTimeInterface
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao(?\DateTimeInterface $dtCriacao): self
    {
        $this->dtCriacao = $dtCriacao;
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

    public function getDtRetorno(): ?\DateTimeInterface
    {
        return $this->dtRetorno;
    }

    public function setDtRetorno(?\DateTimeInterface $dtRetorno): self
    {
        $this->dtRetorno = $dtRetorno;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
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

    public function getDtCpInicio(): ?\DateTimeInterface
    {
        return $this->dtCpInicio;
    }

    public function setDtCpInicio(?\DateTimeInterface $dtCpInicio): self
    {
        $this->dtCpInicio = $dtCpInicio;
        return $this;
    }

    public function getDtCpFim(): ?\DateTimeInterface
    {
        return $this->dtCpFim;
    }

    public function setDtCpFim(?\DateTimeInterface $dtCpFim): self
    {
        $this->dtCpFim = $dtCpFim;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}
